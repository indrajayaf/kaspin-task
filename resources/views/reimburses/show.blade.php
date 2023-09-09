@extends('layouts.main')

@section('container')
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title mb-3"><i class="fa fa-user"></i> Detail Reimbursment</strong>
                </div>
                <div class="card-body">
                    @if ($data->status->status == 'Pending')
                        @php
                            $badge = "secondary";
                            $info = "Status masih pending menunggu konfirmasi dari Direktur.";
                        @endphp
                    @elseif($data->status->status == 'Accepted')
                        @php
                            $badge = "success";
                            $info = "Status sudah diterima dan disetujui oleh Direktur, menunggu konfirmasi dari pihak Finance.";
                        @endphp
                    @elseif($data->status->status == 'Declined')
                        @php
                            $badge = "danger";
                            $info = "Status sudah ditolak, mohon dicek detail alasan penolakan.";
                        @endphp
                    @elseif($data->status->status == 'Paid')
                        @php
                            $badge = "primary";
                            $info = "Status sudah dikonfirmasi dan dibayar oleh Finance.";
                        @endphp
                    @endif
                    <div class="sufee-alert alert with-close alert-{{$badge}} alert-dismissible fade show">
                        <span class="badge badge-pill badge-{{$badge}}">{{ $data->status->status }}</span>
                        {{ $info }}
                    </div>
                    <div class="row ms-auto">
                        <div class="col-md-6">
                            <div class="card">
                                @if ($data->file)
                                    @if (pathinfo($data->file, PATHINFO_EXTENSION) == 'pdf')
                                        <iframe src="{{asset('/storage/'.$data->file)}}" frameborder="0" width="500px" height="800px"></iframe>
                                        <a href="{{asset('/storage/'.$data->file)}}" target="_blank" class="btn btn-primary btn-sm mt-3">Open the pdf!</a>
                                    @else
                                        <a data-toggle="modal" data-target="#previewModal" style="cursor:pointer"><img class="card-img-top" src="{{ asset('/storage/'.$data->file) }}" alt="{{ $data->title }}"></a>
                                    @endif
                                @else
                                    <img class="card-img-top" src="{{ asset('/img/no-file-uploaded.png') }}" alt="{{ $data->title }}">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Judul
                                    </strong>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{{ $data->title }}
                                    </p>
                                </div>
                            </div>
                            @if (auth()->user()->level->level != 'Staff')
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Diajukan oleh
                                    </strong>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{{ $data->user->name }}
                                    </p>
                                </div>
                            </div>
                            @endif
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Tanggal Pengajuan
                                    </strong>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{{ date('l, d F Y', strtotime($data->submitted_at)) }}
                                    </p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Deskripsi
                                    </strong>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{!! $data->detail !!}
                                    </p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Total
                                    </strong>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{{ 'Rp.'. number_format($data->amount,2,',','.') }}
                                    </p>
                                </div>
                            </div>
                            
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Status Reimbursement
                                    </strong>
                                </div>
                                <div class="card-body">
                                    <p class="card-text status--{{strtolower($data->status->status)}}">{{ $data->status->status }}
                                        @if ($data->status->status == 'Declined')
                                        &nbsp;
                                        <button type="button" class="btn btn-danger btn-sm d-inline" data-toggle="modal" data-target="#alasanModal">
                                            <i class="fa fa-info-circle"></i>&nbsp; Alasan
                                        </button>
                                    @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-text text-sm-center">
                        @if (auth()->user()->level->level == 'Directur')
                            @if ($data->status->status == 'Pending')
                                <form action="/dashboard/reimburses/{{ $data->id }}/action" method="post" class="d-inline">
                                    @method('put')
                                    @csrf
                                    <input type="hidden" name="status_id" value="2">
                                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i>&nbsp; Accept</button>
                                </form>
                                
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#declineModal">
                                    <i class="fa fa-ban"></i>&nbsp; Decline
                                </button>
                            @endif
                        @endif

                        @if (auth()->user()->level->level == 'Finance')
                            @if ($data->status->status == 'Accepted')
                                <form action="/dashboard/reimburses/{{ $data->id }}/action" method="post" class="d-inline">
                                    @method('put')
                                    @csrf
                                    <input type="hidden" name="status_id" value="4">
                                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i>&nbsp; Paid</button>
                                </form>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#declineModal">
                                    <i class="fa fa-ban"></i>&nbsp; Decline
                                </button>
                            @endif
                        @endif
                        <a href="/dashboard/reimburses/{{ $data->id }}/edit" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i>&nbsp; Edit</a>
                        <a href="/dashboard/reimburses" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i>&nbsp; Back</a>
                    </div>
                </div>
            </div>        
        </div>    
    </div>
</div>

<div class="modal fade" id="declineModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="/dashboard/reimburses/{{ $data->id }}/action" method="post" class="d-inline">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="reason" class=" form-control-label">Alasan</label>
                        @method('put')
                        @csrf
                        <input type="hidden" name="status_id" value="3">
                        <input id="reason" type="hidden" name="reason" value="" required>
                        <trix-editor input="reason"></trix-editor>
                    </div>    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="alasanModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Detail Alasan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! $data->reason !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- modal large -->
<div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Preview Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="card-img-top" src="{{ asset('/storage/'.$data->file) }}" alt="{{ $data->title }}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal large -->
@endsection