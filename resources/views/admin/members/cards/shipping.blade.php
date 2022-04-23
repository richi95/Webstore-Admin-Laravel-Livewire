<div class="card card-primary">
    <form action="{{ route('admin.post.shipping.add') }}" method="POST">
        @csrf

        {{-- {{Session::get('current_user_id')}} --}}
        <div class="card-header" style="border-bottom: 1px solid #fff">
            <h3>Szállítási adatok</h3>
        </div>
        <div class="card-body w-55">

            <div class="form-group row">
                <div class="col-md-3">
                    <label for="shipping_name" class="col mt-2">Név / Cégnév <span class="text-danger">*</span></label>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control col @error('shipping_name') is-invalid @enderror" id="shipping_name" name="shipping_name"
                        value="{{ old('shipping_name', isset($user->shipping_name) ? $user->shipping_name : '') }}">
                    @error('shipping_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="shipping_zip" class="col mt-2">Irányítószám<span class="text-danger">*</span></label>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control col @error('shipping_zip') is-invalid @enderror" id="shipping_zip"
                        name="shipping_zip" value="{{ old('shipping_zip', isset($user->shipping_zip) ? $user->shipping_zip : '') }}">
                    @error('shipping_zip')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3">
                    <label for="shipping_city" class="col mt-2">Település<span
                            class="text-danger">*</span></label>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control col @error('shipping_city') is-invalid @enderror"
                        id="shipping_city" name="shipping_city"
                        value="{{ old('shipping_city', isset($user->shipping_city) ? $user->shipping_city : '') }}">
                    @error('shipping_city')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="shipping_address" class="col mt-2">Utca, házszám<span
                            class="text-danger">*</span></label>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control col @error('shipping_address') is-invalid @enderror"
                        id="shipping_address" name="shipping_address"
                        value="{{ old('shipping_address', isset($user->shipping_address) ? $user->shipping_address : '') }}">
                    @error('shipping_address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3">
                    <label for="shipping_address2" class="col mt-2">Épület, emelet, ajtó, egyéb (opcionális)</label>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control col @error('shipping_address2') is-invalid @enderror"
                        id="shipping_address2" name="shipping_address2"
                        value="{{ old('shipping_address2', isset($user->shipping_address2) ? $user->shipping_address2 : '') }}">
                    @error('shipping_address2')
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
