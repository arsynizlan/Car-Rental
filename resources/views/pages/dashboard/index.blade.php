@extends('layouts.master')

@section('title')
    Dashboard - Nikel Corp
@endsection

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h1 class="card-title text-primary">
                                        Selamat datang di <b> Nikel Corp.</b>
                                    </h1>
                                    <p class="mb-2">
                                        Hai <b>{{ Auth::user()->name }}</b> !
                                    </p>
                                    <p class="mb-2">
                                        Anda login sebagai <span class="fw-bold">
                                            @if (Auth::user()->getRoleNames()[0] == 'Responsible Person')
                                                Penanggung Jawab
                                            @else
                                                {{ Auth::user()->getRoleNames()[0] }}
                                            @endif
                                        </span>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 order-1">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0 me-3">
                                            <span class="avatar-initial rounded bg-label-danger">
                                                <i class='bx bx-x'></i>
                                            </span>
                                        </div>
                                    </div>
                                    <span class="d-block mb-1">Pemesanan Ditolak</span>
                                    <h3 class="card-title mb-2">
                                        <b>
                                            @if (Auth::user()->getRoleNames()[0] == 'Responsible Person')
                                                {{ $approvalX }}
                                            @else
                                                {{ $bookingX }}
                                            @endif
                                        </b>
                                    </h3>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <span class="avatar-initial rounded bg-label-success">
                                                <i class='bx bx-check'></i>
                                            </span>
                                        </div>
                                    </div>
                                    <span class="d-block mb-1">Pemesanan Disetujui</span>
                                    <h3 class="card-title mb-2">
                                        <b>
                                            <b>
                                                @if (Auth::user()->getRoleNames()[0] == 'Responsible Person')
                                                    {{ $approvalCheck }}
                                                @else
                                                    {{ $bookingCheck }}
                                                @endif
                                            </b>

                                        </b>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @role('Admin')
                    <!-- Chart Car -->
                    <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                        <div class="card">
                            <h5 class="card-header m-0 me-2 pb-3">Grafik Kepemilikan Mobil</h5>
                            <div class="row row-bordered g-0 m-4">
                                <div class="col-9">
                                    {!! $carsChart->container() !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                        <div class="row">
                            <div class="col-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <span class="avatar-initial rounded bg-label-info"><i
                                                        class='bx bx-car'></i></span>
                                            </div>
                                        </div>
                                        <span class="d-block mb-1">Mobil</span>
                                        <h3 class="card-title mb-2"><b>{{ $carsCount }}</b></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-start justify-content-between">
                                            <div class="avatar flex-shrink-0">
                                                <span class="avatar-initial rounded bg-label-info"><i
                                                        class='bx bxs-calendar'></i></span>
                                            </div>
                                        </div>
                                        <span class="d-block mb-1">Service</span>
                                        <h3 class="card-title mb-2"><b>{{ $servicesCount }}</b></h3>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="row">
                                <div class="col-12 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                                <div
                                                    class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                                    <div class="card-title">
                                                        <h5 class="text-nowrap mb-2">Kepemilikan Mobil</h5>
                                                    </div>
                                                    <div class="mt-sm-auto">
                                                        {!! $carsChart->container() !!}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    @endrole
                </div>

            </div>
            <!-- / Content -->
        @endsection

        @push('script')
            <script src="{{ $carsChart->cdn() }}"></script>
            {{ $carsChart->script() }}

            <script src="{{ $carsUsageChart->cdn() }}"></script>
            {{ $carsUsageChart->script() }}
        @endpush
