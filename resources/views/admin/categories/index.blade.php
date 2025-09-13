@extends('admin.layouts.app')

@section('title', 'Categories')
@section('page-title', 'Manage Categories')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.css" rel="stylesheet">
<style>
.modal-lg { max-width: 800px; }
table.data-table { background-color: #f0fdf4; border-radius: 8px; border-collapse: separate; border-spacing: 0; }
table.data-table th { background-color: #bbf7d0; color: #065f46; }
table.data-table td { vertical-align: middle; }
.btn { min-width: 80px; }
</style>
@endpush

@section('content')

<div class="mb-3">
    <button class="btn btn-success btn-add" data-toggle="modal" data-target="#categoryModal">
        <i class="fas fa-plus"></i> Add Category
    </button>
</div>

<div class="card">
    <div class="card-body table-responsive">
        <table class="table table-bordered table-hover data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Icon</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $i => $category)
                <tr id="categoryRow{{ $category->id }}">
                    <td>{{ $i + 1 }}</td>
                    <td>
                        @if ($category->icon)
                            <img src="{{ asset('storage/' . $category->icon) }}" width="40" height="40" alt="icon">
                        @else
                            <span class="text-muted">No Icon</span>
                        @endif
                    </td>
                    <td>{{ $category->name }}</td>
                    <td>{!! $category->description !!}</td>
                    <td>
                        <button class="btn btn-sm btn-primary btn-edit" 
                                data-id="{{ $category->id }}"
                                data-name="{{ $category->name }}"
                                data-description="{{ htmlspecialchars($category->description) }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $category->id }}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add/Edit Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="categoryForm" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control summernote"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Icon (optional)</label>
                        <input type="file" name="icon" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(function() {
    // Initialize Summernote with minimized toolbar
    $('.summernote').summernote({
        height: 200,
        toolbar: [
            ['style', ['bold', 'italic', 'underline']],
            ['para', ['ul', 'ol']],
            ['insert', ['link']],
            ['view', ['codeview']]
        ]
    });

    // Open Add Modal
    $('.btn-add').click(function(){
        let modal = $('#categoryModal');
        modal.find('.modal-title').text('Add Category');
        modal.find('form').attr('action', "{{ route('admin.categories.store') }}");
        modal.find('input[name="_method"]').val('POST');
        modal.find('input[name="name"]').val('');
        modal.find('textarea[name="description"]').summernote('code','');
        modal.find('input[name="icon"]').val('');
    });

    // Open Edit Modal
    $('.btn-edit').click(function(){
        let data = $(this).data();
        let modal = $('#categoryModal');
        modal.find('.modal-title').text('Edit Category');
        modal.find('form').attr('action','/admin/categories/'+data.id);
        modal.find('input[name="_method"]').val('PUT');
        modal.find('input[name="name"]').val(data.name);
        modal.find('textarea[name="description"]').summernote('code', data.description || '');
        modal.find('input[name="icon"]').val('');
        modal.modal('show');
    });

    // Submit form (Add/Edit)
    $('#categoryForm').submit(function(e){
        e.preventDefault();
        $(this).find('textarea.summernote').each(function(){
            $(this).val($(this).summernote('code'));
        });
        let form = $(this);
        $.ajax({
            url: form.attr('action'),
            type: 'POST', // POST + _method=PUT for updates
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(res){
                $('#categoryModal').modal('hide');
                Swal.fire({
                    icon:'success', title:res.success, toast:true, position:'top-end', timer:2000, showConfirmButton:false
                }).then(()=>location.reload());
            },
            error: function(xhr){
                Swal.fire({
                    icon:'error',
                    title:'Validation Error',
                    html: Object.values(xhr.responseJSON.errors||{}).join('<br>')
                });
            }
        });
    });

    // Delete category
    $('.btn-delete').click(function(){
        let id = $(this).data('id');
        Swal.fire({
            title:'Are you sure?',
            text:'This will delete the category!',
            icon:'warning',
            showCancelButton:true,
            confirmButtonColor:'#d33',
            cancelButtonColor:'#3085d6',
            confirmButtonText:'Yes, delete it!'
        }).then((res)=>{
            if(res.isConfirmed){
                $.ajax({
                    url:'/admin/categories/'+id,
                    type:'DELETE',
                    data:{_token:'{{ csrf_token() }}'},
                    success:function(resp){
                        $('#categoryRow'+id).remove();
                        Swal.fire({
                            icon:'success', title:resp.success, toast:true, position:'top-end', timer:1500, showConfirmButton:false
                        });
                    }
                });
            }
        });
    });
});
</script>
@endpush
