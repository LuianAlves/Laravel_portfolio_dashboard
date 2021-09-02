@extends('admin.admin_master')

@section('admin')

    <h4>Admin Messages</h4>
    <div class="py-5">
        <div class="container">
            <div class="justify-content-end row">
                <div class="card">
                    <div class="card-header font-weight-bold bg-success text-white">All Message Data</div>
                    <div class="card-body">
                        <table class="table table-light">
                            <thead>
                                <tr>
                                    <th width="5%">Name</th>
                                    <th width="10%">Email</th>
                                    <th width="20%">Subject</th>
                                    <th>Message</th>
                                    <th width="15%">Seended</th>
                                    <th width="5%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($message as $msg)
                                    <tr>
                                            <td>{{ $msg->name }}</td>
                                            <td>{{ $msg->email }}</td>
                                            <td>{{ $msg->subject }}</td>
                                            <td>{{ $msg->message }}</td>

                                            <td>
                                            @if($msg->created_at == NULL)
                                                <span class="text-danger"><strong>No Update Set</strong></span>
                                            @else
                                                {{ $msg->created_at->diffForHumans() }}
                                            @endif
                                        </td>
                                        
                                        
                                        <td class="d-flex">
                                            <a href="{{ url('contact/destroy/'.$msg->id) }}" onclick="return confirm('Are you sure to delete')" class="btn btn-outline-danger btn-sm">Delete</a>
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

@endsection