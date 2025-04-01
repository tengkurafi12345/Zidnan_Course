@extends('layouts.main')

@section('title', 'Halaman Detail Lowongan')

@section('content')

    <header>
        <h1>Halaman Detail Lowongan</h1>
    </header>

    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
        <div class="container">
           <div class="mb-5">
               <a href="{{ route('lowongan') }}" class="btn btn-purple rounded-1"><i class="fa fa-reply-all"></i> Back</a>
           </div>
            <div class="row gy-5 gx-4">

                <div class="col-lg-8">
                    <div class="d-flex align-items-center mb-5">
                        <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-2.jpg" alt="" style="width: 80px; height: 80px;">
                        <div class="text-start ps-4">
                            <h3 class="mb-3">{{ $jobVacancy->title }}</h3>
                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-purple me-2"></i>{{ $jobVacancy->location }}</span>
                            <span class="text-truncate me-3"><i class="far fa-clock text-purple me-2"></i>{{ $jobVacancy->employment_type }}</span>
                            <span class="text-truncate me-3"><i class="fa fa-briefcase text-purple me-2"></i>{{ $jobVacancy->work_policy }}</span>
                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-purple me-2"></i> Rp {{ number_format($jobVacancy->salary_min, 0, ',', '.') }} - Rp {{ number_format($jobVacancy->salary_max, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h4 class="mb-3">Job description</h4>
                        <p>{{ $jobVacancy->job_description }}</p>
                        <h4 class="mb-3">Responsibility</h4>
                        @foreach($jobVacancy->responsibilities as $responsibility)
                            <p>{{ $responsibility->description }}</p>
                            <ul class="list-unstyled">
                                @foreach($responsibility->items as $item)
                                    <li><i class="fa fa-angle-right text-purple me-2"></i>{{ $item }}</li>
                                @endforeach
                            </ul>
                        @endforeach

                        <h4 class="mb-3">Qualifications</h4>
                        @foreach($jobVacancy->qualifications as $qualification)
                            <p>{{ $qualification->description }}</p>
                            <ul class="list-unstyled">
                                @foreach($qualification->items as $item)
                                    <li><i class="fa fa-angle-right text-purple me-2"></i>{{ $item }}</li>
                                @endforeach
                            </ul>
                        @endforeach
                    </div>

                    <div class="">
                        <h4 class="mb-4">Apply For The Job</h4>
                        <form>
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" placeholder="Your Name">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control" placeholder="Your Email">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" placeholder="Portfolio Website">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="file" class="form-control bg-white">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" rows="5" placeholder="Coverletter"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-purple rounded-1 w-100" type="submit">Apply Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    @php
                        function formatSalary($salaryMin, $salaryMax) {
                            // Format untuk gaji minimum
                            if ($salaryMin >= 1000000) {
                                $formattedMin = number_format($salaryMin / 1000000, 0) . ' juta';
                            } elseif ($salaryMin >= 100000) {
                                $formattedMin = number_format($salaryMin / 1000, 0) . ' ribu';
                            } else {
                                $formattedMin = 'Rp ' . number_format($salaryMin, 0, ',', '.');
                            }

                            // Format untuk gaji maksimum
                            if ($salaryMax >= 1000000) {
                                $formattedMax = number_format($salaryMax / 1000000, 0) . ' juta';
                            } elseif ($salaryMax >= 100000) {
                                $formattedMax = number_format($salaryMax / 1000, 0) . ' ribu';
                            } else {
                                $formattedMax = 'Rp ' . number_format($salaryMax, 0, ',', '.');
                            }

                            return $formattedMin . ' - ' . $formattedMax;
                        }
                    @endphp
                    <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: slideInUp;">
                        <h4 class="mb-4">Job Summery</h4>
                        <p><i class="fa fa-angle-right text-purple me-2"></i>Published On: {{ \Carbon\Carbon::parse($jobVacancy->published_at)->format('d M, Y') }}</p>
                        <p><i class="fa fa-angle-right text-purple me-2"></i>Vacancy: {{ $jobVacancy->title }}</p>
                        <p><i class="fa fa-angle-right text-purple me-2"></i>Job Nature: {{ $jobVacancy->employment_type }}</p>
                        <p><i class="fa fa-angle-right text-purple me-2"></i>Salary: {{ formatSalary($jobVacancy->salary_min, $jobVacancy->salary_max) }}</p>
                        <p><i class="fa fa-angle-right text-purple me-2"></i>Location: {{ $jobVacancy->location }}</p>
                        <p class="m-0"><i class="fa fa-angle-right text-purple me-2"></i>Date Line: {{ \Carbon\Carbon::parse($jobVacancy->date_line)->format('d M, Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
