@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            New Lines
            <small>Create</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-body shadow">
                <form action="{{route('admin.lines.store')}}" method="POST">
                    @csrf

                    <div class="form-group  my-4">
                        <div class="flex justify-center">
                            <label for="name" class="min-w-max mr-3 self-center my-auto">Line Name</label>
                            <input type="text" class="form-control focus:border-blue-200 focus:ring-blue-200
                            @error('name')
                            border-red-300
                            @else
                            border-gray-300
                            @enderror
                            rounded w-50" name="name" value="{{old('name')}}">
                        </div>
                        @error('name')
                            <div class="text-red-500 text-center mt-2 text-bold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group  my-4">
                        <div class="flex justify-center">
                            <label for="brand" class="min-w-max mr-3 self-center my-auto">Brand Name</label>
                            <select name="brand" class="form-control focus:border-blue-200 focus:ring-blue-200 rounded w-50
                            @error('brand')
                            border-red-300
                            @else
                            border-gray-300
                            @enderror">
                                <option value="">Select The Line's Brand</option>
                                @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}" 
                                        @if($brand->id == old('brand'))
                                            {{"selected"}}
                                        @endif
                                        >{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('brand')
                            <div class="text-red-500 text-center mt-2 text-bold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex w-50  m-auto justify-between my-4">
                        <button class="btn btn-success text-white">Save Line</button>
                        <a href="{{route('admin.lines.index')}}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
