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
                    <input type="text" class="form-control col @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name', isset($user->name) ? $user->name : '') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3">
                    <label for="email" class="col mt-2">Email<span class="text-danger">*</span></label>
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
                    <label for="phone_number" class="col mt-2">Telefonszám<span
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
            {{-- <div class="form-group row">
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
            </div> --}}

            <div class="form-group row">
                <div class="col-md-3">
                    <label for="status" class="col mt-2">Státusz<span class="text-danger">*</span></label>
                </div>

                <div class="col-md-5">
                    <select id="status" name="status" class="form-control col @error('status') is-invalid @enderror"
                        value="status">
                        <option></option>
                        <option {{ isset($user) &&  $user->status == 'active' ? 'selected' : '' }} {{old('status') == 'active' ? 'selected' : ''}}  value="active">Aktív
                        </option>
                        <option {{ isset($user) && $user->status == 'inactive' ? 'selected' : '' }} {{old('status') == 'inactive' ? 'selected' : ''}} value="inactive">
                            Inaktív</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            @if (isset($user))
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="old_password" class="col mt-2">Régi jelszó<span
                                class="text-danger">*</span></label>
                    </div>

                    <div class="col-md-5">
                        <input type="password" class="form-control col @error('old_password') is-invalid @enderror"
                            id="old_password" name="old_password">
                        @error('old_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="new_password" class="col mt-2"> Új Jelszó<span
                                class="text-danger">*</span></label>
                    </div>

                    <div class="col-md-5">
                        <input type="password" class="form-control col @error('new_password') is-invalid @enderror"
                            id="new_password" name="new_password">
                        @error('new_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="password_confirmation" class="col mt-2"> Új Jelszó újra<span
                                class="text-danger">*</span></label>
                    </div>

                    <div class="col-md-5">
                        <input type="password"
                            class="form-control col @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation" name="password_confirmation">
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @else
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
                        <input type="password"
                            class="form-control col @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation" name="password_confirmation">
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @endif

            <div class="form-group row">
                <div class="col-md-3"></div>
                <div class="col-md-5">
                    <button type="submit" class="btn btn-primary">Mentés</button>
                </div>
            </div>
        </div>
    </form>
</div>
