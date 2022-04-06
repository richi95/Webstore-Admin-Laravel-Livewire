@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">

                @include('admin.includes.message')

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
                            <form action="{{ route('admin.post.categories.store') }}" method="post" enctype="multipart/form-data">
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

                                    @include('admin.includes.form.input', [
                                        'id' => 'name',
                                        'label' => 'Terméknév',
                                        'placeholder' => 'Terméknév',
                                        'type' => 'text',
                                        'value' => '',
                                        'params' => null,
                                    ])
                                    {{---------------CHECKBOX----------------------}}
                                    @include('admin.includes.form.checkbox', [
                                        'id' => 'check-1',
                                        'name' => 'main_page_highlight',
                                        'label' => 'Főoldali kiemelés',
                                        'params' => null,
                                    ])                                   
                                    @include('admin.includes.form.checkbox', [
                                        'id' => 'check-2',
                                        'name' => 'category_highlight',
                                        'label' => 'Kategóriai kiemelés',
                                        'params' => null,
                                    ])                                   
                                    @include('admin.includes.form.checkbox', [
                                        'id' => 'check-3',
                                        'name' => 'discount',
                                        'label' => 'Akciós',
                                        'params' => null,
                                    ])                                   
                                    @include('admin.includes.form.checkbox', [
                                        'id' => 'check-4',
                                        'name' => 'user_reviews',
                                        'label' => 'Felhasználói véleményezés',
                                        'params' => null,
                                    ])
                                    {{--(ezt a rendszer vásárláskor aktualizálja)--}}                                   
                                    @include('admin.includes.form.checkbox', [
                                        'id' => 'check-5',
                                        'name' => 'adjustable_quantity',
                                        'label' => 'Beállítható mennyiség',
                                        'params' => null,
                                    ])                                   
                                    @include('admin.includes.form.checkbox', [
                                        'id' => 'check-6',
                                        'name' => 'nocount',
                                        'label' => 'Nem használja a termékmennyiségek nyilvántartását',
                                        'params' => null,
                                    ])                                   
                                    {{---------------/CHECKBOX----------------------}}
                                    {{--KépVálasztó gomb--}}

                                    <div class="form-group row px-5">

                                        <div class="col-md-6">
                                            <label class="col">Válasszon képeket</label>
                                        </div>
                                    
                                        <div class="col-md-6">
                                        <a href="{{route('admin.products.add.gallery')}}" class="btn btn-primary">Kiválaszt</a>
                                        {{-- @error($id)
                                            <div class="invalid-feedback">{{$message}}</div>
                                        @enderror --}}
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
                                  
                                  @include('admin.includes.form.input',[
                                    'id'=>'seo_title',
                                    'label'=>'SEO title',
                                    'placeholder'=>'Title',
                                    'type'=>'text',
                                    'value'=>'',
                                    'params'=>null
                                ])
                                
                                @include('admin.includes.form.input',[
                                  'id'=>'seo_description',
                                  'label'=>'SEO description',
                                  'placeholder'=>'Description',
                                  'type'=>'text',
                                  'value'=>'',
                                  'params'=>null
                              ])
              
                              @include('admin.includes.form.input',[
                                  'id'=>'seo_keywords',
                                  'label'=>'SEO keywords',
                                  'placeholder'=>'Keywords',
                                  'type'=>'text',
                                  'value'=>'',
                                  'params'=>null
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
@endsection
