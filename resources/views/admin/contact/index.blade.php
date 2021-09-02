@extends('admin.admin_master')

@section('admin')

    <div class="py-5">
        <div class="container">
            <div class="justify-content-end row">

                {{-- Button Add Info --}}
                <span class="float-right">
                    <a class="font-weight-bold">Contact</a>
                    <a href="{{ route('add.contact') }}" class="btn btn-info btn-sm m-3">Add Info</a>
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
                        <div class="card-header font-weight-bold bg-success text-white">Contact Page</div>
                        <div class="card-body">
                            <table class="table table-light">
                                <thead>
                                    <tr class="text-center">
                                        <th>Contact Address</th>
                                        <th>Contact E-mail</th>
                                        <th>Contact Phone</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contacts as $con)
                                        <tr class="text-center">
                                             <td>{{ $con->address }}</td>
                                             <td>{{ $con->email }}</td>
                                             <td>{{ $con->phone }}</td>

                                             <td>
                                                @if($con->updated_at == NULL)
                                                    <span class="text-danger"><strong>No Update Set</strong></span>
                                                @else
                                                    {{ $con->updated_at->diffForHumans() }}
                                                @endif
                                            </td>
                                            
                                           
                                            <td class="d-flex">
                                                <a href="{{ url('contact/edit/'.$con->id) }}" class="btn btn-outline-success btn-sm mr-md-2">Edit</a>
                                                <a href="{{ url('contact/destroy/'.$con->id) }}" onclick="return confirm('Are you sure to delete')" class="btn btn-outline-danger btn-sm">Delete</a>
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