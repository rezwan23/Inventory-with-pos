<?php

namespace App\Http\Controllers;

use App\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Excel;

class CustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', ['customers'=>$customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lastId = Customer::latest()->first();
        if(!$lastId){
            $assumedId = 1;
        }
        else{
            $assumedId = $lastId->id;
        }
        $newCustomer = $this->validate($request, [
            'phone' =>  'required',
            'name'  =>  '',
            'email' =>  '',
            'tin_number'    =>  '',
            'address'   =>  ''
        ]);
//        return $newCustomer;
//        return $newCustomer;
        if(!isset($newCustomer['name'])){
            $newCustomer['name'] = 'Customer '.$assumedId;
        }
        if(!isset($newCustomer['email'])){
            $newCustomer['email'] = 'abc@gmail.com';
        }
        if(!isset($newCustomer['address'])){
            $newCustomer['address'] = 'Bangladesh';
        }
        if(!isset($newCustomer['tin_number'])){
            $newCustomer['tin_number'] = '***1234';
        }
        Customer::create($newCustomer);
        return redirect()->route('customer.index')->with('success-message', 'Customer Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customers.edit', ['customer'=>$customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateCustomer = Customer::find($id);
        $updateData = $this->validate($request, [
            'phone' =>  'required',
            'name'  =>  'required',
            'email' =>  'required|email',
            'tin_number'    =>  'required',
            'address'   =>  'required'
        ]);
        $updateCustomer->update($updateData);
        return redirect()->route('customer.index')->with('success-message', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delCustomer = Customer::find($id);
        $delCustomer->delete();
        return redirect()->route('customer.index')->with('success-message', 'Customer Deleted Successfully');
    }
    public function import(Request $request){
        if($request->hasFile('file')){
            $this->validate($request, [
                'file'  =>  'required|mimes:csv,txt',
            ]);
            if(($handle = fopen($_FILES['file']['tmp_name'], 'r'))!=false){
                fgetcsv($handle);
                while(($data = fgetcsv($handle, 1000, ','))!=false){
                    $list[]= [
                        'name' => $data[0],
                        'email'=> $data[1],
                        'phone'=>$data[2],
                        'address'=>$data[3],
                        'tin_number'=>$data[4],
                        'created_at'=>Carbon::now()->toDateTimeString(),
                        'updated_at'=>Carbon::now()->toDateTimeString(),
                    ];
                }
                if(count($list)>0){
                    Customer::insert($list);
                    return redirect()->route('customer.index')->with('success-message', 'Data uploaded Successfully!');
                }
            }
            return redirect()->route('customer.index')->with('error-message', 'Opps! Something went wrong. Refresh and try again..');
        }
    }
}
