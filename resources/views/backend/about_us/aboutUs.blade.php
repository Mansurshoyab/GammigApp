<x-admin-layout>
    <x-slot name="title">{{ __('Admin Dashboard') }}</x-slot>
    <x-slot name="styles"></x-slot>
    <x-slot name="header">
        <div class="row mb-2 justify-content-between">
            <div class="col-md-2" style="float: left;">
              <h3><strong>About Section</strong></h3> 
            </div>
          </div> 
    </x-slot>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('store.about') }}" enctype="multipart/form-data">
                    @csrf
                    @if($abouts->isNotEmpty())
                        @php
                            $about = $abouts->first();
                        @endphp
                        <input type="hidden" name="id" value="{{ $about->id }}"> <!-- Hidden ID field -->
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Description</label>
                                <textarea name="description" id="description">{{ $about->description }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-8">
                                <label class="form-label">Image</label>
                                <input type="file" name="image[]" class="form-control" multiple>
                            </div>
                            <div class="mb-3 col-md-2">
                                @if ($about->images)
                                    @php
                                        $images = json_decode($about->images);
                                    @endphp
                                    <div class="existing-images">
                                        @foreach ($images as $image)
                                            <div class="existing-image">
                                                <img src="{{ asset('images/' . $image) }}" alt="" height="50px" width="50px">
                                                <button type="button" class="btn btn-danger btn-sm delete-image" data-id="{{ $about->id }}" data-image="{{ $image }}">Delete</button>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-1">
                            <input class="btn btn-success" type="submit" value="Update"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    


    {{-- <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('store.about') }}" enctype="multipart/form-data">
                    @csrf
                    @if($abouts->isNotEmpty())
                    <div class="row" id="extend-field">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Description</label>
                            <textarea name="description" id="description">{{ $abouts->first()->description }}</textarea>
                        </div>
                    </div>
                    @endif
                    <div class="row">
                        <div class="mb-3 col-md-8">
                            <label class="form-label">Title</label>
                            <input type="file" name="image[]" class="form-control" placeholder="Enter Title">
                        </div>
                        <div class="mb-3 col-md-2">
                            @if (!empty($about->images))
                                    @foreach(json_decode($about->images) as $image)
                                        <img src="{{ asset('images/' . $image) }}" alt="Image" width="50" height="50">
                                    @endforeach
                                @endif
                        </div>
                        <div class="col-md-1 mt-2"><br>
                            <input class="form-control btn btn-success add-button" type="button" id="extend" value="ADD +"/>
                        </div>
                    </div>
                    <div class="row" id="extend-field">
                        <div class="col-1">
                            <input class="btn btn-success" type="submit" id="extend" value="Update "/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

    <script>
        $(document).ready(function() {
            $('.delete-image').click(function() {
                var imageId = $(this).data('id');
                var imageName = $(this).data('image');
                if (confirm('Are you sure you want to delete this image?')) {
                    $.ajax({
                        url: '{{ route('delete.image') }}', // Updated URL
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: imageId,
                            image: imageName
                        },
                        success: function(response) {
                            location.reload(); // Reload the page to update the image list
                        },
                        error: function(xhr) {
                            alert('An error occurred while deleting the image.');
                        }
                    });
                }
            });
        });
    </script>
    
    

    {{-- <script>
        $(document).ready(function(){ 
            $(".add-button").click(function(e){
                e.preventDefault();
                $("#extend-field").append(`
                    <div class="row" id="extend-field">
                        <div class="mb-3 col-md-8">
                            <label class="form-label">District</label>
                            <input type="file" name="image[]" class="form-control" placeholder="Enter Title">
                        </div>
                    </div>
                `);
                $("#extend-field").on("click", ".remove-extend-field", function(e){
                    e.preventDefault();
                    $(this).closest('.row').remove();
                });
            });
        });
    </script> --}}

    <script>
        $('#description').summernote({
          placeholder: 'Enter Job Description ...',
          tabsize: 2,
          height: 100
        });
    </script>

    <x-slot name="scripts"></x-slot>
</x-admin-layout>