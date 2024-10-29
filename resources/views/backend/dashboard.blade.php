<x-admin-layout>
  <x-slot name="title">{{ __('Admin Dashboard') }}</x-slot>
  <x-slot name="styles"></x-slot>
  <x-slot name="header">
    <div class="row mb-2 mb-xl-3">
      <div class="col-auto d-none d-sm-block">
        <h3><strong>Analytics</strong> Dashboard</h3>
      </div>
      <div class="col-auto ms-auto text-end mt-n1">
      </div>
    </div>
  </x-slot>

  @php
      // $totalProducts = App\Models\Product::count();
      // $totalSeedProducts = App\Models\SeedProduct::count();
      // $totalMessage = App\Models\Message::count();
      // $totalApply = App\Models\Apply::count();
  @endphp

  <div>
    <div class="row">
      <div class="col-xl-12 col-xxl-5 d-flex">
        <div class="w-100">
          <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col mt-0">
                      <h5 class="card-title">Total User </h5>
                    </div>
                    <div class="col-auto">
                      <div class="stat text-primary">
                        <i class="align-middle" data-feather="truck"></i>
                      </div>
                    </div>
                  </div>
                  {{-- <h1 class="mt-1 mb-3">{{ $totalProducts }}</h1> --}}
                  <div class="mb-0">
                    <a href="{{ url('admin/product') }}" class="">Go</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col mt-0">
                      <h5 class="card-title">Deposite Request</h5>
                    </div>

                    <div class="col-auto">
                      <div class="stat text-primary">
                        <i class="align-middle" data-feather="dollar-sign"></i>
                      </div>
                    </div>
                  </div>
                  {{-- <h1 class="mt-1 mb-3">{{ $totalMessage }}</h1> --}}
                  <div class="mb-0">
                    <a href="{{ url('admin/message') }}" class="">Go</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <x-slot name="scripts"></x-slot>
</x-admin-layout>