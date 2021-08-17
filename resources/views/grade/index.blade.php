@extends('layout.layout');

@section('main')
<style>
    table,
    th,
    td {
        padding: 7px;
    }

</style>
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h1>
                    Thêm điểm
                </h1>
                <br><br><br>

                <table>
                    <tr>
                        <td>Chọn lớp:</td>
                        <td>
                            <select id="id-class">
                                <option>------</option>
                                @foreach ($listClass as $class)
                                    <option value="{{ $class->idClass }}">{{ $class->nameClass }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Chọn sinh viên:</td>
                        <td>
                            <select id="id-student">
                                <option>------</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
