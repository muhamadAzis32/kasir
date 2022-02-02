@extends("layout")

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit data user</h4>

                    <form class="forms-sample" action="/update-user/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="form-group">
                            <label for="1">Nama Lengkap</label>
                            <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="1"
                                value="{{ $data->nama }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="2">Email</label>
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                id="2" value="{{ $data->email}}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="11">Level User</label>
                            <select class="form-control @error('level') is-invalid @enderror" id="11" name="level">
                                <option value="{{ $data->level }}" disabled>{{ $data->level }}</option>
                                <option value="Admin">Admin</option>
                                <option value="Kasir">Kasir</option>
                            </select>
                            @error('level')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                      
                        <div class="form-group">
                            <label>File upload</label>
                            <input type="file" name="file" class="file-upload-default @error('file') is-invalid @enderror">
                            <input type="hidden" name="pathFile" value="{{ $data->file }}">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                placeholder="{{ $data->file }}">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                            @empty($data->file)

                            @else
                                <img src="{{ url('/' . $data->file) }}" width="100px" height="auto" alt="gambar"
                                    class="mt-3">
                            @endempty
                            @error('file')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
       
                        <button type="submit" class="btn btn-primary me-2">Edit data</button>
                        <a href="/user" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
