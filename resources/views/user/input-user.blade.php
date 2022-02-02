@extends("layout")

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Input data user</h4>

                    <form class="forms-sample" action="/save-user" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="1">Nama Lengkap</label>
                            <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="1"
                                value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="2">Email</label>
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                id="2" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="3">Password</label>
                            <input name="password" type="text" class="form-control @error('password') is-invalid @enderror"
                                id="3" value="{{ old('password') }}">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="11">Level User</label>
                            <select class="form-control @error('level') is-invalid @enderror" id="11" name="level">
                                <option selected disabled>Select one</option>
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
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                            @error('file')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
       
                        <button type="submit" class="btn btn-primary me-2">Tambah data</button>
                        <a href="/user" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
