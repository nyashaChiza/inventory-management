<!-- child_template.blade.php -->
@extends('layout\base')

@section('New', 'Add New Category')

@section('content')
<form method="post" action="{{ route('stockStore') }}">
  {{ csrf_field() }}
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" required name='name' class="form-control" id="name" placeholder="Name">
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Quantity</label>
        <input type="number" required name='quantity' class="form-control" id="name" placeholder="Quantity">
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Expiry Date</label>
        <input type="date" required name='expiry_date' class="form-control" id="name" placeholder="Quantity">
      </div>

      <div class="mb-3">
        <label for="name" class="form-label">Price</label>
        <input type="number" required name='unit_price' class="form-control" id="name" placeholder="Price">
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Category</label>
        <select name='category' class='form-control' >
            <option value='0'>Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea required class="form-control" name='description' id="description" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="{{ route('stockIndex') }}" class="btn btn-dark">Back</a>
  </form>
@endsection
