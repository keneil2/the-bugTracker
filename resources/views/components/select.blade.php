@props(["name", "type" => "text", "message" => "", "value" => '', "category"])
<div>
<select name="{{$name}}">
    @foreach ($category as $data)
        <label for="{{$name}}">{{ucwords($name)}}</label>
        <option value="{{$data->id}}">{{$data->name}}</option>
    @endforeach
</select>
</div>