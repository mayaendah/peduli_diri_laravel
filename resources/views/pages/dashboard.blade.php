@extends('layouts.master')

@section('title','Dashboard')


@section('halaman','Dashboard')
   

@section('judul-card')
    Data Perjalanan
@endsection


@section('content')

@if (session()->has('message'))
    <script>
      alert({{session()->get('message')}});
    </script>
@endif
    

<table class="table table-sm">
    <thead>
      @php
       $no=1
      @endphp
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Jam</th>
        <th scope="col">Lokasi</th>
        <th scope="col">Suhu</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $peduli_diri)
            <tr>
              <th scope="row">{{$no++}}</th>
              <td>{{$peduli_diri->tanggal}}</td>
              <td>{{$peduli_diri->jam}}</td>
              <td>{{$peduli_diri->lokasi}}</td>
              <td>{{$peduli_diri->suhu}}</td>
            </tr>
        @endforeach 

    </tbody>
  </table>
  
@endsection