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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('Válassza ki a szerkesztendő kategóriát') }}</h3>

                                <div class="card-tools">
                                    {{-- <ul class="pagination pagination-sm float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                              </ul> --}}
                                    {{ $categories->links('vendor.pagination.bootstrap-4') }}
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
                                            <th style="width: 80px;">Művelet</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $cat)
                                            <tr>
                                                <td>{{ $cat->id }}</td>
                                                <td><img src="{{ url($cat->file ? '/storage/' . $cat->file : 'adminfiles/dist/img/noimg.png') }}"
                                                        alt="" height="50"></td>
                                                <td>{{ $cat->name }} </td>
                                                <form action="{{ route('admin.post.categories.delete', $cat->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <td class="d-flex flex-nowrap" style="gap: 1rem">
                                                        <a class="btn btn-primary"
                                                            href="{{ route('admin.categories.edit', [
                                                                'category' => $cat->id,
                                                            ]) }}">Szerkesztés</a>
                                                        <button type="submit" class="btn btn-danger">X</button>
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
