@extends('index')
@section('title', 'Mobil')

@section('isihalaman')
    <h3><center>Daftar Mobil</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBukuTambah"> 
        Tambah Data Mobil 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">Plat Nomor</td>
                <td align="center">Jenis Mobil</td>
                <td align="center">Warna</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($mobil as $index=>$bk)
                <tr>
                    <td align="center" scope="row">{{ $index + $mobil->firstItem() }}</td>
                    <td>{{$bk->nomor}}</td>
                    <td>{{$bk->jenis}}</td>
                    <td>{{$bk->warna}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalBukuEdit{{$bk->id_mobil}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data Buku -->
                        <div class="modal fade" id="modalBukuEdit{{$bk->id_mobil}}" tabindex="-1" role="dialog" aria-labelledby="modalBukuEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalBukuEditLabel">Form Edit Data Mobil</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formbukuedit" id="formbukuedit" action="/mobil/edit/{{ $bk->id_mobil}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_mobil" class="col-sm-4 col-form-label">Plat Nomor</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Masukan Plat Nomor">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="jenis" class="col-sm-4 col-form-label">Jenis Mobil</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="jenis" name="jenis" value="{{ $bk->jenis}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="warna" class="col-sm-4 col-form-label">Warna Mobil</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="warna" name="warna" value="{{ $bk->warna}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="mobiltambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data buku -->
                        |
                        <a href="mobil/hapus/{{$bk->id_mobil}}" onclick="return confirm('Yakin mau dihapus?')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--awal pagination-->
    Halaman : {{ $mobil->currentPage() }} <br />
    Jumlah Data : {{ $mobil->total() }} <br />
    Data Per Halaman : {{ $mobil->perPage() }} <br />

    {{ $mobil->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Buku -->
    <div class="modal fade" id="modalBukuTambah" tabindex="-1" role="dialog" aria-labelledby="modalBukuTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalBukuTambahLabel">Form Input Data Mobil</h5>
                </div>
                <div class="modal-body">
                    <form name="formmobiltambah" id="formmobiltambah" action="/mobil/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_mobil" class="col-sm-4 col-form-label">Plat Nomor</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Masukan Plat Nomor">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="jenis" class="col-sm-4 col-form-label">Jenis Mobil</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Masukan Jenis Mobil">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="Warna" class="col-sm-4 col-form-label">Warna Mobil</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="warna" name="warna" placeholder="Masukan Warna Mobil">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="mobiltambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data buku -->
    
@endsection