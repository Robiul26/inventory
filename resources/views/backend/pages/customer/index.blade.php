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
                <li class="breadcrumb-item active" aria-current="page">All Customer</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Customer List</h1>

            </div>
            <div>
                <a href="{{ route('customer.create') }}" class="btn btn-outline-gray"><i
                        class="far fa-question-circle me-1"></i> Add new</a>
            </div>
        </div>
    </div>




    <div class="card border-0 shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">SL.</th>
                            <th class="border-0 rounded-start">Name</th>
                            <th class="border-0">Mobile</th>
                            <th class="border-0">Email</th>
                            <th class="border-0">Address</th>
                            <th class="border-0">Status</th>
                            <th class="border-0">Created By</th>
                            <th class="border-0">Updated By</th>
                            <th class="border-0 rounded-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Item -->
                        @foreach ($customers as $key => $data)
                            <tr>
                                <td class="border-0">
                                    {{ $key+1 }}
                                </td>
                                <td class="border-0">
                                    {{ $data->name }}
                                </td>
                                <td class="border-0">
                                    {{ $data->mobile }}
                                </td>
                                <td class="border-0">
                                    {{ $data->email }}
                                </td>
                                <td class="border-0">
                                    {{ $data->address }}
                                </td>
                                <td class="border-0">
                                    {{ $data->status }}
                                </td>
                                <td class="border-0">
                                    {{ $data->created_by }}
                                </td>
                                <td class="border-0">
                                    {{ $data->updated_by }}
                                </td>
                                <td class="border-0">
                                    <div class="btn-group">
                                        <a class="btn btn-warning btn-sm" href="{{ route('customer.edit', $data->id) }}">
                                            Edit
                                        </a>
                                        <form action="{{ route('customer.destroy', $data->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Are You Sure ?')"
                                                class="btn btn-danger btn-sm">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                        <!-- End of Item -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <x-flash />
@endsection
