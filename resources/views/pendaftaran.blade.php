@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Pendaftaran Mahasiswa 
                    
                </div>

                <div class="card-body">

                {{ Form::open(['route' => [$action, $data['id'] ], 'method'=>$method, 'enctype'=>'multipart/form-data']) }}

                    {{ Form::hidden('id', isset($data['id']) ? $data['id'] : '') }}
                    <div class="form-group">
                        <label for="formGroupExampleInput">NPM</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="NPM" name="npm" value="{{ ($data != '') ? $data['npm'] : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Nama Lengkap</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Nama Lengkap" name="nama" value="{{ ($data != '') ? $data['nama'] : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Jurusan</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Jurusan" name="jurusan" value="{{ ($data != '') ? $data['jurusan'] : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Alamat</label>
                        <textarea name="alamat" id="" cols="30" rows="4" class="form-control" id="formGroupExampleInput2">{{ ($data != '') ? $data['alamat'] : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">No Hp</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="No Hp" name="nohp" value="{{ ($data != '') ? $data['nohp'] : '' }}">
                    </div>
                    <a class="btn btn-secondary float-right ml-4" href="{{ url('/home') }}" role="button">Back</a>

                    <button class="btn btn-primary float-right" type="submit">Submit</button>
                {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
