@extends('layout.admin')
@section('content')



<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Testimonial / </a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)"> Edit Testimonial </a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Testimonial</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('update_testimonial', $data->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-4 col-lg-6 col-md-6">
                                <label class="form-label">Client Name</label>
                                <input type="text" value="{{ old('client_name', $data->client_name) }}" name="client_name" class="form-control" placeholder="Client Name">
                                <span class="text-danger">@error ('client_name') {{ $message }} @enderror </span>
                            </div>

                            <div class="mb-4 col-lg-6 col-md-6">
                                <label class="form-label">Review</label>
                                <select class="form-select" name="review" aria-label="Default select example">
                                    <option value="5" {{ old('review', $data->review) == '5' ? 'selected' : '' }}>5</option>
                                    <option value="4" {{ old('review', $data->review) == '4' ? 'selected' : '' }}>4</option>
                                    <option value="3" {{ old('review', $data->review) == '3' ? 'selected' : '' }}>3</option>
                                    <option value="2" {{ old('review', $data->review) == '2' ? 'selected' : '' }}>2</option>
                                    <option value="1" {{ old('review', $data->review) == '1' ? 'selected' : '' }}>1</option>
                                </select>
                                <span class="text-danger">@error('review') {{ $message }} @enderror</span>
                            </div>



                            <div class="col-md-3 mb-4">
                                <label class="form-label">Client Profile</label>
                                <div class="property-upload">
                                    <input type="file" name="client_image" id="propertyImageInput" accept=".png, .jpg, .jpeg">

                                    <label for="propertyImageInput" class="camera-icon">
                                        <img id="propertyImagePreview" src="{{ asset('client_images/' . $data->client_image) }}" class="property-image">
                                        <i class="flaticon-381-file-2"></i>
                                    </label>
                                </div>
                                <span class="text-danger">@error('client_image') {{ $message }} @enderror</span>
                            </div>


                            <div class="mb-4 col-md-12">
                                <label class="form-label">Content</label>
                                <textarea id="summernote" class="form-control" name="testimonial" rows="5">{{ old('testimonial', $data->testimonial) }}</textarea>
                                <span class="text-danger">@error('testimonial') {{ $message }} @enderror</span>
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

<style>
    .property-upload {
        position: relative;
        width: 100%;
        height: 200px;
        cursor: pointer;
        background: #eee;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .property-upload input[type="file"] {
        display: none;
    }

    .camera-icon {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    .property-upload i {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .property-icon {
        font-size: 18px;
        color: #666;
    }

    .property-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        cursor: pointer;
    }

    .property-upload-related {
        position: relative;
        width: 100%;
        height: 200px;
        cursor: pointer;
        background: #eee;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<script>
    document.getElementById('propertyImageInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('propertyImagePreview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>

@endsection
