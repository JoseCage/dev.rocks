@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Jobs</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <th>Title</th>
                            <th>Summary</th>
                            <th>Company</th>
                            <th>Due date</th>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach (DevRocks\Models\Job::get() as $job)
                                    <td>{{ $job->title }}</td>
                                    <td>{{ $job->summary }}</td>
                                    <td>{{ $job->company->name }}</td>
                                    <td>{{ $job->due_date->format('Y-m-d') }}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
