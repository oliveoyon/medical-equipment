@extends('admin.layouts.app')

@section('title', 'Colors')
@section('page-title', 'Manage Colors')

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
    .btn-transparent { background-color: transparent; border: 1px solid #6c757d; color:#6c757d; }
    .btn-transparent:hover { background-color: #6c757d; color:white; }
    tr:hover { background-color: #f1f8e9; }
    .thead-light-green th { background-color: #e6f4ea; color: #28a745; }
</style>
@endpush

@section('content')
<div class="mb-3">
    <button class="btn btn-transparent-green" data-toggle="modal" data-target="#addColorModal">
        <i class="fas fa-plus"></i> Add Color
    </button>
</div>

<div class="card">
    <div class="card-body table-responsive">
        <table class="table table-bordered table-hover" id="colorTable">
            <thead class="thead-light-green">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Hex</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($colors as $index => $color)
                <tr id="colorRow{{ $color->id }}">
                    <td>{{ $index + 1 }}</td>
                    <td class="color-name">{{ $color->name }}</td>
                    <td>{{ $color->hex ?? '-' }}</td>
                    <td>
                        <button class="btn btn-sm btn-transparent btn-edit"
                                data-id="{{ $color->id }}"
                                data-name="{{ $color->name }}"
                                data-hex="{{ $color->hex }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $color->id }}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add Color Modal -->
<div class="modal fade" id="addColorModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><h5>Add Color</h5><button type="button" class="close" data-dismiss="modal">&times;</button></div>
            <form id="addColorForm" action="{{ route('admin.colors.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group"><label>Name</label><input type="text" name="name" class="form-control" required></div>
                    <div class="form-group"><label>Hex</label><input type="text" name="hex" class="form-control" placeholder="#ffffff"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-transparent-green">Add Color</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Color Modal -->
<div class="modal fade" id="editColorModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><h5>Edit Color</h5><button type="button" class="close" data-dismiss="modal">&times;</button></div>
            <form id="editColorForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" id="editColorId">
                    <div class="form-group"><label>Name</label><input type="text" name="name" id="editColorName" class="form-control" required></div>
                    <div class="form-group"><label>Hex</label><input type="text" name="hex" id="editColorHex" class="form-control"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-transparent-green">Update Color</button>
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
$('#addColorForm').submit(function(e){
    e.preventDefault();
    let form = $(this);
    let btn = form.find('button[type="submit"]');
    btn.prop('disabled', true);
    $.ajax({
        url: form.attr('action'),
        method: 'POST',
        data: form.serialize(),
        success: function(res){
            $('#addColorModal').modal('hide');
            Swal.fire({icon:'success',title:res.success,toast:true,position:'top-end',timer:2000,showConfirmButton:false})
            .then(()=>location.reload());
        },
        error: function(xhr){ alert(Object.values(xhr.responseJSON.errors).join("\n")); },
        complete: function(){ btn.prop('disabled', false); }
    });
});

$('.btn-edit').click(function(){
    let id = $(this).data('id');
    let name = $(this).data('name');
    let hex = $(this).data('hex');
    $('#editColorId').val(id);
    $('#editColorName').val(name);
    $('#editColorHex').val(hex);
    $('#editColorForm').attr('action','/admin/colors/'+id);
    $('#editColorModal').modal('show');
});

$('#editColorForm').submit(function(e){
    e.preventDefault();
    let form = $(this);
    let btn = form.find('button[type="submit"]');
    btn.prop('disabled', true);
    $.ajax({
        url: form.attr('action'),
        method: 'POST',
        data: form.serialize(),
        success: function(res){
            $('#editColorModal').modal('hide');
            Swal.fire({icon:'success',title:res.success,toast:true,position:'top-end',timer:2000,showConfirmButton:false})
            .then(()=>location.reload());
        },
        error: function(xhr){ alert(Object.values(xhr.responseJSON.errors).join("\n")); },
        complete: function(){ btn.prop('disabled', false); }
    });
});

$('.btn-delete').click(function(){
    let id = $(this).data('id');
    Swal.fire({
        title:'Are you sure?',
        text:'This will delete the color!',
        icon:'warning',
        showCancelButton:true,
        confirmButtonColor:'#d33',
        cancelButtonColor:'#3085d6',
        confirmButtonText:'Yes, delete it!'
    }).then((result)=>{
        if(result.isConfirmed){
            $.ajax({
                url:'/admin/colors/'+id,
                type:'DELETE',
                data:{_token:"{{ csrf_token() }}"},
                success:function(res){
                    Swal.fire({icon:'success',title:res.success,toast:true,position:'top-end',timer:1500,showConfirmButton:false})
                    .then(()=>$('#colorRow'+id).remove());
                }
            });
        }
    });
});
</script>
@endpush
