@extends('layout.layout');

@section('main')
<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
    <h1>
        Chuyên ngành
    </h1>

    <a href="{{ route('major.create') }}"><button class="btn btn-default">Thêm chuyên ngành</button></a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Chuyên ngành</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listMajor as $major)
            <tr>
                <td>{{ $major->idMajor }}</td>
                <td>{{ $major->nameMajor }}</td>
                <td>Sửa</td>
                <td>Ẩn</td>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    </div>
</div>
</div>
@endsection