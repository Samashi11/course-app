@extends('master.template')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Categories</h1>
</div>

		<div>
            <form class="user" action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control form-control-user"
                        id="category"
                        name="nama_kategori"
                        placeholder="Enter Category Name...">
                </div>
                <button class="btn btn-primary btn-user btn-block">
                    Simpan
                </button>
            </form>
        </div>
@endsection
