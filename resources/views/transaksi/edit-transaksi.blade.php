@extends("layout")

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Transaksi</h4>

                    <form class="forms-sample" action="/update-transaksi/{{ $transaksi->id }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="22">Member</label>
                            <select class="form-control" id="22" name="member_id" value="{{ old('member_id') }}">
                                <option value="{{$transaksi->member_id}}">{{$transaksi->member['nama']}}</option>
                                @foreach ($data[1] as $x)
                                    <option value="{{ $x->id }}">{{ $x->nama }}</option>
                                @endforeach
                            </select>
                            @error('member_id')
                                <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="21">Produk</label>
                            <select class="form-control" id="21" name="produk_id" value="{{ old('produk_id') }}">
                                <option selected value="{{$transaksi->produk_id}}">{{$transaksi->produk['produk']}}</option>
                                @foreach ($data[0] as $a)
                                    <option value="{{ $a->id }}">{{ $a->produk }}</option>
                                @endforeach
                            </select>
                            @error('produk_id')
                                <p class="text-danger pt-1"><small> {{ $message }}</small></p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="1">Jumlah</label>
                            <input name="jumlah" type="text" class="form-control @error('jumlah') is-invalid @enderror"
                                id="1" value="{{ $transaksi->jumlah }}">
                            @error('jumlah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="2">Bayar</label>
                            <input name="bayar" type="text" class="form-control @error('bayar') is-invalid @enderror" id="2"
                                value="{{ $transaksi->bayar }}">
                            @error('bayar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Edit Data</button>
                        <a href="/transaksi" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
