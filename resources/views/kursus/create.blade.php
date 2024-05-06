@extends('master.template')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Courses</h1>
</div>

<div>
    <form class="user" action="{{ route('kursus.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama" class="form-label">Nama Kursus <span class="text-danger">*</span></label>
            <input type="text" class="form-control form-control-user @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama Kursus">
            @error('nama')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="mentor" class="form-label">Nama Mentor <span class="text-danger">*</span></label>
            <input type="text" class="form-control form-control-user @error('mentor') is-invalid @enderror" id="mentor" name="mentor" placeholder="Nama Mentor">
            @error('mentor')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
            <textarea class="form-control form-control-user @error('deskripsi') is-invalid @enderror" id="deskripsi" name="desc" rows="3" placeholder="Deskripsi Kursus"></textarea>
            @error('deskripsi')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="harga" class="form-label">Harga <span class="text-danger">*</span></label>
            <input type="text" class="form-control form-control-user @error('harga') is-invalid @enderror" id="harga" name="cost" placeholder="Harga Kursus">
            @error('harga')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="kategori" class="form-label">Kategori <span class="text-danger">*</span></label>
            <select class="form-select form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori">
                <option value="" selected hidden>Pilih Kategori</option>
                @foreach ($kategori as $gori)
                    <option value="{{$gori->id}}">{{$gori->nama_kategori}}</option>
                @endforeach
            </select>
            @error('kategori')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Tambah Kursus</button>
        </div>
    </form>

</div>
@endsection
