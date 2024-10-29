<x-admin-layout>
    <x-slot name="title">{{ __('Admin Dashboard') }}</x-slot>
    <x-slot name="styles"></x-slot>
    <x-slot name="header">
        <div class="row mb-2 justify-content-between">
            <div class="col-md-2" style="float: left;">
              <h3><strong>Add Country</strong></h3>
            </div>
          </div>  
    </x-slot>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body"> 
                <form method="POST" action="{{ route('store.image.country') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="mb-3 col-md-8">
                                <label class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" id="inputPassword4">
                            </div>
                            <div class="mb-3 col-md-4">
                                @if($countries && $countries->image)
                                    <img src="{{ asset('_uploads/' . $countries->image) }}" alt="" height="80px" width="100px">
                                @endif 
                            </div>
                        </div>
                        <div class="row" id="">
                            <div class="col-1">
                                <input class="btn btn-success" type="submit" value="Update"/>
                            </div>
                        </div>
                </form>

                <form method="POST" action="{{ route('store.country') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-5" id="extend-field">
                        @if($countries && $countries->country)
                            <?php $countries = json_decode($countries->country); ?>
                            @foreach($countries->name as $key => $name)
                                @if(!empty($name) || !empty($countries->location[$key]))
                                    <div class="mb-3 col-md-5">
                                        <label class="form-label">Country Name</label>
                                        <input type="text" name="name[]" value="{{ $countries->name[$key] }}"  class="form-control" placeholder="Enter Country Name">
                                    </div>
                                    <div class="mb-3 col-md-5">
                                        <label class="form-label">Location</label>
                                        <input type="text" name="location[]" value="{{ $countries->location[$key] }}" class="form-control" placeholder="Enter Country Location">
                                    </div>
                                    @endif
                                    @endforeach
                                    <div class="col-md-1 mt-2">
                                        <br>
                                        <input class="form-control btn btn-success add-button" type="button" id="extend" value="ADD +"/>
                                    </div>
                                @endif
                    </div>
                    <div class="row" id="extend-field">
                        <div class="col-1">
                            <input class="btn btn-success" type="submit" id="extend" value="update"/>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){ 
            $(".add-button").click(function(e){
                e.preventDefault();
                $("#extend-field").append(`
                    <div class="row" id="extend-field">
                        <div class="mb-3 col-md-5">
                            <label class="form-label">Country Name</label>
                            <input type="text" name="name[]" class="form-control" placeholder="Enter Country Name">
                        </div>
                        <div class="mb-3 col-md-5">
                            <label class="form-label">Location</label>
                            <input type="text" name="location[]" class="form-control" placeholder="Enter Country Location">
                        </div>
                        <div class="col-md-1 mt-4">
                            <input class="form-control btn btn-danger remove-extend-field" id="remove-btn" type="button" value=" - "/>
                        </div>
                    </div>
                `);
                $("#extend-field").on("click", ".remove-extend-field", function(e){
                    e.preventDefault();
                    $(this).closest('.row').remove();
                });
            });
        });
    </script>

    <x-slot name="scripts"></x-slot>
</x-admin-layout>