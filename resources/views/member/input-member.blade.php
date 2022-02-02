@extends("layout")

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Input data member</h4>

                    <form class="forms-sample" action="/save-member" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="1">Nama Lengkap</label>
                            <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="1" value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="2">Alamat</label>
                            <input name="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" id="2" value="{{ old('alamat') }}">
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="3">Telepon</label>
                            <input name="telepon" type="text" class="form-control @error('telepon') is-invalid @enderror" id="3" value="{{ old('telepon') }}">
                            @error('telepon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Tambah data</button>
                        <a href="/member" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
