@extends('layout.admin')
@section('content')

<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Contact / </a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)"> Enquiry</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped student-tbl">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Date</th>
                                    <th class="">Message</th>
                                    <th class="text-end pe-3">Action</th>
                                </tr>
                            </thead>
                            <tbody id="customers">
                                @foreach($enquiries as $enq)
                                <tr class="btn-reveal-trigger">
                                    <td class="py-3">
                                        {{ $enq->first_name }} {{ $enq->last_name }}
                                    </td>
                                    <td class="py-2">
                                        {{ $enq->email }}
                                    </td>
                                    <td class="py-2">{{ $enq->created_at->format('M d, Y') }}</td>

                                    <td class="py-2">
                                        {{ $enq->phone }}
                                    </td>

                                    <td class="py-2" style="text-wrap: wrap;">
                                        {{ $enq->message }}
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
                                                    <a class="dropdown-item text-danger" onclick="return confirm('Delete Message?')" href="{{ route('delete_message', $enq->id) }}">Delete</a>
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
