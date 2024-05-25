@props(["name","type"=>"text","message"=>"","value"])
<div>
<input type="{{$type}}"  name="{{$name}}" placeholder="{{$message}}" value="{{$value}}">
</div>
<div>
    @error("name")
         {{$message}}
    @enderror
</div>