@extends('layout.base')

@section('title', 'List Categories')

@section('content')
    <div class="header title">
        <a class="btn btn-light py-3 mx-2" href="{{ route('stockCreate') }}">Create New Stock</a>
    </div>
    <div class="p-4 m-3 rounded">
        <table class="table table-bordered rounded">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Total Sales</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stocks as $stock)
                    <tr>
                        <td>{{ $stock->name }}</td>
                        <td>{{ $stock->category }}</td>
                        <td>{{ $stock->quantity }}</td>
                        <td>{{ $stock->quantity * $stock->price }}</td>
                        <td>{{ $stock->created_at }}</td>
                        <td>
                            <div class="btn-group dropend" role="group">
                                <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">Options</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="{{ route('stockUpdate', ['stock' => $stock->id]) }}">Update</a></li>
                                    <li><a data-bs-toggle="modal" data-bs-target="#deleteModal{{ $stock->id }}"
                                            class="dropdown-item text-danger" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
