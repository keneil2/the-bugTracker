@props(["name"])
<style>
    textarea{
        width:300px;
        height:100px;
    }
    .label{
        margin-top: 10px;
        margin-bottom: 10px;
    }
</style>
<div>
    <div class="label"><label for="{{$name}}">{{$name}}</label></div>
    <textarea name="{{$name}}">

    </textarea>
</div>