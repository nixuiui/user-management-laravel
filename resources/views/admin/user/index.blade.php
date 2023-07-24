@extends('layouts.admin')
@section('title')
Users
@endsection

@section('content')
@if (hasPermissionByKey(Auth::user()->role->permissions, 'user_create'))
<a href="{{ route('user.form') }}" class="btn btn-md btn-primary btn-space btn-icon"> <i class="mdi mdi-plus"></i> Add User</a>
@endif
@if (hasPermissionByKey(Auth::user()->role->permissions, 'user_view_deleted'))
<a href="{{ route('user.deleted') }}" class="btn btn-md btn-danger btn-space btn-icon"> <i class="mdi mdi-block"></i> Deleted Users</a>
@endif
<div class="panel panel-default panel-table">
    <div class="panel-heading">
        Users
    </div>
    <div class="panel-body">
        <table id="datatables" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Last Login</th>
                    <th class="text-right">Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Last Login</th>
                    <th class="text-right">Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($data as $no => $item)
                <tr>
                    <td>{{ $no+1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->role->role_name }}</td>
                    <td>{{ $item->last_login }}</td>
                    <td class="text-right">
                        @if (hasPermissionByKey(Auth::user()->role->permissions, 'user_update'))
                        <a href="{{ route('user.form', $item->id) }}" class="btn btn-xs btn-success" title="Lihat Artikel"><i class="mdi mdi-edit"></i></a>
                        @endif
                        @if (hasPermissionByKey(Auth::user()->role->permissions, 'user_delete'))
                        <a href="{{ route('user.delete', $item->id) }}" class="btn btn-xs btn-danger delete"><i class="mdi mdi-delete"></i></a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('script')
@endsection
