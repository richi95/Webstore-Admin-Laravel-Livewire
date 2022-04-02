<div class="form-group row px-5">

    <div class="col-md-6">
        <label for="{{ $id }}" class="col">{{ $label }}</label>
    </div>

    <div class="col-md-6">
        <select id="{{ $id }}" name="{{ $id }}"
            class="form-control col @error($id) is-invalid @enderror {{ $classes }}"  value="{{ $value }}">

            <option value=""> {{ __('Válassz') }} </option>
            @foreach ($options as $key => $val)
                <option value="{{ $key }}" {{ old($id, @$item->$id ) == $key ? 'selected' : '' }}>{{ $val }}
                </option>
            @endforeach

        </select>
        @error($id)
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
