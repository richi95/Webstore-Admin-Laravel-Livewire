<div class="card card-primary">
    <form action="{{ route('admin.post.billing.add') }}" method="POST">
        @csrf

        {{Session::get('current_user_id')}}
        <div class="card-header" style="border-bottom: 1px solid #fff">
            <h3>Számlázási adatok</h3>
        </div>
        <div class="card-body w-55">

            <div class="form-group row">
                <div class="col-md-3">
                    <label for="billing_name" class="col mt-2">Név / Cégnév <span class="text-danger">*</span></label>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control col @error('billing_name') is-invalid @enderror" id="billing_name" name="billing_name"
                        value="{{ old('billing_name', isset($user->nameOrFirm) ? $user->nameOrFirm : '') }}" autocomplete="off">
                    @error('billing_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="billin_zip" class="col mt-2">Irányítószám<span class="text-danger">*</span></label>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control col @error('billin_zip') is-invalid @enderror" id="billin_zip"
                        name="billin_zip" value="{{ old('billin_zip', isset($user->billin_zip) ? $user->billin_zip : '') }}">
                    @error('billin_zip')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3">
                    <label for="billing_city" class="col mt-2">Település<span
                            class="text-danger">*</span></label>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control col @error('billing_city') is-invalid @enderror"
                        id="billing_city" name="billing_city"
                        value="{{ old('billing_city', isset($user->billing_city) ? $user->billing_city : '') }}">
                    @error('billing_city')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="billing_address" class="col mt-2">Utca, házszám<span
                            class="text-danger">*</span></label>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control col @error('billing_address') is-invalid @enderror"
                        id="billing_address" name="billing_address"
                        value="{{ old('billing_address', isset($user->billing_address) ? $user->billing_address : '') }}">
                    @error('billing_address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3">
                    <label for="billing_address2" class="col mt-2">Épület, emelet, ajtó, egyéb (opcionális)</label>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control col @error('billing_address2') is-invalid @enderror"
                        id="billing_address2" name="billing_address2"
                        value="{{ old('billing_address2', isset($user->billing_address2) ? $user->billing_address2 : '') }}">
                    @error('billing_address2')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="billing_tax_nr" class="col mt-2">Adószám (Csak cégek esetében)</label>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control col @error('billing_tax_nr') is-invalid @enderror"
                        id="billing_tax_nr" name="billing_tax_nr"
                        value="{{ old('billing_tax_nr', isset($user->billing_tax_nr) ? $user->billing_tax_nr : '') }}">
                    @error('billing_tax_nr')
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
