<?php

namespace App\Http\Controllers;

use App\Account;
use App\Cart;
use App\Customer;
use App\Invoice;
use App\Item;
use App\Sell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Helper\Table;

class PosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $items = Item::all();
        $carts = DB::table('carts')
            ->join('items', 'item_id', '=', 'items.id')
            ->select('*', 'carts.id as cart_id', 'carts.quantity as cart_quantity')
            ->where('user_id', '=', Auth::user()->id)
            ->get();
        $accounts = Account::all();
        $total = 0;
        $vat = 0;
        foreach($carts as $cart){
            $total += $cart->retail_price * $cart->cart_quantity;
            $vat += $cart->retail_price*$cart->cart_quantity*$cart->vat/100;
        }
        return view('posindex', ['items'=>$items, 'carts'=>$carts, 'total' => $total, 'vat'=>$vat, 'accounts'=>$accounts]);
    }
    public function addToCart(Request $request){
        $user = Auth::user();
        $cart = new Cart();
        $item = Item::find($request->item_id);
        $newQuantity = $item->quantity - $request->quantity;
        $item->quantity = $newQuantity;
        $item->update();
        $cart->user_id = $user->id;
        $cart->item_id = $request->item_id;
        $cart->quantity = $request->quantity;
        $cart->save();
        return 'done';
    }
    public function deleteCartItem(Request $request){
        try{
            $cart = DB::table('carts')->select(['item_id', 'quantity'])->where('id', $request->id)->get()->first();
            $item = Item::find($cart->item_id);
            $item->quantity += $cart->quantity;
            $item->update();
            Cart::destroy([$request->id]);
        }catch(\Illuminate\Database\QueryException $e){
            return 'Wrong!';
        }

        return 'Rifat';
    }

    public function deleteAllCartItem(Request $request){
        $keys = $request->dataId;
        $values = $request->dataQty;
        $rifat = [];
        foreach($keys as $index => $key){
            if(isset($rifat[$key])){
                $rifat[$key]+=$values[$index];
            }else{
                $rifat[$key] = $values[$index];
            }
        }
        foreach($rifat as $id => $quantity){
            $item = Item::find($id);
            $item->quantity += $quantity;
            $item->update();
        }
        $id = Auth::user()->id;
        $cartIds = DB::table('carts')->select('id')->where('user_id', '=', $id)->get()->toArray();
        $ids = [];
        foreach($cartIds as $cards){
            array_push($ids, $cards->id);
        }
        Cart::destroy($ids);
        return ['success-message' => 'Cart Deleted'];
    }

    public function itemSellInvoiceShow(Request $request){
//        return $request;
        $id =  Auth::user()->id;
        $carts = DB::table('carts')
            ->join('items', 'item_id', '=', 'items.id')
            ->select('*', 'carts.id as cart_id', 'carts.quantity as cart_quantity')
            ->where('user_id', '=', $id)
            ->get();
        foreach($carts as $cart){
            $sell = new Sell();
            $sell-> item_id = $cart->item_id;
            $sell->quantity = $cart->cart_quantity;
            $sell->total_price = $cart->retail_price*$cart->cart_quantity + $cart->retail_price*$cart->cart_quantity*$cart->vat/100;
            $sell->save();
        }
        if(count(Invoice::all())==0){
            $invoiceNo = 'Inv##1';
        }else{
            $invoiceNo = 'Inv##'.(count(Invoice::all())+1);
        }
        $customer = Customer::where('phone', '=', $request->customer_no)->get();
//        return $customer;
        if(count($customer)>0){
            $customer_name = $customer->first()->name;
        }else{
            $customer_name = 'Guest '.$request->customer_no;
        }
        if($request->amount_paid<$request->amount_payable){
            $due = $request->amount_payable-$request->amount_paid;
        }else{
            $due = 0;
        }

        Invoice::create([
            'invoice_no'    =>  $invoiceNo,
            'from'          =>  Auth::user()->name,
            'to'            =>  $customer_name,
            'invoice_type'  =>  'Sell Items',
            'total_amount'  =>  $request->amount_payable,
            'amount_paid'   =>  $request->amount_paid,
            'amount_due'    =>  $due,
            'status'        =>  $request->note,
        ]);

        return redirect()->route('posindex');
    }
}
