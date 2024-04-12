<!-- child_template.blade.php -->
@extends('layout\base')

@section('New', 'Add New Category')

@section('content')
<form method="post" action="{{ route('stockCategoryCreate') }}">
  {{ csrf_field() }}
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" required name='name' class="form-control" id="name" placeholder="Category">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea required class="form-control" name='description' id="description" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="{{ route('listCategories') }}" class="btn btn-dark">Back</a>
  </form>
@endsection