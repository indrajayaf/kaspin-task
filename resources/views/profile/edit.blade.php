@extends('layouts.main')

@section('container')
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form action="/profile/{{ $user->id }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="card-header">
                                <strong>Update User</strong>
                            </div>
                            <div class="card-body card-block">
                                    @method('put')
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="nip" class=" form-control-label">NIP</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="nip" name="nip" placeholder="NIP" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip', $user->nip) }}">
                                            @error('nip')
                                                <small class="form-text text-muted">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="name" class=" form-control-label">Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="name" name="name" placeholder="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}">
                                            @error('name')
                                                <small class="form-text text-muted">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email" class=" form-control-label">Email</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="email" name="email" placeholder="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}">
                                            @error('email')
                                                <small class="form-text text-muted">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="username" class=" form-control-label">Username</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="username" name="username" placeholder="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $user->username) }}">
                                            @error('username')
                                                <small class="form-text text-muted">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="password" class=" form-control-label">Password</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="password" id="password" name="password" placeholder="password" class="form-control @error('password') is-invalid @enderror">
                                            @error('password')
                                                <small class="form-text text-muted">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="level" class=" form-control-label">Jabatan</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="level_id" id="level" class="form-control">
                                                <option value="0">Please select</option>
                                                @foreach ($levels as $level)
                                                @if (old('level_id', $user->level_id) == $level->id)
                                                    <option value="{{ $level->id }}" selected>{{ $level->level }}<option>
                                                @else
                                                    <option value="{{ $level->id }}">{{ $level->level }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="image" class=" form-control-label">Image</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="image" name="image" class="form-control-file">
                                            @error('image')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <a href="/dashboard/users" class="btn btn-success btn-sm"><i class="fa fa-arrow-left"></i>&nbsp; Back</a>
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