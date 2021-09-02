@extends('admin.admin_master')

@section('admin')

    <div class="py-5">
        <div class="container">
            <div class="row">

                <div class="col d-flex mb-3">
                    <h4 class="mr-5">Home Slider</h4>    
                </div>

                <span class="float-right">
                    <a href="{{ route('add.slider') }}" class="btn btn-info btn-sm">Add Slider</a>
                </span>

                {{-- List brand --}}
                <div class="col-12">
                    {{-- Alert --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">

                        <div class="card-header font-weight-bold bg-info text-white">All Slider</div>
                        <div class="card-body">
                            <table class="table table-light">
                                <thead>
                                    <tr>
                                        {{-- <th scope="col">#</th> --}}
                                        <th width="5%">Title</th>
                                        <th width="25%">Description</th>
                                        <th width="15%">Image</th>
                                        <th width="15%">Created</th>
                                        <th width="15%">Updated</th>
                                        <th width="15%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($i = 1) --}}
                                    @foreach($sliders as $slider)
                                        <tr>
                                            {{-- <th scope="row">{{ $i++ }}</th> --}}
                                            {{-- <th scope="row">{{ $sliders->firstItem()+$loop->index }}</th> --}}
                                            <td>{{ $slider->title }}</td>
                                            <td style="text-align: justify;">{{ $slider->description }}</td>
                                            <td> <img src="{{ asset($slider->image) }}" style="height: 100px; width: 100px;"> </td>
                                            <td>
                                                @if($slider->created_at == NULL)
                                                    <span class="text-danger"><strong>No Data</strong></span>
                                                @else
                                                    {{ $slider->created_at->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($slider->updated_at == NULL)
                                                    <span class="text-danger"><strong>No Data</strong></span>
                                                @else
                                                    {{ $slider->updated_at->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td class="d-flex">
                                                <a href="{{ url('edit/slider/'.$slider->id) }}" class="btn btn-outline-success btn-sm mr-md-2">Edit</a>
                                                <a href="{{ url('destroy/slider/'.$slider->id) }}" onclick="return confirm('Are you sure to delete')" class="btn btn-outline-danger btn-sm">Delete</a>
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