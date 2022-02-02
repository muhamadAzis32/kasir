@extends("layout")

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Input data produk</h4>

                    <form class="forms-sample" action="/save-produk" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="1">Nama Produk</label>
                            <input name="produk" type="text" class="form-control @error('produk') is-invalid @enderror" id="1" value="{{ old('produk') }}">
                            @error('produk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="2">Harga</label>
                            <input name="harga" type="text" class="form-control @error('harga') is-invalid @enderror" id="2" value="{{ old('harga') }}">
                            @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="22">Perihal</label>
                            <select class="form-control" id="22" name="kategori_id"
                                value="{{ old('kategori_id') }}">
                                <option selected disabled>Select one</option>
                                @foreach ($data as $x)
                                    <option value="{{ $x->id }}">{{ $x->nmKategori }}</option>
                                @endforeach
                            </select>
                            @error('kategori_id')
                                <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Tambah data</button>
                        <a href="/produk" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
