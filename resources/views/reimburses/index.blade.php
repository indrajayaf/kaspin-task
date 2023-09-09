@extends('layouts.main')

@section('container')
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->

                    <h3 class="title-5 m-b-35">{{ $title }}</h3>
                    @if (session()->has('success'))
                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                            <span class="badge badge-pill badge-success">Success</span>
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="rs-select2--light rs-select2--md">
                                <select class="js-select2" name="property" onchange="window.location.href=this.value;">
                                    <option @if (!request('status')) selected='selected' @endif value="/dashboard/reimburses">All Status</option>
                                    @foreach ($statuses as $status)
                                        <option value="/dashboard/reimburses?status={{$status->status}}" @if(request('status')==$status->status) selected='selected' @endif>    {{ $status->status }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            @if (auth()->user()->level->level == 'Staff')
                                <a href="/dashboard/reimburses/create" class="au-btn au-btn-icon au-btn--green au-btn--small"><i class="zmdi zmdi-plus"></i>add reimbursement</a>
                            @endif
                        </div>
                    </div>
                    @if ($reimburses->count())
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Tgl Pengajuan</th>
                                    @if (auth()->user()->level->level != 'Staff')
                                        <th>Diajukan Oleh</th>
                                    @endif
                                    <th>Nominal</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reimburses as $reimburse)
                                <tr class="tr-shadow">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $reimburse->title }}</td>
                                    <td>{{ date('m/d/Y', strtotime($reimburse->submitted_at)) }}</td>
                                    @if (auth()->user()->level->level != 'Staff')
                                        <td>{{ $reimburse->user->name }}</td>
                                    @endif
                                    <td>{{ 'Rp.' . number_format($reimburse->amount,2,',','.')}}</td>
                                    <td>
                                        <span class="status--{{strtolower($reimburse->status->status)}}">{{ $reimburse->status->status }}</span>
                                    </td>
                                    <td>
                                        <div class="table-data-feature justify-content-center">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Show">
                                                <a href="/dashboard/reimburses/{{ $reimburse->id }}">
                                                    <i class="zmdi zmdi-eye"></i>
                                                </a>
                                            </button>
                                            @if ($reimburse->status->status == 'Pending')
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit" disabled>
                                                    <a href="/dashboard/reimburses/{{ $reimburse->id }}/edit"><i class="zmdi zmdi-edit"></i></a>
                                                </button>
                                            @endif

                                            @if ($reimburse->status->status == 'Declined')
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Lengkapi Data" disabled>
                                                    <a href="/dashboard/reimburses/{{ $reimburse->id }}/edit"><i class="zmdi zmdi-edit"></i></a>
                                                </button>
                                            @endif
                                            <form action="/dashboard/reimburses/{{ $reimburse->id }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Are you sure?')">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                    @else
                    <p class="text-center fs-4">No reimbursement found.</p>
                    @endif
                </div>
            </div>
        </div>    
    </div>
</div>
<!-- END MAIN CONTENT-->
@endsection