<div class="form-group row px-5">
    <label for="{{$id}}" class="col">{{$label}}</label>
    <input type="{{$type}}" class="form-control col @error($id) is-invalid @enderror" value="{{ $value }}" {{$params}} id="{{$id}}" name="{{$id}}" placeholder="{{$placeholder}}">
    @error($id)
        <div class="invalid-feedback">{{$message}}</div>
    @enderror
  </div>