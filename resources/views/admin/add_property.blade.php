@extends('layout.admin')
@section('content')

<div class="container-fluid">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Property / </a></li>
            <li class="breadcrumb-item active"><a href=""> Add Property</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Property</h4>
                </div>
                <div class="card-body">
                    <form method="POST" id="forHouse" action="{{ route('store_property') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="row">
                                <div class="mb-4 col-lg-4 col-md-6">
                                    <label class="form-label">Property Type</label>
                                    <select class="form-select" id="propertyTypeSelect" name="property_type" aria-label="Default select example">
                                        <option selected disabled>Select Option</option>
                                        <option value="house" {{ old('property_type') == 'house' ? 'selected' : '' }}>House</option>
                                        <option value="land" {{ old('property_type') == 'land' ? 'selected' : '' }}>Land</option>
                                    </select>
                                    <span class="text-danger">@error('property_type') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="mb-4 col-lg-4 col-md-6">
                                <label class="form-label">Title</label>
                                <input type="text" value="{{ old('title') }}" name="title" class="form-control" placeholder="Property Title">
                                <span class="text-danger">@error ('title') {{ $message }} @enderror </span>
                            </div>



                            <div class="mb-4 col-lg-4 col-md-6">
                                <label class="form-label">Property Status</label>
                                <select class="form-select" name="property_status" aria-label="Default select example">
                                    <option selected disabled>Select Option</option>
                                    <option value="rent" {{ old('property_status') == 'rent' ? 'selected' : '' }}>For Rent</option>
                                    <option value="sell" {{ old('property_status') == 'sell' ? 'selected' : '' }}>For Sell</option>
                                </select>
                                <span class="text-danger">@error('property_status') {{ $message }} @enderror</span>
                            </div>
                            <div class="mb-4 col-lg-4 col-md-6">
                                <label class="form-label">Property Price (Naira)</label>
                                <input type="number" name="price" class="form-control" placeholder="15000000" value="{{ old('price') }}">
                                <span class="text-danger">@error('price') {{ $message }} @enderror</span>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="mb-4  col-md-3">
                                        <label class="form-label">Area (Square Feet)</label>
                                        <input type="number" name="sqfeets" class="form-control" placeholder="eg. 1140" value="{{ old('sqfeets') }}">
                                        <span class="text-danger">@error('sqfeets') {{ $message }} @enderror</span>
                                    </div>

                                    <div class="col-md-9" id="details">
                                        <div class="row">
                                            <div class="mb-4  col-md-4">
                                                <label class="form-label">Beds</label>
                                                <input type="number" name="beds" class="form-control" placeholder="eg. 5" min="1" value="{{ old('beds') }}">
                                                <span class="text-danger">@error('beds') {{ $message }} @enderror</span>
                                            </div>
                                            <div class="mb-4 col-md-4">
                                                <label class="form-label">Baths</label>
                                                <input type="number" name="baths" class="form-control" placeholder="eg. 3" min="1" value="{{ old('baths') }}">
                                                <span class="text-danger">@error('baths') {{ $message }} @enderror</span>
                                            </div>
                                            <div class="mb-4  col-md-4">
                                                <label class="form-label">Year Built</label>
                                                <input type="number" name="year_built" class="form-control" placeholder="eg. 2019" value="{{ old('year_built') }}">
                                                <span class="text-danger">@error('year_built') {{ $message }} @enderror</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 mb-4">
                                <label class="form-label">Upload Property Image</label>
                                <div class="property-upload">
                                    <input type="file" name="property_image" id="propertyImageInput" accept=".png, .jpg, .jpeg">

                                    <label for="propertyImageInput" class="camera-icon">
                                        <img id="propertyImagePreview" class="property-image">
                                        <i class="flaticon-381-file-2"></i>
                                    </label>
                                </div>
                                <span class="text-danger">@error('property_image') {{ $message }} @enderror</span>
                            </div>


                            <div class="mb-4 col-md-12">
                                <label class="form-label">Description</label>
                                <textarea id="summernote" class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
                                <span class="text-danger">@error('description') {{ $message }} @enderror</span>
                            </div>



                            <div class="mb-4 col-sm-4">
                                <label class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Address of the property" value="{{ old('address') }}">
                                <span class="text-danger">@error('address') {{ $message }} @enderror</span>
                            </div>
                            <div class="mb-4 col-sm-4">
                                <label class="form-label">City</label>
                                <input type="text" name="city" class="form-control" placeholder="City" value="{{ old('city') }}">
                                <span class="text-danger">@error('city') {{ $message }} @enderror</span>
                            </div>

                            <div class="mb-4 col-sm-4">
                                <label class="form-label">State</label>
                                <input type="text" name="state" class="form-control" placeholder="State" value="{{ old('state') }}">
                                <span class="text-danger">@error('state') {{ $message }} @enderror</span>
                            </div>

                            <div class="mb-4 col-12 additional_feature_section" id="additionalFeatureSection">
                                <label class="form-label d-block">Additional features (Tick additional Features)</label>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="additional_features[]" class="form-check-input" value="emergency_exit" id="flexRadioDefault4" {{ is_array(old('additional_features')) && in_array('emergency_exit', old('additional_features')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexRadioDefault4">Emergency Exit</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="additional_features[]" class="form-check-input" value="cctv" id="flexRadioDefault5" {{ is_array(old('additional_features')) && in_array('cctv', old('additional_features')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexRadioDefault5">CCTV</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="additional_features[]" class="form-check-input" value="water" id="flexRadioDefault6" {{ is_array(old('additional_features')) && in_array('water', old('additional_features')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexRadioDefault6">Water</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="additional_features[]" class="form-check-input" value="parking_space" id="flexRadioDefault7" {{ is_array(old('additional_features')) && in_array('parking_space', old('additional_features')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexRadioDefault7">Parking Space</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="additional_features[]" class="form-check-input" value="security" id="flexRadioDefault9" {{ is_array(old('additional_features')) && in_array('security', old('additional_features')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexRadioDefault9">Security</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="additional_features[]" class="form-check-input" value="electricity" id="flexRadioDefault12" {{ is_array(old('additional_features')) && in_array('electricity', old('additional_features')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexRadioDefault12">Electricity</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="additional_features[]" class="form-check-input" value="balcony" id="flexRadioDefault13" {{ is_array(old('additional_features')) && in_array('balcony', old('additional_features')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexRadioDefault13">Balcony</label>
                                </div>
                            </div>


                            <label class="form-label">Featured Images (Click to upload any other related image of the property)</label>
                            <div class="row" id="relatedImagesContainer">
                                <div class="col-md-3 mb-4">
                                    <div class="property-upload property-upload-related">
                                        <input type="file" name="related_images[]" id="relatedImageInput1" accept="image/*" onchange="previewImage(this, 1)">
                                        <label for="relatedImageInput1" class="camera-icon">
                                            <img id="relatedImagePreview1" class="property-image" src="{{ asset('admin_assets/images/fade.png') }}" alt="Upload Image">
                                            <i class="flaticon-381-file-2 property-icon"></i>
                                        </label>
                                        <!-- <button type="button" class="btn removebtn btn-danger mt-2" onclick="removeImage(1)"> X </button> -->
                                    </div>

                                    <span class="text-danger" id="errorMessage1">@error('related_images.0') {{ $message }} @enderror</span>
                                </div>
                            </div>

                            <div class="add-more" onclick="addMoreImages()">
                                <button type="button" class="btn btn-primary add-more" id="addMoreImages">
                                    <i class="ri-add-line"></i> Add More Images
                                </button>
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
    document.addEventListener('DOMContentLoaded', function() {
        var propertyTypeSelect = document.getElementById('propertyTypeSelect');
        var additionalFeatureSection = document.getElementById('additionalFeatureSection');
        var detailsSection = document.getElementById('details');

        // Function to toggle additional features and details section
        function toggleSections() {
            if (propertyTypeSelect.value === 'house') {
                additionalFeatureSection.style.display = 'block';
                detailsSection.style.display = 'block';
            } else {
                additionalFeatureSection.style.display = 'none';
                detailsSection.style.display = 'none';
            }
        }

        // Initial check
        toggleSections();

        // Add event listener for change
        propertyTypeSelect.addEventListener('change', toggleSections);
    });
</script>

<script>
    let imageCounterCount = 1;
    const maxImages = 10; // Maximum number of images allowed

    function previewImage(input, index) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('relatedImagePreview' + index).src = e.target.result;
                document.getElementById('errorMessage' + index).innerText = ''; // Clear the error message when the image is successfully uploaded
            }
            reader.readAsDataURL(file);
        }
    }

    function addMoreImages() {
        // Check if the maximum number of images is reached
        if (imageCounterCount >= maxImages) {
            swal("Error!", "You cannot add more than 10 images.", "error");
            return;
        }

        // Check if the last input has an image before adding a new one
        const lastImageInput = document.querySelector(`#relatedImageInput${imageCounterCount}`);
        const lastErrorMessage = document.querySelector(`#errorMessage${imageCounterCount}`);

        if (lastImageInput && !lastImageInput.value) {
            lastErrorMessage.innerText = 'Please provide an image for the current one before adding more.';
            return;
        } else {
            lastErrorMessage.innerText = ''; // Clear the error message if the last input is valid
        }

        imageCounterCount++;
        const newImageInput = `
            <div class="col-md-3 mb-4" id="imageCol${imageCounterCount}">
                <div class="property-upload property-upload-related">
                    <input type="file" name="related_images[]" id="relatedImageInput${imageCounterCount}" accept="image/*" onchange="previewImage(this, ${imageCounterCount})">
                    <label for="relatedImageInput${imageCounterCount}" class="camera-icon">
                        <img id="relatedImagePreview${imageCounterCount}" class="property-image" src="{{ asset('admin_assets/images/fade.png') }}" alt="Upload Image">
                        <i class="flaticon-381-file-2 property-icon"></i>
                    </label>
                </div>
                <span class="text-danger" id="errorMessage${imageCounterCount}"></span>
            </div>
        `;
        // Insert the new image input into the DOM
        document.getElementById('relatedImagesContainer').insertAdjacentHTML('beforeend', newImageInput);

        // Automatically open the file dialog for the new input
        document.getElementById(`relatedImageInput${imageCounterCount}`).click();
    }

    function removeImage(index) {
        const imageCol = document.getElementById(`imageCol${index}`);
        if (imageCol) {
            imageCol.remove();
        }
    }
</script>


@endsection
