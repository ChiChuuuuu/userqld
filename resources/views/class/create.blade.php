@extends('layout.layout');

@section('main')
<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
    <h1>
        Them Lop
    </h1>
    <form method="post" action>
        Ten lop <input type="text"/> <br><br>
        Chuyen nganh
        <select>
            <option value=""></option>
        </select>
        <br><br>
        <button class="btn btn-default" >Them</button>
    </form>   
    </div></div>
</div>
@endsection