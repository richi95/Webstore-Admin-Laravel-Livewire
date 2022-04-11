<?php

use App\Models\Category;

function getcategoryById( $id ){
    return Category::find($id);
}