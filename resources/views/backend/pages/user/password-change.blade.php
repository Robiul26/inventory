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
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Change Password</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Change Password</h1>

            </div>
            <div>
                <a href="{{ route('profile.index') }}" class="btn btn-success"><i class="far fa-question-circle me-1"></i>
                    View Profile</a>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <!-- Form -->
                    <form id="editPasswordForm" action="{{ route('user.password_update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="current_password">Current Password <span class="text-danger">*</span></label>
                                    <input type="password" name="current_password" class="form-control" id="current_password"
                                        placeholder="Enter Current password" 
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Current password'">
                                    @error('current_password')
                                        <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="new_password">New Password <span class="text-danger">*</span></label>
                                    <input type="password" name="new_password" class="form-control" id="new_password"
                                        placeholder="Enter new password" 
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter new password'">
                                    @error('new_password')
                                        <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="confirm_password">Confirm New Password <span class="text-danger">*</span></label>
                                    <input type="password" name="confirm_password" class="form-control"
                                        placeholder="Enter confirm new password" 
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter confirm new password'">
                                    @error('confirm_password')
                                        <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success">
                                    Update
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
            $("#editPasswordForm").validate({
                rules: {
                    current_password: {
                        required: true,
                    },
                    new_password: {
                        required: true,
                        minlength: 8,
                    },
                    confirm_password: {
                        required: true,
                        equalTo: '#new_password',
                    }
                },
                messages: {
                    current_password: {
                        required: 'Please Enter current passord',
                    }, 
                    new_password: {
                        required: 'Please enter new password',
                        minlength: 'Password will be minimum 8 characters or number',
                    },
                    confirm_password: {
                        required: 'Please enter confirm password',
                        equalTo:'password does not match',
                    }

                }
            });
        });
    </script>
@endsection
