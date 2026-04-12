@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">{{ isset($subcategory) ? 'Edit Subcategory' : 'Create Subcategory' }}</h2>
    <a href="{{ route('admin.subcategories.index') }}" class="btn btn-outline-secondary">Cancel</a>
</div>

<div class="card border-0 shadow-sm" style="max-width: 600px;">
    <div class="card-body p-4">
        <form action="{{ isset($subcategory) ? route('admin.subcategories.update', $subcategory->id) : route('admin.subcategories.store') }}" method="POST">
            @csrf
            @if(isset($subcategory)) @method('PUT') @endif
            
            <div class="mb-4">
                <label for="category_id" class="form-label fw-medium text-muted">Parent Category</label>
                <select class="form-select form-select-lg border-0 bg-light @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ (old('category_id', $subcategory->category_id ?? '') == $cat->id) ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
                @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
                <label for="name" class="form-label fw-medium text-muted">Subcategory Name</label>
                <input type="text" class="form-control form-control-lg border-0 bg-light @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $subcategory->name ?? '') }}" required>
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            
            <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5">{{ isset($subcategory) ? 'Update Subcategory' : 'Save Subcategory' }}</button>
        </form>
    </div>
</div>
@endsection
