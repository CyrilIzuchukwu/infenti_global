@extends('layout.admin')
@section('content')





<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Property / </a></li>
            <li class="breadcrumb-item active"><a href=""> Edit FAQ</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Frequetly Asked Question</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('update_faq', $data->id) }}">
                        @csrf
                        <div class="row">

                            <div class="mb-4 col-lg-12 col-md-12">
                                <label class="form-label">Question</label>
                                <input type="text" value="{{ old('question', $data->question) }}" name="question" class="form-control" placeholder="Question">
                                <span class="text-danger">@error ('question') {{ $message }} @enderror </span>
                            </div>




                            <div class="mb-4 col-md-12">
                                <label class="form-label">Answer</label>
                                <textarea class="form-control" name="answer" placeholder="Answer" rows="4">{{ old('answer', $data->answer) }}</textarea>
                                <span class="text-danger">@error('answer') {{ $message }} @enderror</span>
                            </div>


                            <div class="col-sm-12 pt-3">
                                <button type="submit" class="btn btn-lg btn-primary me-2">Update</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
