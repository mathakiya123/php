@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">{{ isset($category) ? 'Edit Category' : 'Create Category' }}</h2>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Cancel</a>
</div>

<div class="card border-0 shadow-sm" style="max-width: 600px;">
    <div class="card-body p-4">
        <form action="{{ isset($category) ? route('admin.categories.update', $category->id) : route('admin.categories.store') }}" method="POST">
            @csrf
            @if(isset($category)) @method('PUT') @endif
            
            <div class="mb-4">
                <label for="name" class="form-label fw-medium text-muted">Category Name</label>
                <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $category->name ?? '') }}" required>
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            
            <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5">{{ isset($category) ? 'Update Category' : 'Save Category' }}</button>
        </form>
    </div>
</div>
@endsection
