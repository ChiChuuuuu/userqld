@extends('layout.layout');

@section('main')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h1>
                    Môn học
                </h1>

                <a href="{{ route('subject.create') }}"><button class="btn btn-default">Thêm môn</button></a>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Môn học</th>
                            <th>Chuyên ngành</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listSub as $sub)
                            <tr>
                                <td><?= $sub->idSub ?></td>
                                    <td><?= $sub->nameSub ?></td>
                                    <td><?= $sub->nameMajor ?></td>
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
