@extends('layout.dashboard')

@section('page-title')
    Welcome to Dashboard, {{ Auth::user()->givenName }}!
@endsection

@section('content')
    <div class="d-flex flex-lg-row mt-5" style="margin-left: 10px;">
        <p class="fs-5 fw-bold mb-0">Assessment Results</p>
    </div>

    @if($tests->isEmpty())
        <div class="alert alert-info" role="alert">
            No assessment taken.<x-nav-link :href="route('test-page')" type="button">Take assessment here.</x-nav-link>
        </div>
    @else
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Assessment Test</th>
                        <th scope="col">Date Taken</th>
                        <th scope="col">Handler</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="overflow-y-scroll">
                        @foreach($tests as $test)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $test->name }}</td>
                                <td>{{ $test->created_at->format('m/d/Y g:iA') }}</td>
                                <td>{{ $test->admin->full_name ?? '-' }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                        <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">View</a></li>
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
