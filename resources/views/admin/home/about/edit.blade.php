@extends('admin.admin_master')

@section('admin')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info">
                    <p class="text-white font-weight-bold">Edit About Me</p>
                </div>
                <div class="card-body">
                    <form action="{{ url('update/homeabout/'.$abouts->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <span class="m-2 d-block">Title</span>
                            <input type="text" class="form-control" name="title" placeholder="Enter title" value="{{ $abouts->title }}">
                        </div>           
                        <div class="form-group">
                            <span class="m-2 d-block">Short Description</span>
                            <textarea class="form-control" name="sort_description" rows="2" placeholder="Enter description">{{ $abouts->sort_description}}</textarea>
                        </div>
                        <div class="form-group">
                            <span class="m-2 d-block">Long Description</span>
                            <textarea class="form-control" name="long_description" rows="4" placeholder="Enter description">{{ $abouts->long_description}}</textarea>
                        </div>
                        <hr class="bg-info">
                        <div class="form-group">
                            <span class="mt-4 m-2 d-block">Sub Description</span>
                            <textarea class="form-control" name="sub_description" rows="2" placeholder="This is Optional">{{ $abouts->sub_description}}</textarea>
                        </div>
                        <div class="form-group">
                            <span class="mt-4 m-2 d-block">Second Long Description</span>
                            <textarea class="form-control" name="long_description_sec" rows="2" placeholder="Enter text">{{ $abouts->long_description_sec}}</textarea>
                        </div>
                        <div class="form-footer mt-4">
                            <button type="submit" class="btn btn-primary btn-info btn-sm float-right">Update Infos</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection