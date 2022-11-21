@extends('backend.layouts.admin-app')



@section('content')
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="#">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ @$editData ? 'Edit' : 'Add new' }}

                </li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">
                    {{ @$editData ? 'Edit Product Form' : 'Create Product Form' }}
                </h1>

            </div>
            <div>
                <a href="{{ route('product.index') }}" class="btn btn-outline-gray"><i
                        class="far fa-question-circle me-1"></i> View All</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <!-- Form -->
                    <form action="{{ @$editData ? route('product.update', $editData->id) : route('product.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @if (@$editData)
                            @csrf
                            @method('PUT')
                        @else
                            @csrf
                        @endif
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="supplier_id">Supplier <span class="text-danger">*</span></label>
                                    <select class="form-control" name="supplier_id" id="supplier_id">
                                        <option value="">Select..</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}"
                                                {{ @$editData && $supplier->id == $editData->supplier_id ? 'selected' : '' }}>
                                                {{ $supplier->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('supplier_id')
                                        <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="unit_id">Unit <span class="text-danger">*</span></label>
                                    <select class="form-control" name="unit_id" id="unit_id">
                                        <option value="">Select..</option>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}"
                                                {{ @$editData && $unit->id == $editData->unit_id ? 'selected' : '' }}>
                                                {{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('unit_id')
                                        <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="category_id">Category <span class="text-danger">*</span></label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option value="">Select..</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ @$editData && $category->id == $editData->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="name">Product Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Enter Product Name" value="{{ old('name') }}{{ @$editData->name }}"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Product Name'">
                                    @error('name')
                                        <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="image">Photo <span class="text-danger">*</span></label>
                                            <input type="file" id="image" class="form-control" name="image" />

                                            @error('image')
                                                <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            @if (@$editData)
                                                <label for="image">
                                                    <img src="{{ url('storage/uploads/product/' . $editData->image) }}"
                                                        style="height: 100px; width: 150px;">
                                                </label>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success">
                                    {{ @$editData ? 'Update' : 'Save' }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- End of Form -->
                </div>
            </div>
        </div>
    </div>
    <x-flash />
@endsection
