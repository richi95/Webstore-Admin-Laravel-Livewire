@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                
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
                            <form action="{{ route('admin.post.products.edit') }}" method="post"
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
                                        'id' => $products->id,
                                        'label' => 'Terméknév',
                                        'placeholder' => 'Terméknév',
                                        'type' => 'text',
                                        'value' => $products->name,
                                        'params' =>  null
                                    ])
                                    {{-- -------------CHECKBOX-------------------- --}}
                                    @include('admin.includes.form.checkbox', [
                                        'id' => $products->id,
                                        'name' => 'main_page_highlight',
                                        'label' => 'Főoldali kiemelés',
                                        'params' => $products->main_page_highlight
                                    ])
                                    @include('admin.includes.form.checkbox', [
                                        'id' => $products->id,
                                        'name' => 'category_highlight',
                                        'label' => 'Kategóriai kiemelés',
                                        'params' => $products->category_highlight,
                                    ])
                                    @include('admin.includes.form.checkbox', [
                                        'id' => $products->id,
                                        'name' => 'discount',
                                        'label' => 'Akciós',
                                        'params' => $products->discount,
                                    ])
                                    @include('admin.includes.form.checkbox', [
                                        'id' => $products->id,
                                        'name' => 'user_reviews',
                                        'label' => 'Felhasználói véleményezés',
                                        'params' => $products->user_reviews,
                                    ])
                                    {{-- (ezt a rendszer vásárláskor aktualizálja) --}}
                                    @include('admin.includes.form.checkbox', [
                                        'id' => $products->id,
                                        'name' => 'adjustable_quantity',
                                        'label' => 'Beállítható mennyiség',
                                        'params' => $products->adjustable_quantity,
                                    ])
                                    @include('admin.includes.form.checkbox', [
                                        'id' => $products->id,
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

                                        <div class="col-md-6">
                                            <div id="product-images">képek</div>
                                            <input type="hidden" name="main_image" id="main_image" value="">

                                            <a href="#" class="btn btn-primary" data-toggle="modal"
                                                data-target="#modal-default"
                                                onclick="loadModalContent('Válasszon képeket', {{ Js::from($images) }}); ">Kiválaszt</a>
                                            {{-- @error($id)
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror --}}
                                        </div>
                                    </div>

                                    {{--  --}}

                                    <div class="form-group row px-5">
                                        <div class="col-md-6">
                                            <label class="col">Válasszon dokumentumokat</label>
                                        </div>

                                        <div class="col-md-6 documents-container" >
                                            @foreach( $docs as $dc )
                                            <div class="py-2">
                                               <input type="checkbox"  value="{{$dc->id}}" id="doc-{{$dc->id}}" name="documents[]">
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
                                        'value' => '',
                                        'params' => null,
                                    ])

                                    @include('admin.includes.form.input', [
                                        'id' => 'seo_title',
                                        'label' => 'SEO title',
                                        'placeholder' => 'Title',
                                        'type' => 'text',
                                        'value' => '',
                                        'params' => null,
                                    ])

                                    @include('admin.includes.form.input', [
                                        'id' => 'seo_description',
                                        'label' => 'SEO description',
                                        'placeholder' => 'Description',
                                        'type' => 'text',
                                        'value' => '',
                                        'params' => null,
                                    ])

                                    @include('admin.includes.form.input', [
                                        'id' => 'seo_keywords',
                                        'label' => 'SEO keywords',
                                        'placeholder' => 'Keywords',
                                        'type' => 'text',
                                        'value' => '',
                                        'params' => null,
                                    ])


                                    @include('admin.includes.form.input', [
                                        'id' => 'price',
                                        'label' => 'Ár',
                                        'placeholder' => 'Ár',
                                        'type' => 'number',
                                        'value' => '',
                                        'params' => null,
                                    ])



                                    @include('admin.includes.form.input', [
                                        'id' => 'hotprice',
                                        'label' => 'Akciós ár',
                                        'placeholder' => 'Akciós ár',
                                        'type' => 'number',
                                        'value' => '',
                                        'params' => null,
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

    <script>
        let PRODUCT_MAIN_IMG = '';

        function loadModalContent(title, body) {
            const modaltitle = document.getElementById('modal-title');
            const modalbody = document.getElementById('modal-body');

            modaltitle.innerText = title;



            let out = '<div class="row">';
            out += body.map(item => {
                return `<div class="col-4"><img style="width:100%; height:100px;object-fit:cover;" src="/storage/${item.file}">
            
                
                <input type="checkbox" class=" selected-image" data-value="/storage/${item.file}" data-id="${item.id}"> kiválaszt

                <input type="radio"  name="main_image" data-value="/storage/${item.file}" data-id="${item.id}" class="ml-2 main-image"> kezdőkép 

            </div>`;
            }).join('');
            out += '</div>';

            modalbody.innerHTML = out


        }

        function selectImages() {
            let images = '';

            document.querySelectorAll('.selected-image').forEach(function(item) {

                if (item.checked)
                    images += `<img src="${item.dataset.value}" style="width:80px; height:80px; object-fit:cover;" class="m-1">
                <input type="hidden" name="images[]" value="${item.dataset.id}">
                `
            })

            //alert(images);
            document.getElementById('product-images').innerHTML = images;


            document.querySelectorAll('.main-image').forEach(function(item) {
                if (item.checked)
                    PRODUCT_MAIN_IMG = item.dataset.value
            })


            const mainimg = document.querySelector('#product-images > img[src="' + PRODUCT_MAIN_IMG + '"]');
            mainimg.style.border = '5px solid green';
            mainimg.title = 'Kezdőkép'

            document.getElementById('main_image').value = PRODUCT_MAIN_IMG

        }

        const formelem = document.getElementById('product-store-form');
      
        formelem.onsubmit = function(){

            const fd = new FormData;
            
            document.querySelectorAll('#product-store-form input[type="text"], #product-store-form input[type="hidden"], #product-store-form input[type="number"], #product-store-form select').forEach(function(formelem){
                const name = formelem.name;
                const value = formelem.value;

                fd.append( name, value );

            })

            document.querySelectorAll('#product-store-form input[type="checkbox"]').forEach(function(formelem){

                if(formelem.checked){
                const name = formelem.name;
                const value = formelem.value;

                fd.append( name, value );
                }    
            })

 

            console.log(fd);

            fetch( '{{ route('admin.post.products.edit') }}', {
                method: 'POST',
                headers: {     
                    'X-CSRF-TOKEN': '{{ @csrf_token() }}'
                },
                body: fd
            } ).then( result=>result.json() ).then(result=>{

                document.querySelectorAll('.error').forEach(function(item){
                    item.innerText=''
                })

                if( typeof result.success === 'undefined' ) {
                

                for( let error in  result ){
           
                    try{
                    document.querySelector('.error.'+error).innerText=result[error][0]
                }catch(e){}
                }

            } else {
                document.getElementById('successmessage').classList.remove('d-none');
            }
            });

            return false;
        }
    </script>

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
