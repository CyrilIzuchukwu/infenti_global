@extends('layout.admin')
@section('content')

<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Agents</a></li>
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
                                    <th>Email</th>
                                    <!-- <th>Phone</th>
                                    <th class=" ps-5" style="min-width: 200px;"> Address</th> -->
                                    <th>Date Created</th>
                                    <th>Status</th>
                                    <th class="text-end pe-3">Action</th>
                                </tr>
                            </thead>
                            <tbody id="customers">
                                @foreach($agents as $agent)
                                <tr class="btn-reveal-trigger">
                                    <td class="py-3" style="color: #fff !important">
                                        <a href="javascript:void(0);">
                                            <div class="media d-flex align-items-center">
                                                <div class="avatar avatar-xl me-2" style="display: flex; justify-content: center; align-items: center; width: 30px; height: 30px; border-radius:50%; background: #000; color: #fff; font-weight: 700;">
                                                    {{ strtoupper(substr($agent->name, 0, 1)) }}
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mb-0 fs--1">{{ ucfirst($agent->name) }}</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="py-2">{{ $agent->email }}</td>
                                    <!-- <td class="py-2"> </td>
                                    <td class="py-2 ps-5">2392 Main Avenue, Penasauka</td> -->
                                    <td class="py-2"> {{$agent->created_at->format('M d, Y')}}</td>
                                    <td>
                                        @if($agent->active == 0)
                                        <div class="d-flex align-items-center"><i class="fas fa-circle text-danger me-1"></i>Banned</div>
                                        @elseif($agent->active == 1)
                                        <div class="d-flex align-items-center"><i class="fas fa-circle text-success me-1"></i> Active</div>
                                        @endif
                                    </td>
                                    <td class="py-2 text-end">
                                        <div class="dropdown"><button class="btn btn-primary tp-btn-light sharp" type="button" data-bs-toggle="dropdown" aria-expanded="false"><span class="fs--1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                        </g>
                                                    </svg></span></button>
                                            <div class="dropdown-menu dropdown-menu-end border py-0">
                                                <div class="py-2">

                                                    @if ($agent->active == 0)
                                                    <a class="dropdown-item" href="{{ route('unban_agent', $agent->id) }}" onclick="return confirm('Are you sure you want to unban this agent?')">Unban</a>
                                                    @else
                                                    <a class="dropdown-item" href="{{ route('ban_agent', $agent->id) }}" onclick="return confirm('Are you sure you want to ban this agent?')">Ban</a>
                                                    @endif

                                                    <a class="dropdown-item text-danger" onclick="return confirm('Are you sure you want to delete this agent?')" href="{{ route('delete_agent', $agent->id) }}">Delete</a>
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
