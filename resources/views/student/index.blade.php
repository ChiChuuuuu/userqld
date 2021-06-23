@extends('layout.layout');

@section('main')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h1>
                    Sinh viên
                </h1>

                <a href="{{ route('student.create') }}"><button class="btn btn-default">Thêm sinh viên</button></a>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Họ và tên</th>
                            <th>Email </th>
                            <th>Mật khẩu </th>
                            <th>Giới tính </th>
                            <th>Ngày sinh </th>
                            <th>Lớp </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listStudent as $student)
                            <tr>
                                <td>{{ $student->idStudent }}</td>
                                <td>{{ $student->name }}</td>
                                <td>
                                    {{ $student->email }}
                                </td>
                                <td>
                                    {{ $student->password }}
                                </td>
                                <td>
                                    @if ($student->gender == 0)
                                        Nam
                                    @else
                                        Nu
                                    @endif
                                </td>
                                <td>
                                    {{ $student->dob }}
                                </td>
                                <td>
                                    {{ $student->nameClass }}
                                </td>
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
