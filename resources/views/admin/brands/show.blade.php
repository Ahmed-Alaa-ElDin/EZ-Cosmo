@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header flex justify-between">
        <h1>
            {{$brand->name}}'s Lines
            <small>View</small>
        </h1>
        <div>
            <a href="{{route('admin.brands.index')}}" class="btn btn-primary text-bold inline-block items-center"><i class="fas fa-backward fa-xs inline-block my-auto mr-2"></i> Back To Brands</a>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-body shadow">
                @if (session('success'))
                    <div class="bg-green-500 text-bold text-center mb-4 text-white py-2 px-8 rounded-lg max-w-max mx-auto">{{session('success')}}</div>
                @endif
                <table id="lines" class="table table-bordered w-100 text-center">
                    <thead class="bg-primary text-white align-middle">
                        <tr>
                            <th>Name</th>
                            <th>Brand</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($lines as $line)
                            <tr>
                                <td class="align-middle">{{$line->name}}</td>
                                <td class="align-middle">{{$line->brand->name}}</td>
                                <td class="align-middle">
                                    <a href="{{route('admin.lines.edit', $line->id)}}" class="btn btn-sm btn-primary text-bold">View Products</a>
                                    <a href="{{route('admin.lines.edit', $line->id)}}" class="btn btn-sm btn-info text-bold">Edit</a>
                                    <form action="{{route('admin.lines.destroy', $line->id)}}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" data-name='{{$line->name}}' class="btn btn-sm btn-danger text-bold" onclick="confirm(`Are You Sure, You Want To Delete '` + this.dataset.name + `' ?`) || event.preventDefault()">Delete</button>
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
        $('#lines').DataTable();
    </script>
@endsection
