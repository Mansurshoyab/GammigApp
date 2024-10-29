<x-admin-layout>
    <x-slot name="title">{{ __('Admin Dashboard') }}</x-slot>
    <x-slot name="styles"></x-slot>
    <x-slot name="header">
      <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
          <h3><strong>Company Setup</strong></h3>
        </div>
        <div class="col-auto ms-auto text-end mt-n1">
        </div>
      </div>
    </x-slot>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.company.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Company Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $company->name ?? '' }}" placeholder="Enter Your Company Name">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Tagline</label>
                            <input type="text" name="tagline" class="form-control" value="{{ $company->tagline ?? '' }}" id="inputPassword4" placeholder="Enter Company Tagline">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label w-100" for="logo">Enter Logo</label>
                            <input type="file" id="logo" name="logo" class="form-control">
                        </div>
                        <div class="logo-show mb-3 col-md-2">
                            <img src="{{ asset('assets/img/logo.jpg') }}" id="show-logo" width="80px" height="80px">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="favicon">Favicon</label>
                            <input type="file" name="favicon" class="form-control" id="favicon">
                        </div>
                        <div class="mb-3 col-md-2">
                            <img src="{{ asset('assets/img/logo.jpg') }}" alt="" id="show-favicon" width="80px" height="80px">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" >Email</label>
                            <input type="email" name="email"  value="{{ $company->email ?? '' }}"  class="form-control" placeholder="Enter Your Email">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" value="{{ $company->phone ?? '' }}" class="form-control" placeholder="Enter Your Phone">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" >Telephone</label>
                            <input type="text" name="telephone" value="{{ $company->telephone ?? '' }}"   class="form-control" placeholder="Enter Your Telephone Number">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" >Web Site</label>
                            <input type="text" name="webSite" value="{{ $company->webSite ?? '' }}"   class="form-control" placeholder="Enter Your Web Site">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Facebook</label>
                            <input type="text" name="facebook" value="{{ $social_linkes->facebook ?? '' }}"   class="form-control" placeholder="Enter Your FB Account">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">You Tube</label>
                            <input type="text" name="youtube" value="{{ $social_linkes->youtube ?? '' }}"   class="form-control" placeholder="Enter Your You Tube">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" >Linkedine</label>
                            <input type="text" name="linkedine" value="{{ $social_linkes->linkedine ?? '' }}"   class="form-control" placeholder="Enter Your Linkedine Account">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" >Instagram</label>
                            <input type="text" name="instagram" value="{{ $social_linkes->instagram ?? '' }}"   class="form-control" placeholder="Enter Your Instagram Account">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label" >Address</label>
                            <input type="text" name="address" value="{{ $company->address ?? '' }}"   class="form-control" placeholder="Enter Your Company Address">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Map</label>
                            <textarea name="map" id="" class="form-control" cols="30" rows="2" placeholder="Enter Google Map...">{{ $company->map ?? '' }}</textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        let showlogo = document.getElementById("show-logo");
        let inputLogo = document.getElementById("logo");

        inputLogo.onchange = function() {
            showlogo.src = URL.createObjectURL(inputLogo.files[0]);
        };  
    </script>

    <script>
        let showfavicon = document.getElementById("show-favicon");
        let inputfavicon = document.getElementById("favicon");

        inputfavicon.onchange = function() {
            showfavicon.src = URL.createObjectURL(inputfavicon.files[0]);
        };  
    </script>
    

    <x-slot name="scripts"></x-slot>
</x-admin-layout>