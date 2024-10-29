<x-admin-layout>
    <x-slot name="title">{{ __('Admin Dashboard') }}</x-slot>
    <x-slot name="styles"></x-slot>
    <x-slot name="header">
        <div class="row mb-2 justify-content-between">
            <div class="col-md-2" style="float: left;">
              <h3><strong>Add Category</strong></h3>
            </div>
          </div>
          
                   
    </x-slot>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('store.category') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter Your title">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Slug</label>
                            <input type="text" name="slug"  id="slug" class="form-control" placeholder="Enter Your title" readonly>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Parent Categoyr</label>
                            <select name="parent_id" id="" class="form-control">
                                <option value="" selected disabled >{{ __('No Parent') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" >{{ ucfirst($category->title) }}</option>
                                @endforeach
                            </select>
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

    <x-slot name="scripts"></x-slot>
</x-admin-layout>