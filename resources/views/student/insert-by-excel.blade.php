@extends('layout.layout');

@section('main')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <h1>
                    Thêm sinh viên = excel
                </h1>

                <form action="{{ route('student.insert-by-excel-process') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" name="excel"
                            accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                            class="custom-file-input" id="validatedCustomFile" required>
                    </div>
                    <button type="submit" class="btn btn-">Thêm</button>
                </form>
            </div>
        </div>
    </div>
@endsection
