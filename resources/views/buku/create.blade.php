@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <h1>Add New Book</h1>
            <hr>

            <!-- Display error messages if there are any -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Create book form -->
            <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="judul">judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}">
                </div>
                <div class="form-group">
                    <label for="pengarang">pengarang</label>
                    <input type="text" class="form-control" id="pengarang" name="pengarang" value="{{ old('pengarang') }}">
                </div>
                <div class="form-group">
                    <label for="penerbit">penerbit</label>
                    <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ old('penerbit') }}">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" id="image" name="image" onchange="previewImage()">
                    <img id="preview" class="mt-3" src="" alt="Preview Image" style="max-width: 300px;">
                </div>
                <button type="submit" class="btn btn-primary">Add Book</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function previewImage() {
            var preview = document.querySelector('#preview');
            var file = document.querySelector('#image').files[0];
            var reader = new FileReader();

            reader.addEventListener("load", function () {
                preview.src = reader.result;
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
