@extends('layouts.admin')

@section('title')
User Form
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        @if(isset($data))
        <form class="panel panel-default" action="{{ route('user.save', $data) }}" method="post">
        @else
        <form class="panel panel-default" action="{{ route('user.save') }}" method="post">
        @endif
            <div class="panel-heading">User Form</div>
            <div class="panel-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Name*</label>
                    <input type="text" class="form-control input-sm" name="name"  value="{{ isset($data) ? $data->name : old('name') }}" required>
                    @if($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Email*</label>
                    <input type="email" class="form-control input-sm" name="email"  value="{{ isset($data) ? $data->email : old('email') }}" required>
                    @if($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Password*</label>
                    <input type="password" class="form-control input-sm" name="password"  value="{{ old('password') }}" {{!isset($data) ? 'required' : ''}}>
                    @if (isset($data))
                     Kosongkan jika tidak ingin mengubah password
                    @endif
                    @if($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Role*</label>
                    <select name="role_id" class="form-control input-sm" required>
                        <option value="">Select Role</option>
                        @foreach ($roles as $item)
                            <option value="{{ $item->id }}" {{ isset($data) && $item->id == $data->role_id ? 'selected' : '' }}>{{ $item->role_name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('role'))
                    <span class="help-block">
                        <strong>{{ $errors->first('role') }}</strong>
                    </span>
                    @endif
                </div>
                <button type="submit"  class="btn btn-primary btn-fill btn-md">Simpan</button>
            </div>
        </form>
    </div>
</div> <!-- end row -->
@endsection
