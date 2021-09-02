@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">            
                    <div class="card">
                        <div class="card-header bg-warning text-white font-weight-bold">Edit Brand</div>

                        <div class="card-body">
                            <form action="{{ url('brand/update/'.$brands->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <input type="hidden" name="old_image" value="{{ $brands->brand_image }}">
                                    {{-- Brand Name --}}
                                    <div class="input-group mb-3">
                                        <input type="text" name="brand_name" class="form-control" placeholder="Brand Name" value="{{ $brands->brand_name }}">
                                    </div>  
                                    @error('brand_name') 
                                        <span class="text-danger"> {{ $message }} </span> 
                                    @enderror

                                    {{-- Brand Image --}}
                                    <div class="input-group mb-3">
                                        <input type="file" name="brand_image" style="border-radius: 7px; border: 1px solid #f2f3f5; padding: 8px; width: 100%;" value="{{ $brands->brand_image }}">
                                    </div>  
                                    @error('brand_image') 
                                        <span class="text-danger"> {{ $message }} </span> 
                                    @enderror

                                    <div class="input-group mb-3">
                                        <img src="{{ asset($brands->brand_image) }}" style="width: 100%; height: 200px">
                                    </div>
                                <button type="submit" class="btn btn-success btn-sm float-right">Update Brand</button>   
                            </form>                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
