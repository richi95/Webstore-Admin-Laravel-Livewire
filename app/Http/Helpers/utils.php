<?php

use App\Models\Category;

function getcategoryById($id)
{
    return Category::find($id);
}


function checkDocSelected($prod, $id)
{
    $docvar = json_decode($prod->document);
    $result = array_filter($docvar, function ($elem) use ($id) {

        if ($elem->id == $id) {
            return true;
        }
        return false;
    });

    return $result;

    // if ($result != true)
    //     return false;
    // else
    //     return true;
}
