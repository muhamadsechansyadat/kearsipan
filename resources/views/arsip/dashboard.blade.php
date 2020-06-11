@extends('layouts.template')

@section('title','Dashboard')

@section('content')
	<div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Surat Masuk Umum</h4>
                  </div>
                  <div class="card-body">
                    {{ $dataumum }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Surat Masuk Kedinasan</h4>
                  </div>
                  <div class="card-body">
                    {{ $datakedinasan }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Surat Masuk Kunjungan</h4>
                  </div>
                  <div class="card-body">
                    {{ $datakunjungan }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Surat Masuk Pramuka</h4>
                  </div>
                  <div class="card-body">
                    {{ $datapramuka }}
                  </div>
                </div>
              </div>
            </div>                  
          </div>
          <div class="row">
          	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Surat Masuk Lingkungan</h4>
                  </div>
                  <div class="card-body">
                    {{ $datalingkungan }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Surat Keluar Umum</h4>
                  </div>
                  <div class="card-body">
                    {{ $suratkeluarumum }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Surat Tugas</h4>
                  </div>
                  <div class="card-body">
                    {{ $surattugas }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Surat Keputusan</h4>
                  </div>
                  <div class="card-body">
                    {{ $suratkeputusan }}
                  </div>
                </div>
              </div>
            </div>
        </div>
@endsection