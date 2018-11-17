<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', ['suppliers' => $suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lastId = Supplier::latest()->first();
//        return $lastId;
        if(!$lastId){
            $assumedId = 1;
        }
        else{
            $assumedId = $lastId->id;
        }
        $newSupplier = $this->validate($request, [
            'phone' =>  'required',
            'name'  =>  '',
            'email' =>  '',
            'tin_number'    =>  '',
            'address'   =>  '',
            'type'      => '',
            'company'   =>  ''
        ]);
        if(!isset($newSupplier['name'])){
            $newSupplier['name'] = 'Supplier '.$assumedId;
        }
        if(!isset($newSupplier['email'])){
            $newSupplier['email'] = 'abc@gmail.com';
        }
        if(!isset($newSupplier['address'])){
            $newSupplier['address'] = 'Bangladesh';
        }
        if(!isset($newSupplier['tin_number'])){
            $newSupplier['tin_number'] = '***1234';
        }
        if(!isset($newSupplier['company'])){
            $newSupplier['company'] = 'TongSoftBD';
        }
        Supplier::create($newSupplier);
        return redirect()->route('supplier.index')->with('success-message', 'Supplier Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::find($id);
//        return $supplier;
        return view('suppliers.edit', ['supplier'=>$supplier]);
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
        $updateSupplier = Supplier::find($id);
        $updateData = $this->validate($request, [
            'phone' =>  'required',
            'name'  =>  'required',
            'email' =>  'required|email',
            'tin_number'    =>  'required',
            'address'   =>  'required',
            'type'  =>  'required',
            'company'   => 'required',
        ]);
        $updateSupplier->update($updateData);
        return redirect()->route('supplier.index')->with('success-message', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delItem = Supplier::find($id);
        $delItem->delete();
        return redirect()->route('supplier.index')->with('success-message', 'Supplier Deleted Successfully');
    }
}
