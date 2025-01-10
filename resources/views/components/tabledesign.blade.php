@props(["tableName","titles"])
<style>
    th {
  background-color: #04AA6D;
  color: white;
  padding:5px 20px;
}

table{
    width:1000px;
}
td{
    padding:10px;
}
tr{
    text-align: center;
    

}

</style>
<div>
<h1>{{$tableName}}</h1>
    <table class="w-full">
        @foreach ($titles as $key=>$title )
            <th class="h-5 bg-green-500">{{$title}}</th>
        @endforeach
        <tr>{{$slot}}</tr>
    </table>
</div>
