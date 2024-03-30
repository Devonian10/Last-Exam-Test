@extends('layout.mainAdmin')

@section('title', 'Order')

@section('Adminku')
@section('columns')
<h2>Edit Orders</h2>
<form action="{{ route("orderAdmin.update", $pesanan[0]->order_id ) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-4 g-4">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control">

                <option value="pending" {{ old('status', $pesanan[0]->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="cancel" {{ old('status', $pesanan[0]->status) == 'cancel' ? 'selected' : '' }}>Cancel</option>
                <option value="success" {{ old('status', $pesanan[0]->status) == 'success' ? 'selected' : '' }}>Success</option>

            </select>
        </div>
    </div>
    <a href="{{ route('orderAdmin.indexAdmin') }}" class="btn btn-danger mt-4">Cancel</a>
    <button type="submit" class="btn btn-primary mt-4">Update</button>
</form>
@endsection
@endsection