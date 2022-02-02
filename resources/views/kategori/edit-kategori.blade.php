@extends("layout")

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit data kategori</h4>

                    <form class="forms-sample" action="/update-kategori/{{ $data->id }}" method="POST" >
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="recipient-name">Nama Kategori</label>
                            <input name="nmKategori" type="text" class="form-control @error('nmKategori') is-invalid @enderror" id="recipient-name" value="{{$data->nmKategori}}">
                            @error('nmKategori')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Edit data</button>
                        <a href="/kategori" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
