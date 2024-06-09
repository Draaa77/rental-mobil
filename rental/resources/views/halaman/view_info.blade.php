@extends('index')
@section('title', 'Peminjaman')

@section('isihalaman')
    <h3><center>Data Info Rental Mobil</center><h3>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPinjamTambah"> 
        Tambah Data Rental Mobil
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Pinjam</td>
                <td align="center">Nama Peminjam</td>
                <td align="center">Info Mobil</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($info_pinjam as $index=>$p)
                <tr>
                    <td align="center" scope="row">{{ $index + $info_pinjam->firstItem() }}</td>
                    <td align="center">{{$p->id_info}}</td>
                    <td>{{$p->peminjam->nama}}</td>
                    <td>{{$p->mobil->jenis}}</td>
                    <td align="center">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalPinjamEdit{{$p->id_info}}"> 
                            Edit
                        </button>

                        <!-- Awal Modal EDIT data Peminjaman -->
                        <div class="modal fade" id="modalPinjamEdit{{$p->id_info}}" tabindex="-1" role="dialog" aria-labelledby="modalPinjamEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalPinjamEditLabel">Form Edit Data Info Rental Mobil</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formpinjamedit" id="formpinjamedit" action="/info/edit/{{ $p->id_info}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_info" class="col-sm-4 col-form-label">ID Pinjam</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="id_info" name="id_info" value="{{ $p->id_info}}" readonly>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="peminjam" class="col-sm-4 col-form-label">Nama Peminjam</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="id_peminjam" name="id_peminjam">
                                                        @foreach ($peminjam as $a)
                                                            @if ($a->id_peminjam == $p->id_peminjma)
                                                                <option value="{{ $a->id_peminjam }}" selected>{{ $a->nama }}</option>
                                                            @else
                                                                <option value="{{ $a->id_peminjam }}">{{ $a->nama }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="jenis" class="col-sm-4 col-form-label">Jenis Mobil</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="id_mobil" name="id_mobil">
                                                        @foreach ($mobil as $bk)
                                                            @if ($bk->id_mobil == $p->id_mobil)
                                                                <option value="{{ $bk->id_mobil }}" selected>{{ $bk->jenis }}</option>
                                                            @else
                                                                <option value="{{ $bk->id_mobil }}">{{ $bk->jenis }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="pinjamtambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data Peminjaman -->
                        |
                        <a href="info/hapus/{{$p->id_info}}" onclick="return confirm('Yakin mau dihapus?')">
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
    Halaman : {{ $info_pinjam->currentPage() }} <br />
    Jumlah Data : {{ $info_pinjam->total() }} <br />
    Data Per Halaman : {{ $info_pinjam->perPage() }} <br />

    {{ $info_pinjam->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Peminjaman -->
    <div class="modal fade" id="modalPinjamTambah" tabindex="-1" role="dialog" aria-labelledby="modalPinjamTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPinjamTambahLabel">Form Input Data Info Rental Mobil</h5>
                </div>
                <div class="modal-body">

                    <form name="formpinjamtambah" id="formpinjamtambah" action="/info/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_peminjam" class="col-sm-4 col-form-label">Nama Peminjam</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_peminjam" name="id_peminjam" placeholder="Pilih Nama Peminjam">
                                    <option></option>
                                    @foreach($peminjam as $a)
                                        <option value="{{ $a->id_peminjam }}">{{ $a->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="id_mobil" class="col-sm-4 col-form-label">Jenis Mobil</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_mobil" name="id_mobil" placeholder="Pilih Jenis Mobil">
                                    <option></option>
                                    @foreach($mobil as $bk)
                                        <option value="{{ $bk->id_mobil }}">{{ $bk->jenis }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="pinjamtambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data Peminjaman -->
    
@endsection