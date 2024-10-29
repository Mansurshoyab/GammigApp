<x-admin-layout>
    <x-slot name="title">{{ __('Admin Dashboard') }}</x-slot>
    <x-slot name="styles"></x-slot>
    <x-slot name="header">
        <div class="row mb-2 justify-content-between">
            <div class="col-md-2" style="float: left;">
              <h3><strong>Add Employee</strong></h3>
            </div>
          </div>
          
                   
    </x-slot>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('store.Employee') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Your Name">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" id="inputPassword4">
                        </div>
                    </div>
                    <div class="row" id="extend-field">
                        <div class="mb-3 col-md-5">
                            <label class="form-label">Designation</label>
                            <input type="text" name="designation[]" class="form-control" placeholder="Enter Designation">
                        </div>
                        <div class="mb-3 col-md-5">
                            <label class="form-label">Company Name</label>
                            <input type="text" name="company_name[]" class="form-control" id="inputPassword4" placeholder="Enter Company Name">
                        </div>
                        <div class="col-md-1 mt-2"><br>
                            <input class="form-control btn btn-success add-button" type="button" id="extend" value="ADD +"/>
                        </div>
                    </div>
                    <div class="row" id="extend-field">
                        <div class="col-1">
                            <input class="btn btn-primary" type="submit" id="extend" value="submit "/>
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
                            <input type="text" name="designation[]" class="form-control" value="{{ $company->name ?? '' }}" placeholder="Enter Designation">
                        </div>
                        <div class="mb-3 col-md-5">
                            <input type="text" name="company_name[]" class="form-control" value="{{ $company->tagline ?? '' }}" id="inputPassword4" placeholder="Enter Company Name">
                        </div>
                        <div class="col-md-1">
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