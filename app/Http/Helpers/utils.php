<?php

use App\Models\Category;

function getcategoryById( $id ){
    return Category::find($id);
}


function checkDocSelected( $prod, $id ){
    $docvar = json_decode($prod->documents);

    $result = array_filter( $docvar, function( $elem ) use ($id){

       if( $elem->id == $id ){
           return true;
       }
       return false;
    } );



   if( (array)count( $result ) == 0 )
    return false;
   else 
    return true; 
}