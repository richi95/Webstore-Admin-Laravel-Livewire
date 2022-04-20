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

}



function checkImgSelected($prod, $id)
{
    $imgvar = json_decode($prod->image);
    $result = array_filter($imgvar, function ($elem) use ($id) {

        if ($elem->id == $id) {
            return true;
        }
        return false;
    });

    return $result;

}
<<<<<<< HEAD

function checkMainImgSelected( $product, $imgid ){
    $main_img = json_decode($product->main_image);

        return  $main_img->id == $imgid;
=======
function checkMainImgSelected($prod, $id)
{
    $imgvar = json_decode($prod->main_image);
    $result = array_filter($imgvar, function ($elem) use ($id) {

        if ($elem->id == $id) {
            return true;
        }
        return false;
    });

    return $result;

>>>>>>> 9f8f433de33eb8dc583d64236b292d7c62a12307
}
