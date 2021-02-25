@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            New Product
            <small>Create</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-body shadow">
                <form action="{{ route('admin.products.store') }}" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-lg-7 form-group my-4">
                            <div class="flex justify-center">
                                <label for="name" class="min-w-max mr-3 my-auto">Product Name</label>
                                <input type="text" class="form-control focus:border-blue-200 focus:ring-blue-200
                                        @error('name')
                                                border-red-300
                                        @else
                                                border-gray-300
                                        @enderror
                                        rounded w-75" name="name" value="{{ old('name') }}">
                            </div>
                            @error('name')
                                <div class="text-red-500 text-center mt-2 font-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="offset-lg-1 col-lg-4 form-group my-4">
                            <div class="input-group">
                                <label for="validationTooltipUsername" class="min-w-max mr-3 my-auto">Volume/Weight</label>
                                <input type="number" step="any" name="volume" class="form-control w-25 text-center focus:border-blue-200 focus:ring-blue-200
                                    @error('volume')
                                            border-red-300
                                    @else
                                            border-gray-300
                                    @enderror
                                    " style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"
                                        style="border-top-right-radius: 0.25rem; border-bottom-right-radius: 0.25rem;"
                                        id="validationTooltipUsernamePrepend">Ml./Gm.</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 form-group my-4">
                            <div class="flex justify-center">
                                <label for="units" class="min-w-max mr-3 my-auto">Units</label>
                                <input type="number" step="any" class="form-control text-center focus:border-blue-200 focus:ring-blue-200
                                        @error('units')
                                                border-red-300
                                        @else
                                                border-gray-300
                                        @enderror
                                        rounded w-75" name="units" value="{{ old('units',1) }}">
                            </div>
                            @error('units')
                                <div class="text-red-500 text-center mt-2 font-bold">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="offset-lg-1 col-lg-3 form-group my-4">
                            <div class="input-group">
                                <label for="validationTooltipUsername" class="min-w-max mr-3 my-auto">Price</label>
                                <input type="number" step="any" name="price" class="form-control w-25 text-center focus:border-blue-200 focus:ring-blue-200
                                    @error('price')
                                            border-red-300
                                    @else
                                            border-gray-300
                                    @enderror
                                    " style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"
                                        style="border-top-right-radius: 0.25rem; border-bottom-right-radius: 0.25rem;"
                                        id="validationTooltipUsernamePrepend">EGP</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex w-50 col-lg-12  m-auto justify-between my-4">
                            <button class="btn btn-success text-white font-bold">Save Product</button>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-danger font-bold">Cancel</a>
                        </div>
                </form>
            </div>
        </div>
    </section>
@endsection
