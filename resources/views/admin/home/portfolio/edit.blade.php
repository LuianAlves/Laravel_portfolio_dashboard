@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="justify-content-center row">

                <div class="col-8 mb-3">              
                    <div class="card">
                        <div class="card-header bg-warning text-white font-weight-bold">Edit Portfolio Card</div>

                        <div class="card-body">
                            <form action="{{ url('update/portfolio/'.$portfolio->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <input type="hidden" name="old_image" value="{{ $portfolio->image }}">
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
                                        <input type="text" name="title" class="form-control form-control-sm" placeholder="Title" value="{{ $portfolio->title }}">
                                    </div>  
                                    {{-- Description --}}
                                    <div class="form-group">
                                        <textarea class="form-control" name="description" rows="3" placeholder="Description"> {{ $portfolio->description }} </textarea>
                                    </div>
                                    {{-- Image --}}
                                    <div class="input-group mb-3">
                                        <input type="file" name="image" style="border-radius: 7px; border: 1px solid #f2f3f5; padding: 8px; width: 100%;" value="{{ $portfolio->image }}">
                                    </div>
                                    {{-- Imagem Atual --}}
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <img src="{{ asset($portfolio->image) }}" style="width: 100%; height: 200px">
                                        </div>
                                    </div>
                                <button type="submit" class="btn btn-warning text-white btn-sm float-right">Save Card</button>   
                            </form>                      
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

