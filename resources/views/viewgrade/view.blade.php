@extends('layout.layout');

@section('main')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h1>
                    Điểm lớp @foreach ($listClass as $student)
                        {{ $student->nameClass }}
                    @endforeach
                </h1><br>

                <form>
                    <select name="id-subject" class="selectpicker">
                        <option>------</option>
                        @foreach ($listSubject as $subject)
                            <option value="{{ $subject->idSub }}" @if($subject->idSub == $idClass) selected @endif>{{ $subject->nameSub }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-default"><i class="fa fa-search"></i></button>
                </form>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Họ và tên</th>
                            <th>Ngày sinh </th>
                            <th>Điểm Skill </th>
                            <th>Điểm Final </th>
                            <th>Điểm Skill thi lại </th>
                            <th>Điểm Final thi lại </th>
                        </tr>
                    </thead>
                    <tbody id="student-list">
                        @foreach ($listStudent as $student)
                            <tr>
                                <td>{{ $student->idStudent }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->dob }}</td>
                                <td>{{ $student->Skill1 }}</td>
                                <td>{{ $student->Final1 }}</td>
                                <td>{{ $student->Skill2 }}</td>
                                <td>{{ $student->Final2 }}</td>
                                <td><a href="#">Sửa điểm</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $listStudent->links('pagination::bootstrap-4') }} --}}
            </div>
        </div>
    </div>
@endsection
