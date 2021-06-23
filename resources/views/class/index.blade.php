@extends('layout.layout');

@section('main')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h1>
                    Lớp
                </h1>

                <a href="{{ url('/class/create') }}"><button class="btn btn-default">Thêm lớp</button></a>

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
                                    <td>Xem</td>
                                    <td>Sửa</td>
                                    <td>Ẩn</td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
@endsection
