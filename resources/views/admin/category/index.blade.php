@extends('admin.admin_master')

@section('admin')

    <div class="py-5">
        <div class="container">
            {{-- Add Category --}}
            <div class="justify-content-end row">

                <div class="col-8">
                    <div class="card">
                        <div class="card-header bg-success text-white font-weight-bold">Add Category</div>

                        <div class="card-body">
                            <form action="{{ route('store.category') }}" method="POST">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="text" name="category_name" class="form-control form-control-sm" placeholder="Category Name">
                                </div>  
                                @error('category_name')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                                <button type="submit" class="btn btn-success btn-sm float-right">Add Category</button>   
                            </form>                      
                        </div>
                        
                    </div>
                </div>
            </div>
            {{-- List Category --}}
            <div class="justify-content-center row">
                <div class="col-12 mt-3">
                    {{-- Alert --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">

                        <div class="card-header bg-info text-white font-weight-bold">All Category</div>
                        <div class="card-body">
                            <table class="table table-light">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>User</th>
                                        <th>Category Name</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($i = 1) --}}
                                    @foreach($categories as $category)
                                        <tr>
                                            {{-- <th scope="row">{{ $i++ }}</th> --}}
                                            <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                                            <td>{{ $category->user->name }}</td>
                                            <td class="text-center">{{ $category->category_name }}</td>
                                            <td class="text-center">
                                                @if($category->created_at == NULL)
                                                    <span class="text-danger"><strong>No Data Set</strong></span>
                                                @else
                                                    {{ $category->created_at->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($category->updated_at == NULL)
                                                    <span class="text-danger"><strong>No Update Set</strong></span>
                                                @else
                                                    {{ $category->updated_at->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-outline-success btn-sm mr-md-2">Edit</a>
                                                <a href="{{ url('softdelete/category/'.$category->id) }}" class="btn btn-outline-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>              
            {{-- Trach List --}}
            <div class="justify-content-center row">
                <div class="col-12 mt-3">
                    {{-- Alert --}}
                    @if(session('deleted'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session('deleted')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header bg-danger text-white font-weight-bold">Trash List</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>User</th>
                                        <th>Category Name</th>
                                        <th>Deleted At</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($i = 1) --}}
                                    @foreach($trachCat as $category)
                                        <tr>
                                            {{-- <th scope="row">{{ $i++ }}</th> --}}
                                            <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                                            <td>{{ $category->user->name }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td>
                                                @if($category->deteted_at != '' && $category->deteted_at == NULL)
                                                    <span class="text-danger"><strong>No Delete Set</strong></span>
                                                @else
                                                    {{ $category->deleted_at->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($category->created_at == NULL)
                                                    <span class="text-danger"><strong>No Data Set</strong></span>
                                                @else
                                                    {{ $category->created_at->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('category/restore/'.$category->id) }}" class="btn btn-outline-info btn-sm mr-md-2">Restore</a>
                                                <a href="{{ url('destroy/category/'.$category->id) }}" class="btn btn-outline-danger btn-sm">Permanently</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- {{ $trachCat->links() }} --}}
                        </div>
                    </div>
                </div>           
            </div>
        </div>
    </div>
@endsection
