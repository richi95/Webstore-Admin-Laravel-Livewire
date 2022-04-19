@extends('layouts.admin')
@section('content')
    <div class="content-wrapper bg-light">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mt-5">
                    <div class="col-md-3">
                        <ul class="list-group">
                            <li class="list-group-item">Cras justo odio</li>
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item">Morbi leo risus</li>
                            <li class="list-group-item">Porta ac consectetur ac</li>
                            <li class="list-group-item">Vestibulum at eros</li>
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <div class="card card-primary">
                            <form action="">
                                <div class="card-header" style="border-bottom: 1px solid #fff">
                                    <h3>Fiók</h3>
                                </div>
                                <div class="card-body w-55">

                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="name" class="col mt-2">Név <span
                                                    class="text-danger">*</span></label>
                                        </div>

                                        <div class="col-md-5">
                                            <input type="text" class="form-control col @error('$id') is-invalid @enderror"
                                                value="" id="name" name="name">
                                            @error('$id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="email" class="col mt-2">Email<span
                                                    class="text-danger">*</span></label>
                                        </div>

                                        <div class="col-md-5">
                                            <input type="email" class="form-control col @error('$id') is-invalid @enderror"
                                                value="" id="email" name="email">
                                            @error('$id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="phone" class="col mt-2">Telefonszám<span
                                                    class="text-danger">*</span></label>
                                        </div>

                                        <div class="col-md-5">
                                            <input type="text" class="form-control col @error('$id') is-invalid @enderror"
                                                value="" id="phone" name="phone">
                                            @error('$id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="rights[]" class="col mt-2">Jogok<span
                                                    class="text-danger">*</span></label>
                                        </div>

                                        <div class="col-md-5">
                                            <input type="text"
                                                class="form-control col @error('rights') is-invalid @enderror" value=""
                                                id="rights" name="rights">
                                            @error('rights')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="discount_level" class="col mt-2">Kedvezmény szint<span
                                                    class="text-danger">*</span></label>
                                        </div>

                                        <div class="col-md-5">
                                            <select id="discount_level" name="discount_level"
                                                class="form-control col @error('discount_level') is-invalid @enderror"
                                                value="">

                                                <option value=""> {{ __('0. szint / nem aktivált') }} </option>
                                                <option value="">1.szint</option>
                                                <option value="">2.szint</option>
                                                <option value="">3.szint</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="password" class="col mt-2">Jelszó<span
                                                    class="text-danger">*</span></label>
                                        </div>

                                        <div class="col-md-5">
                                            <input type="password"
                                                class="form-control col @error('password') is-invalid @enderror" value=""
                                                id="password" name="password">
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="password_confirmation" class="col mt-2">Jelszó újra<span
                                                    class="text-danger">*</span></label>
                                        </div>

                                        <div class="col-md-5">
                                            <input type="text"
                                                class="form-control col @error('password_confirmation') is-invalid @enderror"
                                                value="" id="password_confirmation" name="password_confirmation">
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-5">
                                            <button type="submit" class="btn btn-primary">Mentés</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        
    </script>
@endsection
