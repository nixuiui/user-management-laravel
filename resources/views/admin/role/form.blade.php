@extends('layouts.admin')

@section('title')
User Roles
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        @if(isset($data))
        <form class="panel panel-default" action="{{ route('role.save', $data) }}" method="post">
        @else
        <form class="panel panel-default" action="{{ route('role.save') }}" method="post">
        @endif
            <div class="panel-heading">User Role Form</div>
            <div class="panel-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Role Name*</label>
                    <input type="text" class="form-control input-sm" name="role_name"  value="{{ isset($data) ? $data->role_name : old('role_name') }}" required>
                    @if($errors->has('role_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('role_name') }}</strong>
                    </span>
                    @endif
                </div>
                <button type="submit"  class="btn btn-primary btn-fill btn-md">Simpan</button>
            </div>
        </form>
    </div>
</div> <!-- end row -->
@endsection
