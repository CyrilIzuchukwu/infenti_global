@extends('layout.admin')
@section('content')





<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Property / </a></li>
            <li class="breadcrumb-item active"><a href=""> Add FAQs</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Frequetly Asked Question</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('store_faq') }}">
                        @csrf
                        <div class="row">

                            <div class="mb-4 col-lg-12 col-md-12">
                                <label class="form-label">Question</label>
                                <input type="text" value="{{ old('question') }}" name="question" class="form-control" placeholder="Question">
                                <span class="text-danger">@error ('question') {{ $message }} @enderror </span>
                            </div>




                            <div class="mb-4 col-md-12">
                                <label class="form-label">Answer</label>
                                <textarea class="form-control" name="answer" placeholder="Answer" rows="4">{{ old('answer') }}</textarea>
                                <span class="text-danger">@error('answer') {{ $message }} @enderror</span>
                            </div>


                            <div class="col-sm-12 pt-3">
                                <button type="submit" class="btn btn-lg btn-primary me-2">Submit</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Frequently Asked Question List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($faq_datas as $data)
                                <tr>
                                    <td>{{ $data->question }}</td>
                                    <td>{{ $data->answer }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('edit_faq', $data->id) }}" onclick="return confirm('Are you sure you want to edit this FAQ?')" title="Edit" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i> </a>

                                            <a href="{{ route('delete_faq', $data->id) }}" onclick="return confirm('Are you sure you want to edit delete this FAQ?')" title="Delete" class="btn btn-danger shadow btn-xs sharp"><i class="fas fa-trash"></i> </a>
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
