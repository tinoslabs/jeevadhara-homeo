<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">{{ __('translation.dashboards') }}</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">{{ __('translation.welcome-to-dashboard') }}</li>
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
                            <h5 class="text-primary">{{ __('translation.welcome-back') }} !</h5>
                            <p>{{ __('translation.dashboards') }}</p>
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
                            <img src="@if ($user->profile_photo != ''){{ URL::asset('storage/images/users/' . $user->profile_photo) }}@else{{ URL::asset('build/images/users/noImage.png') }}@endif" alt="" class="img-thumbnail rounded-circle">
                        </div>
                        <h5 class="font-size-15 text-truncate">{{ $user->first_name }} {{ $user->last_name }}</h5>
                        <p class="badge bg-success text-white mb-0 text-truncate">{{ @$doctor_info->department->name }}</p>
                        <p class="text-muted mb-0 text-truncate">{{ $doctor_info->title }}</p>
                    </div>
                    <div class="col-sm-8">
                        <div class="pt-4">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="font-size-12">{{ __('Last Login:') }}</h5>
                                    <p class="text-muted mb-0"> {{ $user->last_login }} </p>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <a href="{{ url('profile-edit') }}"
                                        class="btn btn-primary waves-effect waves-light btn-sm">{{ __('Edit Profile') }}
                                        <i class="mdi mdi-arrow-right ms-1"></i></a>
                                    <a href="{{ url('time-edit/' . $user->id) }}"
                                        class="btn btn-primary waves-effect waves-light btn-sm">{{ __('Edit Time Slot') }}
                                        <i class="mdi mdi-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ __('translation.monthly-earning') }}</h4>
                <div class="row">
                    <div class="col-sm-6">
                        <p class="text-muted">{{ __('This month') }}</p>
                        <h3>${{ number_format($data['monthly_earning']) }}</h3>
                        <p class="text-muted"><span class="@if ($data['monthly_diff'] > 0) text-success @else text-danger @endif me-2"> {{ $data['monthly_diff'] }}% <i class="mdi @if ($data['monthly_diff'] > 0) mdi-arrow-up @else mdi-arrow-down @endif"></i> </span>
                            {{ __('From previous month') }}</p>
                    </div>
                    <div class="col-sm-6">
                        <div id="radialBar-chart" class="apex-charts"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        @if (session()->has('page_limit'))
                            @php
                                $per_page = session()->get('page_limit');
                            @endphp
                        @else
                            @php
                                $per_page = Config::get('app.page_limit');
                            @endphp
                        @endif
                        <div class="flex-grow-1">
                            <p class="text-muted fw-medium">{{ __('translation.items-per-page') }}</p>
                            <button
                                class="btn  {{ $per_page == 10 ? 'btn-primary' : 'btn-info' }}  btn-sm me-2 per-page-items  mb-md-1"
                                data-page="10">10</button>
                            <button
                                class="btn  {{ $per_page == 25 ? 'btn-primary' : 'btn-info' }}  btn-sm me-2 per-page-items  mb-md-1"
                                data-page="25">25</button>
                            <button
                                class="btn  {{ $per_page == 50 ? 'btn-primary' : 'btn-info' }}  btn-sm me-2 per-page-items  mb-md-1"
                                data-page="50">50</button>
                            <button
                                class="btn  {{ $per_page == 100 ? 'btn-primary' : 'btn-info' }}  btn-sm me-2 per-page-items  mb-md-1"
                                data-page="100">100</button>
                        </div>
                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="bx bx-book-open font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <div class="row">
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">{{ __('translation.appointments') }}</p>
                                <h4 class="mb-0">{{ number_format($data['total_appointment']) }}</h4>
                            </div>
                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                <span class="avatar-title">
                                    <i class="bx bxs-calendar-check font-size-24"></i>
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
                                <p class="text-muted fw-medium">{{ __('translation.revenue') }}</p>
                                <h4 class="mb-0">${{ number_format($data['revenue'], 2) }}</h4>
                            </div>
                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                <span class="avatar-title rounded-circle bg-primary">
                                    <i class="bx bx-dollar font-size-24"></i>
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
                                <p class="text-muted fw-medium">{{ __("translation.today's-earning") }}</p>
                                <h4 class="mb-0">${{ number_format($data['daily_earning'], 2) }}</h4>
                            </div>
                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                <span class="avatar-title rounded-circle bg-primary">
                                    <i class="bx bxs-dollar-circle  font-size-24"></i>
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
                                <p class="text-muted fw-medium">{{ __("translation.today's-appointments") }}</p>
                                <a href="{{ url('today-appointment') }}"
                                    class="mb-0 fw-medium font-size-20">
                                    <h4 class="mb-0">{{ number_format($data['today_appointment']) }}</h4>
                                </a>
                            </div>
                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                <span class="avatar-title">
                                    <i class="bx bx-calendar font-size-24"></i>
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
                                <p class="text-muted fw-medium">{{ __('translation.tomorrow-appointments') }}</p>
                                <h4 class="mb-0">{{ number_format($data['tomorrow_appointment']) }}</h4>
                            </div>
                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                <span class="avatar-title rounded-circle bg-primary">
                                    <i class="bx bx-calendar-event font-size-24"></i>
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
                                <p class="text-muted fw-medium">{{ __('translation.upcoming-appointments') }}</p>
                                <a href="{{ url('upcoming-appointment') }}"
                                    class="mb-0 fw-medium font-size-20">
                                    <h4 class="mb-0">{{ number_format($data['Upcoming_appointment']) }}
                                    </h4>
                                </a>
                            </div>
                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                <span class="avatar-title rounded-circle bg-primary">
                                    <i class='bx bxs-calendar-minus font-size-24'></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ __('translation.monthly-appointments') }}</h4>
                <div id="monthly_appointment" class="apex-charts" dir="ltr"></div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ __("translation.today's-appointments") }}</h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>{{ __('Sr.No.') }}</th>
                                <th>{{ __('Patient Name') }}</th>
                                <th>{{ __('Patient Contact No') }}</th>
                                <th>{{ __('Patient Email') }}</th>
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Time') }}</th>
                                <th>{{ __('Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointments as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->patient->first_name }} {{ $item->patient->last_name }}</td>
                                    <td>{{ $item->patient->mobile }}</td>
                                    <td>{{ $item->patient->email }}</td>
                                    <td>{{ $item->appointment_date }}</td>
                                    <td>{{ $item->timeSlot->from . ' to ' . $item->timeSlot->to }}</td>
                                    <td>
                                        <a href="tel:{{ $item->patient->mobile }}">
                                            <button type="button"
                                                class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                                data-bs-toggle="modal" data-target=".exampleModal">
                                                {{ __('Call') }}
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>
<!-- end row -->
