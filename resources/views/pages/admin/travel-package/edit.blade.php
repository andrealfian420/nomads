@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Travel {{$item->title}}</h1>
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
            <form action="{{route('travel-package.update', $item->id)}}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$item->title}}">
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" id="location" name="location" value="{{$item->location}}">
                </div>
                <div class="form-group">
                    <label for="about">About</label>
                    <textarea name="about" id="about" rows="10" class="d-block w-100 form-control">
                        {{$item->about}}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="featured_event">Featured Event</label>
                    <input type="text" class="form-control" id="featured_event" name="featured_event"
                        value="{{$item->featured_event}}">
                </div>
                <div class="form-group">
                    <label for="language">Language</label>
                    <input type="text" class="form-control" id="language" name="language" value="{{$item->language}}">
                </div>
                <div class="form-group">
                    <label for="foods">Foods</label>
                    <input type="text" class="form-control" id="foods" name="foods" value="{{$item->foods}}">
                </div>
                <div class="form-group">
                    <label for="departure_date">Departure Date</label>
                    <input type="date" name="departure_date" id="departure_date" value="{{$item->departure_date}}">
                </div>
                <div class="form-group">
                    <label for="duration">Duration</label>
                    <input type="text" class="form-control" id="duration" name="duration" value="{{$item->duration}}">
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" id="type" name="type" value="{{$item->type}}">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input price="number" class="form-control" id="price" name="price" value="{{$item->price}}">
                </div>
                {{-- Submit Button --}}
                <button type="submit" class="btn btn-primary btn-block">
                    Simpan Perubahan
                </button>
                <a href="{{route('travel-package.index')}}" class="btn btn-secondary btn-block">
                    Batal
                </a>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection