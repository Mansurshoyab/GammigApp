<x-admin-layout>
    <x-slot name="title">{{ __('Admin Dashboard') }}</x-slot>
    <x-slot name="styles"></x-slot>
    <x-slot name="header">
        <div class="row mb-2 justify-content-between">
            <div class="col-md-2" style="float: left;">
              <h3><strong>Message</strong></h3>
            </div>
          </div>
          
    </x-slot>

    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Roxy Paint Message</h5>
                        </div>
                        <div class="card-body">
                            <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>email</th>
                                        <th>Date</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($messages as $key => $date)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $date->name }}</td>
                                            <td>{{ $date->phone }}</td>
                                            <td>{{ $date->email }}</td>
                                            <td>{{ $date->created_at->format('Y-m-d') }}</td>
                                            <td>{{ $date->message }}</td>
                                            <td>
                                                <form action="{{  route('delete.message', $date->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"id="delete"> 
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