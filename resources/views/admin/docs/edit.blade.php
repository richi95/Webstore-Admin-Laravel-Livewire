@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">

                @include('admin.includes.message')

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('Dokumentumok') }}</h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Dokumentumok') }}</li>
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
                            <form action="{{ route('admin.docs.edit', [
                                'docs'=>$item->id
                            ]) }}" method="post" enctype="multipart/form-data">
                                @method('POST')
                                @csrf

                                <div class="card-body">
 

                                    @include('admin.includes.form.input', [
                                        'id' => 'title',
                                        'label' => 'Title',
                                        'placeholder' => 'Dokumentum leírása',
                                        'type' => 'text',
                                        'value' => '',
                                        'params' => null,
                                    ])

                                    <div class="form-group row px-5">

                                        <div class="col-md-6">
                                            <label  class="col">Jelenlegi dokumentum</label>
                                        </div>

                                        <div class="col-md-6">
                                            <a href="{{ url('/storage/'.$item->file) }}" alt="" height="100"><i class="fas fa-eye"></i></a>
                                        </div>
                                    </div>

                                    @include('admin.includes.form.input', [
                                        'id' => 'file',
                                        'label' => 'Új dokumentum feltöltése',
                                        'placeholder' => '',
                                        'type' => 'file',
                                        'value' => '',
                                        'params' => null,
                                    ])
 
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Mentés</button>
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
