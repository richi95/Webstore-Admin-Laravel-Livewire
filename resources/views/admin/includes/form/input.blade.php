
{{-- // $value = '';
// foreach( \App\Models\Setting::all()->toarray() as $key => $val){
//     if( $val["key"] == $id )
//         $value= $val["value"];
// }
// @endphp --}}

<div class="form-group row px-5">

    <div class="col-md-6">
    <label for="{{$id}}" class="col">{{$label}}</label>
    </div>

    <div class="col-md-6">
    <input type="{{$type}}" class="form-control col @error($id) is-invalid @enderror" value="{{ old($value, $value) }}" {{$params}} id="{{$id}}" name="{{$id}}" placeholder="{{$placeholder}}">
    @error($id)
        <div class="invalid-feedback">{{$message}}</div>
    @enderror
    <span class="error {{$id}} text-danger"></span>
    </div>

</div>