<div class="card card-primary">
    <form action="{{ route('admin.post.members.add') }}" method="POST">
        @csrf
        <div class="card-header" style="border-bottom: 1px solid #fff">
            <h3>Számlázási adatok</h3>
        </div>
        <div class="card-body w-55">

            <div class="form-group row">
                <div class="col-md-3">
                    <label for="nameOrFirm" class="col mt-2">Név / Cégnév <span class="text-danger">*</span></label>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control col @error('nameOrFirm') is-invalid @enderror" id="nameOrFirm" name="nameOrFirm"
                        value="{{ old('nameOrFirm', isset($user->nameOrFirm) ? $user->nameOrFirm : '') }}">
                    @error('nameOrFirm')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3">
                    <label for="email" class="col mt-2">Irányítószám<span class="text-danger">*</span></label>
                </div>
                <div class="col-md-5">
                    <input type="email" class="form-control col @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email', isset($user->email) ? $user->email : '') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3">
                    <label for="phone_number" class="col mt-2">Település<span
                            class="text-danger">*</span></label>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control col @error('phone_number') is-invalid @enderror"
                        id="phone_number" name="phone_number"
                        value="{{ old('phone_number', isset($user->phone_number) ? $user->phone_number : '') }}">
                    @error('phone_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3">
                    <label for="phone_number" class="col mt-2">Utca, házszám<span
                            class="text-danger">*</span></label>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control col @error('phone_number') is-invalid @enderror"
                        id="phone_number" name="phone_number"
                        value="{{ old('phone_number', isset($user->phone_number) ? $user->phone_number : '') }}">
                    @error('phone_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3">
                    <label for="phone_number" class="col mt-2">Épület, emelet, ajtó, egyéb (opcionális)</label>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control col @error('phone_number') is-invalid @enderror"
                        id="phone_number" name="phone_number"
                        value="{{ old('phone_number', isset($user->phone_number) ? $user->phone_number : '') }}">
                    @error('phone_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3">
                    <label for="phone_number" class="col mt-2">Adószám (Csak cégek esetében)</label>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control col @error('phone_number') is-invalid @enderror"
                        id="phone_number" name="phone_number"
                        value="{{ old('phone_number', isset($user->phone_number) ? $user->phone_number : '') }}">
                    @error('phone_number')
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
