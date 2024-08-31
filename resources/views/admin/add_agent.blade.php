@extends('layout.admin')
@section('content')

<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Agents</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Agent</h4>
                </div>
                <div class="card-body wizard-box">
                    <div class="wizard-step-container">

                        <div class="wizard-form-details log-in">
                            <div class="wizard-step-1 d-block">
                                <form class="row" action="{{ route('create_agent') }}" method="POST">
                                    @csrf
                                    <div class="mb-4 col-md-12 col-sm-6">
                                        <label class="form-label required"> Name </label>
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Agent Name" required="">
                                        <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                                    </div>

                                    <div class="form-group col-md-6 col-sm-6">
                                        <label class="form-label required" value="{{ old('email') }}">Email Address </label>
                                        <input type="text" class="form-control" name="email" placeholder="Valid email.." required="">
                                        <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                                    </div>

                                    <div class="form-group col-md-6 col-sm-6">
                                        <label class="form-label required">Password </label>
                                        <input type="password" class="form-control" name="password" placeholder="Password" required="">
                                        <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                                    </div>


                                    <div class="next-btn text-end col-sm-12">
                                        <button type="submit" class="btn btn-primary next1 ">
                                            Submit
                                            <i class="fas fa-arrow-right ms-2"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
