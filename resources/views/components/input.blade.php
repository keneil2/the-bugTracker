<style>
    input{
        width:300px;
        height:40px;
        outline-color:lightblue;
    }
    label{
        font-size: 1.2rem;
        font-family: 'Times New Roman', Times, serif;
        font-weight: 500;
        text-transform: capitalize;
    }
    .label{
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .input_container{
        position: relative;
        /* border: 1px solid; */
    }
    .error{
        color:red;
        font-size:13px;
        margin-bottom: 10px;
        position:absolute;   
       }
</style>
@props(["name","type"=>"text","message"=>"","value"=>""])
@php
       $labelName=preg_replace("/[_-]/"," ",$name); 
    @endphp
<div class="input_container"> 
   <div class="label"><label for="{{$labelName}}">{{$labelName}}</label></div> 
<input class="input" type="{{$type}}"  name="{{$name}}" placeholder="{{$message}}" value="{{old($name).$value}}">
</div>
    @error("$name")
    <div class="error"> {{$message}}</div>
        
    @enderror
