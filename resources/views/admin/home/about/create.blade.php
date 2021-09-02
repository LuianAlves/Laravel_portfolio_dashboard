@extends('admin.admin_master')

@section('admin')
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header bg-info">
                    <p class="text-white font-weight-bold">Add About</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('store.about') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <span class="m-2 d-block">Title About</span>
                            <input type="text" class="form-control form-control-sm" name="title" placeholder="Enter title">
                        </div>           
                        <div class="form-group">
                            <span class="m-2 d-block">Short Description About</span>
                            <textarea class="form-control form-control-sm" name="sort_description" rows="2" placeholder="Enter description"></textarea>
                        </div>
                        <div class="form-group">
                            <span class="m-2 d-block">Long Description About</span>
                            <textarea class="form-control" name="long_description" rows="4" placeholder="Enter description"></textarea>
                        </div>
                        <hr class="bg-info mt-5">
                        <div class="form-group">
                            <span class="m-2 d-block">Sub Description</span>
                            <textarea class="form-control" name="sub_description" rows="2" placeholder="Enter text"></textarea>
                        </div>
                        <div class="form-group">
                            <span class="m-2 d-block">Second Long Description</span>
                            <textarea class="form-control" name="long_description_sec" rows="2" placeholder="Enter text"></textarea>
                        </div>
                        
                        <div class="form-footer mt-4">
                            <button type="submit" class="btn btn-primary btn-info btn-sm float-right">Add About Info</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection