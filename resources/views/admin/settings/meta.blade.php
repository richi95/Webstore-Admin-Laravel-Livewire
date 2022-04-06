@extends('layouts.admin')
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">

        @include("admin.includes.message");

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __($title) }}</h1>
        
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
              <form action="{{route('admin.post.settings.store')}}" method="post">
                @method('POST')
                @csrf
                <div class="card-body">
                  @include('admin.includes.form.input',[
                      'id'=>'default_title',
                      'label'=>'Alapértelmezett title',
                      'placeholder'=>'Title',
                      'type'=>'text',
                      'value'=>'',
                      'params'=>null
                  ])
                  
                  @include('admin.includes.form.input',[
                    'id'=>'default_description',
                    'label'=>'Alapértelmezett description',
                    'placeholder'=>'Description',
                    'type'=>'text',
                    'value'=>'',
                    'params'=>null
                ])

                @include('admin.includes.form.input',[
                    'id'=>'default_keywords',
                    'label'=>'Alapértelmezett keywords',
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