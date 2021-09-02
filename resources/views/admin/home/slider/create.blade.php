@extends('admin.admin_master')

@section('admin')

<div class="col">
    <div class="card">
        <div class="card-header bg-info">
            <p class="text-white font-weight-bold">Add Slider</p>
        </div>
        <div class="card-body">
            <form action="{{ route('store.slider') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <span class="m-2 d-block">Title</span>
                    <input type="text" class="form-control" name="title" placeholder="Enter title">
                </div>           
                <div class="form-group">
                    <span class="m-2 d-block">Description</span>
                    <textarea class="form-control" name="description" rows="3" placeholder="Enter description"></textarea>
                </div>
                <div class="form-group">
                    <span class="m-2 d-block">Slider Image</span>
                    <input type="file" class="form-control-file" name="image" style="border-radius: 7px; border: 1px solid #f2f3f5; padding: 15px; width: 100%;">
                </div>
                <div class="form-footer mt-4">
                    <button type="submit" class="btn btn-primary btn-info btn-sm float-right">Add Slider</button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection