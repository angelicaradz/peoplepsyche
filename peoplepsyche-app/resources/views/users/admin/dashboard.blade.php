@extends('layout.dashboard')

@section('title')
    Admin Dashboard |
@endsection

@section('page-title')
    Welcome to Dashboard, {{ Auth::user()->givenName }}
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
                        <h2 class="fs-1 fw-bold mb-0">{{ $takers_count ?? '0' }}</h2>
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
                        <h2 class="fs-1 fw-bold mb-0">{{ $clients_count ?? '0' }}</h2>
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
            @if($requests->isEmpty())
                <div class="alert alert-info" role="alert">
                    No pending requests.
                </div>
            @else
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
                                @foreach($requests as $request)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $request->client->lastName }}</td>
                                        <td>{{ $request->client->givenName }}</td>
                                        <td>{{ $request->client->middleName ?? '-' }}</td>
                                        <td>{{ $request->client->suffixName ?? '-' }}</td>
                                        <td>{{ $request->created_at->format('m/d/Y g:iA') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer justify-content-end">
                        <a href="{{ route('admin.pending-requests') }}" class="text-decoration-none" style="color: chocolate;">View All</a>
                    </div>
                </div>
            @endif
        </div>

        <!-- TAKERS LIST -->
        <div class="col">
            <div class="row text-start mx-1">
                <h4 class="fw-bold mb-0">Takers</h4>
            </div>
            @if($takers->isEmpty())
                <div class="alert alert-info" role="alert">
                    No clients have taken assessment.
                </div>
            @else
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
                                <th scope="col">Assessment Type</th>
                                <th scope="col">Date Taken</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($takers as $taker)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $taker->client->lastName }}</td>
                                        <td>{{ $taker->client->givenName }}</td>
                                        <td>{{ $taker->client->middleName ?? '-' }}</td>
                                        <td>{{ $taker->client->suffixName ?? '-' }}</td>
                                        <td>{{ $taker->assess_type->name ?? '-' }}</td>
                                        <td>{{ $taker->created_at->format('m/d/Y g:iA') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
