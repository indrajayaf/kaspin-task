@extends('layouts.main')

@section('container')
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row ms-auto">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title mb-3"><i class="fa fa-user"></i> Detail User</strong>
                        </div>
                        <div class="card-body">
                            <div class="mx-auto d-block">
                                @if ($user->image)
                                    <img class="rounded-circle mx-auto d-block" src="{{ asset('/storage/' . $user->image) }}" alt="Card image cap" style="max-width: 250px">
                                @else
                                    <img class="rounded-circle mx-auto d-block" src="/images/icon/avatar-01.jpg" alt="Card image cap">
                                @endif
                                <h5 class="text-sm-center mt-2 mb-1">{{ $user->name }}</h5>
                                <div class="location text-sm-center">
                                    {{ $user->email }}
                                </div>
                            </div>
                            <hr>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Jabatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="tr-shadow">
                                            <td>{{ $user->nip }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                <span class="block-email">{{ $user->email }}</span>
                                            </td>
                                            <td>
                                                <span class="role user">{{ $user->level->level }}</span>
                                            </td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <div class="card-text text-sm-center">
                                <a href="/dashboard/users/{{ $user->id }}/edit" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i>&nbsp; Edit</a>
                                <a href="/dashboard/users" class="btn btn-success btn-sm"><i class="fa fa-arrow-left"></i>&nbsp; Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>
@endsection