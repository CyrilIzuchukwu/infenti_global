@extends('layout.agent')
@section('content')




<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Property / </a></li>
            <li class="breadcrumb-item active"><a href=""> Edit Property</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Property</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('update_property', $data->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="row">
                                <div class="mb-4 col-lg-4 col-md-4" id="propertyTypeSelect">
                                    <label class="form-label">Property Type</label>
                                    <select class="form-select" name="property_type" aria-label="Default select example">
                                        <option selected disabled>Select Option</option>
                                        <option value="house" {{ old('property_type', $data->property_type) == 'house' ? 'selected' : '' }}>House</option>
                                        <option value="land" {{ old('property_type', $data->property_type) == 'land' ? 'selected' : '' }}>Land</option>
                                    </select>
                                    <span class="text-danger">@error('property_type') {{ $message }} @enderror</span>
                                </div>
                            </div>

                            <div class="mb-4 col-lg-4 col-md-6">
                                <label class="form-label">Title</label>
                                <input type="text" value="{{ old('title', $data->title) }}" name="title" class="form-control" placeholder="Property Title">
                                <span class="text-danger">@error ('title') {{ $message }} @enderror </span>
                            </div>



                            <div class="mb-4 col-lg-4 col-md-6">
                                <label class="form-label">Property Status</label>
                                <select class="form-select" name="property_status" aria-label="Default select example">
                                    <option selected disabled>Select Option</option>
                                    <option value="rent" {{ old('property_status', $data->property_status) == 'rent' ? 'selected' : '' }}>For Rent</option>
                                    <option value="sell" {{ old('property_status', $data->property_status) == 'sell' ? 'selected' : '' }}>For Sell</option>
                                </select>
                                <span class="text-danger">@error('property_status') {{ $message }} @enderror</span>
                            </div>
                            <div class="mb-4 col-lg-4 col-md-6">
                                <label class="form-label">Property Price</label>
                                <input type="number" name="price" class="form-control" placeholder="15000000" value="{{ old('price', $data->price) }}">
                                <span class="text-danger">@error('price') {{ $message }} @enderror</span>
                            </div>


                            <div class="col-md-12">
                                <div class="row">
                                    <div class="mb-4 col-lg-3 col-md-3">
                                        <label class="form-label">Area (Square Feet)</label>
                                        <input type="text" name="sqfeets" class="form-control" placeholder="85 sq ft" value="{{ old('sqfeets', json_decode($data->details)->sqfeets) }}">
                                        <span class="text-danger">@error('sqfeets') {{ $message }} @enderror</span>
                                    </div>

                                    @if($data->property_type == "house")
                                    <div class=" col-lg-9 col-md-9" id="details">
                                        <div class="row">
                                            <div class="mb-4  col-md-4">
                                                <label class="form-label">Beds</label>
                                                <input type="number" name="beds" class="form-control" placeholder="6" min="1" value="{{ old('beds', json_decode($data->details)->beds) }}">
                                                <span class="text-danger">@error('beds') {{ $message }} @enderror</span>
                                            </div>
                                            <div class="mb-4 col-md-4">
                                                <label class="form-label">Baths</label>
                                                <input type="number" name="baths" class="form-control" placeholder="3" min="1" value="{{ old('baths', json_decode($data->details)->baths) }}">
                                                <span class="text-danger">@error('baths') {{ $message }} @enderror</span>
                                            </div>
                                            <div class="mb-4  col-md-4">
                                                <label class="form-label">Year Built</label>
                                                <input type="number" name="year_built" class="form-control" placeholder="2020" value="{{ old('year_built', json_decode($data->details)->year_built) }}">
                                                <span class="text-danger">@error('year_built') {{ $message }} @enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3 mb-4">
                                <label class="form-label">Upload Property Image</label>
                                <div class="property-upload">
                                    <input type="file" name="property_image" id="propertyImageInput" accept=".png, .jpg, .jpeg">

                                    <label for="propertyImageInput" class="camera-icon">
                                        <img id="propertyImagePreview" src="{{ asset('property_images/' . $data->property_image) }}" class="property-image">
                                        <i class="flaticon-381-file-2"></i>
                                    </label>
                                </div>
                                <span class="text-danger">@error('property_image') {{ $message }} @enderror</span>
                            </div>


                            <div class="mb-4 col-md-12">
                                <label class="form-label">Description</label>
                                <textarea id="summernote" class="form-control" name="description" rows="3">{{ old('description', $data->description) }}</textarea>
                                <span class="text-danger">@error('description') {{ $message }} @enderror</span>
                            </div>



                            <div class="mb-4 col-sm-4">
                                <label class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Address of the property" value="{{ old('address', json_decode($data->location)->address) }}">
                                <span class="text-danger">@error('address') {{ $message }} @enderror</span>
                            </div>
                            <div class="mb-4 col-sm-4">
                                <label class="form-label">City</label>
                                <input type="text" name="city" class="form-control" placeholder="City" value="{{ old('city', json_decode($data->location)->city) }}">
                                <span class="text-danger">@error('city') {{ $message }} @enderror</span>
                            </div>

                            <div class="mb-4 col-sm-4">
                                <label class="form-label">State</label>
                                <input type="text" name="state" class="form-control" placeholder="State" value="{{ old('state', json_decode($data->location)->state) }}">
                                <span class="text-danger">@error('state') {{ $message }} @enderror</span>
                            </div>

                            @if($data->property_type == "house")
                            <div class="mb-4 col-12 additional_feature_section" id="additionalFeatureSection">
                                <label class="form-label d-block">Additional features</label>
                                @php
                                $additional_features = json_decode($data->additional_features) ?? [];
                                @endphp
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="additional_features[]" class="form-check-input" value="emergency_exit" id="flexRadioDefault4" {{ in_array('emergency_exit', old('additional_features', $additional_features)) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexRadioDefault4">Emergency Exit</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="additional_features[]" class="form-check-input" value="cctv" id="flexRadioDefault5" {{ in_array('cctv', old('additional_features', $additional_features)) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexRadioDefault5">CCTV</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="additional_features[]" class="form-check-input" value="water" id="flexRadioDefault6" {{ in_array('water', old('additional_features', $additional_features)) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexRadioDefault6">Water</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="additional_features[]" class="form-check-input" value="parking_space" id="flexRadioDefault7" {{ in_array('parking_space', old('additional_features', $additional_features)) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexRadioDefault7">Parking Space</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="additional_features[]" class="form-check-input" value="security" id="flexRadioDefault9" {{ in_array('security', old('additional_features', $additional_features)) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexRadioDefault9">Security</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="additional_features[]" class="form-check-input" value="electricity" id="flexRadioDefault12" {{ in_array('electricity', old('additional_features', $additional_features)) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexRadioDefault12">Electricity</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="additional_features[]" class="form-check-input" value="balcony" id="flexRadioDefault13" {{ in_array('balcony', old('additional_features', $additional_features)) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexRadioDefault13">Balcony</label>
                                </div>
                            </div>
                            @else
                            @endif



                            <!-- Display existing images with preview -->
                            <label class="form-label">Featured Images (Click to upload any other related image of the property)</label>
                            <div class="row" id="relatedImagesContainer">
                                @php
                                $related_images = json_decode($data->related_images) ?? [];
                                @endphp

                                @foreach ($related_images as $index => $image)
                                <div class="col-md-3 mb-4" id="imageUpload{{ $index }}">
                                    <div class="property-upload property-upload-related">
                                        <input type="file" name="related_images[]" id="relatedImageInput{{ $index + 1 }}" accept="image/*" onchange="previewImage(this, {{ $index + 1 }})">
                                        <label for="relatedImageInput{{ $index + 1 }}" class="camera-icon">
                                            <img id="relatedImagePreview{{ $index + 1 }}" class="property-image" src="{{ asset('related_images/' . $image) }}" alt="Upload Image">
                                            <i class="flaticon-381-file-2 property-icon"></i>
                                        </label>
                                        <!-- <button type="button" class="btn removebtn btn-danger btn-sm mt-2" onclick="removeImage({{ $index + 1 }})">X</button> -->
                                    </div>
                                    <span class="text-danger">@error('related_images.' . $index) {{ $message }} @enderror</span>
                                    <span class="text-danger" id="errorMessage{{ $index + 1 }}"></span>
                                </div>
                                @endforeach
                            </div>

                            <!-- Button to add more images -->
                            <div class="add-more">
                                <button type="button" class="btn btn-primary add-more" onclick="addMore()"><i class="ri-add-line"></i> Add More Images</button>
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

    .property-upload .removebtn {
        position: absolute;
        right: 0;
        top: -10px;
    }
</style>

<style>
    .add-more {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 10px;
        cursor: pointer;
        color: #333;
        font-size: 14px;
        font-weight: 500;
    }

    .add-more i {
        font-size: 16px;
        margin-right: 8px;
    }
</style>




<script>
    let imageIndex = {{ count($related_images) }};
    let initialImageCount = imageIndex;
    const maxImages = 10; // Maximum number of images allowed

    // Function to add more images
    function addMore() {
        // Only check inputs that were dynamically added
        if (imageIndex > initialImageCount) {
            const lastImageInput = document.querySelector(`#relatedImageInput${imageIndex}`);
            const lastErrorMessage = document.querySelector(`#errorMessage${imageIndex}`);

            if (lastImageInput && !lastImageInput.value) {
                lastErrorMessage.innerText = 'Please provide an image for the current one before adding more.';
                return;
            } else {
                lastErrorMessage.innerText = '';
            }
        }

        // Check if the maximum number of images is reached
        if (imageIndex >= maxImages) {
            swal("Error!", "You cannot add more than 10 images.", "error");
            return;
        }

        imageIndex++;
        const container = document.getElementById('relatedImagesContainer');
        const newImageUpload = `
            <div class="col-md-3 mb-4" id="imageUpload${imageIndex}">
                <div class="property-upload property-upload-related">
                    <input type="file" name="related_images[]" id="relatedImageInput${imageIndex}" accept="image/*" onchange="previewImage(this, ${imageIndex})">
                    <label for="relatedImageInput${imageIndex}" class="camera-icon">
                        <img id="relatedImagePreview${imageIndex}" class="property-image" src="{{ asset('admin_assets/images/fade.png') }}" alt="Upload Image">
                        <i class="flaticon-381-file-2 property-icon"></i>
                    </label>
                </div>
                <span class="text-danger" id="errorMessage${imageIndex}"></span>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', newImageUpload);

        // Automatically open the file dialog for the new input
        document.getElementById(`relatedImageInput${imageIndex}`).click();
    }

    // Function to preview images
    function previewImage(input, index) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById(`relatedImagePreview${index}`).src = e.target.result;
            document.getElementById(`errorMessage${index}`).innerText = ''; // Clear the error message
        }
        reader.readAsDataURL(input.files[0]);
    }

    // Function to remove image
    function removeImage(index) {
        const imageCol = document.getElementById(`imageUpload${index}`);
        if (imageCol) {
            imageCol.remove();
        }
    }
</script>


<script>
    // document.getElementById('propertyImageInput').addEventListener('change', function(event) {
    //     const file = event.target.files[0];
    //     if (file) {
    //         const reader = new FileReader();
    //         reader.onload = function(e) {
    //             document.getElementById('propertyImagePreview').src = e.target.result;
    //         };
    //         reader.readAsDataURL(file);
    //     }
    // });


    // document.addEventListener('change', function(event) {
    //     if (event.target && event.target.matches('input[type="file"]')) {
    //         const inputId = event.target.id;
    //         const previewId = 'relatedImagePreview' + inputId.slice(-1);
    //         const file = event.target.files[0];
    //         if (file) {
    //             const reader = new FileReader();
    //             reader.onload = function(e) {
    //                 document.getElementById(previewId).src = e.target.result;
    //             };
    //             reader.readAsDataURL(file);
    //         }
    //     }
    // });

    // document.addEventListener('DOMContentLoaded', function() {
    //     var propertyTypeSelect = document.getElementById('propertyTypeSelect');
    //     var additionalFeatureSection = document.getElementById('additionalFeatureSection');
    //     var detailsSection = document.getElementById('details');


    //     function toggleSections() {
    //         if (propertyTypeSelect.value === 'house') {
    //             additionalFeatureSection.style.display = 'block';
    //             detailsSection.style.display = 'block';
    //         } else {
    //             additionalFeatureSection.style.display = 'none';
    //             detailsSection.style.display = 'none';
    //         }
    //     }


    //     toggleSections();

    //     propertyTypeSelect.addEventListener('change', toggleSections);
    // });
</script>

@endsection
