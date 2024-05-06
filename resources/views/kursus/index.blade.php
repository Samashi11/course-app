@extends('master.template')

@section('link')
    <!-- Custom styles for this page -->
    <link href="{{ asset('dist') }}/dash/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Courses</h1>
    <a href="{{ route('kursus.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus-circle fa-sm text-white-50"></i> Add Courses</a>
    </div>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Courses</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Kursus</th>
                        <th>Pengajar Kursus</th>
                        <th>Detail Kursus</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama Kursus</th>
                        <th>Pengajar Kursus</th>
                        <th>Detail Kursus</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th></th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($kursus as $kurs)
                    <tr>
                        <td>{{$kurs['course_name']}}</td>
                        <td>{{$kurs['course_trainer']}}</td>
                        <td>{{$kurs['course_description']}}</td>
                        <td>{{$kurs['cost']}}</td>
                        <td>
                        @foreach ($kategori as $gori)
                            {{$kurs['kategori_id'] === $gori['id'] ? $gori['nama_kategori'] : null;}}
                        @endforeach
                        </td>
                        <td class="d-flex justify-content-end gap-2">
                            <a href="{{ route('kursus.show',$kurs->id) }}" class="text-white" >
                            <button class="btn btn-primary">
                                    <i class="fas fa-link"></i>
                                </button>
                            </a>
                            <a href="{{ route('kursus.edit',$kurs->id) }}" class="text-white">
                            <button class="btn btn-warning">
                                    <i class="fas fa-pen-alt"></i>
                                </button>
                            </a>
                            <form action="{{ route('kursus.destroy', $kurs->id) }}" method="POST" class="d-inline-block">
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
