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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('Válassza ki a szerkesztendő terméket') }}</h3>

                                <div class="card-tools">
                                    {{-- <ul class="pagination pagination-sm float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                              </ul> --}}
                                    {{-- $categories->links('vendor.pagination.bootstrap-4') --}}
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th style="width: 40px;">Id</th>
                                            <th style="width: 40px;">Kép</th>
                                            <th>Név</th>
                                            <th>Kategória</th>
                                            <th>Akciós</th>
                                            <th>Ár</th>
                                            <th style="width: 80px;">Művelet</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $pr)
                                            <tr>
                                                <td>{{ $pr->id }}</td>
                                                <td><img 
                                                        alt="" height="50"></td>
                                                <td>{{ $pr->name }} </td>
                                                <td> {{ getcategoryById( $pr->category_id )->name }} </td>
                                                <td> <i class="fa fa-check text-success"></i> </td>
                                                <td> {{ $pr->price }} </td>
                                                <form action="{{ route('admin.products.delete', $pr->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <td class="d-flex flex-nowrap" style="gap: 1rem">
                                                        <a class="btn btn-primary"
                                                            href="{{ route('admin.products.edit', [
                                                                'product' => $pr,
                                                            ]) }}">Szerkesztés</a>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </td>
                                                </form>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <!-- /.card -->
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
