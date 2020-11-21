@extends('layouts.app')
@section('content')
@include('layouts.navbar')
@include('layouts.sidebar')    
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1>Input Pemasukan</h1>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('/input/keuangan') }}">Input Pemasukan</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content row">
        <div class="col-md-6">
            <div class="container-fluid">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Input Pemasukan</h3>
                    </div>
                    <form action="{{ url('input/pemasukan') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="jenis_pemasukan">Jenis Pemasukan</label>
                                <select name="jenis_pemasukan" id="jenis_pemasukan" class="form-control" required>
                                    <option>Gaji</option>
                                    <option>Bonus</option>
                                    <option>Investasi</option>
                                    <option>Bunga Bank</option>
                                    <option>Keuntungan Bisnis</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah (Rupiah)</label>
                                <input type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" id="jumlah" required>
                                @error('jumlah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-warning"><i class="fa fa-undo"></i> Reset</button>
                            <button class="btn btn-primary float-right" type="submit"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="container-fluid">
                <div class="card card-warning card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Log pemasukan 7 Hari terakhir</h3>
                    </div>
                    <div class="history">
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('js-script')
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: '{{ url("/input/history-pemasukan") }}',
            type: "GET",
            success: function(response){
                $('.history').html(response);
            }
        });
    });
</script>
@endsection
