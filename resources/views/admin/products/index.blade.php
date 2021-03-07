@extends('layouts.master')

@section('style')
    {{-- splide --}}
    <link rel="stylesheet" href="{{ asset('bower_components/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/slick/slick-theme.css') }}">
    <style>
        .slick-dots {
            bottom: auto;
        }
        *:focus {
            outline: 0!important;
        }
        .slick-arrow::after, .slick-arrow::before {
            color: black
        }
    </style>
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header flex justify-between">
        <h1>
            All Products
            <small>View</small>
        </h1>
        <div>
            <a href="{{ route('admin.products.create') }}"
                class="btn btn-success font-bold inline-block items-center relative block pl-8"><i
                    class="fa fa-plus fa-xs absolute top-3 left-3"></i> Create New Product</a>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-body shadow">
                <div id="buttonPlacement" class="mb-3 text-center"></div>
                <table id="products" class="table table-bordered w-100 text-center">
                    <thead class="bg-primary text-white align-middle">
                        <tr>
                            <th>Name</th>
                            <th>Form</th>
                            <th>Volume</th>
                            <th>Price</th>
                            <th>Line</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th class="w-100">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($products as $product)
                            <tr>
                                <td class="align-middle">{{ $product->name }}</td>
                                <td class="align-middle">{{ $product->form->name }}</td>
                                <td class="align-middle">{{ $product->volume }}</td>
                                <td class="align-middle">{{ number_format($product->price, 2) }}</td>
                                <td class="align-middle">{{ $product->line ? $product->line->name : 'N/A' }}</td>
                                <td class="align-middle">
                                    {{ $product->line ? $product->line->brand->name : $product->brand->name }}</td>
                                <td class="align-middle">{{ $product->category->name }}</td>
                                <td class="align-middle">
                                    {{-- href="{{ route('admin.products.show', $product->id) }}" --}}
                                    <button type="button" class="btn btn-sm btn-primary font-bold detailsButton"
                                        data-name='{{ $product->name }}' data-id='{{ $product->id }}'
                                        data-toggle="modal"  data-target="#DetailsModal" >View Details</button>
                                        {{-- --}}
                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                        class="btn btn-sm btn-info font-bold">Edit</a>
                                    <button type="button" class="btn btn-sm btn-danger font-bold deleteButton"
                                        data-name='{{ $product->name }}' data-id='{{ $product->id }}'
                                        data-toggle="modal" data-target="#DeleteModal">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="bg-light text-primary align-middle">
                        <tr>
                            <th>Name</th>
                            <th>Form</th>
                            <th>Volume</th>
                            <th>Price</th>
                            <th>Line</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>

    <!-- Delete Modal -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white font-bold">
                    <h5 class="modal-title" id="deleteModalCenterTitle">Deletion Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    Are You Sure, You Want To Delete '<span id="deletedItemName" class="font-bold"></span>' ?
                </div>
                <div class="modal-footer flex justify-between">
                    <button type="button" class="btn btn-secondary font-bold" data-dismiss="modal">Cancel</button>
                    <form action="" id="deleteForm" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger font-bold">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Details Modal -->
    <div class="modal fade bd-example-modal-xl" id="DetailsModal" tabindex="-1" role="dialog"
        aria-labelledby="datailsModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white font-bold">
                    <h5 class="modal-title" id="datailsModalCenterTitle">Product's Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="row">
                        <div class="col-lg-6">
                            <div style="width: 90%">

                                <div class="single-item" style="height: 100%">
                                    
                                </div>
                            </div>
                        
                        </div>
                        <div class="col-lg-6">
                            <h1>Ahmed</h1>
                            <h1>Ahmed</h1>
                            <h1>Ahmed</h1>
                            <h1>Ahmed</h1>
                            <h1>Ahmed</h1>
                            <h1>Ahmed</h1>
                            <h1>Ahmed</h1>
                            <h1>Ahmed</h1>
                            <h1>Ahmed</h1>
                            <h1>Ahmed</h1>
                            <h1>Ahmed</h1>
                            <h1>Ahmed</h1>
                            <h1>Ahmed</h1>
                            <h1>Ahmed</h1>
                            <h1>Ahmed</h1>
                            <h1>Ahmed</h1>
                            <h1>Ahmed</h1>
                            <h1>Ahmed</h1>
                            <h1>Ahmed</h1>
                            <h1>Ahmed</h1>
                            <h1>Ahmed</h1>
                            <h1>Ahmed</h1>
                            <h1>Ahmed</h1>
                            <h1>Ahmed</h1>
                            <h1>Ahmed</h1>
                            <h1>Ahmed</h1>
                        </div>
                    </div>
                </div>
                <div class="modal-footer flex justify-center">
                    <button type="button" class="btn btn-danger font-bold" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('script')

    $("#products").DataTable({
    buttons: [{
    extend: 'colvis',
    className: 'bg-info font-bold',
    },
    {
    extend: 'copyHtml5',
    className: 'bg-primary font-bold',
    exportOptions: {
    columns: [0]
    }
    },
    {
    extend: 'excelHtml5',
    className: 'bg-success font-bold',
    exportOptions: {
    columns: [0]
    }
    },
    {
    extend: 'pdfHtml5',
    className: 'bg-danger font-bold',
    exportOptions: {
    columns: [0]
    }
    },
    {
    extend: 'print',
    className: 'bg-dark font-bold',
    exportOptions: {
    columns: [0]
    }
    },
    ]
    }).buttons().container().appendTo(document.getElementById("buttonPlacement"));;

    $('.deleteButton').on('click', function() {
        $('#deletedItemName').text($(this).data('name'));
        $('#deleteForm').attr("action", '/products/' + $(this).data('id'));
    });

    {{-- $('.single-item').slick(); --}}
        $('#DetailsModal').on('shown.bs.modal', function() {

            $.ajax({
                url: '/products/' + $(this).data('id'),
                method: 'GET',
                success: function (res) {
                    let images = $.parseJSON(res.product.product_photo);
                    for (let i = 0; i < images.length; i++) { 
                        $('.single-item').append(`<div class="single_slide"><img src="/images/${images[i]}" style="margin: auto" draggable="false"></div>`);
                        console.log($('.single_slide').length);
                    }
                }
            }).then(() => $('.single-item').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
              }))
        })

        $('.detailsButton').on('click', function () {
            $('#DetailsModal').data('id',$(this).data('id'))
        })
        $('#DetailsModal').on('hidden.bs.modal', function() {
            $('.single-item').slick("unslick")
            $('.single_slide').remove();
        })

        @if (session('success'))
            toastr.success('{{ session('success') }}')
        @endif

    @endsection
