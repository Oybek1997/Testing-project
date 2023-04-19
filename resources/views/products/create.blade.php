@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Product</h1>
        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="catalog_id">Catalog</label>
                <select name="catalog_id" id="catalog_id" class="form-control">
                    @foreach ($catalogs as $catalog)
                        <option value="{{ $catalog->id }}">{{ $catalog->title }}</option>
                    @endforeach
                </select>
            </div>
            @if($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif
            <button type="submit" class="btn btn-primary">Create Product</button>
        </form>
    </div>
@endsection
