<x-admin-layout>
    <x-slot name="title">{{ __('Admin Dashboard') }}</x-slot>
    <x-slot name="styles"></x-slot>
    <x-slot name="header">
        <div class="row mb-2 justify-content-between">
            <div class="col-md-2" style="float: left;">
              <h3><strong>Add New Job</strong></h3>
            </div>
          </div> 
    </x-slot>


    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('store.job') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter Job Title">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Slug</label>
                            <input type="text" name="slug" class="form-control" id="slug" placeholder="Enter Job Slug">
                        </div>
                    </div>
                    <div class="row" id="extend-field">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Description</label>
                            <textarea name="description" id="description"></textarea>
                        </div>
                    </div>
                    <div class="row" id="extend-field">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Expire Date</label>
                            <input type="date" class="form-control" name="expire_date">
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
        $('#description').summernote({
          placeholder: 'Enter Job Description ...',
          tabsize: 2,
          height: 100
        });
    </script>

    <x-slot name="scripts"></x-slot>
</x-admin-layout>