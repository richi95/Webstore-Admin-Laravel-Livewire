 

<div class="form-group row px-5">

    <div class="col-md-6">
    
    </div>
    
    <div class="col-md-6">
        <input type="checkbox" class=" @error($id) is-invalid @enderror" value="1" {{$params}} id="{{$id}}" name="{{$id}}" {{ old($id, $item->$id) ? "checked" : "" }}>
        <label class="form-check-label" for="{{$id}}">{{ $label }}</label>

    @error($id)
        <div class="invalid-feedback">{{$message}}</div>
    @enderror
    </div>

</div>