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
                    Thêm điểm thi lại
                </h1>
                <br><br><br>

                <form action="{{ route('grade.store') }}" method="post">
                    @csrf
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
                                <select id="id-student" name="idStudent">
                                    <option>------</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Chọn môn:</td>
                            <td>
                                <select name="idSub">
                                    <option>------</option>
                                    @foreach ($listSub as $subject)
                                        <option value="{{ $subject->idSub }}">{{ $subject->nameSub }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Điểm thi:</td>
                            <td>
                                Skill 2
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="number" name="skillGrade">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                Final 2
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="number" name="finalGrade">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button class="btn btn-default">Thêm</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection
