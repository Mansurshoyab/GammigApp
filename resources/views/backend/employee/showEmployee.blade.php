<x-admin-layout>
    <x-slot name="title">{{ __('Admin Dashboard') }}</x-slot>
    <x-slot name="styles"></x-slot>
    <x-slot name="header">
        <div class="row mb-2 justify-content-between">
            <div class="col-md-2" style="float: left;">
              <h3><strong>Employee</strong></h3>
            </div>
            <div class="col-md-2 text-end">
                <a href="{{ route('addEmployee') }}" class="btn btn-success text-left">Add Employee</a>
            </div>
          </div>
          
    </x-slot>

    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Roxy Paint Employee</h5>
                            <h6 class="card-subtitle text-muted">Highly flexible tool that many advanced
                                features to any HTML table. See official
                                documentation <a href="https://datatables.net/extensions/responsive/"
                                    target="_blank" rel="noopener noreferrer nofollow">here</a>.</h6>
                        </div>
                        <div class="card-body">
                            <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Designation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td>{{ $employee->name }}</td>
                                    <td>
                                        <img src="{{ asset('_uploads/' . $employee->image) }}" alt="" height="80px" width="100px">
                                    </td>
                                    <td>
                                        @foreach(json_decode($employee->content) as $data)
                                            <div>
                                                Designation: {{ $data->designation }}
                                            </div>
                                            <div>
                                                Company Name: {{ $data->company_name }}
                                            </div>
                                        @endforeach
                                    </td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    
    <script>
        document.getElementById('delete').addEventListener('click', function() {
            if (confirm('Are you sure you want to delete this employee?')) {
                document.getElementById('delete').submit();
            }
        });
    </script>

    <x-slot name="scripts"></x-slot>
</x-admin-layout>