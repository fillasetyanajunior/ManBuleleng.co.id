@extends('layouts.dashboard')

@section('main')
<x-slidebar></x-slidebar>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center mb-2">
                    <div class="col">
                        <h2 class="h5 page-title">Dashboard</h2>
                    </div>
                </div>
                <div class="row">
                    <!-- Striped rows -->
                    <div class="col-md-12 col-lg-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <strong class="card-title">Status</strong>
                            </div>
                            <div class="card-body my-n2">
                                
                            </div>
                        </div>
                    </div> <!-- Striped rows -->
                    <div class="col-md-12 col-lg-12 mt-4">
                        <div class="card shadow">
                            <div class="card-header">
                                <strong class="card-title">Nilai</strong>
                            </div>
                            <div class="card-body my-n2">
                                <table class="table table-striped table-hover table-borderless">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Mate Pelajaran</th>
                                            <th>Nilai Angka</th>
                                            <th>Nilai Huruf</th>
                                            <th>Guru</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i=1;
                                        @endphp
                                        @foreach ($nilai as $nilai)
                                        @php
                                            $mapel = DB::table('nilais')
                                                        ->join('matapelajarans','matapelajarans.id','=','nilais.mapel')
                                                        ->where('matapelajarans.id','=',$nilai->mapel)
                                                        ->get();
                                            $guru = DB::table('nilais')
                                                        ->join('gurus','gurus.id','=','nilais.guru')
                                                        ->where('gurus.id','=',$nilai->guru)
                                                        ->get();
                                        @endphp
                                            <tr>
                                                <td>{{$i++}}</td>
                                                @foreach ($mapel as $item)
                                                <td>{{$item->matapelajaran}}</td>
                                                @endforeach
                                                <td>{{$nilai->angka}}</td>
                                                <td>{{$nilai->huruf}}</td>
                                                @foreach ($guru as $items)
                                                <td>{{$items->nama}}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- Striped rows -->
                </div> <!-- .row-->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->
@endsection