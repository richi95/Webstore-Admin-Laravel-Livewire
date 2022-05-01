<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    function search(){
        $search_text = $_GET['query'];
        $purchases = Purchase::where('customer_name','like','%'.$search_text.'%')->paginate(10);

        return view('admin.purchases.list', ['purchases' => $purchases]);
    }
    
    function update(Request $request){
        

        // $validated = $request->except('_token');
        $validated = $request->validate([
            'customer_name' => 'required',
            'status' => ''
        ]);
        Purchase::where('id', $request->id)->update($validated);
        
        return redirect()->route('admin.purchases')->with('message', ['type'=>'success', 'text'=>'Sikeres módosítás!']);
    }
}
