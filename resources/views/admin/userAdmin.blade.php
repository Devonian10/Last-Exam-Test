@extends('layout.mainAdmin')

@section('title', 'userAdmin')
@section('Adminku')
@section('columns')
<h3><i class="fa-solid fa-user mr-2"></i> User</h3>
<hr>
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    @endif
<a class="btn btn-primary" href="{{ route('users.create') }}"><i class="fa-solid fa-plus"></i> Tambah</a>
<div class="container rounded-lg shadow p-3 bg-primary mt-3">
<table class="table table-responsive table-dark table-striped-columns text-center ">
    {{-- @foreach
    @endforeach --}}
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Status</th>
        <th colspan="3" scope="col">Aksi</th>
    </tr>
    @foreach($users as $user)
    <tr> {{-- Ini untuk migrasi database --}}
        
        <td>{{ $loop->iteration }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->phoneNumber }}</td>
        <td>{{ $user->status }}</td>
        <td class="ml-2">
            <a class="btn btn-warning" href="{{ route('users.update', ["id"=> $user->id]) }}"><i class="fa-solid fa-pen"></i></a>
        <td><form action="{{ route('registration.destroy',["id"=>$user->id]) }}" method="POST">
                @method('delete')
                @csrf
            <button type="submit"class="btn btn-danger" onclick="return confirm('Are you sure delete this user?')"><i class="fa-solid fa-trash"></i></button>
            </form>
        </td>
        </td>
        
    </tr>
    @endforeach
</table>
</div>
@endsection
@endsection