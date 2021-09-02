@extends('admin.admin_master')

@section('admin')

    <div class="py-5">
        <div class="container">
            <div class="justify-content-end row">

                {{-- Button Add Info --}}
                <span class="float-right">
                    <a class="font-weight-bold">Home About</a>
                    <a href="{{ route('add.about') }}" class="btn btn-info btn-sm m-3">Add Info</a>
                </span>
                {{-- About Info List --}}
                <div class="col-12">
                    {{-- Alert --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header font-weight-bold bg-success text-white">Home About</div>
                        <div class="card-body">
                            <table class="table table-light">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        {{-- <th>Short</th> --}}
                                        <th>Long</th>
                                        <th>Sub</th>
                                        <th>2° Long</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($homeAbout as $about)
                                        <tr>
                                             <td>{{ $about->title }}</td>
                                             {{-- <td>{{ $about->sort_description }}</td> --}}
                                             <td>{{ $about->long_description }}</td>

                                            <td>
                                                 @if($about->sub_description == NULL)
                                                    <span class="text-danger"><strong>No Set</strong></span>
                                                 @else
                                                    {{ $about->sub_description }}
                                                 @endif
                                            </td>

                                            <td>
                                                 @if($about->long_description_sec == NULL)
                                                    <span class="text-danger"><strong>No Set</strong></span>
                                                 @else
                                                    {{ $about->long_description_sec }}
                                                 @endif
                                            </td>
                                            
                                           
                                            <td class="d-flex">
                                                <a href="{{ url('edit/about/'.$about->id) }}" class="btn btn-outline-success btn-sm mr-md-2">Edit</a>
                                                <a href="{{ url('destroy/about/'.$about->id) }}" onclick="return confirm('Are you sure to delete')" class="btn btn-outline-danger btn-sm">Delete</a>
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