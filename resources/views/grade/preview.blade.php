@extends('layout.layout');

@section('main')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h1>
                    Danh sách Sinh viên
                </h1><br>
                <form action="{{ url('/grade-confirm') }}" method="post">
                    @csrf
                    <button class="btn btn-">Đồng ý thêm dữ liệu</button>
                </form><br>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>ID SV</th>
                            <th>Họ và tên</th>
                            <th>Môn </th>
                            <th>Thực hành </th>
                            <th>Lý thuyết </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($grade as $grade)
                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $grade['id_sv'] }}
                                </td>
                                <td>
                                    {{ $grade['ho_ten'] }}
                                </td>
                                <td>
                                    {{ $grade['mon'] }}
                                </td>
                                <td>
                                    {{ $grade['thuc_hanh'] }}
                                </td>
                                <td>
                                    {{ $grade['ly_thuyet'] }}
                                </td>
                            @empty
                            <tr>
                                <td>Không có dữ liệu</td>
                            </tr>

                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
