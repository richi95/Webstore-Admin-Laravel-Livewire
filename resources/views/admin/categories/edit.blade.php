@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">

                @include('admin.includes.message')

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('Kategóriák') }}</h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Kategóriák') }}</li>
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
                            <form action="{{ route('admin.post.categories.edit', [
                                'category'=>$item->id
                            ]) }}" method="post" enctype="multipart/form-data">
                                @method('POST')
                                @csrf

                                <div class="card-body">


                                    @include('admin.includes.form.select', [
                                        'id' => 'parent_id',
                                        'label' => 'Szülőkategória',
                                        'value' => '',
                                        'classes' => ' w-50',
                                        'options' => $categories,
                                    ])

                                    @include('admin.includes.form.input', [
                                        'id' => 'name',
                                        'label' => 'Név',
                                        'placeholder' => 'Név',
                                        'type' => 'text',
                                        'value' => '',
                                        'params' => null,
                                    ])

                                    <div class="form-group row px-5">

                                        <div class="col-md-6">
                                            <label  class="col">Jelenlegi kép</label>
                                        </div>

                                        <div class="col-md-6">
                                            <img src="{{ url($item->file ? '/storage/'.$item->file : 'adminfiles/dist/img/noimg.png')}}" alt="" width="50%">
                                        </div>
                                    </div>

                                    @include('admin.includes.form.checkbox', [
                                        'id' => 'delete_img',
                                        'label' => 'Kép törlése',
                                        'params' => null,
                                    ])



                                    @include('admin.includes.form.input', [
                                        'id' => 'file',
                                        'label' => 'Kép feltöltés',
                                        'placeholder' => '',
                                        'type' => 'file',
                                        'value' => '',
                                        'params' => null,
                                    ])

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
