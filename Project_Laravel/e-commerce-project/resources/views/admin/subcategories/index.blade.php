@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold mb-0">Subcategories</h2>
    <a href="{{ route('admin.subcategories.create') }}" class="btn btn-primary shadow-sm"><i class="bi bi-plus-lg"></i> Add New</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">ID</th>
                        <th>Name</th>
                        <th>Parent Category</th>
                        <th>Slug</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($subcategories as $subcategory)
                        <tr>
                            <td class="ps-4">{{ $subcategory->id }}</td>
                            <td class="fw-medium">{{ $subcategory->name }}</td>
                            <td><span class="badge bg-light text-dark border">{{ $subcategory->category->name }}</span></td>
                            <td><span class="badge bg-light text-dark border">{{ $subcategory->slug }}</span></td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.subcategories.edit', $subcategory->id) }}" class="btn btn-sm btn-outline-info me-1"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.subcategories.destroy', $subcategory->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this subcategory?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center py-4 text-muted">No subcategories found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="mt-3">{{ $subcategories->links() }}</div>
@endsection
