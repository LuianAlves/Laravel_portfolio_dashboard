<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Multi Picture
            
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container">
            {{-- Add brand --}}
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">Multi Image</div>
    
                        <div class="card-body">
                            <form action="{{ route('store.image') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    {{-- Brand Image --}}
                                    <div class="input-group mb-3">
                                        <input type="file" name="image[]" class="form-control" multiple="">
                                    </div>  
                                    @error('image') 
                                        <span class="text-danger"> {{ $message }} </span> 
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary btn-sm">Add Image</button>   
                            </form>                      
                        </div>
                        
                    </div>
                </div>
            </div>
            {{-- List brand --}}
            <div class="row">
                <div class="mt-3">
                    <div class="card-group">
                        @foreach ($images as $multi)
                            <div class="col-md-3 m-3">
                                <div class="card">
                                    <img src="{{ asset($multi->image) }}" alt="">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>                         
        </div>
    </div>
</x-app-layout>
