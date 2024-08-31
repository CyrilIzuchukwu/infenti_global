@extends('layout.agent')
@section('content')

<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Profile</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="profile card card-body px-3 pt-3 pb-0">
                <div class="profile-head">
                    <div class="photo-content">
                        <div class="cover-photo rounded"></div>
                    </div>
                    <div class="profile-info">
                        <div class="profile-photo">
                            <img src="{{ asset('admin_assets/images/profile/profile.jpg') }}" class="img-fluid rounded-circle" alt="/">
                        </div>
                        <div class="profile-details">
                            <div class="profile-name px-3 pt-2">
                                <h4 class="text-muted mb-0">Name</h4>
                                <p>{{ Auth::user()->name }}</p>
                            </div>
                            <div class="profile-email px-2 pt-2">
                                <h4 class="text-muted mb-0">Email</h4>
                                <p>{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card h-auto">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <div class="tab-content">
                                <div id="profile-settings" class="tab-pane fade active show" role="tabpanel">
                                    <div class="pt-3">
                                        <div class="settings-form">
                                            <h4 class="text-primary">Update Password</h4>
                                            <form action="{{ route('agent_password_update') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="mb-3 col-md-12">
                                                        <label class="form-label">Current Password</label>
                                                        <input type="password" name="old_password" placeholder="Password" class="form-control" required>
                                                        <span class="text-danger">@error('old_password') {{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">New Password</label>
                                                        <input type="password" name="new_password" placeholder="Password" class="form-control" required>
                                                        <span class="text-danger">@error('new_password') {{ $message }} @enderror</span>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Confirm New Password</label>
                                                        <input type="password" name="new_password_confirmation" placeholder="Password" class="form-control" required>
                                                        <span class="text-danger">@error('new_password_confirmation') {{ $message }} @enderror</span>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" type="submit">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card h-auto">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <div class="tab-content">
                                <div id="profile-settings" class="tab-pane fade active show" role="tabpanel">
                                    <div class="pt-3">
                                        <div class="settings-form">
                                            <h4 class="text-primary">Account Setting</h4>
                                            <form action="{{ route('agent_profile_update') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="mb-3 col-md-12">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" name="name" placeholder="Name" class="form-control" value="{{ Auth::user()->name }}" required>
                                                    </div>
                                                    <div class="mb-3 col-md-12">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" name="email" placeholder="Email" class="form-control" value="{{ Auth::user()->email }}" required>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" type="submit">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection
