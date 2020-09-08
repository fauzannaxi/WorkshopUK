@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Data Mahasiswa
                    <a class="btn btn-primary float-right" href="{{ url('/pendaftaran') }}" role="button">Add</a>
                </div>

                <div class="card-body">
                    @if (Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if (Session::get('failed'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('failed') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    @if (Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NPM</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No HP</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $v)
                                <tr>
                                    <td scope="row">#</td>
                                    <td>{{ $v['npm'] }}</td>
                                    <td>{{ $v['nama'] }}</td>
                                    <td>{{ $v['jurusan'] }}</td>
                                    <td>{{ $v['alamat'] }}</td>
                                    <td>{{ $v['nohp'] }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ route('edit', ['id'=>$v['id']]) }}">
                                            Edit
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('delete', ['id'=>$v['id']]) }}" method="POST" class="deleteForm" class="" enctype="multipart/form-data">
                                            @method('delete')
                                            @csrf
                                            <input type="hidden" value="{{ $v['id'] }}" name="id">
                                            <button class="btn btn-danger btn-sm btn-hapus" onclick="onDelete(this)" type="button">
                                                Hapus
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
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
<script type="text/javascript">
    

    function onDelete(e) {
      Swal.fire({
        title: 'Konfirmasi',
        text: "Apakah Anda yakin akan menghapus data ini?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
      }).then((result) => {
        if (result.value) {
          $(e).parent().submit();
        }
      })
    }
  </script>
@endsection
