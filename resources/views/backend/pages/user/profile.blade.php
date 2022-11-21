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
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Profile</h1>

            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-md-4 offset-md-4 mb-4">
            <div class="card shadow border-0 text-center p-0">
                <div class="profile-cover rounded-top" data-background="../assets/img/profile-cover.jpg"
                    style="height: 50px"></div>
                <div class="card-body pb-5">
                    <img src="{{ !empty($user->image) ? asset('storage/uploads/user/' . $user->image) : asset('noimg.png') }}"
                        class="avatar-xl rounded-circle mx-auto mt-n7 mb-4" alt="Neil Portrait">
                    <h4 class="h3">{{ $user->name }}</h4>
                    <p class="text-gray mb-4">{{ $user->address }}</p>
                    <table class="table table-bordered table-responsive">
                        <tbody>
                            <tr>
                                <td>Mobile No:</td>
                                <td>{{ $user->mobile }}</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>Gender:</td>
                                <td>{{ $user->gender }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a class="btn btn-sm btn-secondary mt-4 w-100" href="{{ route('profile.edit', $user->id) }}">
                        <svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
                            </path>
                        </svg>
                        Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
    <x-flash />
@endsection
