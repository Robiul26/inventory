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
                <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Edit Profile</h1>

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
                    <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Enter User Name" value="{{ @$user->name }}"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter User Name'">
                                    @error('name')
                                        <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="text" name="email" class="form-control" id="email"
                                        placeholder="Enter User Email" value="{{ @$user->email }}"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter User Email'">
                                    @error('email')
                                        <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="mobile">Mobile no <span class="text-danger">*</span></label>
                                    <input type="text" name="mobile" class="form-control" id="mobile"
                                        placeholder="Enter User mobile" value="{{ @$user->mobile }}"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter User mobile'">
                                    @error('mobile')
                                        <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="address">Address <span class="text-danger">*</span></label>
                                    <input type="text" name="address" class="form-control" id="address"
                                        placeholder="Enter User address" value="{{ @$user->address }}"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter User address'">
                                    @error('address')
                                        <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="gender">Gender <span class="text-danger">*</span></label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="">Select..</option>
                                        <option value="Male" {{ @$user->gender == 'Male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="Female" {{ @$user->gender == 'Female' ? 'selected' : '' }}>Female
                                        </option>
                                    </select>
                                    @error('gender')
                                        <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="image">Image <span class="text-danger">*</span></label>
                                    <input type="file" name="image" class="form-control" id="image">
                                    @error('image')
                                        <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="image">
                                        <img style="width:150px;" id="show-image"
                                            src="{{ !empty($user->image) ? asset('storage/uploads/user/' . $user->image) : asset('noimg.png') }}"
                                            alt="User Image">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success">
                                    {{ @$user ? 'Update' : 'Save' }}
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
