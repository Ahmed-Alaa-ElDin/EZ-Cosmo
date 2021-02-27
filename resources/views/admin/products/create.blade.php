@extends('layouts.master')

@section('style')
    <style>
        .select2-selection__rendered {
            margin-top: 0 !important;
        }

        .select2-selection--multiple {
            border: 1px solid rgba(209, 213, 219) !important;
        }

        .select2-search__field {
            padding-left: 6px !important;
        }

        .select2-selection__choice {
            background-color: #007bff !important;
            border-radius: 15px !important;
            padding: 0 8px !important;
            box-shadow: : 0 1px 2px 0 rgba(0, 0, 0, 0.05) !important;
            border: 1px ​solid #fff !important;
        }

        .select2-selection__choice__remove {
            color: beige !important;
            margin-right: 5px !important;
        }

    </style>
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            New Product
            @if (!old('line'))
                {{ 'sadadas' }}
            @else
                {{ 'ahmed' }}
            @endif
            <small>Create</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-body shadow">
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        {{-- Brand --}}
                        <div class="col-lg-4 form-group my-3">
                            <div class="flex justify-center">
                                <label for="brand" class="min-w-max mr-3 my-auto">Brand</label>
                                <select name="brand"
                                    class="form-control focus:border-blue-200 focus:ring-blue-200 @error('brand') border-red-300 @else border-gray-300 @enderror rounded w-75 pr-5 singleSelect"
                                    id="brand">
                                    <option value="">Choose Brand</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}" @if (old('brand') == $brand->id) selected @endif>
                                            {{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('brand')
                                <div class="text-red-500 text-center mt-2 font-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Lines --}}
                        <div class="col-lg-4 form-group my-3">
                            <div class="flex justify-center">
                                <label for="line" class="min-w-max mr-3 my-auto">Line</label>
                                <select name="line"
                                    class="form-control focus:border-blue-200 focus:ring-blue-200 rounded w-75 pr-5 singleSelect"
                                    id="line">
                                    <option value="">Choose Line</option>
                                </select>
                            </div>
                        </div>

                        {{-- Categories --}}
                        <div class="col-lg-4 form-group my-3">
                            <div class="flex justify-center">
                                <label for="category" class="min-w-max mr-3 my-auto">Category</label>
                                <select name="category"
                                    class="form-control focus:border-blue-200 focus:ring-blue-200 @error('category') border-red-300 @else border-gray-300 @enderror rounded w-75 pr-5 singleSelect">
                                    <option value="">Choose Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if (old('category') == $category->id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category')
                                <div class="text-red-500 text-center mt-2 font-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Name --}}
                        <div class="col-lg-5 form-group my-3">
                            <div class="flex justify-center">
                                <label for="name" class="min-w-max mr-3 my-auto">Name</label>
                                <input type="text"
                                    class="form-control focus:border-blue-200 focus:ring-blue-200 @error('name') border-red-300 @else border-gray-300 @enderror rounded w-80"
                                    name="name" value="{{ old('name') }}" placeholder="Enter Product Name">
                            </div>
                            @error('name')
                                <div class="text-red-500 text-center mt-2 font-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Dosage Form --}}
                        <div class="col-lg-3 form-group my-3">
                            <div class="flex justify-center">
                                <label for="form" class="min-w-max mr-3 my-auto">Form</label>
                                <select name="form"
                                    class="form-control focus:border-blue-200 focus:ring-blue-200 @error('form') border-red-300 @else border-gray-300 @enderror rounded w-75 pr-5 singleSelect">
                                    <option value="">Choose Pharmaceutical Form</option>
                                    @foreach ($forms as $form)
                                        <option value="{{ $form->id }}" @if (old('form') == $form->id) selected @endif>
                                            {{ $form->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('form')
                                <div class="text-red-500 text-center mt-2 font-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Volume --}}
                        <div class="col-lg-4 form-group my-3">
                            <div class="input-group">
                                <label for="validationTooltipUsername" class="min-w-max mr-3 my-auto">Volume |
                                    Weight</label>
                                <input type="number" step="any" name="volume"
                                    class="form-control w-25 text-center focus:border-blue-200 focus:ring-blue-200 @error('volume') border-red-300 @else border-gray-300 @enderror"
                                    style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;"
                                    value="{{ old('volume') }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"
                                        style="border-top-right-radius: 0.25rem; border-bottom-right-radius: 0.25rem;"
                                        id="validationTooltipUsernamePrepend">Ml. | Gm.</span>
                                </div>
                            </div>
                            @error('volume')
                                <div class="text-red-500 text-center mt-2 font-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Units --}}
                        <div class="col-lg-2 form-group my-3">
                            <div class="flex justify-center">
                                <label for="units" class="min-w-max mr-3 my-auto">Units</label>
                                <input type="number" step="any"
                                    class="form-control text-center focus:border-blue-200 focus:ring-blue-200 @error('units') border-red-300 @else border-gray-300 @enderror rounded w-75"
                                    name="units" value="{{ old('units', 1) }}">
                            </div>
                            @error('units')
                                <div class="text-red-500 text-center mt-2 font-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Price --}}
                        <div class="offset-lg-1 col-lg-3 form-group my-3">
                            <div class="input-group">
                                <label for="validationTooltipUsername" class="min-w-max mr-3 my-auto">Price</label>
                                <input type="number" step="any" name="price"
                                    class="form-control w-25 text-center focus:border-blue-200 focus:ring-blue-200 @error('price') border-red-300 @else border-gray-300 @enderror"
                                    style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;" value="{{ old('price') }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"
                                        style="border-top-right-radius: 0.25rem; border-bottom-right-radius: 0.25rem;"
                                        id="validationTooltipUsernamePrepend">EGP</span>
                                </div>
                            </div>
                            @error('price')
                                <div class="text-red-500 text-center mt-2 font-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Code --}}
                        <div class="offset-lg-1 col-lg-5 form-group my-3">
                            <div class="flex justify-center">
                                <label for="code" class="min-w-max mr-3 my-auto">Code</label>
                                <input type="text"
                                    class="form-control focus:border-blue-200 focus:ring-blue-200 @error('code') border-red-300 @else border-gray-300 @enderror rounded w-80"
                                    name="code" value="{{ old('code') }}" placeholder="Enter Product Code">
                            </div>
                            @error('code')
                                <div class="text-red-500 text-center mt-2 font-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Indications --}}
                        <div class="col-lg-6 form-group my-3">
                            <div class="flex justify-center">
                                <label for="indication" class="min-w-max mr-3 my-auto">Indications</label>
                                <select name="indication[]"
                                    class="form-control focus:border-blue-200 focus:ring-blue-200 @error('indication') border-red-300 @else border-gray-300 @enderror rounded w-75 pr-5 multiSelect"
                                    id="indication" multiple>
                                    @foreach ($indications as $indication)
                                        <option value="{{ $indication->id }}">{{ $indication->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('indication')
                                <div class="text-red-500 text-center mt-2 font-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Images --}}
                        <div class="col-lg-6 form-group my-3">
                            <div class="flex justify-center custom-file">
                                <label for="image" class="min-w-max mr-3 my-auto">Images</label>
                                <div class="custom-file">
                                    <input type="file" name="image[]" class="custom-file-input" id="images" multiple>
                                    <label class="custom-file-label" for="images" id="imagesLable">Choose file...</label>
                                </div>
                            </div>
                            @error('image')
                                <div class="text-red-500 text-center mt-2 font-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Directions --}}
                        <div class="col-lg-6 form-group my-3">
                            <label for="direction" class="min-w-max mr-3 mb-2">Directions of Use</label>
                            <div class="flex justify-center">
                                <textarea type="text"
                                    class="form-control focus:border-blue-200 focus:ring-blue-200 @error('direction') border-red-300 @else border-gray-300 @enderror rounded w-100"
                                    name="direction"
                                    placeholder="Enter Product Directions of use (e.g. 1- Clean the Skin area. 2- Apply ...)">{{ old('direction') }}</textarea>
                            </div>
                            @error('direction')
                                <div class="text-red-500 text-center mt-2 font-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Notes --}}
                        <div class="col-lg-6 form-group my-3">
                            <label for="note" class="min-w-max mr-3 mb-2">Notes</label>
                            <div class="flex justify-center">
                                <textarea type="text"
                                    class="form-control focus:border-blue-200 focus:ring-blue-200 @error('note') border-red-300 @else border-gray-300 @enderror rounded w-100"
                                    name="note"
                                    placeholder="Enter extra notes if present of use (e.g. Don't use with 'Urea' containing products ...)">{{ old('note') }}</textarea>
                            </div>
                            @error('note')
                                <div class="text-red-500 text-center mt-2 font-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Advantages --}}
                        <div class="col-lg-6 form-group my-3">
                            <label for="advantage" class="min-w-max mr-3 mb-2">Product's Advantages</label>
                            <div class="flex justify-center">
                                <textarea type="text"
                                    class="form-control focus:border-blue-200 focus:ring-blue-200 @error('advantage') border-red-300 @else border-gray-300 @enderror rounded w-100"
                                    name="advantage"
                                    placeholder="Enter product's advantages (e.g. Suitable for sensitive skin ...)">{{ old('advantage') }}</textarea>
                            </div>
                            @error('advantage')
                                <div class="text-red-500 text-center mt-2 font-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Disadvantages --}}
                        <div class="col-lg-6 form-group my-3">
                            <label for="disadvantage" class="min-w-max mr-3 mb-2">Product's Disadvantages</label>
                            <div class="flex justify-center">
                                <textarea type="text"
                                    class="form-control focus:border-blue-200 focus:ring-blue-200 @error('disadvantage') border-red-300 @else border-gray-300 @enderror rounded w-100"
                                    name="disadvantage"
                                    placeholder="Enter product's disadvantages (e.g. High price ...)">{{ old('disadvantage') }}</textarea>
                            </div>
                            @error('disadvantage')
                                <div class="text-red-500 text-center mt-2 font-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Buttons --}}
                        <div class="flex offset-lg-3 col-lg-6  mx-auto justify-between my-3">
                            <button class="btn btn-success text-white font-bold">Save Product</button>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-danger font-bold">Cancel</a>
                        </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('script')
    {{-- monoselect --}}
    $('.singleSelect').select2({
    theme: 'bootstrap4',
    dropdownAutoWidth: true,
    });

    {{-- multiselect -> indications --}}
    $('.multiSelect').select2({
    multiple: true,
    placeholder: 'Choose Indications',
    selectionCssClass: 'bg-primary'
    });

    @if (old('indication'))
        var select = [];
        @foreach (old('indication') as $indication)
            select.push({{ $indication }});
        @endforeach
        $('.multiSelect').val(select).change();
    @endif

    {{-- ajax get line --}}
    var choose = '<option value="">Choose Line</option>';
    $('#brand').on('change', function () {
    if ($(this).val() != ""){
    $.ajax({
    url: '/products/' + $(this).val() + '/lines',
    method: 'POST',
    data: {
    '_token' : '{{ csrf_token() }}'
    },
    success: function (res) {
    $('#line').empty();
    $('#line').append(choose);
    for (var i = 0 ; i < res.length ; i++) { let option=res[i].name; let option_id=res[i].id; $('#line').append(`<option
        value="${option_id}">${option}</option>`);
        }
        },
        })
        } else {
        $('#line').empty();
        $('#line').append(choose);
        }
        })

        @if (old('brand'))
            $.ajax({
            url: '/products/{{ old('brand') }}/lines',
            method: 'POST',
            data: {
            '_token' : '{{ csrf_token() }}'
            },
            success: function (res) {
            $('#line').empty();
            $('#line').append(choose);
            for (var i = 0 ; i < res.length ; i++) { let option=res[i].name; let option_id=res[i].id;
                $('#line').append(`<option value="${option_id}">${option}</option>`);
                }
                $('#line').val({{ old('line') }}).change();

                },
                })
        @endif

        {{-- image preview --}}
        $('#images').on('change', function () {
        $('#imagesLable').empty();
        for (var i = 0; i < this.files.length; i++) { $('#imagesLable').append(`<span
            class='bg-primary px-2 py-1 rounded-full text-sm shadow-sm text-white mr-2'>${this.files[i].name.slice(0,5) +
            '...'}</span>`);
            if (this.files.length > 4 && i == 3 ){
            $('#imagesLable').append(`<span>...</span>`);
            break;
            }
            }
            })
        @endsection
