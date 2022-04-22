<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MembersController extends Controller
{
    function store(Request $request){
        //dd($request->all());
        $validated = $request->validate([
            'name' => 'required|min:4|max:30',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:4|max:30',
            'status' => 'required',
            'phone_number' => 'required'
        ]);
        
        $validated["password"] =  Hash::make($validated["password"]);

        $user = User::create( $validated );
        /*
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->phone_number = $request->phone_number;
        $user->save();
        */
        $request->session()->put('current_user_id',   $user->id);
        return redirect()->back()->with('message', ['type'=>'success', 'text' => 'Sikeres mentés!']);
    }

    function billing_store(Request $request){

        if(!$request->session()->get('current_user_id')){
            return redirect()->back()->with('message', ['type'=>'danger', 'text'=>'Nincs meg a user, előbb hozza létre azt!']);
        }

        $validated = $request->validate([
            'billing_name' => 'required|min:4|max:30',
            'billing_zip' => 'digits:4',
            'billing_tax_nr' => 'nullable',
            'billing_city' => 'required|min:2|max:30',
            'billing_address' => 'required|min:2|max:50',
            'billing_address2' => 'nullable'
        ]);

        User::findOrFail($request->session()->get('current_user_id'))->update($validated);

        return redirect()->back()->with('message', ['type'=>'success', 'text' => 'Sikeres mentés!']);
    }
}
