
@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="justify-content-center row">
                <div class="col-6">              
                    <div class="card">
                        <div class="card-header bg-secondary font-weight-bold text-white">User Profile Update</div>

                        {{-- Alert --}}
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="card-body">
                            <form action="{{ route('update.user.profile') }}" method="POST">
                            @csrf
                                {{-- Change Profile--}}
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control form-control-sm" value="{{$user['name']}}">
                                </div> 
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" name="email" class="form-control form-control-sm" value="{{$user['email']}}">
                                </div> 
                                <button type="submit" class="btn btn-secondary btn-sm float-right">Save</button>   
                            </form>                      
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
*/
