@extends('layouts.main')

@section('container')
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if ($statuses->count())
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($statuses as $status)
                                <tr class="tr-shadow">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $status->status }}</td>
                                </tr>
                                <tr class="spacer"></tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                    @else
                    <p class="text-center fs-4">No status data found.</p>
                    @endif
                </div>
            </div>
        </div>    
    </div>
</div>
<!-- END MAIN CONTENT-->
@endsection