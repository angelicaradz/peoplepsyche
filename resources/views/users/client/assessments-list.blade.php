@extends('layout.dashboard')

@section('title')
    Assessments |
@endsection

@section('page-title')
    Assessment
@endsection

@section('content')

    {{-- ASSESSMENT LIST INFO MESSAGE: IF THE LIST IS EMPTY --}}
    @if($tests->isEmpty())
        <div class="row justify-content-center align-items-center mt-5">
            <div class="alert alert-info" role="alert">
                No assessments saved.
            </div>
        </div>
    @else
        {{-- ASSESSMENT LIST SECTION --}}
        <div class="card mt-5">
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Assessment Type</th>
                            <th scope="col">Handler</th>
                            <th scope="col">Date Taken</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="overflow-y-scroll">
                        @foreach ($tests as $test)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $test->assess_type->name ?? '-'}}</td>
                                <td>{{ $test->admin->full_name ?? '-' }}</td>
                                <td>{{ $test->created_at->format('m/d/Y g:iA') }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('view_result', $test->id) }}" id="view_result">View</a></li>
                                            <li><a class="dropdown-item" href="{{ route('print_result', $test->id) }}" id="print_result">Print</a></li>
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
