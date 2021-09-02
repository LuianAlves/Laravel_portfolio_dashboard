@extends('admin.admin_master')

@section('admin')
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header bg-info">
                    <p class="text-white font-weight-bold">Add Contact</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('store.contact') }}" method="POST">
                        @csrf

                        <div class="form-group col">
                            <input type="text" class="form-control form-control-sm" name="address" placeholder="Enter address">
                        </div>           
                        <div class="form-group col-10">
                            <input type="email" class="form-control form-control-sm" name="email" placeholder="Enter email">
                        </div>           
                        <div class="form-group col-7">
                            <input type="number" class="form-control form-control-sm" name="phone" placeholder="Enter phone">
                        </div>           
                        
                        </div>
                        
                        <div class="form-footer mt-4">
                            <button type="submit" class="btn btn-primary btn-info btn-sm float-right m-3">Add About Info</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection