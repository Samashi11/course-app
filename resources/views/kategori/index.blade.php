@extends('master.template')

@section('link')
    <!-- Custom styles for this page -->
    <link href="{{ asset('dist') }}/dash/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Categories</h1>
    <a href="{{ route('kategori.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus-circle fa-sm text-white-50"></i> Add Categories</a>
    </div>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Kategori</th>
                        <th></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama Kategori</th>
                        <th></th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($kategori as $gori)
                    <tr>
                        <td>{{$gori['nama_kategori']}}</td>
                        <td class="d-flex justify-content-end gap-2">
                            <a href="{{ route('kategori.show',$gori->id) }}" class="text-white" >
                            <button class="btn btn-primary">
                                    <i class="fas fa-link"></i>
                                </button>
                            </a>
                            <a href="{{ route('kategori.edit',$gori->id) }}" class="text-white">
                            <button class="btn btn-warning">
                                    <i class="fas fa-pen-alt"></i>
                                </button>
                            </a>
                            <form action="{{ route('kategori.destroy', $gori->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data')" class="text-white">
                                    <i class="far fa-trash-alt "></i>
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
@endsection

@section('links')
    <!-- Page level plugins -->
    <script src="{{ asset('dist') }}/dash/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('dist') }}/dash/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('dist') }}/dash/js/demo/datatables-demo.js"></script>
@endsection
