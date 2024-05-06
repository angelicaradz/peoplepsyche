@extends('layout.dashboard')

@section('page-title')
    Welcome to Dashboard, {{ Auth::user()->name }}
@endsection

@section('content')
    <!-- COUNTERS -->
    <div class="row row-cols-1 row-cols-sm-2 g-4 mt-3">

        <!-- TOTAL TAKERS -->
        <div class="col">
            <div class="card" style="background-color: rgba(210, 105, 30, 0.185); border-width: 2px; border-color: chocolate;">
                <div class="card-body">
                    <div class="row">
                        <h4 class="fw-bold mb-0">TOTAL TAKERS</h4>
                    </div>
                    <div class="row">
                        <h2 class="fs-1 fw-bold mb-0">15</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- TOTAL CLIENTS -->
        <div class="col">
            <div class="card" style="background-color: rgba(210, 105, 30, 0.185); border-width: 2px; border-color: chocolate;">
                <div class="card-body">
                    <div class="row">
                        <h4 class="fw-bold mb-0">TOTAL CLIENTS</h4>
                    </div>
                    <div class="row">
                        <h2 class="fs-1 fw-bold mb-0">22</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- LISTS -->
    <div class="row row-cols-1 row-cols-md-2 g-4 mt-3">

        <!-- PENDING REQUESTS LIST -->
        <div class="col">
            <div class="row text-start mx-1 mb-1">
                <h4 class="fw-bold mb-0">Pending Requests</h4>
            </div>
            <div id="dashboard-card" class="card">
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Middle Name</th>
                            <th scope="col">Suffix</th>
                            <th scope="col">Date Requested</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>Cruz</td>
                            <td>Juan</td>
                            <td>Dela</td>
                            <td></td>
                            <td>11/29/2023 3:36PM</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Doe</td>
                                <td>John</td>
                                <td></td>
                                <td></td>
                                <td>11/29/2023 3:37PM</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Doe</td>
                                <td>John</td>
                                <td></td>
                                <td></td>
                                <td>11/29/2023 3:37PM</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer justify-content-end">
                    <a href="admin-pending-requests.html" class="text-decoration-none" style="color: chocolate;">View All</a>
                </div>
            </div>
        </div>

        <!-- TAKERS LIST -->
        <div class="col">
            <div class="row text-start mx-1">
                <h4 class="fw-bold mb-0">Takers</h4>
            </div>
          <div id="dashboard-card" class="card">
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                          <th scope="col">No.</th>
                          <th scope="col">Last Name</th>
                          <th scope="col">First Name</th>
                          <th scope="col">Middle Name</th>
                          <th scope="col">Suffix</th>
                          <th scope="col">Date Taken</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Jeon</td>
                          <td>Jungkook</td>
                          <td></td>
                          <td>Jr.</td>
                          <td>11/29/2023 3:38PM</td>
                        </tr>
                    </tbody>
                </table>
            </div>
          </div>
        </div>
    </div>
@endsection
