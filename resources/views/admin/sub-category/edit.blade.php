
@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="justify-content-center row">
                <div class="col-md-8">              
                    <div class="card">
                        <div class="card-header bg-success font-weight-bold text-white">Edit Category</div>

                        <div class="card-body">
                            <form action="{{ url('scategory/update/'.$sub_categories->id) }}" method="POST">
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
                                <button type="submit" class="btn btn-success btn-sm float-right">Update Sub-Category</button>   
                            </form>                      
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
*/
