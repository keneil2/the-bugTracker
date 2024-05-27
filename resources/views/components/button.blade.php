@props(["name"])
<style>
    button{
        background-color: #06A77D;
        font-size: 1.3rem;
        color:white;
        font-weight: 500;
        padding:5px 20px;
        border-radius: 10px;
        margin-top:20px;
        border:1px solid;
    }
    button:hover{
        background-color: green;
    }
</style>
<div>
    <button type="submit">{{$name}}</button>
</div>