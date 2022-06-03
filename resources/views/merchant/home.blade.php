@extends('layouts.app')
@section('title', 'Dashboard ')
@section('dashboard_nav', 'active')

@section('content')
    <!-- container -->
    <div class="container-fluid">
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
                <div class="left-content">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Hi, welcome back!</h2>
                    </div>
                </div>
            </div>
            <!-- /breadcrumb -->
            <!-- row -->
            <div class="row row-sm">
                <div class="col-sm-12">
					<h6 class="card-title mb-1">SUMMERY</h6>
				</div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                    <div class="card overflow-hidden sales-card bg-primary-gradient">
                        <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                            <div class="">
                                <h6 class="mb-3 tx-12 text-white">TOTAL PROPERTY</h6>
                            </div>
                            <div class="pb-0 mt-0">
                                <div class="d-flex">
                                    <div class="">
                                        <h4 class="tx-20 font-weight-bold mb-1 text-white">{{App\Property::where('user_id',auth()->user()->id)->count()}}</h4>
                                        <p class="mb-0 tx-12 text-white op-7"></p>
                                    </div>
                                    <span class="float-right my-auto ml-auto">
                                    <i class="fas fa-arrow-circle-right text-white"></i>
                                    <span class="text-white op-7"><a href="{{route('properties.index')}}" class="text-white">More Info</a></span>
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                    <div class="card overflow-hidden sales-card bg-danger-gradient">
                        <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                            <div class="">
                                <h6 class="mb-3 tx-12 text-white">TOTAL SALE PROPERTY</h6>
                            </div>
                            <div class="pb-0 mt-0">
                                <div class="d-flex">
                                    <div class="">
                                        <h4 class="tx-20 font-weight-bold mb-1 text-white">{{App\Property::where('user_id',auth()->user()->id)->where('status','!=',0)->count()}}</h4>
                                        <p class="mb-0 tx-12 text-white op-7"></p>
                                    </div>
                                    <span class="float-right my-auto ml-auto">
                                    <i class="fas fa-arrow-circle-right text-white"></i>
                                    <span class="text-white op-7"><a href="{{route('properties.index')}}" class="text-white">More Info</a></span>
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                    <div class="card overflow-hidden sales-card bg-success-gradient">
                        <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                            <div class="">
                                <h6 class="mb-3 tx-12 text-white">TOTAL BID PROPERTY</h6>
                            </div>
                            <div class="pb-0 mt-0">
                                <div class="d-flex">
                                    <div class="">
                                        <h4 class="tx-20 font-weight-bold mb-1 text-white">{{App\Bidd::where('user_id',auth()->user()->id)->count()}}</h4>
                                        <p class="mb-0 tx-12 text-white op-7"></p>
                                    </div>
                                    <span class="float-right my-auto ml-auto">
                                    <i class="fas fa-arrow-circle-right text-white"></i>
                                    <span class="text-white op-7"><a href="{{route('seller_bidd.index')}}" class="text-white">More Info</a></span>
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                    <div class="card overflow-hidden sales-card bg-warning-gradient">
                        <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                            <div class="">
                                <h6 class="mb-3 tx-12 text-white">TOTAL QUESTIONS</h6>
                            </div>
                            <div class="pb-0 mt-0">
                                <div class="d-flex">
                                    <div class="">
                                        <h4 class="tx-20 font-weight-bold mb-1 text-white">{{App\Consult::where('user_id',auth()->user()->id)->count()}}</h4>
                                        <p class="mb-0 tx-12 text-white op-7"></p>
                                    </div>
                                    <span class="float-right my-auto ml-auto">
                                    <i class="fas fa-arrow-circle-right text-white"></i>
                                    <span class="text-white op-7"><a href="{{route('consults2.index')}}" class="text-white">More Info</a></span>
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row closed -->
        </div>


@endsection
@section('script')
@endsection
