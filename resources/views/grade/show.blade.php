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

                <Table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Môn</th>
                            <th>Điểm Skill </th>
                            <th>Điểm Final </th>
                            <th>Điểm Skill thi lại</th>
                            <th>Điểm Final thi lại</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grade as $grade)
                            <tr>
                                <td>{{ $grade->nameSub }}</td>
                                <td>
                                    {{ $grade->Skill1 }}
                                </td>
                                <td>
                                    {{ $grade->Final1 }}
                                </td>
                                <td>
                                    {{ $grade->Skill2 }}
                                </td>
                                <td>
                                    {{ $grade->Final2 }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </Table>

            </div>
        </div>
    </div>
@endsection
