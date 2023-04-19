@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Product</h1>
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $product->title }}">
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($category->id == $product->category_id) selected @endif>{{ $category->title }}</option>
                    @endforeach
                </select>
                <label for="catalog_id">Catalog</label>
                <select name="catalog_id" id="catalog_id" class="form-control">
                    @foreach ($catalogs as $catalog)
                        <option value="{{ $catalog->id }}" @if ($catalog->id == $product->catalog_id) selected @endif>{{ $catalog->title }}</option>
                    @endforeach
                </select>
            </div>
            @if($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div
@endsection
