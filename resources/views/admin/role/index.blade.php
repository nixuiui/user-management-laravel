@extends('layouts.admin')
@section('title')
User Roles
@endsection

@section('content')
@if (hasPermissionByKey(Auth::user()->role->permissions, 'role_create'))
<a href="{{ route('role.form') }}" class="btn btn-md btn-primary btn-space btn-icon"> <i class="mdi mdi-plus"></i> Add User Role</a>
@endif
<div class="panel panel-default panel-table">
    <div class="panel-heading">
        User Roles
    </div>
    <div class="panel-body">
        <table id="datatables" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Role Name</th>
                    <th class="text-right">Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Role Name</th>
                    <th class="text-right">Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($data as $no => $item)
                <tr>
                    <td width="80">{{ $no+1 }}</td>
                    <td>{{$item->role_name}}</td>
                    <td class="text-right">
                        @if (hasPermissionByKey(Auth::user()->role->permissions, 'role_update'))
                        <a href="{{ route('role.form', $item->id) }}" class="btn btn-xs btn-success" title="Lihat Event"><i class="mdi mdi-edit"></i></a>
                        @endif
                        @if (hasPermissionByKey(Auth::user()->role->permissions, 'role_delete'))
                        <a href="{{ route('role.delete', $item->id) }}" class="btn btn-xs btn-danger delete"><i class="mdi mdi-delete"></i></a>
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
