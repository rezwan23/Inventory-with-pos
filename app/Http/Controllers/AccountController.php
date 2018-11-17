<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $accounts = Account::orderBy('id', 'desc')->get();
        return view('accounts.index', ['accounts'=>$accounts]);
    }

    public function store(Request $request){
        $validatedData = new Account();
        $validatedData->name = $request->name;
        $validatedData->type  =   $request->type;
        $validatedData->acc_no    = $request->acc_no;
        $validatedData->bank_name = $request->bank_name;
        $validatedData->bank_address  =   $request->bank_address;
        $validatedData->opening_balance   = $request->opening_balance;
        $validatedData->balance = $request->opening_balance;
        $validatedData->save();
        return 'done';
    }

    public function destroy($id){
        $account = Account::find($id);
        $account->delete();
        return redirect()->route('account.index')->with('success-message', 'AccountDeleted Successfully!');
    }

    public function edit(Request $request){
        if(isset($request->id)){
            $account = Account::find($request->id);
            return $account;
        }
        return redirect()->route('404error');
    }
    public function update(Request $request){
        $validatedData = Account::find($request->id);
        $validatedData->name = $request->name;
        $validatedData->type  =   $request->type;
        $validatedData->acc_no    = $request->acc_no;
        $validatedData->bank_name = $request->bank_name;
        $validatedData->bank_address  =   $request->bank_address;
        $validatedData->update();
        return 'done';
    }

}
