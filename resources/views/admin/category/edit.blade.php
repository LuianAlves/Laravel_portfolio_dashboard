@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="justify-content-center row">
                <div class="col-md-8">              
                    <div class="card">
                        <div class="card-header bg-success font-weight-bold text-white">Edit Category</div>

                        <div class="card-body">
                            <form action="{{ url('category/update/'.$categories->id) }}" method="POST">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="text" name="category_name" class="form-control" placeholder="Category Name" value="{{ $categories->category_name}}">
                                </div>  
                                @error('category_name')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                                <button type="submit" class="btn btn-success btn-sm float-right">Update Category</button>   
                            </form>                      
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
