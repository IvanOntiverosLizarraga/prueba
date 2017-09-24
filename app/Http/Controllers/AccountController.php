<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Account;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::all()->where('user_id',Auth::user()->id);
        return view('user.accounts.index')->with('accounts',$accounts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'bank' => 'required|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚ \t]*$/i|min:4|max:50',
            'account' => 'required|numeric|min:10|unique:accounts',
            'credit' => 'required|numeric',
        ]);

        $account = new Account($request->all());        
        $account->user_id = Auth::user()->id;        
        $account->save();
        flash("Se ha registrado la cuenta " . $account->account . " de ".$account->bank." de forma exitosa.")->success();
        return redirect()->route('accounts.index');                
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
        $account = Account::find($id);
        return view('user.accounts.edit')->with('account',$account);
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
        $this->validate($request, [
            'bank' => 'required|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚ \t]*$/i|min:4|max:50',
            'account' => 'required|numeric|min:10',
            'credit' => 'required|numeric',
        ]);

        $account = Account::find($id);
        $account->bank = $request->bank;
        $account->account = $request->account;
        $account->credit = $request->credit;
        $account->save();
        flash("Se ha editado la cuenta " . $account->account . " de ".$account->bank." de forma exitosa.")->success();
        return redirect()->route('accounts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = Account::find($id);
        $account->delete();
        flash("Se ha eliminado la cuenta " . $account->account . " de ".$account->bank." de forma exitosa.")->error();
        return redirect()->route('accounts.index');
    }
}
