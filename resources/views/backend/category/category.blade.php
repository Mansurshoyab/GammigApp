<x-admin-layout>
    <x-slot name="title">{{ __('Admin Dashboard') }}</x-slot>
    <x-slot name="styles"></x-slot>
    <x-slot name="header">
        <div class="row mb-2 justify-content-between">
            <div class="col-md-2" style="float: left;">
              <h3><strong>Category</strong></h3>
            </div>
            <div class="col-md-2 text-end">
                <a href="{{ route('addCategory') }}" class="btn btn-success text-left">Add Category</a>
            </div>
          </div>
          
    </x-slot>

    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Roxy Paint Category</h5>
                        </div>
                        <div class="card-body">
                            <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key => $item)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                <form action="{{  route('delete.category', $item->id) }}" method="POST">
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