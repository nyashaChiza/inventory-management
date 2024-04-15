<!-- child_template.blade.php -->
@extends('layout\base')

@section('Update', 'Change Category')

@section('content')
<div class='bg-light rounded m-3 p-2'>
    Update {{ $category->name }} Category
</div>
<div>
    <form method="post" class="m-2 p-2" action="{{ route('updateStockCategoryForm', ['id'=>$category->id]) }}">
    {{ csrf_field() }}
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" required name='name' value="{{ $category->name }}" class="form-control" id="name" placeholder="Category">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea required class="form-control" name='description' id="description" rows="3">
                {{ $category->description }}
            </textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('listCategories') }}" class="btn btn-dark">Back</a>
    </form>
</div>
@endsection
