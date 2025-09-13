@extends('admin.layouts.app')

@section('title', 'Subcategories')
@section('page-title', 'Manage Subcategories')

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
    tr:hover { background-color: #f1f8e9; }
    .thead-light-green th { background-color: #e6f4ea; color: #28a745; }
    .quill-editor { min-height: 150px; }
</style>
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
@endpush

@section('content')

<!-- Add Subcategory Button -->
<div class="mb-3">
    <button class="btn btn-transparent-green" data-toggle="modal" data-target="#addSubcategoryModal">
        <i class="fas fa-plus"></i> Add Subcategory
    </button>
</div>

<!-- Subcategories Table -->
<div class="card">
    <div class="card-body table-responsive">
        <table class="table table-bordered table-hover" id="subcategoryTable">
            <thead class="thead-light-green">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Parent Category</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subcategories as $index => $subcategory)
                <tr id="subcategoryRow{{ $subcategory->id }}">
                    <td>{{ $index + 1 }}</td>
                    <td class="subcategory-name">{{ $subcategory->name }}</td>
                    <td class="subcategory-category">{{ $subcategory->category->name ?? '-' }}</td>
                    <td class="subcategory-description">{!! $subcategory->description !!}</td>
                    <td>
                        <button class="btn btn-sm btn-transparent btn-edit" 
                                data-id="{{ $subcategory->id }}"
                                data-name="{{ $subcategory->name }}"
                                data-category="{{ $subcategory->category_id }}"
                                data-description="{{ $subcategory->description }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $subcategory->id }}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add Subcategory Modal -->
<div class="modal fade" id="addSubcategoryModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Subcategory</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="addSubcategoryForm" action="{{ route('admin.subcategories.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Subcategory Name" required>
                    </div>
                    <div class="form-group">
                        <label>Parent Category</label>
                        <select name="category_id" class="form-control" required>
                            <option value="">-- Select Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <div id="addDescriptionEditor" class="quill-editor"></div>
                        <input type="hidden" name="description">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-transparent-green">Add Subcategory</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Subcategory Modal -->
<div class="modal fade" id="editSubcategoryModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Subcategory</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="editSubcategoryForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" name="id" id="editSubcategoryId">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="editSubcategoryName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Parent Category</label>
                        <select name="category_id" id="editSubcategoryCategory" class="form-control" required>
                            <option value="">-- Select Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <div id="editDescriptionEditor" class="quill-editor"></div>
                        <input type="hidden" name="description">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-transparent-green">Update Subcategory</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
var addQuill = new Quill('#addDescriptionEditor', { theme: 'snow' });
var editQuill = new Quill('#editDescriptionEditor', { theme: 'snow' });

function stringToSlug(str){
    return str.toLowerCase().trim().replace(/[\s\W-]+/g,'-').replace(/^-+|-+$/g,'');
}

// Add Subcategory
$('#addSubcategoryForm').submit(function(e){
    e.preventDefault();
    var form = $(this);
    form.find('input[name="description"]').val(addQuill.root.innerHTML);
    var btn = form.find('button[type="submit"]'); btn.prop('disabled', true);

    $.ajax({
        url: form.attr('action'), method: 'POST', data: form.serialize(),
        success: function(res){ $('#addSubcategoryModal').modal('hide'); Swal.fire({icon:'success', title:res.success, toast:true, position:'top-end', timer:2000, showConfirmButton:false}).then(()=>location.reload()); },
        error: function(xhr){ alert(Object.values(xhr.responseJSON.errors||{}).join("\n")); },
        complete: function(){ btn.prop('disabled', false); }
    });
});

// Edit Subcategory
$('.btn-edit').click(function(){
    var id = $(this).data('id');
    var name = $(this).data('name');
    var category = $(this).data('category');
    var description = $(this).data('description');
    $('#editSubcategoryId').val(id);
    $('#editSubcategoryName').val(name);
    $('#editSubcategoryCategory').val(category);
    editQuill.root.innerHTML = description || '';
    $('#editSubcategoryForm').attr('action','/admin/subcategories/'+id);
    $('#editSubcategoryModal').modal('show');
});

$('#editSubcategoryForm').submit(function(e){
    e.preventDefault();
    var form = $(this);
    form.find('input[name="description"]').val(editQuill.root.innerHTML);
    var btn = form.find('button[type="submit"]'); btn.prop('disabled', true);

    $.ajax({
        url: form.attr('action'), method: 'POST', data: form.serialize(),
        success: function(res){ $('#editSubcategoryModal').modal('hide'); Swal.fire({icon:'success', title:res.success, toast:true, position:'top-end', timer:2000, showConfirmButton:false}).then(()=>location.reload()); },
        error: function(xhr){ alert(Object.values(xhr.responseJSON.errors||{}).join("\n")); },
        complete: function(){ btn.prop('disabled', false); }
    });
});

// Delete Subcategory
$('.btn-delete').click(function(){
    var id = $(this).data('id');
    Swal.fire({title:'Are you sure?', text:"This will delete the subcategory!", icon:'warning', showCancelButton:true, confirmButtonColor:'#d33', cancelButtonColor:'#3085d6', confirmButtonText:'Yes, delete it!'})
    .then((result)=>{ if(result.isConfirmed){ $.ajax({ url:'/admin/subcategories/'+id, type:'DELETE', data:{_token:"{{ csrf_token() }}"}, success:function(res){ $('#subcategoryRow'+id).remove(); Swal.fire({icon:'success', title:res.success, toast:true, position:'top-end', timer:1500, showConfirmButton:false}); } }) } });
});
</script>
@endpush
