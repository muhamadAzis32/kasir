@extends("layout")

@section('content')


    <div class="row">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-lg-6 col-md-8 col-sm-12">
                            <h4 class="card-title">Data Member</h4>
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-12 text-right">
                            <a href="/input-member" type="button" class="btn btn-primary">Tambah data</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example1" class="table">
                            <thead>
                                <tr>
                                    <th class="col-md-1">#</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th class="col-md-1">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $x)
                                    <tr>
                                        <td>{{ $x->id }}</td>
                                        <td>{{ $x->nama }}</td>
                                        <td>{{ $x->alamat }}</td>
                                        <td>{{ $x->telepon }}</td>
                                        <td>
                                            <a href="/edit-member/{{ $x->id }}" type="button"
                                                class="btn-sm btn-inverse-dark btn-rounded m-lg-1" data-toggle="tooltip"
                                                data-placement="top" title="Edit">
                                                <i class="mdi mdi-border-color"></i>
                                            </a>
                                            <a type="button" href="/hapus-member/{{ $x->id }}"
                                                onclick="return confirm('Apakah anda yakin menghapus data?')"
                                                class="btn-sm btn-inverse-danger btn-rounded m-lg-1" data-toggle="tooltip"
                                                data-placement="top" title="Delete">
                                                <i class="mdi mdi-delete"></i>
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
@endsection
