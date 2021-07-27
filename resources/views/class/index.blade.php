@extends('layout.layout');

@section('main')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h1>
                    Lớp
                </h1>

                <a href="{{ route('class.create') }}"><button class="btn btn-default">Thêm lớp</button></a>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Lớp</th>
                            <th>Chuyên ngành</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listClass as $class)
                            <tr>
                                <td><?= $class->idClass ?></td>
                                    <td><?= $class->nameClass ?></td>
                                    <td><?= $class->nameMajor ?></td>
                                    <td> <a href="{{ route('class.show' , $class->idClass) }}"> Xem danh sách sv </a></td>
                                    <td>Sửa lớp</td>
                                    <td>Ẩn lớp</td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
@endsection
