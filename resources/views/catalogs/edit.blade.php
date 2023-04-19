@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Category</h1>
        <form action="{{ route('catalogs.update', ['catalog' => $catalog]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') ?? $catalog->title }}">
                @error('title')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            @if($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
