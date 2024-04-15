<!-- child_template.blade.php -->
@extends('layout\base')

@section('New', 'List Categories')

@section('content')
    <div class = "header title">
        <a class = "btn btn-light py-3 mx-2" href="{{ route('stockCategoryCreateForm') }}">Create New Stock Category</a>
    </div>
    <div class="p-4 m-3 rounded">
        <table class="table table-bordered rounded">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Created</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                            <div class="btn-group dropend" role="group">
                                <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Options
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="{{ route('stockCategoryUpdateForm', ['id' => $category->id]) }}">Update</a>
                                    </li>
                                    <li><a data-bs-toggle="modal" data-bs-target="#deleteModal{{ $category->id }}"
                                            class="dropdown-item text-danger" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>


                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" aria-labelledby="deleteModal"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete {{ $category->name }}
                                        Category!</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete the category {{ $category->name }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a href="{{ route('stockCategoryDelete', ['id' => $category->id]) }}"><button
                                            type="button" class="btn btn-primary">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
    </body>

    </html>
@endsection
