@extends('admin.layouts.app')

@section('title', 'Brands')
@section('page-title', 'Manage Brands')

@push('styles')
<style>
    .btn-transparent-green {
        background-color: transparent;
        border: 1px solid #28a745;
        color: #28a745;
        transition: all 0.3s;
    }

    .btn-transparent-green:hover {
        background-color: #28a745;
        color: white;
    }

    .btn-transparent {
        background-color: transparent;
        border: 1px solid #6c757d;
        color: #6c757d;
        transition: all 0.3s;
    }

    .btn-transparent:hover {
        background-color: #6c757d;
        color: white;
    }

    tr:hover {
        background-color: #f1f8e9;
    }

    .thead-light-green th {
        background-color: #e6f4ea;
        color: #28a745;
    }
</style>
@endpush

@section('content')

<div class="mb-3">
    <button class="btn btn-transparent-green" data-toggle="modal" data-target="#addBrandModal">
        <i class="fas fa-plus"></i> Add Brand
    </button>
</div>

<div class="card">
    <div class="card-body table-responsive">
        <table class="table table-bordered table-hover" id="brandTable">
            <thead class="thead-light-green">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Logo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($brands as $index => $brand)
                <tr id="brandRow{{ $brand->id }}">
                    <td>{{ $index + 1 }}</td>
                    <td class="brand-name">{{ $brand->name }}</td>
                    <td>
                        @if($brand->logo)
                            <img src="{{ asset('storage/'.$brand->logo) }}" alt="{{ $brand->name }}" width="50">
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-sm btn-transparent btn-edit" 
                                data-id="{{ $brand->id }}" 
                                data-name="{{ $brand->name }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $brand->id }}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add Brand Modal -->
<div class="modal fade" id="addBrandModal" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Brand</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="addBrandForm" action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Brand Name" required>
                    </div>
                    <div class="form-group">
                        <label>Logo (optional)</label>
                        <input type="file" name="logo" class="form-control-file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-transparent-green">Add Brand</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Brand Modal -->
<div class="modal fade" id="editBrandModal" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Brand</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="editBrandForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" name="id" id="editBrandId">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="editBrandName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Logo (optional)</label>
                        <input type="file" name="logo" id="editBrandLogo" class="form-control-file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-transparent-green">Update Brand</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$('#addBrandForm').submit(function(e){
    e.preventDefault();
    let form = $(this);
    let submitBtn = form.find('button[type="submit"]');
    submitBtn.prop('disabled', true);

    let formData = new FormData(this);

    $.ajax({
        url: form.attr('action'),
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(res){
            $('#addBrandModal').modal('hide');
            Swal.fire({icon:'success', title:res.success, toast:true, position:'top-end', timer:2000, showConfirmButton:false})
            .then(()=>location.reload());
        },
        error: function(xhr){
            let errors = xhr.responseJSON.errors;
            alert(Object.values(errors).join("\n"));
        },
        complete: function(){ submitBtn.prop('disabled', false); }
    });
});

$('.btn-edit').click(function(){
    let id = $(this).data('id');
    let name = $(this).data('name');

    $('#editBrandId').val(id);
    $('#editBrandName').val(name);
    $('#editBrandForm').attr('action','/admin/brands/'+id);
    $('#editBrandModal').modal('show');
});

$('#editBrandForm').submit(function(e){
    e.preventDefault();
    let form = $(this);
    let submitBtn = form.find('button[type="submit"]');
    submitBtn.prop('disabled', true);

    let formData = new FormData(this);

    $.ajax({
        url: form.attr('action'),
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(res){
            $('#editBrandModal').modal('hide');
            Swal.fire({icon:'success', title:res.success, toast:true, position:'top-end', timer:2000, showConfirmButton:false})
            .then(()=>location.reload());
        },
        error: function(xhr){
            let errors = xhr.responseJSON.errors;
            alert(Object.values(errors).join("\n"));
        },
        complete: function(){ submitBtn.prop('disabled', false); }
    });
});

$('.btn-delete').click(function(){
    let id = $(this).data('id');
    Swal.fire({
        title: 'Are you sure?',
        text: "This will delete the brand!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result)=>{
        if(result.isConfirmed){
            $.ajax({
                url:'/admin/brands/'+id,
                type:'DELETE',
                data:{_token:"{{ csrf_token() }}"},
                success:function(res){
                    Swal.fire({icon:'success', title:res.success, toast:true, position:'top-end', timer:1500, showConfirmButton:false})
                    .then(()=>$('#brandRow'+id).remove());
                }
            });
        }
    });
});
</script>
@endpush
