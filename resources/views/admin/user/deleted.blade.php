@extends('layouts.admin')
@section('title')
Deleted Users
@endsection

@section('content')
<a href="{{ route('user.form') }}" class="btn btn-md btn-primary btn-space btn-icon"> <i class="mdi mdi-plus"></i> Add User</a>
<a href="{{ route('user') }}" class="btn btn-md btn-success btn-space btn-icon"> <i class="mdi mdi-account"></i> Show Users</a>
<div class="panel panel-default panel-table">
    <div class="panel-heading">
        Deleted Users
    </div>
    <div class="panel-body">
        <table id="datatables" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($data as $no => $item)
                <tr>
                    <td>{{ $no+1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->role->role_name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('script')
@endsection
