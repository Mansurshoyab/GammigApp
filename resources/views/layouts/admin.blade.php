<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5" />
  <meta name="author" content="Muhammad Nasir Uddin Khan Shawon" />
  <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>{{ $title }} | {{ config('app.name', 'Laravel') }}</title>
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link rel="shortcut icon" href="{{ asset('img/icons/icon-48x48.png') }}" />
  <link rel="canonical" href="https://demo.adminkit.io/pages-blank.html" />
  
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.3/sweetalert2.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
  <!-- Toster Js -->
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  


  <!-- Text Editor CDN -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>





  {{-- <link rel="stylesheet" href="{{ asset('plugins/Buttons/css/buttons.bootstrap5.min.css') }}" /> --}}
  <link href="{{ asset('assets/css/light.css') }}" rel="stylesheet" />
  @if (isset($styles))
    {{ $styles }}
  @endif
  @php
  $company = App\Models\Company::first();
  @endphp

  <link rel="icon" href="{{ asset('all/'. $company->favicon) }}" type="image/png">
</head>
<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
  <div class="wrapper">
	<x-admin-sidebar />
	<div class="main">
	  <x-admin-navbar />
	  <main class="content p-4">
		<div class="container-fluid p-0">
      <!-- Page Heading -->
      @if (isset($header))
      {{ $header }}
      @endif
      {{ $slot }}
		</div>
	  </main>
	  <x-admin-footer />
	</div>
  </div>
  


  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.3/sweetalert2.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.3/sweetalert2.all.min.js" ></script>


  {{-- <script src="{{ asset('plugins/Buttons/js/buttons.bootstrap5.min.js') }}"></script> --}}
  {{-- <x-alert /> --}}


  
  <!-- Jquery cdn -->

  <script>
    $(document).ready(function () {

      $('[data-bs-toggle="tooltip"]').tooltip();

      $('#showData').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        // var showURL = button.data('show-route');
        var showURL = button.attr('show-route');
        var modalTitle = $(this).find('.modal-title');
        var modalBody = $(this).find('.modal-body');
        var btnEdit = $(this).find('.btn-success');
        var lastUpdated = $(this).find('#updated');
        if (!showURL) {
          console.error('Invalid or empty URL');
          return;
        }
        axios.get(showURL)
        .then(function (response) {
          if (response.data) {
            modalTitle.html('<strong>' + response.data.title + '</strong>');
            modalBody.html('<p class="text-secondary text-justify py-1" style="text-align: justify;">' + response.data.description + '</p>');
            btnEdit.attr('href', window.location.href + '/' + response.data.id + '/edit');
            // lastUpdated.html(response.data.updated_at);
            var updatedAt = new Date(response.data.updated_at);
            var formattedDate = updatedAt.toLocaleString('en-US', {
              month: 'long',
              day: 'numeric',
              year: 'numeric',
              hour: 'numeric',
              minute: 'numeric',
              second: 'numeric',
              hour12: true
            });
            lastUpdated.html(formattedDate);
          } else {
            console.error('Invalid or missing data in the response:', response.data);
          }
        })
        .catch(function (error) {
          console.error('Error fetching data:', error);
        });
      });

      $('.status-switch').change(function() {
        console.log('Changed');
        const id = $(this).data('id');
        const status = this.checked ? $(this).data('status-enable') : $(this).data('status-disable');
        let statusURL = $(this).attr('status-route');
        Swal.fire({
          title: 'Confirm Status Change',
          text: 'Are you sure you want to change the status?',
          icon: 'question',
          showCancelButton: true,
          confirmButtonText: 'Yes, change it!',
          cancelButtonText: 'Cancel'
        }).then((result) => {
          if (result.isConfirmed) {
            axios.post(statusURL, { id, status })
            .then(function (response) {
              Swal.fire( 'Changed', 'Status changed successfully!', 'success' );
              location.reload();
            }).catch(function (error) {
              Swal.fire( 'Error', 'Failed to change status!', 'error' );
            });
          } else {
            // User cancelled the status change
            // You can handle this case if needed
          }
        });
      });

      $(document).on('click', '.delete-data', function (e) {
        e.preventDefault();
        let deleteURL = $(this).attr('delete-route');
        let deleteID = $(this).attr('delete-id');
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            axios.post(deleteURL, {
              _method: 'DELETE',
              id: deleteID,
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
            }).then(response => {
              if (response.data.code == 203) {
                Swal.fire( 'Warning!', 'Your status id must be numeric.', 'warning' );
              } else if (response.data.code == 404) {
                Swal.fire( 'Warning!', 'Your status info not found.', 'warning' );
              } else {
                $('.uniqueid' + deleteID).parents("tr").remove();
                Swal.fire({
                  title: 'Deleted!',
                //   text: 'Data deleted successfully!',
                  text: response.data.message,
                  icon: 'success',
                  confirmButtonText: 'OK'
                });
              }
            }).catch(error => {
              console.error(error);
              Swal.fire({
                title: 'Error',
                text: 'An error occurred while deleting data.',
                icon: 'error',
                confirmButtonText: 'OK'
              });
            });
          }
        });
      });

      $(document).on('click', '.unlink-logo', function (e) {
        e.preventDefault();
        let logoURL = $(this).attr('logo-route');
        let logoID = $(this).attr('logo-id');
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            axios.post(logoURL, {
              _method: 'DELETE',
              id: logoID,
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            }).then(response => {
              if (response.data.code == 203) {
                Swal.fire('Warning!', 'Your data id must be numeric.', 'warning');
              } else if (response.data.code == 404) {
                Swal.fire('Warning!', 'Your data info not found.', 'warning');
              } else {
                Swal.fire({
                  title: 'Deleted!',
                  text: response.data.message,
                  icon: 'success',
                  showConfirmButton: false
                });
                location.reload();
              }
            }).catch(error => {
              console.error(error);
              Swal.fire({
                title: 'Error',
                text: 'An error occurred while deleting data.',
                icon: 'error',
                confirmButtonText: 'OK'
              });
            });
          }
        });
      });

      $(document).on('click', '.unlink-banner', function (e) {
        e.preventDefault();
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        })
      });

      $('.data-check').click(function () {
        var allChecked = $('.data-check:checked').length === $('.data-check').length;
        $('#bulkCheck').prop('checked', allChecked);
      });
      $('#bulkCheck').click(function () {
        $('.data-check').prop('checked', $(this).prop('checked'));
      });
    });
  </script>

<!-- Toster js -->

@if(Session::has('success'))
<script>
  toastr.success("{{ session('success') }}", "Success", {
    closeButton: true,
    progressBar: true, 
    positionClass: 'toast-top-right',
    timeOut: 5000
  });
</script>
@endif


@if(Session::has('delete_success'))
<script>
  toastr.error("{{ session('delete_success') }}", "Deleted", {
    closeButton: true, // Add remove button
    progressBar: true, // Add progress bar
    positionClass: 'toast-bottom-right', // Position of the toast
    timeOut: 5000, // Auto close time in milliseconds (5 seconds)
    titleClass: 'toast-title-red' // Class for styling title text
  });
</script>
@endif



  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>

  <!-- Toster js End -->

  <script src="{{ asset('assets/js/app.js') }}"></script>
  <script src="{{ asset('assets/js/datatables.js') }}"></script>
  <!-- Page Scripts -->
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  @if (isset($scripts))
    {{ $scripts }}
  @endif
</body>
</html>
