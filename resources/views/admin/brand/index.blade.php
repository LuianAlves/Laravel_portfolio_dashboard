@extends('admin.admin_master')

@section('admin')

    <div class="py-5">
        <div class="container">
            <div class="justify-content-center row">
                {{-- Add brand --}}          
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-header text-white font-weight-bold bg-success">Add Brand</div>

                        <div class="card-body">
                            <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    {{-- Brand Name --}}
                                    <div class="input-group mb-3">
                                        <input type="text" name="brand_name" class="form-control" placeholder="Brand Name">
                                    </div>  
                                    @error('brand_name') 
                                        <span class="text-danger"> {{ $message }} </span> 
                                    @enderror
                                    {{-- Brand Image --}}
                                    <div class="input-group mb-3">
                                        <input type="file" name="brand_image" style="border-radius: 7px; border: 1px solid #f2f3f5; padding: 8px; width: 100%;">
                                    </div>  
                                    @error('brand_image') 
                                        <span class="text-danger"> {{ $message }} </span> 
                                    @enderror
                                <button type="submit" class="btn btn-success btn-sm float-right">Add brand</button>   
                            </form>        
                        </div>                 
                    </div>
                </div>
            {{-- List brand --}}
                <div class="col-8 col-md-12">
                    {{-- Alert --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">

                        <div class="card-header font-weight-bold bg-info text-white">All Brand</div>
                        <div class="card-body bg-light">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>Brand Name</th>
                                        <th>Brand Image</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($i = 1) --}}
                                    @foreach($brands as $brand)
                                        <tr>
                                            {{-- <th scope="row">{{ $i++ }}</th> --}}
                                            <th scope="row">{{ $brands->firstItem()+$loop->index }}</th>
                                            <td>{{ $brand->brand_name }}</td>
                                            <td> <img src="{{ asset($brand->brand_image) }}" style="height: 40px; width: 70px;"> </td>
                                            <td>
                                                @if($brand->created_at == NULL)
                                                    <span class="text-danger"><strong>No Data Set</strong></span>
                                                @else
                                                    {{ $brand->created_at->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($brand->updated_at == NULL)
                                                    <span class="text-danger"><strong>No Update Set</strong></span>
                                                @else
                                                    {{ $brand->updated_at->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('brand/edit/'.$brand->id) }}" class="btn btn-outline-success btn-sm">Edit</a>
                                                <a href="{{ url('brand/destroy/'.$brand->id) }}" onclick="return confirm('Are you sure to delete')" class="btn btn-outline-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $brands->links() }}
                        </div>
                    </div>
                </div>       
            </div>                              
        </div>
    </div>
@endsection