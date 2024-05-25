@props(["name","type"=>"text","message"=>"","value"=>""])
<div>
   <div><label for="{{$name}}">{{$name}}</label></div> 
<input type="{{$type}}"  name="{{$name}}" placeholder="{{$message}}" value="{{$value}}">
</div>
<div>
    @error("name")
         {{$message}}
    @enderror
</div>