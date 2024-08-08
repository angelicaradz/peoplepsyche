@extends('layout.dashboard')

@section('title')
    Pending Requests |
@endsection

@section('page-title')
    Pending Requests List
@endsection

@section('content')
    {{-- INFO MESSAGES --}}
    @if (session('success'))
        <div class="row justify-content-center align-items-center mt-5">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="row justify-content-center align-items-center mt-5">
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        </div>
    @endif

    {{-- PENDING REQUEST LIST INFO MESSAGE: IF THE LIST IS EMPTY --}}
    @if($requests->isEmpty())
        <div class="row justify-content-center align-items-center mt-5">
            <div class="alert alert-info" role="alert">
                No pending requests.
            </div>
        </div>
    @else
        <!-- PENDING REQUESTS LIST SECTION -->
        <div id="table-list" class="card mt-5">
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Middle Name</th>
                        <th scope="col">Suffix</th>
                        <th scope="col">Asessment Type</th>
                        <th scope="col">Proof of Payment</th>
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
                                <td>{{ $request->assess_type->name ?? '-' }}</td>
                                <td>
                                    @if($request->receipt_path)
                                        <a href="{{ Storage::url($request->receipt_path) }}" target="_blank">
                                            <img src="{{ Storage::url($request->receipt_path) }}" alt="Proof of payment" style="max-width: 100px; height: auto;">
                                        </a>
                                    @endif
                                </td>
                                <td>{{ $request->created_at->format('m/d/Y g:iA') }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item">
                                                    <form action="{{ route('request.approve', $request->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="dropdown-item" style="padding:0%">Approve</button>
                                                    </form>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item">
                                                    <form action="{{ route('request.cancel', $request->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item" style="padding:0%">Cancel</button>
                                                    </form>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
