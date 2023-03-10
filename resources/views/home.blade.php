<?php

use App\Models\Buku;

$bukus = Buku::orderBy('id', 'desc')->paginate(10);

?>

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
            <a class="navbar-brand" href="#">Perpustakaan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="http://127.0.0.1:8000/buku">Buku</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Jumbotron -->
    <div class="center jumbotron">
        <div class="container">
            <h1 class="display-5">Perpustakaan</h1>
            <hr class="my-4">
        </div>
    </div>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __(' Daftar buku ') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Judul</th>
                                    <th>Penerbit</th>
                                    <th>Pengarang</th>
                                    <th>Cover</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bukus as $key => $buku)
                                    <tr>
                                        <td>{{ $bukus->firstItem() + $key }}</td>
                                        <td>{{ $buku->judul }}</td>
                                        <td>{{ $buku->penerbit }}</td>
                                        <td>{{ $buku->pengarang }}</td>
                                        
                                        <td>
                                            <img src="{{Storage::url($buku->image)}}" alt="{{ $buku->judul }}" style="max-width: 100px;">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $bukus->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
