<div class="form-group row px-5">

    <div class="col-md-6">

    </div>
    <div class="col-md-6">
        <input type="checkbox" class=" @error($id) is-invalid @enderror"
            id="{{ $id }}" value="1" name="{{ $name }}" {{ $params == '1' ? 'checked' : '' }}>
        <label class="form-check-label" for="{{ $id }}">{{ $label }}</label>
        <span class="error {{$id}} text-danger"></span>
        @error($id)
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

</div>
