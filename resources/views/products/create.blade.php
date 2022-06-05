@extends('layouts/app')

@section('content')
    <h1>Create a product</h1>
    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        <div class="form-row">
            <label for="">Title</label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
        </div>
        <div class="form-row">
            <label for="">Description</label>
            <input type="text" class="form-control" name="description" value="{{ old('description') }}">
        </div>
        <div class="form-row">
            <label for="">Price</label>
            <input type="number" class="form-control" min="1.00" step="0.01" name="price" value="{{ old('price') }}">
        </div>
        <div class="form-row">
            <label for="">Stock</label>
            <input type="number" class="form-control" min="0" name="stock" value="{{ old('stock') }}">
        </div>
        <div class="form-row">
            <label for="">Status</label>
            <select name="status" class="custom-select">
                <option value="" selected>Select..</option>
                <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                <option value="unavailable" {{ old('status') == 'unavailable' ? 'selected' : '' }}>Unavailable</option>
            </select>
        </div>
        <div class="form-row mt-3">
            <button type="submit" class="btn btn-primary btn-lg">Create Product</button>
        </div>
    </form>
@endsection
