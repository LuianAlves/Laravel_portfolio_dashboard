
@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="justify-content-center row">
                <div class="col-6">              
                    <div class="card">
                        <div class="card-header bg-secondary font-weight-bold text-white">Change Password</div>

                        <div class="card-body">
                            <form action="{{ route('password.update') }}" method="POST">
                            @csrf
                                {{-- Change Password --}}
                                <div class="input-group mb-3">
                                    <input type="password" id="current_password" name="oldpassword" class="form-control form-control-sm" placeholder="Current Password">
                                    @error('oldpassword')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> 

                                <div class="input-group mb-3">
                                    <input type="password" id="password" name="password" class="form-control form-control-sm" placeholder="New Password">
                                    @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> 

                                <div class="input-group mb-3">
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-sm" placeholder="Confirm New Password">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> 
                                <button type="submit" class="btn btn-secondary btn-sm float-right">Save Pass</button>   
                            </form>                      
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
*/
