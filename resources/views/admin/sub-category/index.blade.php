@extends('admin.admin_master')

@section('admin')

    <div class="py-5">
        <div class="container">
            {{-- Add Category --}}
            <div class="justify-content-center row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header bg-success text-white font-weight-bold">Add Sub Category</div>

                        <div class="card-body">
                            <form action="{{ route('store.scategory') }}" method="POST">
                                @csrf
                                    {{-- Select Category --}}
                                    <div class="form-select mb-3">
                                        <select class="form-control form-control-sm" name="category_id">
                                            @foreach($categories as $cat)
                                                <option value="{{$cat->id}}">{{ $cat->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- Sub Category --}}
                                    <div class="input-group mb-3">
                                        <input type="text" name="framework" class="form-control form-control-sm" placeholder="Framework">
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
                    @endif
                    <div class="card">

                        <div class="card-header bg-info text-white font-weight-bold">All Sub Category</div>
                        <div class="card-body">
                            <table class="table table-light">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>Framework</th>
                                        <th>Language</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @foreach($sub_categories as $scat)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td class="text-center">{{ $scat->framework }}</td>
                                            <td class="text-center">
                                                @if($scat->category == '')
                                                    <span class="text-danger"><strong>Indefined</strong></span>
                                                @else
                                                    {{ $scat->category->category_name }}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($scat->created_at == NULL)
                                                    <span class="text-danger"><strong>No Data Set</strong></span>
                                                @else
                                                    {{ $scat->created_at->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($scat->updated_at == NULL)
                                                    <span class="text-danger"><strong>No Update Set</strong></span>
                                                @else
                                                    {{ $scat->updated_at->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('scategory/edit/'.$scat->id) }}" class="btn btn-outline-success btn-sm mr-md-2">Edit</a>
                                                <a href="{{ url('scategory/destroy/'.$scat->id) }}" class="btn btn-outline-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>              
        </div>
    </div>
@endsection
