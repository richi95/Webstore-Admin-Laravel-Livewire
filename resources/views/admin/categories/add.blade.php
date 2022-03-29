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
                            <li class="breadcrumb-item active">{{ __('Beállítások') }}</li>
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


                                    @include('admin.includes.form.select', [
                                        'id' => 'parent_id',
                                        'label' => 'Szülőkategória',
                                        'value' => '',
                                        'classes' => ' w-50',
                                        'options' => [
                                            '1' => 'teszt 1',
                                            '2' => 'teszt 2',
                                        ],
                                    ])

                                    @include('admin.includes.form.input', [
                                        'id' => 'name',
                                        'label' => 'Név',
                                        'placeholder' => 'Név',
                                        'type' => 'text',
                                        'value' => '',
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
