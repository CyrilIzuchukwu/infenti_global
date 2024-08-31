@extends('layout.admin')
@section('content')

<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Testimonial List</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped student-tbl">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Review</th>
                                    <th>Date Created</th>
                                    <th class="">Content</th>
                                    <th class="text-end pe-3">Action</th>
                                </tr>
                            </thead>
                            <tbody id="customers">
                                @foreach($testimonials as $testimonial)
                                <tr class="btn-reveal-trigger">
                                    <td class="py-3">
                                        <a href="javascript:void(0);">
                                            <div class="media d-flex align-items-center">
                                                <div class="avatar avatar-xl me-2">
                                                    <div class="">
                                                        <img class="img-fluid" src="{{ asset('client_images/' . $testimonial->client_image) }}" style="width: 100px; height: 100px; object-fit: cover; object-position: top;" alt="/">
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="mb-0">{{ ucfirst($testimonial->client_name) }}</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="py-2">
                                        {{ $testimonial->review }}
                                    </td>
                                    <td class="py-2">{{ $testimonial->created_at->format('M d, Y') }}</td>
                                    <td class="py-2" style="text-wrap: wrap;">
                                        {{ $testimonial->testimonial }}
                                    </td>
                                    <td class="py-2 text-end">
                                        <div class="dropdown">
                                            <button class="btn btn-primary tp-btn-light sharp" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span class="fs--1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                        </g>
                                                    </svg>
                                                </span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end border py-0">
                                                <div class="py-2">
                                                    <a class="dropdown-item" href="{{ route('edit_testimonial', $testimonial->id) }}" onclick="return confirm('Edit Testimonial?')">Edit</a>
                                                    <a class="dropdown-item text-danger" onclick="return confirm('Delete Testimonial?')" href="{{ route('delete_testimonial', $testimonial->id) }}">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>
</div>


@endsection
