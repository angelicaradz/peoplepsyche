@extends('layout.dashboard')

@section('page-title')
    Pending Requests List
@endsection

@section('content')
    <div id="table-list" class="card mt-5">

        <!-- PENDING REQUESTS LIST SECTION -->
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
                    <th scope="col">Actions</th>
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
                            <td>
                                <div class="dropdown">
                                    <a class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                    <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Approve</a></li>
                                    <li><a class="dropdown-item" href="#">Cancel</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
