<div class="card card-primary">
    <form action="{{ route('admin.post.members.add') }}" method="POST">
        @csrf
        <div class="card-header" style="border-bottom: 1px solid #fff">
            <h3>Fiók</h3>
        </div>
        <div class="card-body w-55">

            <div class="form-group row">
                <div class="col-md-3">
                    <label for="name" class="col mt-2">Név <span class="text-danger">*</span></label>
                </div>

                <div class="col-md-5">
                    <input type="text" class="form-control col @error('$id') is-invalid @enderror" id="name" name="name">
                    @error('$id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="email" class="col mt-2">Email<span class="text-danger">*</span></label>
                </div>

                <div class="col-md-5">
                    <input type="email" class="form-control col @error('$id') is-invalid @enderror" id="email"
                        name="email">
                    @error('$id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="phone" class="col mt-2">Telefonszám<span class="text-danger">*</span></label>
                </div>

                <div class="col-md-5">
                    <input type="text" class="form-control col @error('$id') is-invalid @enderror" id="phone"
                        name="phone">
                    @error('$id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="rights[]" class="col mt-2">Jogok<span class="text-danger">*</span></label>
                </div>

                <div class="col-md-5">
                    <input type="text" class="form-control col @error('rights') is-invalid @enderror" id="rights"
                        name="rights">
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
                        class="form-control col @error('discount_level') is-invalid @enderror" value="">

                        <option value=""> {{ __('0. szint / nem aktivált') }} </option>
                        <option value="">1.szint</option>
                        <option value="">2.szint</option>
                        <option value="">3.szint</option>

                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3">
                    <label for="password" class="col mt-2">Jelszó<span class="text-danger">*</span></label>
                </div>

                <div class="col-md-5">
                    <input type="password" class="form-control col @error('password') is-invalid @enderror"
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
                    <input type="password" class="form-control col @error('password_confirmation') is-invalid @enderror"
                        id="password_confirmation" name="password_confirmation">
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
