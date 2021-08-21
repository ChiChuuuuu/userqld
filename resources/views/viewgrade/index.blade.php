@extends('layout.layout');

@section('main')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h1>
                    Điểm sinh viên
                </h1>

                <form>
                    <select name="id-class" >
                        <option>------</option>
                        @foreach ($listClass as $class)
                            <option value="{{ $class->idClass }}" @if ($class->idClass == $idClass) selected @endif>{{ $class->nameClass }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-default"><i class="fa fa-search"></i></button>
                </form>
                {{-- <td>Chọn sinh viên:</td>
                <td>
                    <select id="id-student" name="idStudent">
                        <option>------</option>
                    </select>
                </td> --}}

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Họ và tên</th>
                            <th>Ngày sinh </th>
                            <th>Môn</th>
                            <th>Điểm Skill </th>
                            <th>Điểm Final </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listStudent as $student)
                            <tr>
                                <td>
                                    {{ $student->idStudent }}
                                </td>
                                <td>
                                    {{ $student->name }}
                                </td>
                                <td>
                                    {{ $student->dob }}
                                </td>
                                <td>
                                    {{ $student->nameSub }}
                                </td>
                                <td>
                                    @if ($student->Skill2 == null)
                                        {{ $student->Skill1 }}
                                    @else
                                        {{ ($student->Skill1 + $student->Skill2) / 2 }}
                                    @endif
                                </td>
                                <td>
                                    @if ($student->Final2 == null)
                                        {{ $student->Final1 }}
                                    @else
                                        {{ ($student->Final1 + $student->Final2) / 2 }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $listStudent->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
