@extends('layout.template')
<!-- START DATA -->
@section('konten')
<div class="my-3 p-3 bg-body rounded shadow-sm">

    <!-- FORM PENCARIAN -->
    <div class="pb-3">
        <form class="d-flex" action="{{ url('karyawan') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>
    
    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">
        <a href='{{ url('karyawan/create') }}' class="btn btn-primary">+ Tambah Data</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">NIP</th>
                <th class="col-md-4">Nama</th>
                <th class="col-md-2">Divisi</th>
                <th class="col-md-2">Action</th>
            </tr>
        </thead>
    
        <tbody>
            <?php $i = $data->firstItem() ?>
            @foreach ($data as $item)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $item->nip }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->divisi }}</td>
                <td>
                    <form onsubmit="return confirm('APAKAH ANDA YAKIN AKAN MENGHAPUS DATA?')" class='d-inline' action="{{ url('karyawan/'.$item->nim) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href='{{ url('karyawan/'.$item->nip.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                    </form>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
</div>
@endsection

    <!-- AKHIR DATA -->