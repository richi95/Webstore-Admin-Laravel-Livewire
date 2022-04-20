@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">

                @include('admin.includes.message')

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
                            <form action="{{ route('admin.post.settings.store') }}" method="post">
                                @method('POST')
                                @csrf

                                <div class="card-body">
                                    @include('admin.includes.form.input', [
                                        'id' => 'contact_name',
                                        'label' => 'Cégnév',
                                        'placeholder' => 'Cégnév',
                                        'type' => 'text',
                                        'value' => '',
                                        'params' => null,
                                    ])

                                    @include('admin.includes.form.input', [
                                        'id' => 'contact_address',
                                        'label' => 'Cím',
                                        'placeholder' => 'Cím',
                                        'type' => 'text',
                                        'value' => '',
                                        'params' => null,
                                    ])

                                  
                                    @include('admin.includes.form.select', [
                                      'id' => 'contact_map',
                                      'label' => 'Cím megjelenjen -e kapcsolat oldali Google map-en',
                                      'value' => '',
                                      'classes' => ' w-50',
                                      'options' => [
                                          'yes' => 'Igen',
                                          'no' => 'Nem',
                                      ],
                                  ])
                                    {{--  --}}

                                    @include('admin.includes.form.input', [
                                        'id' => 'contact_phone',
                                        'label' => 'Telefonszám',
                                        'placeholder' => 'Telefonszám',
                                        'type' => 'text',
                                        'value' => '',
                                        'params' => null,
                                    ])
                                    {{--  --}}

                                    @include('admin.includes.form.input', [
                                        'id' => 'contact_mobil',
                                        'label' => 'Mobil telefonszám',
                                        'placeholder' => 'Mobil',
                                        'type' => 'text',
                                        'value' => '',
                                        'params' => null,
                                    ])

                                    @include('admin.includes.form.input', [
                                        'id' => 'contact_fax',
                                        'label' => 'Fax',
                                        'placeholder' => 'Fax',
                                        'type' => 'text',
                                        'value' => '',
                                        'params' => null,
                                    ])

                                    @include('admin.includes.form.input', [
                                        'id' => 'contact_email',
                                        'label' => 'E-mail',
                                        'placeholder' => 'E-mail',
                                        'type' => 'email',
                                        'value' => '',
                                        'params' => null,
                                    ])

                                    @include('admin.includes.form.input', [
                                        'id' => 'contact_website',
                                        'label' => 'Website',
                                        'placeholder' => 'Website',
                                        'type' => 'url',
                                        'value' => '',
                                        'params' => null,
                                    ])


                                    @include('admin.includes.form.select', [
                                        'id' => 'contact_messageform',
                                        'label' => 'Üzenetküldő ürlap (látszik / nem látszik)',
                                        'value' => '',
                                        'classes' => ' w-50',
                                        'options' => [
                                            'yes' => 'Igen',
                                            'no' => 'Nem',
                                        ],
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
