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
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ @$data ? 'Edit' : 'Add new' }}

                </li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">
                    {{ @$data ? 'Edit User' : 'Create User' }}
                </h1>

            </div>
            <div>
                <a href="{{ route('user.index') }}" class="btn btn-outline-gray"><i
                        class="far fa-question-circle me-1"></i> View All</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <!-- Form -->
                    <form id="myform" action="{{ @$data ? route('user.update', $data->id) : route('user.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @if (@$data)
                            @csrf
                            @method('PUT')
                        @else
                            @csrf
                        @endif
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="usertype">User Role <span class="text-danger">*</span></label>
                                    <select name="usertype" id="usertype" class="form-control">
                                        <option value="">Select..</option>
                                        <option value="Admin" {{ @$data->usertype == 'Admin' ? 'selected' : '' }}>Admin
                                        </option>
                                        <option value="User" {{ @$data->usertype == 'User' ? 'selected' : '' }}>User
                                        </option>
                                    </select>
                                    @error('usertype')
                                        <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Enter User Name" value="{{ @$data->name }}"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter User Name'">

                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="text" name="email" class="form-control" id="email"
                                        placeholder="Enter User Email" value="{{ @$data->email }}"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter User Email'">
                                    @error('email')
                                        <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            @if (!@$data)
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label for="password">Password <span class="text-danger">*</span></label>
                                        <input type="text" name="password" class="form-control" id="password"
                                            placeholder="Enter User password" value="{{ @$data->password }}"
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Enter User password'">
                                        @error('password')
                                            <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label for="password">Confirm Password <span class="text-danger">*</span></label>
                                        <input type="text" name="confirm_password" class="form-control"
                                            placeholder="Enter User password" value="{{ @$data->password }}"
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Enter User password'">
                                        @error('password')
                                            <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            @endif
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


    <script>
        $(document).ready(function() {
            $("#myform").validate({
                rules: {
                    usertype: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    name: {
                        required: true,
                    },
                    password: {
                        required: true,
                        minlength: 8,
                    },
                    confirm_password: {
                        required: true,
                        equalTo: '#password',
                    }
                },
                messages: {
                    usertype: {
                        required: 'Please select usertype',
                    }, 
                    email: {
                        required: 'Please enter valid email',
                    },
                    name: {
                        required: 'Please enter username',
                    },
                    password: {
                        required: 'Please enter password',
                        minlength: 'Please enter minimum 8 charecter',
                    },
                    confirm_password: {
                        required: 'Please enter password',
                        minlength: 'Please enter minimum 8 charecter',
                    }

                }
            });
        });
    </script>
@endsection
