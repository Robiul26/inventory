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
                <li class="breadcrumb-item"><a href="#">Customer</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ @$data ? 'Edit' : 'Add new' }}

                </li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">
                    {{ @$data ? 'Edit Customer Form' : 'Create Customer Form' }}
                </h1>

            </div>
            <div>
                <a href="{{ route('customer.index') }}" class="btn btn-outline-gray"><i
                        class="far fa-question-circle me-1"></i> View All</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <!-- Form -->
                    <form action="{{ @$data ? route('customer.update', $data->id) : route('customer.store') }}"
                        method="POST">
                        @if (@$data)
                            @csrf
                            @method('PUT')
                        @else
                            @csrf
                        @endif
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="name">Customer Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Enter Customer Name" value="{{ @$data->name }}"
                                        onfocus="this.placeholder = ''"  onblur="this.placeholder = 'Enter Customer Name'">
                                    @error('name')
                                        <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="mobile">Mobile <span class="text-danger">*</span></label>
                                    <input type="text" name="mobile" class="form-control" id="mobile"
                                        placeholder="Enter mobile" value="{{ @$data->mobile }}"
                                       onfocus="this.placeholder = ''"  onblur="this.placeholder = 'Enter mobile'">
                                    @error('mobile')
                                        <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="email">Email </label>
                                    <input type="text" name="email" class="form-control" id="email"
                                        placeholder="Enter email" value="{{ @$data->email }}"
                                       onfocus="this.placeholder = ''"  onblur="this.placeholder = 'Enter email'">
                                    @error('email')
                                        <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="address">Address<span class="text-danger">*</span></label>
                                    <textarea name="address" class="form-control" placeholder="customer Address" id="address" rows="4" onfocus="this.placeholder = ''"  onblur="this.placeholder = 'customer Address'">{{ @$data->address }}</textarea>
                                    @error('address')
                                        <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success">
                                    {{ @$data ? 'Update' : 'Save' }}
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
