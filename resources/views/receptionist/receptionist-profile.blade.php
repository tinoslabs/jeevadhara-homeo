@extends('layouts.master-layouts')
@section('title') {{ __('Receptionist Profile') }} @endsection
    @section('content')
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">
                        {{ __('Receptionist Profile') }}
                    </h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('receptionist') }}">{{ __('Receptionists') }}</a></li>
                            <li class="breadcrumb-item active">
                                {{ __('Receptionist Profile') }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-4">
                <div class="card overflow-hidden">
                    <div class="bg-primary-subtle">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-3">
                                    <h5 class="text-primary">{{ __('Receptionist Information') }}</h5>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{ URL::asset('build/images/profile-img.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <img src="@if ($receptionist->profile_photo != ''){{ URL::asset('storage/images/users/' . $receptionist->profile_photo) }}@else{{ URL::asset('build/images/users/noImage.png') }}@endif" alt="{{ $receptionist->fisrt_name }}"
                                        class="img-thumbnail rounded-circle">
                                </div>
                                <h5 class="font-size-15 text-truncate"> {{ $receptionist->first_name }}
                                    {{ $receptionist->last_name }} </h5>
                                <p class="text-muted mb-0 text-truncate"> {{ $receptionist->title }} </p>
                            </div>
                            <div class="col-sm-8">
                                <div class="pt-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="font-size-12">{{ __('Last Login:') }}</h5>
                                            <p class="text-muted mb-0"> {{ $receptionist->last_login }} </p>
                                        </div>
                                    </div>
                                    @if ($role == 'admin')
                                        <div class="mt-4">
                                            <a href="{{ url('receptionist/' . $receptionist->id . '/edit') }}"
                                                class="btn btn-primary waves-effect waves-light btn-sm">
                                                {{ __('Edit Profile') }} <i class="mdi mdi-arrow-right ms-1"></i>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">{{ __('Personal Information') }}</h4>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ __('Full Name:') }}</th>
                                        <td>{{ $receptionist->first_name }} {{ $receptionist->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{ __('Contact:') }}</th>
                                        <td> {{ $receptionist->mobile }} </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{ __('Email:') }}</th>
                                        <td> {{ $receptionist->email }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end card -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">{{ __('Assign Doctor Information') }}</h4>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <tbody>
                                    <tr>
                                        <td>
                                            @if(count($doctor_user) > 0)
                                            @foreach ($doctor_user as $key => $show)
                                                <span
                                                    class="badge bg-info font-size-14 my-2">{{ $show->first_name . ' ' . $show->last_name }}</span>
                                            @endforeach
                                            @else
                                                <p class="alert alert-primary">No Assigned Doctors</p>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <div class="col-xl-8">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">{{ __('Appointments') }}</p>
                                        <h4 class="mb-0">{{ number_format($data['total_appointment']) }}</h4>
                                    </div>
                                    <div class="mini-stat-icon avatar-sm align-self-center rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-check-circle font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">{{ __('Pending Bills') }}</p>
                                        <h4 class="mb-0">{{ number_format($data['pending_bill']) }}</h4>
                                    </div>
                                    <div class="avatar-sm align-self-center mini-stat-icon rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-hourglass font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">{{ __('Total Bill') }}</p>
                                        <h4 class="mb-0">${{ number_format($data['revenue'], 2) }}</h4>
                                    </div>
                                    <div class="avatar-sm align-self-center mini-stat-icon rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-package font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#AppointmentList" role="tab">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">{{ __('Appointment List') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#Invoices" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                    <span class="d-none d-sm-block">{{ __('Invoices') }}</span>
                                </a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="AppointmentList" role="tabpanel">
                                <table class="table table-bordered dt-responsive nowrap "
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Sr. No') }}</th>
                                            <th>{{ __('Doctor Name') }}</th>
                                            <th>{{ __('Patient Name') }}</th>
                                            <th>{{ __('Date') }}</th>
                                            <th>{{ __('Time') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (session()->has('page_limit'))
                                            @php
                                                $per_page = session()->get('page_limit');
                                            @endphp
                                        @else
                                            @php
                                                $per_page = Config::get('app.page_limit');
                                            @endphp
                                        @endif
                                        @php
                                            $currentpage = $appointments->currentPage();
                                        @endphp
                                        @foreach ($appointments as $item)
                                            <tr>
                                                <td>{{ $loop->index + 1 + $per_page * ($currentpage - 1) }}</td>
                                                <td> {{ @$item->doctor->user->first_name . ' ' . @$item->doctor->user->last_name }}
                                                </td>
                                                <td> {{ $item->patient->first_name . ' ' . $item->patient->last_name }}
                                                </td>
                                                <td>{{ $item->appointment_date }}</td>
                                                <td>{{ $item->timeSlot->from . ' ' . $item->timeSlot->to }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="col-md-12 text-center mt-3">
                                    <div class="d-flex justify-content-start">
                                        Showing {{ $appointments->firstItem() }} to {{ $appointments->lastItem() }} of
                                        {{ $appointments->total() }} entries
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        {{ $appointments->links() }}
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="Invoices" role="tabpanel">
                                <table class="table table-bordered dt-responsive nowrap "
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Sr. No') }}</th>
                                            <th>{{ __('Date') }}</th>
                                            <th>{{ __('Patient name') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Option') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (session()->has('page_limit'))
                                            @php
                                                $per_page = session()->get('page_limit');
                                            @endphp
                                        @else
                                            @php
                                                $per_page = Config::get('app.page_limit');
                                            @endphp
                                        @endif
                                        @php
                                            $currentpage = $invoices->currentPage();
                                        @endphp
                                        @foreach ($invoices as $item)
                                            <tr>
                                                <td>{{ $loop->index + 1 + $per_page * ($currentpage - 1) }}</td>
                                                <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                                <td>{{ $item->user->first_name . ' ' . $item->user->last_name }}</td>
                                                <td>{{ $item->payment_status }}</td>
                                                <td>
                                                    <a href="{{ url('invoice/' . $item->id) }}">
                                                        <button type="button"
                                                            class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                                            {{ __('View') }}
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="col-md-12 text-center mt-3">
                                    <div class="d-flex justify-content-start">
                                        Showing {{ $invoices->firstItem() }} to {{ $invoices->lastItem() }} of
                                        {{ $invoices->total() }} entries
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        {{ $invoices->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    @endsection
    @section('script')
        <!-- Chart plugins -->
        <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
        <!-- Plugins js -->
        <script src="{{ URL::asset('build/libs/jszip/jszip.min.js') }}"></script>
        <script src="{{ URL::asset('build/libs/pdfmake/build/pdfmake.min.js') }}"></script>
        <!-- Init js-->
        <script src="{{ URL::asset('build/js/pages/profile.init.js') }}"></script>
    @endsection
