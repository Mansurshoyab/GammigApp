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
                        </div>
                        <div class="card-body">
                            <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $key => $employee)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $employee->name }}</td>
                                            <td>
                                                <img src="{{ asset('_uploads/' . $employee->image) }}" alt="" height="80px" width="80px">
                                            </td>
                                            <td>
                                                <a href="{{ route('show.Employee', $employee) }}"><i class="align-middle me-2 fas fa-fw fa-eye"></i></a>
                                                <a href="{{ route('edit.Employee', $employee) }}"><i class="align-middle me-2 fas fa-fw fa-edit"></i></a>
                                                <form action="{{  route('delete.Employee', $employee->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" id="delete"> 
                                                        <i class="fas fa-trash" style="color: red"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
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