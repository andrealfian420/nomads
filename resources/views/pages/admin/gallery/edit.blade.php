@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Gallery</h1>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <form action="{{route('gallery.update', $item->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="travel_packages_id">Paket Travel</label>
                    <select name="travel_packages_id" required class="form-control">
                        <option value="{{$item->travel_packages_id}}">Do not change the selected option
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image">
                </div>
                {{-- Submit Button --}}
                <button type="submit" class="btn btn-primary btn-block">
                    Simpan Perubahan
                </button>
                <a href="{{route('gallery.index')}}" class="btn btn-secondary btn-block">
                    Batal
                </a>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection