@extends('layout.layout');

@section('main')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h1>
                    Điểm 
                </h1><br>
                <form class="navbar-form navbar-left navbar-search-form" role="search">
                    <div class="input-group">
                        <input type="text" value="" class="form-control" placeholder="Search..." name="search">

                    </div>
                    <button class="btn btn-default"><i class="fa fa-search"></i></button>
                </form>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Lớp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listClass as $class)
                            <tr>
                                <td><?= $class->idClass ?></td>
                                <td><?= $class->nameClass ?></td>
                                <td> <a href="{{ route('viewgrade.show', $class->idClass) }}"> Xem danh sách điểm </a></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $listClass->appends(['search' => $search])->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
