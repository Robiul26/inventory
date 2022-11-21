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
                <li class="breadcrumb-item"><a href="#">General Setting</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ @$data ? 'Edit' : 'Add new' }}

                </li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">
                    {{ @$data ? 'Edit Setting' : 'Create Setting' }}
                </h1>

            </div>
            <div>
                <a href="{{ route('setting.index') }}" class="btn btn-outline-gray"><i
                        class="far fa-question-circle me-1"></i> View All</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <!-- Form -->
                    <form action="{{ @$data ? route('setting.update', $data->id) : route('setting.store') }}"
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
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title"
                                        placeholder="Enter Title" value="{{ @$data->title }}"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Title'">
                                    @error('title')
                                        <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="text" name="email" class="form-control" id="email"
                                        placeholder="Enter email" value="{{ @$data->email }}"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
                                    @error('email')
                                        <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="phone">Phone <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" class="form-control" id="phone"
                                        placeholder="Enter phone" value="{{ @$data->phone }}"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter phone'">
                                    @error('phone')
                                        <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="mobile">Mobile <span class="text-danger">*</span></label>
                                    <input type="text" name="mobile" class="form-control" id="mobile"
                                        placeholder="Enter mobile" value="{{ @$data->mobile }}"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter mobile'">
                                    @error('mobile')
                                        <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="facebook">facebook </label>
                                    <input type="text" name="facebook" class="form-control" id="facebook"
                                        placeholder="Enter facebook" value="{{ @$data->facebook }}"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter facebook'">
                                    @error('facebook')
                                        <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="youtube">youtube </label>
                                    <input type="text" name="youtube" class="form-control" id="youtube"
                                        placeholder="Enter youtube" value="{{ @$data->youtube }}"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter youtube'">
                                    @error('youtube')
                                        <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="twitter">twitter </label>
                                    <input type="text" name="twitter" class="form-control" id="twitter"
                                        placeholder="Enter twitter" value="{{ @$data->twitter }}"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter twitter'">
                                    @error('twitter')
                                        <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="linkedin">Linkedin </label>
                                    <input type="text" name="linkedin" class="form-control" id="linkedin"
                                        placeholder="Enter linkedin" value="{{ @$data->linkedin }}"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter linkedin'">
                                    @error('linkedin')
                                        <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="keyword">Keyword</label>
                                    <textarea name="keyword" class="form-control" placeholder="Enter keyword..." id="keyword" rows="4"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter keyword...'">{{ @$data->keyword }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" placeholder="Enter Description..." id="description" rows="4"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Description...'">{{ @$data->description }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="address">Address</label>
                                    <textarea name="address" class="form-control" placeholder="Enter Address..." id="address" rows="4"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Address...'">{{ @$data->address }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="logo">Logo <span class="text-danger">*</span></label>
                                            <input type="file" id="logo" class="form-control" name="logo" />

                                            @error('logo')
                                                <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            @if (@$data)
                                                <label for="logo">
                                                    <img src="{{ url('storage/uploads/setting/' . $data->logo) }}"
                                                        style="height: 100px; width: 150px;">
                                                </label>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="favicon">Favicon <span class="text-danger">*</span></label>
                                            <input type="file" id="favicon" class="form-control" name="favicon" />

                                            @error('favicon')
                                                <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            @if (@$data)
                                                <label for="favicon">
                                                    <img src="{{ url('storage/uploads/setting/' . $data->favicon) }}"
                                                        style="height: 100px; width: 150px;">
                                                </label>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="banner_img">Banner</label>
                                            <input type="file" id="banner_img" class="form-control"
                                                name="banner_img" />

                                            @error('banner_img')
                                                <p class="alert alert-danger mt-1 p-1 text-center">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            @if (@$data)
                                                <label for="banner_img">
                                                    <img src="{{ url('storage/uploads/setting/' . $data->banner_img) }}"
                                                        style="height: 100px; width: 150px;">
                                                </label>
                                            @endif
                                        </div>
                                    </div>
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
