@extends('portal.layouts.main')
@section('title', 'Admin')
@section('header-breadcrumb')
    <li class="active">Users</li>
    <li class="active">Admin</li>
@endsection()
@section('content-body')
    <div class="card card-table">
        @if(sizeof($users) > 0)
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="field-name"><span>S/N</span></th>
                        <th class="field-name"><span>Name</span></th>
                        <th class="field-name"><span>Email Address</span></th>
                        <th class="field-name"><span>Job Title</span></th>
                        <th class="field-name"><span>Created At</span></th>
                        <th class="field-name"><span>Action</span></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $key => $user)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                {{ $user->getFullName() }}
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->job_title }}</td>
                            <td>{{ $user->formatDate() }}</td>
                            <td>
                                <a href="#" class="btn btn-brand-primary">View</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state">
                <i class="fa fa-users  empty-state__icon icon-grey" aria-hidden="true"></i>
                <p class="empty-state__description mt-2">No Client has been added.</p>
            </div>
        @endif
        {{ $users->render() }}
    </div>
@endsection