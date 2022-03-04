@extends('layouts.master')



<style type="text/css">
  input[type="date"]::-webkit-calendar-picker-indicator {
    position: absolute;
    left: 12;
  }

  input[type="time"]::-webkit-calendar-picker-indicator {
    position: absolute;
    left: 30;
  }
  
  input::-webkit-datetime-edit {
    position: relative;
    left: 15px;
  }

  input::-webkit-datetime-edit-fields-wrapper {
    position: relative;
    left: 15px;
  }
  
</style>

@section('title','Input Data')


@section('halaman','Input Data perjalanan')
   

@section('judul-card')
    Data perjalanan
@endsection


@section('content')

<form action="/simpanPerjalanan" method="POST">
  {{ csrf_field() }}
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Tanggal</label>
    <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="Tanggal" name="tanggal" width="50">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Jam</label>
    <input type="time" class="form-control" id="exampleFormControlInput1" placeholder="Tanggal" name="jam" width="50">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Lokasi yang di tuju</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Lokasi yang dituju" name="lokasi">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Suhu</label>
    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Suhu tubuh" name="suhu">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

{{-- @push('custom-css')
    <script type="text/javascript" src="{{ URL::asset ('js/custom-scripts.js') }}"></script>
@endpush --}}