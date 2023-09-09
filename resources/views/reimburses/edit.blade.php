@extends('layouts.main')

@section('container')
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form action="/dashboard/reimburses/{{ $data->id }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @method('put')
                            @csrf
                            <div class="card-header">
                                <strong>Update Reimbursement</strong>
                            </div>
                            <div class="card-body card-block">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="title" class=" form-control-label">Judul</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="title" name="title" placeholder="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $data->title) }}">
                                            @error('title')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>   

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="submitted_at" class=" form-control-label">Tanggal Pengajuan</label>
                                        </div>
                                        <div class="col-3 col-md-4">
                                            <input type="text" id="submitted_at" name="submitted_at" placeholder="submitted_at" class="form-control @error('submitted_at') is-invalid @enderror" value="{{ old('submitted_at', date('m/d/Y',strtotime($data->submitted_at))) }}" >
                                            @error('submitted_at')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="company" class=" form-control-label">Deskripsi</label>
                                        @error('detail')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror 
                                        <input id="detail" type="hidden" name="detail" value="{{ old('detail', $data->detail) }}">
                                        <trix-editor input="detail"></trix-editor>    
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="amount" class=" form-control-label">Nominal</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="amount" name="amount" placeholder="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount', $data->amount) }}">
                                            @error('amount')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file" class=" form-control-label">Lampirkan Bukti</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file" name="file" class="form-control-file">
                                        </div>
                                    </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <a href="/dashboard/reimburses" class="btn btn-success btn-sm"><i class="fa fa-arrow-left"></i>&nbsp; Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>
<!-- END MAIN CONTENT-->
@endsection