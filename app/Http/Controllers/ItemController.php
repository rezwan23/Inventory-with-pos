<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
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
        $items = Item::with('categories')->get();
        return view('items.index', ['items'=>$items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('items.create', ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'name'  =>  'required',
            'item_code'  =>  'required',
            'purchase_price'    =>  'required',
            'retail_price'      =>  'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:128',
            'vat'  =>  '',
            'quantity'  =>  'required',
            'description'   =>  'required',
            'category'  => [],
        ]);
        if(isset($validatedData['category'])){
            $image = $request->file('image');
            $uploadedImage = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/items');
            $image->move($destinationPath, $uploadedImage);
            $validatedData['image'] = $uploadedImage;
            $insertingRow = new Item();
            $insertingRow->name = $validatedData['name'];
            $insertingRow->item_code = $validatedData['item_code'];
            $insertingRow->purchase_price = $validatedData['purchase_price'];
            $insertingRow->retail_price = $validatedData['retail_price'];
            $insertingRow->image = $uploadedImage;
            $insertingRow->vat = $validatedData['vat'];
            $insertingRow->quantity = $validatedData['quantity'];
            $insertingRow->description = $validatedData['description'];
            $insertingRow->save();
            $insertingRow->categories()->sync($validatedData['category']);
            return redirect()->route('item.index')->with('success-message', 'Item Added Successfully');
        }
        return redirect()->route('category.create')->with('error-message', 'Enter Category First');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('item.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $item = Item::with('categories')->where('id', '=', $id)->get()->first();
        if(!$item){
            return redirect()->route('item.index');
        }
        return view('items.edit', ['item'=>$item, 'categories'=>$categories]);
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
        $updatingRow = Item::find($id);
        $this->validate($request, [
            'name'  =>  'required',
            'item_code'  =>  'required',
            'purchase_price'    =>  'required',
            'retail_price'      =>  'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:128',
            'vat'  =>  '',
            'description'   =>  '',
            'quantity'      => '',
        ]);
        if($request->category){
            $updatingRow->name = $request->name;
            $updatingRow->item_code = $request->item_code;
            $updatingRow->purchase_price = $request->purchase_price;
            $updatingRow->retail_price = $request->retail_price;
            $updatingRow->vat = $request->vat;
            $updatingRow->description = $request->description;
            $updatingRow->quantity = $request->quantity;
            if($request->hasFile('image')){
                $image = $request->file('image');
                $uploadedImage = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images/items');
                $image->move($destinationPath, $uploadedImage);
                $validatedData['image'] = $uploadedImage;
            }
            $updatingRow->update();
            $updatingRow->categories()->sync($request->category);
            return redirect()->route('item.index')->with('success-message', 'Item Updated Successfully');
        }
        return redirect()->route('category.create')->with('error-message', 'Enter Category First');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delRow = Item::find($id);
        $delRow->delete();
        return redirect()->route('item.index')->with('success-message', 'Item Deleted Successfully');
    }
}
