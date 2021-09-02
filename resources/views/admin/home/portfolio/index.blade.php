@extends('admin.admin_master')

@section('admin')

    <div class="py-5">
        <div class="container">
            {{-- Add Category --}}
            <div class="justify-content-end row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header bg-success text-white font-weight-bold">Add Portfolio Card</div>

                        <div class="card-body">
                            <form action="{{ route('store.portfolio') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    {{-- Select Category --}}
                                    <div class="form-select mb-3">
                                        <select class="form-control form-control-sm" name="category_id">
                                            @foreach($categories as $cat)
                                                <option value="{{$cat->id}}">{{ $cat->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- Title --}}
                                    <div class="input-group mb-3">
                                        <input type="text" name="title" class="form-control form-control-sm" placeholder="Title">
                                    </div>  
                                    {{-- Description --}}
                                    <div class="form-group">
                                        <textarea class="form-control" name="description" rows="3" placeholder="Description"></textarea>
                                    </div>
                                    {{-- Image --}}
                                    <div class="input-group mb-3">
                                        <input type="file" name="image" style="border-radius: 7px; border: 1px solid #f2f3f5; padding: 8px; width: 100%;">
                                    </div>  
                                    
                                <button type="submit" class="btn btn-success btn-sm float-right">Save</button>   
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
                    @elseif(session('deleted'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session('deleted')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif(session('restore')) 
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <strong>{{ session('restore')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">

                        <div class="card-header bg-info text-white font-weight-bold">All Sub Category</div>
                        <div class="card-body">
                            <table class="table table-light">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>Language</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @foreach($portfolio as $p)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td class="text-center">{{ $p->category->category_name }}</td>
                                            <td class="text-center">{{ $p->title }}</td>
                                            <td class="text-center">{{ $p->description }}</td>
                                            <td class="text-center">
                                                @if($p->created_at == NULL)
                                                    <span class="text-danger"><strong>No Data Set</strong></span>
                                                @else
                                                    {{ $p->created_at->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($p->updated_at == NULL)
                                                    <span class="text-danger"><strong>No Update Set</strong></span>
                                                @else
                                                    {{ $p->updated_at->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td class="d-flex">
                                                <a href="{{ url('edit/portfolio/'.$p->id) }}" class="btn btn-outline-success btn-sm mr-md-2">Edit</a>
                                                <a href="{{ url('softdelete/portfolio/'.$p->id) }}" class="btn btn-outline-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>              
            {{-- Trach List --}}
            <div class="justify-content-center row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-danger text-white font-weight-bold">Trash List</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th>Language</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @foreach($trachList as $tlist)
                                        <tr>
                                            <td class="text-center">{{ $tlist->category->category_name }}</td>
                                            <td class="text-center">{{ $tlist->title }}</td>
                                            <td class="col-3 text-center">{{ $tlist->description }}</td>
                                            <td class="text-center">
                                                @if($tlist->created_at == NULL)
                                                    <span class="text-danger"><strong>No Data Set</strong></span>
                                                @else
                                                    {{ $tlist->created_at->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($tlist->updated_at == NULL)
                                                    <span class="text-danger"><strong>No Update Set</strong></span>
                                                @else
                                                    {{ $tlist->updated_at->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td class="d-flex">
                                                <a href="{{ url('restore/portfolio/'.$tlist->id) }}" class="btn btn-outline-info btn-sm mr-md-2">Restore</a>
                                                <a href="{{ url('destroy/portfolio/'.$tlist->id) }}" onclick="return confirm('Are you sure to delete')" class="btn btn-outline-danger btn-sm">Permanently</a>
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
