@extends('layouts.main')

@section('container')
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <!-- WELCOME-->
            <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-4">Welcome back,
                                <span>{{ auth()->user()->name }}!</span>
                            </h1>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section>
            <!-- END WELCOME-->

            <!-- STATISTIC-->
            <section class="statistic statistic2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <a href="/dashboard/reimburses?status=pending">
                                <div class="statistic__item statistic__item--orange">
                                    <h2 class="number">{{ $data['pending'] }}</h2>
                                    <span class="desc">PENDING REIMBURSE</span>
                                    <div class="icon">
                                        <i class="fa fa-clock-o" ></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <a href="/dashboard/reimburses?status=accepted">
                                <div class="statistic__item statistic__item--green">
                                    <h2 class="number">{{ $data['accepted'] }}</h2>
                                    <span class="desc">ACCEPTED REIMBURSE</span>
                                    <div class="icon">
                                        <i class="fa fa-check" ></i>
                                    </div>
                                </div>
                            </a>    
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <a href="/dashboard/reimburses?status=declined">
                                <div class="statistic__item statistic__item--red">
                                    <h2 class="number">{{ $data['declined'] }}</h2>
                                    <span class="desc">DELINED REIMBURSE</span>
                                    <div class="icon">
                                        <i class="fa fa-ban" ></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <a href="/dashboard/reimburses?status=paid">
                                <div class="statistic__item statistic__item--blue">
                                    <h2 class="number">{{ $data['paid'] }}</h2>
                                    <span class="desc">PAID REIMBURSE</span>
                                    <div class="icon">
                                        <i class="fa fa-book"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
@endsection