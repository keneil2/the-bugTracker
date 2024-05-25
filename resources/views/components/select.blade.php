@props(["name", "type" => "text", "message" => "", "value" => '', "category"])

<select name="{{$name}}">
    @foreach ($datas as $data)
        <label for="{{$name}}">{{ucwords($name)}}</label>
        <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
</select>