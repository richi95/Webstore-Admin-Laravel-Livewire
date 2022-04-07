<select name="category_id" class="form-control">
@php  
    
    foreach( \App\Models\Category::where('parent_id', 0 )->get() as $category ){

        print '<optgroup label="'.$category->name.'">';
            
            foreach( \App\Models\Category::where('parent_id', $category->id )->get() as $subcategory ){

                print '<option value="'.$subcategory->id.'">'.$subcategory->name.'</option>';

            }   
            
        print '</optgroup>';

    }


@endphp
</select>