@extends('admin.layouts.app')

@section('title', 'Sizes')
@section('page-title', 'Manage Sizes')

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
    <button class="btn btn-transparent-green" data-toggle="modal" data-target="#addSizeModal">
        <i class="fas fa-plus"></i> Add Size
    </button>
</div>

<div class="card">
    <div class="card-body table-responsive">
        <table class="table table-bordered table-hover" id="sizeTable">
            <thead class="thead-light-green">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sizes as $index => $size)
                <tr id="sizeRow{{ $size->id }}">
                    <td>{{ $index + 1 }}</td>
                    <td class="size-name">{{ $size->name }}</td>
                    <td>
                        <button class="btn btn-sm btn-transparent btn-edit" data-id="{{ $size->id }}" data-name="{{ $size->name }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $size->id }}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add Size Modal -->
<div class="modal fade" id="addSizeModal" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Size</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="addSizeForm" action="{{ route('admin.sizes.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Size Name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-transparent-green">Add Size</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Size Modal -->
<div class="modal fade" id="editSizeModal" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Size</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="editSizeForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" name="id" id="editSizeId">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="editSizeName" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-transparent-green">Update Size</button>
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
$('#addSizeForm').submit(function(e){
    e.preventDefault();
    let form = $(this);
    let submitBtn = form.find('button[type="submit"]');
    submitBtn.prop('disabled', true);

    $.ajax({
        url: form.attr('action'),
        method: 'POST',
        data: form.serialize(),
        success: function(res){
            $('#addSizeModal').modal('hide');
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

    $('#editSizeId').val(id);
    $('#editSizeName').val(name);
    $('#editSizeForm').attr('action','/admin/sizes/'+id);
    $('#editSizeModal').modal('show');
});

$('#editSizeForm').submit(function(e){
    e.preventDefault();
    let form = $(this);
    let submitBtn = form.find('button[type="submit"]');
    submitBtn.prop('disabled', true);

    $.ajax({
        url: form.attr('action'),
        method: 'POST',
        data: form.serialize(),
        success: function(res){
            $('#editSizeModal').modal('hide');
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
        text: "This will delete the size!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result)=>{
        if(result.isConfirmed){
            $.ajax({
                url:'/admin/sizes/'+id,
                type:'DELETE',
                data:{_token:"{{ csrf_token() }}"},
                success:function(res){
                    Swal.fire({icon:'success', title:res.success, toast:true, position:'top-end', timer:1500, showConfirmButton:false})
                    .then(()=>$('#sizeRow'+id).remove());
                }
            });
        }
    });
});
</script>
@endpush
