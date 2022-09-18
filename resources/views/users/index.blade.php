@extends('layouts.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Users</h1>
    <form method="GET" action="{{ route('users.index') }}" style="width: 330px">
        <div class="form-row align-items-center">
            <div class="col">
                <input type="search" name="search" class="form-control mb-2 pr-0" id="inlineFormInput"
                    placeholder="Enter Keywords">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary mb-2">Search</button>
            </div>
        </div>
    </form>
    <a href="{{route('users.create')}}" class="btn btn-primary">Add User</a>
</div>

<div class="row">
    <div class="card shadow mb-4 mx-auto">
        <div class="card-body">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 161px;">#ID</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 248px;">Username</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 115px;">Email</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 51px;">Manage</th>
                                </tr>
                            </thead>
                            <tbody>             
                                @foreach ($users as $user)
                                <tr class="odd">
                                    <td class="sorting_1">{{$user->id}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->email}}</td>
                                    <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-success">Edit</a></td>                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection