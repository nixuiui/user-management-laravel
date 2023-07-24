@extends('layouts.admin')
@section('title')
Users
@endsection

@section('content')
<div class="panel panel-default panel-table">
    <div class="panel-heading">
        Users
    </div>
    <div class="panel-body">
        <table id="datatables" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Fullname</th>
                    <th>Html Url</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Fullname</th>
                    <th>Html Url</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($data as $no => $item)
                <tr>
                    <td>{{ $no+1 }}</td>
                    <td>{{ $item['id'] }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['full_name'] }}</td>
                    <td>{{ $item['html_url'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('script')
@endsection
