@props(["name", "category"])
<style>
.select_container select{
 /* padding:5px 50px; */
 width :200px;
 height:30px;
}
option{
font-size: 1.3rem;
}
</style>
<div class="select_container">
   <div> <label for="">{{$name}}</label></div>
<select name="{{$name}}">
<option value="">select {{$name}}:</option>
    @foreach ($category as $data)
        <label for="{{$name}}">{{ucwords($name)}}</label>
        <option value="{{$data->id}}">{{$data->name}}</option>
    @endforeach
</select>
</div>