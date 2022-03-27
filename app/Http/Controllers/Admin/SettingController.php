<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;

class SettingController extends Controller
{
    function store(Request $request){

        $rules = [];
        foreach( $request->except(["_method", "_token"]) as $key =>$val ){
            $rules[$key]='required';
        }
        
        $validated = $request->validate($rules);

        foreach( $validated as $key=>$val){
            Setting::updateorcreate([
                'key'=>$key
            ], [
                'value'=>$val
            ]);
        }

        return redirect()->back()->with('message', ['type'=>'success', 'text'=>'Sikeres mentés!']);
    }
}
