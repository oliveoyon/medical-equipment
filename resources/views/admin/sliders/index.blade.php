@extends('admin.layouts.app')

@section('title', 'Sliders')
@section('page-title', 'Manage Sliders')

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
    <button class="btn btn-success btn-add" data-toggle="modal" data-target="#sliderModal">
        <i class="fas fa-plus"></i> Add Slider
    </button>
</div>

<div class="card">
    <div class="card-body table-responsive">
        <table class="table table-bordered table-hover data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>H5 Text</th>
                    <th>H1 Text</th>
                    <th>Description</th>
                    <th>Button URL</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sliders as $i => $slider)
                <tr id="sliderRow{{ $slider->id }}">
                    <td>{{ $i + 1 }}</td>
                    <td>
                        @if ($slider->image)
                            <img src="{{ asset('storage/' . $slider->image) }}" width="60" height="40" alt="slider">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>{{ $slider->title_h5 }}</td>
                    <td>{{ $slider->title_h1 }}</td>
                    <td>{!! $slider->description !!}</td>
                    <td>{{ $slider->button_url }}</td>
                    <td>{{ $slider->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <button class="btn btn-sm btn-primary btn-edit"
                                data-id="{{ $slider->id }}"
                                data-title_h5="{{ $slider->title_h5 }}"
                                data-title_h1="{{ $slider->title_h1 }}"
                                data-description="{{ htmlspecialchars($slider->description) }}"
                                data-button_url="{{ $slider->button_url }}"
                                data-status="{{ $slider->status }}"
                                data-image="{{ $slider->image }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $slider->id }}">
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
<div class="modal fade" id="sliderModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="sliderForm" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Add Slider</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>H5 Text</label>
                        <input type="text" name="title_h5" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>H1 Text</label>
                        <input type="text" name="title_h1" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control summernote"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Button URL</label>
                        <input type="text" name="button_url" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                        <div id="imagePreview" class="mt-2"></div>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
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
    // Summernote initialization
    $('.summernote').summernote({
        height: 200,
        toolbar: [
            ['style', ['bold', 'italic', 'underline']],
            ['para', ['ul', 'ol']],
            ['insert', ['link']],
            ['view', ['codeview']]
        ]
    });

    // Add Modal
    $('.btn-add').click(function(){
        let modal = $('#sliderModal');
        modal.find('.modal-title').text('Add Slider');
        modal.find('form').attr('action', "{{ route('admin.sliders.store') }}");
        modal.find('input[name="_method"]').val('POST');
        modal.find('input[name="title_h5"]').val('');
        modal.find('input[name="title_h1"]').val('');
        modal.find('textarea[name="description"]').summernote('code','');
        modal.find('input[name="button_url"]').val('');
        modal.find('input[name="image"]').val('');
        modal.find('select[name="status"]').val('1');
        $('#imagePreview').html('');
    });

    // Edit Modal
    $('.btn-edit').click(function(){
        let data = $(this).data();
        let modal = $('#sliderModal');
        modal.find('.modal-title').text('Edit Slider');
        modal.find('form').attr('action','/admin/sliders/'+data.id);
        modal.find('input[name="_method"]').val('PUT');
        modal.find('input[name="title_h5"]').val(data.title_h5);
        modal.find('input[name="title_h1"]').val(data.title_h1);
        modal.find('textarea[name="description"]').summernote('code', data.description || '');
        modal.find('input[name="button_url"]').val(data.button_url);
        modal.find('select[name="status"]').val(data.status);
        modal.find('input[name="image"]').val('');
        if(data.image){
            $('#imagePreview').html('<img src="/storage/'+data.image+'" width="120" class="mt-2">');
        } else {
            $('#imagePreview').html('');
        }
        modal.modal('show');
    });

    // Submit form
    $('#sliderForm').submit(function(e){
        e.preventDefault();
        $(this).find('textarea.summernote').each(function(){
            $(this).val($(this).summernote('code'));
        });
        let form = $(this);
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(res){
                $('#sliderModal').modal('hide');
                Swal.fire({ icon:'success', title:res.success, toast:true, position:'top-end', timer:2000, showConfirmButton:false })
                .then(()=>{
                    location.reload(); // Refresh table to update status and image
                });
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

    // Delete slider
    $('.btn-delete').click(function(){
        let id = $(this).data('id');
        Swal.fire({
            title:'Are you sure?',
            text:'This will delete the slider!',
            icon:'warning',
            showCancelButton:true,
            confirmButtonColor:'#d33',
            cancelButtonColor:'#3085d6',
            confirmButtonText:'Yes, delete it!'
        }).then((res)=>{
            if(res.isConfirmed){
                $.ajax({
                    url:'/admin/sliders/'+id,
                    type:'DELETE',
                    data:{_token:'{{ csrf_token() }}'},
                    success:function(resp){
                        $('#sliderRow'+id).remove();
                        Swal.fire({ icon:'success', title:resp.success, toast:true, position:'top-end', timer:1500, showConfirmButton:false });
                    }
                });
            }
        });
    });

});
</script>
@endpush
