@extends('layout.template')
<!-- START FORM -->
@section('konten')


<form action='{{ url('karyawan') }}' method='post'>
@csrf
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <a href='{{ url('karyawan') }}' class="btn btn-secondary"><< KEMBALI</a>
    <div class="mb-3 row">
        <label for="nip" class="col-sm-2 col-form-label">NIP</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name='nip' value="{{ Session::get('nip') }}" id="nip" maxlength="10">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nama' value="{{ Session::get('nama') }}" id="nama">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="divisi" class="col-sm-2 col-form-label">Divisi</label>
        <div class="col-sm-10">
            <select class="form-control" name='divisi' id="divisi">
                <option value="HR" {{ Session::get('divisi') == 'HR' ? 'selected' : '' }}>HR</option>
                <option value="Finance" {{ Session::get('divisi') == 'Finance' ? 'selected' : '' }}>Finance</option>
                <option value="Marcom" {{ Session::get('divisi') == 'Marcom' ? 'selected' : '' }}>Marcom</option>
                <option value="IT" {{ Session::get('divisi') == 'IT' ? 'selected' : '' }}>IT</option>
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="role" class="col-sm-2 col-form-label">Role</label>
        <div class="col-sm-10">
            <select class="form-control" name='role' id="role">
                <option value="Manager" {{ Session::get('role') == 'Manager' ? 'selected' : '' }}>Manager</option>
                <option value="Team Lead" {{ Session::get('role') == 'Team Lead' ? 'selected' : '' }}>Team Lead</option>
                <option value="Staff" {{ Session::get('role') == 'Staff' ? 'selected' : '' }}>Staff</option>
            </select>
        </div>
    </div>
    
    <div class="mb-3 row">
        <label for="divisi" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
    </div>
</div>
</form>
@endsection
<!-- AKHIR FORM -->