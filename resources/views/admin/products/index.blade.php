@extends('admin.layouts.app')

@section('title', 'Products')
@section('page-title', 'Manage Products')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.css" rel="stylesheet">
    <style>
        .modal-fullscreen {
            max-width: 95%;
        }

        .btn-transparent-green {
            background-color: transparent;
            border: 1px solid #28a745;
            color: #28a745;
        }

        .btn-transparent-green:hover {
            background-color: #28a745;
            color: #fff;
        }
    </style>
@endpush

@section('content')
    <div class="mb-3">
        <button class="btn btn-transparent-green" data-toggle="modal" data-target="#addProductModal">
            <i class="fas fa-plus"></i> Add Product
        </button>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover" id="productTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>Brand</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $index => $product)
                        <tr id="productRow{{ $product->id }}">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name ?? '-' }}</td>
                            <td>{{ $product->subcategory->name ?? '-' }}</td>
                            <td>{{ $product->brand->name ?? '-' }}</td>
                            <td>
                                <button class="btn btn-sm btn-transparent btn-edit" data-id="{{ $product->id }}"
                                    data-name="{{ $product->name }}" data-category="{{ $product->category_id }}"
                                    data-subcategory="{{ $product->subcategory_id }}" data-brand="{{ $product->brand_id }}"
                                    data-model="{{ $product->model }}" data-sizes='@json($product->sizes ? json_decode($product->sizes) : [])'
                                    data-colors='@json($product->colors ? json_decode($product->colors) : [])'
                                    data-description="{{ $product->description }}"
                                    data-specifications="{{ $product->specifications }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $product->id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Add Product Modal --}}
    <div class="modal fade" id="addProductModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="addProductForm" method="POST" enctype="multipart/form-data"
                    action="{{ route('admin.products.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label>Category</label>
                                <select name="category_id" class="form-control" required>
                                    <option value="">-- Select Category --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>Subcategory</label>
                                <select name="subcategory_id" class="form-control">
                                    <option value="">-- Select Subcategory --</option>
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label>Brand</label>
                                <select name="brand_id" class="form-control">
                                    <option value="">-- Select Brand --</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>Model</label>
                                <input type="text" name="model" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label>Sizes</label>
                                <select name="sizes[]" class="form-control select2" multiple>
                                    @foreach ($sizes as $size)
                                        <option value="{{ $size->name }}">{{ $size->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label>Colors</label>
                                <select name="colors[]" class="form-control select2" multiple>
                                    @foreach ($colors as $color)
                                        <option value="{{ $color->name }}">{{ $color->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-8">
                                <label>Description</label>
                                <textarea name="description" class="form-control summernote"></textarea>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label>Specifications</label>
                                <textarea name="specifications" class="form-control summernote"></textarea>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label>Images</label>
                                <input type="file" name="images[]" class="form-control" multiple>
                            </div>
                            <div class="col-md-6">
                                <label>Documents</label>
                                <input type="file" name="documents[]" class="form-control" multiple>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer mt-2">
                        <button type="submit" class="btn btn-transparent-green">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Product Modal --}}
    <div class="modal fade" id="editProductModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="editProductForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label>Category</label>
                                <select name="category_id" class="form-control" required></select>
                            </div>
                            <div class="col-md-4">
                                <label>Subcategory</label>
                                <select name="subcategory_id" class="form-control"></select>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label>Brand</label>
                                <select name="brand_id" class="form-control"></select>
                            </div>
                            <div class="col-md-4">
                                <label>Model</label>
                                <input type="text" name="model" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label>Sizes</label>
                                <select name="sizes[]" class="form-control select2" multiple>
                                    @foreach ($sizes as $size)
                                        <option value="{{ $size->name }}">{{ $size->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label>Colors</label>
                                <select name="colors[]" class="form-control select2" multiple>
                                    @foreach ($colors as $color)
                                        <option value="{{ $color->name }}">{{ $color->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-8">
                                <label>Description</label>
                                <textarea name="description" class="form-control summernote"></textarea>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label>Specifications</label>
                                <textarea name="specifications" class="form-control summernote"></textarea>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label>Images</label>
                                <input type="file" name="images[]" class="form-control" multiple>
                            </div>
                            <div class="col-md-6">
                                <label>Documents</label>
                                <input type="file" name="documents[]" class="form-control" multiple>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer mt-2">
                        <button type="submit" class="btn btn-transparent-green">Update</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            $('#productTable').DataTable?.();

            // Initialize Select2 & Summernote for Add Modal
            function initModal(modal) {
        // Destroy and re-initialize Summernote
        modal.find('textarea.summernote').each(function() {
            if ($(this).next('.note-editor').length) {
                $(this).summernote('destroy');
            }
            $(this).summernote({ height: 200 });
        });

        // Initialize Select2
        modal.find('.select2').each(function() {
            if ($(this).hasClass('select2-hidden-accessible')) {
                $(this).select2('destroy');
            }
            $(this).select2({ width: '100%' });
        });
    }

    $('#addProductModal').on('shown.bs.modal', function() {
        initModal($(this));
    });

    $('#editProductModal').on('shown.bs.modal', function() {
        initModal($(this));
    });

            // ----------------- ADD PRODUCT -----------------
            $('#addProductForm').on('submit', function(e) {
        e.preventDefault();
        let form = this;
        let btn = $(form).find('button[type="submit"]');
        if (btn.prop('disabled')) return;
        btn.prop('disabled', true);

        $.ajax({
            url: $(form).attr('action'),
            method: 'POST',
            data: new FormData(form),
            contentType: false,
            processData: false,
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            success: function(res) {
                $('#addProductModal').modal('hide');
                Swal.fire({ icon: 'success', title: res.success, toast: true, position: 'top-end', timer: 2000, showConfirmButton: false })
                    .then(() => location.reload());
            },
            error: function(xhr) {
                let errors = xhr.responseJSON.errors;
                Swal.fire({ icon: 'error', title: Object.values(errors).flat().join('<br>'), html: true });
            },
            complete: function() { btn.prop('disabled', false); }
        });
    });

            // ----------------- EDIT BUTTON -----------------
            $(document).on('click', '.btn-edit', function() {
                let data = $(this).data();
                let modal = $('#editProductModal');

                // Fill fields
                modal.find('input[name="name"]').val(data.name);
                modal.find('select[name="category_id"]').html(
                    '@foreach ($categories as $c)<option value="{{ $c->id }}">{{ $c->name }}</option>@endforeach'
                    ).val(data.category).trigger('change');
                modal.find('select[name="subcategory_id"]').html(
                    '@foreach ($subcategories as $s)<option value="{{ $s->id }}">{{ $s->name }}</option>@endforeach'
                    ).val(data.subcategory).trigger('change');
                modal.find('select[name="brand_id"]').html(
                    '@foreach ($brands as $b)<option value="{{ $b->id }}">{{ $b->name }}</option>@endforeach'
                    ).val(data.brand).trigger('change');
                modal.find('input[name="model"]').val(data.model);
                modal.find('select[name="sizes[]"]').val(data.sizes).trigger('change');
                modal.find('select[name="colors[]"]').val(data.colors).trigger('change');
                modal.find('textarea[name="description"]').summernote('code', data.description);
                modal.find('textarea[name="specifications"]').summernote('code', data.specifications);

                // Set form action
                modal.find('form').attr('action', `/admin/products/${data.id}`);

                modal.modal('show');
            });

            // ----------------- EDIT SUBMIT -----------------
            $('#editProductForm').on('submit', function(e) {
                e.preventDefault();
                let form = this;
                let btn = $(form).find('button[type="submit"]');
                if (btn.prop('disabled')) return;
                btn.prop('disabled', true);

                $.ajax({
                    url: $(form).attr('action'),
                    method: 'POST',
                    data: new FormData(form),
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(res) {
                        $('#editProductModal').modal('hide');
                        Swal.fire({
                                icon: 'success',
                                title: res.success,
                                toast: true,
                                position: 'top-end',
                                timer: 2000,
                                showConfirmButton: false
                            })
                            .then(() => location.reload());
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        Swal.fire({
                            icon: 'error',
                            title: Object.values(errors).flat().join('<br>'),
                            html: true
                        });
                    },
                    complete: function() {
                        btn.prop('disabled', false);
                    }
                });
            });

            // ----------------- DELETE -----------------
            $(document).on('click', '.btn-delete', function() {
                let id = $(this).data('id');
                let url = "{{ route('admin.products.destroy', ':id') }}".replace(':id', id);
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'This will delete the product!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: 'POST',
                            data: {
                                _method: 'DELETE',
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(res) {
                                Swal.fire({
                                        icon: 'success',
                                        title: res.success,
                                        toast: true,
                                        position: 'top-end',
                                        timer: 1500,
                                        showConfirmButton: false
                                    })
                                    .then(() => $('#productRow' + id).remove());
                            },
                            error: function() {
                                alert('Failed to delete product!');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
