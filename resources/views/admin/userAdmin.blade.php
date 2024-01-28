@extends('layout.mainAdmin')

@section('title', 'userAdmin')
@section('Adminku')
@section('columns')
<h3>User</h3>
<a class="btn btn-primary" onclick="" href="{{ url('/userAdmin/createUser') }}"><i class="fa-solid fa-plus"></i> Tambah</a>
<div class="container rounded-lg shadow p-3 bg-primary mt-3">
<table class="table table-responsive table-dark table-striped-columns text-center ">
    {{-- @foreach
    @endforeach --}}
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Password</th>
        <th>Phone Number</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    @foreach($users as $user)
    <tr> {{-- Ini untuk migrasi database --}}
        
        <td>{{ $user->id }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->password }}</td>
        <td>{{ $user->phoneNumber }}</td>
        <td>{{ $user->status }}</td>
        <td class="ml-2"><button type="submit"class="btn btn-primary"><i class="fa-solid fa-pen"></i></button><button type="submit"class="btn btn-danger"><i class="fa-solid fa-xmark"></i></button></td>
    </tr>
    @endforeach
</table>
</div>
@endsection
@endsection