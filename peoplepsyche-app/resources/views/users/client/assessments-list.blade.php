@extends('layout.dashboard')

@section('page-title')
    Assessment
@endsection

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Assessment Test</th>
                    <th scope="col">Date Taken</th>
                    <th scope="col">Handler</th>
                    </tr>
                </thead>
                <tbody class="overflow-y-scroll">
                    <tr>
                    <th scope="row">1</th>
                    <td>God's Gift Test</td>
                    <td>11/28/2023 3:43PM</td>
                    <td>Dr. Cora E. Lim</td>
                    <td>
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">View</a></li>
                            </ul>
                        </div>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Test No.2</td>
                    <td>11/28/2023 3:45PM</td>
                    <td>Dr. Cora E. Lim</td>
                    <td>
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">View</a></li>
                            </ul>
                        </div>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="d-flex flex-lg-row mt-2 justify-content-end" style="margin-right: 10px;">
        <button type="button" class="btn btn-secondary"><i class="fa-solid fa-print" style="margin-right: 5px;"></i>Print</button>
    </div>
@endsection
