@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Catalogs</h1>
        <a href="{{ route('catalogs.create') }}" class="btn btn-success mb-3">Create Catalog</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($catalogs as $catalog)
                <tr>
                    <th scope="row">{{ $catalog->id ?? '' }}</th>
                    <td>{{ $catalog->title ?? '' }}</td>
                    <td>
                        <a href="{{ route('catalogs.edit', ['catalog' => $catalog]) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('catalogs.destroy', ['catalog' => $catalog]) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
