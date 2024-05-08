@extends('admin.dashboardcore')

@section('page-title', 'Dashboard | Products')

@section('page-heading', 'Edit Product')
@section('page-active-heading', 'Products')

@section('dashboard-content')
    <style>
        .dropzone {
            border: 2px dashed #ebebeb;
            border-radius: 5px;
            padding: 60px;
            text-align: center;
            color: #3d3d3d;
            cursor: pointer;
        }

        .dropzone.over {
            background-color: #f8f9fa;
        }

        .image-preview {
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .image-preview img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 5px;
        }

        .upload-img-icon {
            border: 2px dashed #ccc;
            height: 100px;
            background-color: #f9f9f9;
            position: relative;
            cursor: pointer;
        }
    </style>
    <div class="container-fluid">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('updateproduct') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-subtitle text-dark">
                                <b>Product Name</b>
                            </div>
                            <div class="form-group mb-3">
                                <input type="hidden" name="product_id" value="{{ $productinfo->id }}">
                                <input type="text" id="product_name" name="product_name"
                                    value="{{ $productinfo->product_name }}" placeholder="Short sleeve t-shirt"
                                    class="form-control">
                            </div>
                            <div class="card-subtitle text-dark mt-4">
                                <b>Short Description</b>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" id="product_name" name="product_short_description"
                                    value="{{ $productinfo->product_short_description }}"
                                    placeholder="Write a short description of your product" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="card-subtitle text-dark mt-4">
                                <b>Description</b>
                            </div>
                            <textarea class="textarea_editor form-control" name="product_long_description" rows="15"
                                placeholder="Enter text ..." style="height:350px">{{ $productinfo->product_long_description }}</textarea>
                        </div>
                    </div>

                    {{-- <div class="card">
                        <div class="card-body">
                            <div class="card-subtitle text-dark"><b>Media</b></div>
                            <div id="dropzone" class="dropzone">Drag and drop up to 5 images here or click to select</div>
                            <input type="file" id="product_img" name="product_img[]" accept="image/*" multiple
                                style="display: none;">
                            <div id="image-preview" class="image-preview"></div>
                        </div>
                    </div> --}}

                    <div class="card">
                        <div class="card-body">
                            <div class="card-subtitle text-dark"><b>Pricing</b></div>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="card-subtitle mt-3">Product Price <span class="text-danger">*</span></div>
                                    <input type="number" min="0" step="0.01" id="price" name="price"
                                        placeholder="0.00" value="{{ $productinfo->price }}" class="form-control" required>
                                </div>
                                <div class="col-md-12">
                                    <div class="card-subtitle mt-3">Discounted Price</div>
                                    <input type="number" min="0" step="0.01" id="price" name="discount_price"
                                        placeholder="0.00" value="{{ $productinfo->compare_price }}" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- right side --}}
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-subtitle text-dark">
                                <b>Product organization</b>
                            </div>
                            <div class="card-subtitle mt-3">Select collection for your product</div>
                            <select id="product_category_id" name="product_category_id" class="form-control">
                                <option value="0">Select collection</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $productinfo->product_category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>

                            <div class="card-subtitle mt-3">Select Category</div>
                            <select id="product_subcategory_id" name="product_subcategory_id" class="form-control">
                                <option value="0">Select category</option>
                                @foreach ($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}"
                                        {{ $productinfo->product_subcategory_id == $subcategory->id ? 'selected' : '' }}>
                                        {{ $subcategory->subcategory_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="card-subtitle text-dark"><b>Age range for product</b> <span class="text-danger">*</span></div>
                            <div class="row">
                                @php
                                    $ageRange = explode('|', $productinfo->ageRange);
                                @endphp
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <div class="card-subtitle mt-3">Age range (min) <span class="text-danger">*</span></div>
                                        <input type="number" id="quantity"  value="{{ $ageRange[0] }}" name="ageRange[]" placeholder="2"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <div class="card-subtitle mt-3">Age range (max) <span class="text-danger">*</span></div>
                                        <input type="number" id="quantity"  value="{{ $ageRange[1] }}" name="ageRange[]" placeholder="6"
                                            class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="card-subtitle text-dark"><b>Inventory</b></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <div class="card-subtitle mt-3">In Stock</div>
                                        <input type="number" id="quantity" value="{{ $productinfo->quantity }}" name="quantity" placeholder="1000"
                                            class="form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="px-3 mt-3">
                                    <input type="checkbox" value="true" name="continue_selling"
                                        style="width: 15px; height: 15px;">
                                    <span>Continue selling when out of stock</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="card-subtitle text-dark">
                                <b>Product Display</b>
                            </div>
                            <div class="px-3 mt-3">
                                <input type="checkbox" value="true" name="featured" style="width: 15px; height: 15px;"
                                    {{ $productinfo->featured ? 'checked' : '' }}>
                                <span>Featured Item</span>
                            </div>
                            <div class="px-3 mt-3">
                                <input type="checkbox" value="true" name="best_selling"
                                    style="width: 15px; height: 15px;" {{ $productinfo->best_selling ? 'checked' : '' }}>
                                <span>Best Selling</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-dark btn-sm mt-3">Save Product</button>
        </form>
    </div>
    <script src="{{ asset('js/dropimage.js') }}"></script>
@endsection
