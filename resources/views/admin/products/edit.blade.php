@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                @include('admin.includes.message')
                <div class="alert mb-3 alert-success d-none" id="successmessage">Sikeres rögzítés!</div>

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('Termékek') }}</h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Termékek') }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">

                        <div class="card card-primary">

                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.post.products.edit',['product'=>$products->id]) }}" method="post"
                                enctype="multipart/form-data" id="product-store-form">
                                @method('POST')
                                @csrf
                                
                                <div class="card-body">


                                    {{-- @include('admin.includes.form.select', [
                                        'id' => 'parent_id',
                                        'label' => 'Szülőkategória',
                                        'value' => '',
                                        'classes' => ' w-50',
                                        'options' => $categories,
                                    ]) --}}

                                    <div class="form-group row px-5">

                                        <div class="col-md-6">
                                            <label class="col">Kategória</label>
                                        </div>

                                        <div class="col-md-6">
                                            @include(
                                                'admin.includes.form.category_dd'
                                            )
                                            <span class="error category_id text-danger"></span>
                                        </div>
                                    </div>

                                    @include('admin.includes.form.input', [
                                        'id' => 'name',
                                        'label' => 'Terméknév',
                                        'placeholder' => 'Terméknév',
                                        'type' => 'text',
                                        'value' => $products->name,
                                        'params' =>  null
                                    ])
                                    {{-- -------------CHECKBOX-------------------- --}}
                                    @include('admin.includes.form.checkbox', [
                                        'id' => 'main_page_highlight',
                                        'name' => 'main_page_highlight',
                                        'label' => 'Főoldali kiemelés',
                                        'params' => $products->main_page_highlight
                                    ])
                                    @include('admin.includes.form.checkbox', [
                                        'id' =>'category_highlight',
                                        'name' => 'category_highlight',
                                        'label' => 'Kategóriai kiemelés',
                                        'params' => $products->category_highlight,
                                    ])
                                    @include('admin.includes.form.checkbox', [
                                        'id' => 'discount',
                                        'name' => 'discount',
                                        'label' => 'Akciós',
                                        'params' => $products->discount,
                                    ])
                                    @include('admin.includes.form.checkbox', [
                                        'id' => 'user_reviews',
                                        'name' => 'user_reviews',
                                        'label' => 'Felhasználói véleményezés',
                                        'params' => $products->user_reviews,
                                    ])
                                    {{-- (ezt a rendszer vásárláskor aktualizálja) --}}
                                    @include('admin.includes.form.checkbox', [
                                        'id' => 'adjustable_quantity',
                                        'name' => 'adjustable_quantity',
                                        'label' => 'Beállítható mennyiség',
                                        'params' => $products->adjustable_quantity,
                                    ])
                                    @include('admin.includes.form.checkbox', [
                                        'id' => 'nocount',
                                        'name' => 'nocount',
                                        'label' => 'Nem használja a termékmennyiségek nyilvántartását',
                                        'params' => $products->nocount,
                                    ])
                                    {{-- -------------/CHECKBOX-------------------- --}}
                                    {{-- KépVálasztó gomb --}}

                                    <div class="form-group row px-5">
                                        <div class="col-md-6">
                                            <label class="col">Válasszon képeket</label>
                                        </div>

                                        <div class="col-md-6 documents-container" >
                                            @foreach( $images as $img )
                                            <div class="py-2">

                                                {{-- {{$dc->id}} --}}
                                              
                                                <input type="radio" {{ checkMainImgSelected( $products, $img->id )== true ? 'checked' : ''}} id="main_image_{{$img->id}}" name="main_image" value="{{$img->id}}"  > <label label="main_image_{{$img->id}}" >kezdőkép</label> | 
                                                <input type="checkbox" {{ checkImgSelected( $products, $img->id )== true ? 'checked' : ''}}  value="{{$img->id}}" id="image-{{$img->id}}" name="images[]">

                                               <label class="form-check-label" for="image-{{$img->id}}"><img src="/storage/{{$img->file}}" width="100"></label>
                                            </div>   
                                            @endforeach
                                        </div>
                                    </div>

                                    {{-- {{dd($products)}} --}}

                                    <div class="form-group row px-5">
                                        <div class="col-md-6">
                                            <label class="col">Válasszon dokumentumokat</label>
                                        </div>

                                        <div class="col-md-6 documents-container" >
                                            @foreach( $docs as $dc )
                                            <div class="py-2">
                                                {{-- {{$dc->id}} --}}
                                               <input type="checkbox" {{ checkDocSelected( $products, $dc->id )== true ? 'checked' : ''}}  value="{{$dc->id}}" id="doc-{{$dc->id}}" name="documents[]">
                                               <label class="form-check-label" for="doc-{{$dc->id}}">{{$dc->title}}</label>
                                            </div>   
                                            @endforeach
                                        </div>
                                    </div>

                                    @include('admin.includes.form.input', [
                                        'id' => 'slug',
                                        'label' => 'SEO URL (kulcsszavas URL)',
                                        'placeholder' => 'SEO URL ',
                                        'type' => 'text',
                                        'value' => $products->slug,
                                        'params' => null,
                                    ])

                                    @include('admin.includes.form.input', [
                                        'id' => 'seo_title',
                                        'label' => 'SEO title',
                                        'placeholder' => 'Title',
                                        'type' => 'text',
                                        'value' => $products->seo_title,
                                        'params' => null,
                                    ])

                                    @include('admin.includes.form.input', [
                                        'id' => 'seo_description',
                                        'label' => 'SEO description',
                                        'placeholder' => 'Description',
                                        'type' => 'text',
                                        'value' => $products->seo_description,
                                        'params' => null,
                                    ])

                                    @include('admin.includes.form.input', [
                                        'id' => 'seo_keywords',
                                        'label' => 'SEO keywords',
                                        'placeholder' => 'Keywords',
                                        'type' => 'text',
                                        'value' =>$products->seo_keywords,
                                        'params' => null,
                                    ])


                                    @include('admin.includes.form.input', [
                                        'id' => 'price',
                                        'label' => 'Ár',
                                        'placeholder' => 'Ár',
                                        'type' => 'number',
                                        'value' => $products->price,
                                        'params' => null,
                                    ])



                                    @include('admin.includes.form.input', [
                                        'id' => 'hotprice',
                                        'label' => 'Akciós ár',
                                        'placeholder' => 'Akciós ár',
                                        'type' => 'number',
                                        'value' => $products->hotprice,
                                        'params' => null,
                                    ])


                                        @include('admin.includes.form.textarea', [
                                            'id' => 'description',
                                            'label' => 'Leírás',
                                            'placeholder' => 'Leírás',

                                            'value' => $products->description,
                                            'params' => " style='height:200px;'",
                                        ])


                                  
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>


                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

 

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">title</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal-body">
                    tartalom
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-save" onclick="selectImages()">Képek
                        beillesztése</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
