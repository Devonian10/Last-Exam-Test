@extends('layout.mainAdmin')

@section('title', 'userAdmin')
@section('Adminku')

<div class="container rounded-lg shadow p-3 bg-primary mt-3"></div>
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
    <tr> {{-- Ini untuk migrasi database --}}
        <td>1</td>
        <td>Lorem</td>
        <td>devonian09@gmail.com</td>
        <td>blablabla</td>
        <td>0837454xxxx</td>
        <td>user</td>
        <td><button type="submit"class="btn btn-primary"><i class="fa-solid fa-pen"></i ></button><button type="submit"class="btn btn-danger"><i class="fa-solid fa-xmark"></i></button></td>
    </tr>
</table>

@endsection
