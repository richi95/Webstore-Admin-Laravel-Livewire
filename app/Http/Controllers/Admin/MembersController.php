<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MembersController extends Controller
{
    function store(Request $request){
        dd($request->all());
        $request->validate([
            'name' => 'required|min:4|max:30',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:4|max:30',
            'status' => 'required',
            'phone_number' => 'required'
        ]);
        
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->phone_number = $request->phone_number;
        $user->save();

        return redirect()->back()->with('message', ['type'=>'success', 'text' => 'Sikeres mentés!']);
    }
}
