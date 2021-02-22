@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header flex justify-between">
        <h1>
            All Brands
            <small>View</small>
        </h1>
        <div>
            <a href="{{route('admin.brands.create')}}" class="btn btn-success text-bold inline-block items-center"><i class="fa fa-plus fa-xs inline-block my-auto mr-2"></i> Create New Brand</a>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-body shadow">
                @if (session('success'))
                    <div class="bg-green-500 text-bold text-center mb-4 text-white py-2 px-8 rounded-lg max-w-max mx-auto">{{session('success')}}</div>
                @endif
                <table id="brands" class="table table-bordered w-100 text-center">
                    <thead class="bg-primary text-white align-middle">
                        <tr>
                            <th>Name</th>
                            <th>Country</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($brands as $brand)
                            <tr>
                                <td class="align-middle">{{$brand->name}}</td>
                                <td class="align-middle">
                                    @if (isset($brand->country->name))
                                        {{$brand->country->name }}
                                    @else
                                        N/A                                        
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <a href="{{route('admin.brands.show', $brand->id)}}" class="btn btn-sm btn-primary text-bold">View Lines</a>
                                    <a href="{{route('admin.brands.edit', $brand->id)}}" class="btn btn-sm btn-info text-bold">Edit</a>
                                    <form action="{{route('admin.brands.destroy', $brand->id)}}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" data-name='{{$brand->name}}' class="btn btn-sm btn-danger text-bold" onclick="confirm(`Are You Sure, You Want To Delete '` + this.dataset.name + `' ?`) || event.preventDefault()">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script>
        $('#brands').DataTable();
    </script>
@endsection
