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
                                <strong class="card-title">Ujian Akhir</strong>
                            </div>
                            <div class="card-body my-n2">
                                <table class="table table-striped table-hover table-borderless">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal Ujian</th>
                                            <th>Jam</th>
                                            <th>Ruangan</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Kursi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                       @foreach ($ujiantulis as $ujiantulis)
                                       @php
                                           $mapel = DB::table('ujians')
                                                        ->join('matapelajarans','matapelajarans.id','=','ujians.mapel')
                                                        ->where('matapelajarans.id','=',$ujiantulis->mapel)
                                                        ->where('tipe_ujian','=',$ujiantulis->tipe_ujian)
                                                        ->get();
                                       @endphp
                                           <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$ujiantulis->tanggal_ujian}}</td>
                                                <td>{{$ujiantulis->jam}}</td>
                                                <td>{{$ujiantulis->ruangan}}</td>
                                                @foreach ($mapel as $item)
                                                <td>{{$item->matapelajaran}}</td>
                                                @endforeach
                                                <td>{{$ujiantulis->kursi}}</td>
                                           </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- Striped rows -->
                    <div class="col-md-12 col-lg-12 mt-4">
                        <div class="card shadow">
                            <div class="card-header">
                                <strong class="card-title">Ujian Praktek</strong>
                            </div>
                            <div class="card-body my-n2">
                                <table class="table table-striped table-hover table-borderless">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal Ujian</th>
                                            <th>Jam</th>
                                            <th>Ruangan</th>
                                            <th>Mata Pelajaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @php
                                            $j = 1;
                                        @endphp
                                       @foreach ($ujianpraktek as $ujianpraktek)
                                       @php
                                           $mapels = DB::table('ujians')
                                                        ->join('matapelajarans','matapelajarans.id','=','ujians.mapel')
                                                        ->where('matapelajarans.id','=',$ujianpraktek->mapel)
                                                        ->where('tipe_ujian','=',$ujianpraktek->tipe_ujian)
                                                        ->get();
                                       @endphp
                                           <tr>
                                                <td>{{$j++}}</td>
                                                <td>{{$ujianpraktek->tanggal_ujian}}</td>
                                                <td>{{$ujianpraktek->jam}}</td>
                                                <td>{{$ujianpraktek->ruangan}}</td>
                                                @foreach ($mapels as $items)
                                                <td>{{$items->matapelajaran}}</td>
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