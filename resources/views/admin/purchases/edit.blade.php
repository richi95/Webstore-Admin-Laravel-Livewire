@extends('layouts.admin')
@section('content')
    <div class="content-wrapper px-5">
        <section class="content-header mx-5">
            <div class="container-fluid">

                @include('admin.includes.message')

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('Vásárlások') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('admin.dashboard') }}">{{ __('Vezérlőpult') }}</a></li>
                            <li class="breadcrumb-item"><a
                                href="{{ route('admin.purchases') }}">{{ __('Vásárlások') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Vásárlások szerkesztése') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content mx-5">
            <div class="card card-primary">
                <form action="{{route('admin.post.purchases.update')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{isset($purchase) ? $purchase->id : ''}}">
                    <div class="card-header" style="border-bottom: 1px solid #fff">
                        <h3>Vásárlások szerkesztése</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row justify-content-center">
                            <div class="col-md-3">
                                <label for="customer_name" class="col mt-2">Vásárló neve</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="customer_name" value="{{isset($purchase) ? $purchase->customer_name : ''}}">
                            </div>
                        </div>


                        <div class="form-group row justify-content-center">
                            <div class="col-md-3">
                                <label for="status" class="col mt-2">Megrendelés aktiválása<span
                                        class="text-danger">*</span></label>
                            </div>

                            <div class="col-md-5">
                                <select id="status" name="status"
                                    class="form-control col @error('status') is-invalid @enderror" value="status">
                                    <option></option>
                                    <option {{ isset($purchase) && $purchase->status == 'active' ? 'selected' : '' }}
                                        {{ old('status') == 'active' ? 'selected' : '' }} value="active">Aktív
                                    </option>
                                    <option {{ isset($purchase) && $purchase->status == 'inactive' ? 'selected' : '' }}
                                        {{ old('status') == 'inactive' ? 'selected' : '' }} value="inactive">
                                        Inaktív</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-3">
                                <label for="status" class="col mt-2">E-számla feltöltése<span
                                        class="text-danger">*</span></label>
                            </div>
                            {{-- name="bill" --}}
                            <div class="col-md-5">
                                <input type="file" label="Fájl kiválasztása" id="file" >
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-3"></div>
                            <div class="col-md-5">
                                <button type="submit" class="btn btn-primary">Mentés</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
