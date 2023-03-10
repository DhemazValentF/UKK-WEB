@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="http://127.0.0.1:8000/home">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="col-md-12">
            <br>`
            <h1>Daftar Buku</h1>
            <hr>
            
            <!-- Display success message if there is any -->
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('buku.create') }}" class="btn btn-primary">Add Book</a>
            </div>
            <form action="{{ route('buku.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search..." name="search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </div>
            </form>
            
            <!-- Display book list -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Pengarang </th>
                        <th>Penerbit</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bukus as $key => $buku)
                    <tr>
                        <td>{{ ($bukus->currentPage()-1) * $bukus->perPage() + $loop->iteration }}</td>
                        <td>{{ $buku->judul }}</td>
                            <td>{{ $buku->pengarang }}</td>
                            <td>{{ $buku->penerbit }}</td>
                            <td>
                                @if ($buku->image)
                                <img src="{{Storage::url($buku->image)}}" alt="{{ $buku->judul }}" style="max-width: 100px;">
                                @else
                                No Image
                                @endif
                            </td>
                            <td>
                                
                                <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('buku.show', $buku->id) }}" class="btn btn-sm btn-info">Show</a>
                                
                                <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>

            <!-- Display pagination links -->
            <div class="text-center">
                {{ $bukus->links() }}
            </div>
        </div>
    </div>
@endsection
