@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">

                @include('admin.includes.message')

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2>{{ __('Vásárlások') }}</h2>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('admin.dashboard') }}">{{ __('Vezérlőpult') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Vásárlások') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @csrf
                            <div class="card-header">
                                <div class="col-4 d-inline-flex">
                                    <label class="d-flex" style="gap:20px; align-items:center;" for="pag_purchases">
                                        Mutat
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{ route('admin.purchases.10') }}">10</a>
                                                <a class="dropdown-item" href="{{ route('admin.purchases.20') }}">20</a>
                                                <a class="dropdown-item" href="{{ route('admin.purchases.50') }}">50</a>
                                                <a class="dropdown-item" href="{{ route('admin.purchases.100') }}">100</a>
                                                <a class="dropdown-item" href="{{ route('admin.purchases.200') }}">200</a>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="card-tools">
                                    <form action="{{route('admin.purchases.search')}}" type="get">
                                        <div class="input-group input-group-sm" style="width: 200px;">
                                            <input type="search" name="query" class="form-control float-right"
                                                placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Megrendelő neve</th>
                                            <th>Megrendelő email címe</th>
                                            <th>Fizetési mód</th>
                                            <th>Szállítási mód</th>
                                            <th>Státusz</th>
                                            <th>Összesen</th>
                                            <th>Létrehozva</th>
                                            <th>asdf</th>
                                        </tr>
                                    </thead>
                                    <tbody class="custom-tbody">
                                        @foreach ($purchases as $purchase)
                                            <tr>
                                                <td>{{ $purchase->id }}</td>
                                                <td>{{ $purchase->customer_name }}</td>
                                                <td>{{ $purchase->customer_email }}</td>
                                                <td>{{ $purchase->payment_method }}</td>
                                                <td>{{ $purchase->shipping_method }}</td>
                                                <td><span class="dot-{{ $purchase->status }}"></span></td>
                                                <td>{{ $purchase->amount }}</td>
                                                <td>{{ $purchase->created_at }}</td>
                                                <td id="custom-action"><a class="btn btn-success" href="{{route('admin.purchases.edit', ['purchase'=>$purchase])}}">Módosít</a>
                                                    <a class="btn btn-danger" href="{{route('admin.purchases.delete', ['purchase' => $purchase])}}">Törlés</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="float-right">
                                    {{ $purchases->links('vendor.pagination.bootstrap-4') }}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            @endsection
        </div>
    </section>
</div>
