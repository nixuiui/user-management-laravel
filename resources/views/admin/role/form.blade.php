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
                <div class="form-group">
                    <label>Permission*</label>
                    <table class="table">
                        <thead>
                            <th>Name</th>
                        </thead>
                        @foreach ($permissions as $item)
                            <?php
                                $find = null;
                                if(isset($data)) {
                                    $find = $data->permissions->first(function($value, $key) use ($item) {
                                        return $value->id == $item->id;
                                    });
                                }
                            ?>
                            <tbody>
                                <td>
                                    <label for="checked{{$item->id}}">
                                        <input class="mr-2" type="checkbox" name="checkeds[]" value="{{$item->id}}" id="checked{{$item->id}}" {{$find ? 'checked' : ''}}>
                                        <span>
                                            {{$item->name}}
                                        </span>
                                    </label>
                                </td>
                            </tbody>
                        @endforeach
                    </table>
                </div>
                <button type="submit"  class="btn btn-primary btn-fill btn-md">Simpan</button>
            </div>
        </form>
    </div>
</div> <!-- end row -->
@endsection
