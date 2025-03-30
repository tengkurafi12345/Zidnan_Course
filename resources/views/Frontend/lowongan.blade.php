@extends('layouts.main')

@section('title', 'Halaman Lowongan')

@section('content')
    <header>
        <h1>Halaman Lowongan</h1>
    </header>

    <section class="testimonial-section">
        <h2 class="fw-bold">Job Listing</h2>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
            <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start text-purple text-decoration-none mx-3 ms-0 pb-3" data-bs-toggle="pill" href="#tab-1">
                        <h6 class="mt-n1 mb-0">Featured</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start text-purple text-decoration-none mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                        <h6 class="mt-n1 mb-0">Full Time</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start text-purple text-decoration-none mx-3 me-0 pb-3 active" data-bs-toggle="pill" href="#tab-3">
                        <h6 class="mt-n1 mb-0">Part Time</h6>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade p-0">
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-1.jpg" alt="" style="width: 80px; height: 80px;">
                                <div class="text-start ps-4">
                                    <h5 class="mb-3"><a class="text-dark text-decoration-none" href="{{ route('lowongan.detail') }}">Software Engineer</a></h5>
                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-purple me-2"></i>New York, USA</span>
                                    <span class="text-truncate me-3"><i class="far fa-clock text-purple me-2"></i>Full Time</span>
                                    <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-purple me-2"></i>$123 - $456</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                                    <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-purple"></i></a>
                                    <a class="btn btn-purple" href="">Apply Now</a>
                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-purple me-2"></i>Date Line: 01 Jan, 2045</small>
                            </div>
                        </div>
                    </div>
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-2.jpg" alt="" style="width: 80px; height: 80px;">
                                <div class="text-start ps-4">
                                    <h5 class="mb-3">Marketing Manager</h5>
                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-purple me-2"></i>New York, USA</span>
                                    <span class="text-truncate me-3"><i class="far fa-clock text-purple me-2"></i>Full Time</span>
                                    <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-purple me-2"></i>$123 - $456</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                                    <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-purple"></i></a>
                                    <a class="btn btn-purple" href="">Apply Now</a>
                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-purple me-2"></i>Date Line: 01 Jan, 2045</small>
                            </div>
                        </div>
                    </div>
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-3.jpg" alt="" style="width: 80px; height: 80px;">
                                <div class="text-start ps-4">
                                    <h5 class="mb-3">Product Designer</h5>
                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-purple me-2"></i>New York, USA</span>
                                    <span class="text-truncate me-3"><i class="far fa-clock text-purple me-2"></i>Full Time</span>
                                    <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-purple me-2"></i>$123 - $456</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                                    <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-purple"></i></a>
                                    <a class="btn btn-purple" href="">Apply Now</a>
                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-purple me-2"></i>Date Line: 01 Jan, 2045</small>
                            </div>
                        </div>
                    </div>
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-4.jpg" alt="" style="width: 80px; height: 80px;">
                                <div class="text-start ps-4">
                                    <h5 class="mb-3">Creative Director</h5>
                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-purple me-2"></i>New York, USA</span>
                                    <span class="text-truncate me-3"><i class="far fa-clock text-purple me-2"></i>Full Time</span>
                                    <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-purple me-2"></i>$123 - $456</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                                    <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-purple"></i></a>
                                    <a class="btn btn-purple" href="">Apply Now</a>
                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-purple me-2"></i>Date Line: 01 Jan, 2045</small>
                            </div>
                        </div>
                    </div>
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-5.jpg" alt="" style="width: 80px; height: 80px;">
                                <div class="text-start ps-4">
                                    <h5 class="mb-3">Wordpress Developer</h5>
                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-purple me-2"></i>New York, USA</span>
                                    <span class="text-truncate me-3"><i class="far fa-clock text-purple me-2"></i>Full Time</span>
                                    <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-purple me-2"></i>$123 - $456</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                                    <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-purple"></i></a>
                                    <a class="btn btn-purple" href="">Apply Now</a>
                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-purple me-2"></i>Date Line: 01 Jan, 2045</small>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-purple py-3 px-5" href="">Browse More Jobs</a>
                </div>
                <div id="tab-2" class="tab-pane fade p-0">
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-1.jpg" alt="" style="width: 80px; height: 80px;">
                                <div class="text-start ps-4">
                                    <h5 class="mb-3">Software Engineer</h5>
                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-purple me-2"></i>New York, USA</span>
                                    <span class="text-truncate me-3"><i class="far fa-clock text-purple me-2"></i>Full Time</span>
                                    <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-purple me-2"></i>$123 - $456</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                                    <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-purple"></i></a>
                                    <a class="btn btn-purple" href="">Apply Now</a>
                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-purple me-2"></i>Date Line: 01 Jan, 2045</small>
                            </div>
                        </div>
                    </div>
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-2.jpg" alt="" style="width: 80px; height: 80px;">
                                <div class="text-start ps-4">
                                    <h5 class="mb-3">Marketing Manager</h5>
                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-purple me-2"></i>New York, USA</span>
                                    <span class="text-truncate me-3"><i class="far fa-clock text-purple me-2"></i>Full Time</span>
                                    <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-purple me-2"></i>$123 - $456</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                                    <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-purple"></i></a>
                                    <a class="btn btn-purple" href="">Apply Now</a>
                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-purple me-2"></i>Date Line: 01 Jan, 2045</small>
                            </div>
                        </div>
                    </div>
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-3.jpg" alt="" style="width: 80px; height: 80px;">
                                <div class="text-start ps-4">
                                    <h5 class="mb-3">Product Designer</h5>
                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-purple me-2"></i>New York, USA</span>
                                    <span class="text-truncate me-3"><i class="far fa-clock text-purple me-2"></i>Full Time</span>
                                    <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-purple me-2"></i>$123 - $456</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                                    <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-purple"></i></a>
                                    <a class="btn btn-purple" href="">Apply Now</a>
                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-purple me-2"></i>Date Line: 01 Jan, 2045</small>
                            </div>
                        </div>
                    </div>
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-4.jpg" alt="" style="width: 80px; height: 80px;">
                                <div class="text-start ps-4">
                                    <h5 class="mb-3">Creative Director</h5>
                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-purple me-2"></i>New York, USA</span>
                                    <span class="text-truncate me-3"><i class="far fa-clock text-purple me-2"></i>Full Time</span>
                                    <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-purple me-2"></i>$123 - $456</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                                    <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-purple"></i></a>
                                    <a class="btn btn-purple" href="">Apply Now</a>
                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-purple me-2"></i>Date Line: 01 Jan, 2045</small>
                            </div>
                        </div>
                    </div>
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-5.jpg" alt="" style="width: 80px; height: 80px;">
                                <div class="text-start ps-4">
                                    <h5 class="mb-3">Wordpress Developer</h5>
                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-purple me-2"></i>New York, USA</span>
                                    <span class="text-truncate me-3"><i class="far fa-clock text-purple me-2"></i>Full Time</span>
                                    <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-purple me-2"></i>$123 - $456</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                                    <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-purple"></i></a>
                                    <a class="btn btn-purple" href="">Apply Now</a>
                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-purple me-2"></i>Date Line: 01 Jan, 2045</small>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-purple py-3 px-5" href="">Browse More Jobs</a>
                </div>
                <div id="tab-3" class="tab-pane fade p-0 active show">
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-1.jpg" alt="" style="width: 80px; height: 80px;">
                                <div class="text-start ps-4">
                                    <h5 class="mb-3">Software Engineer</h5>
                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-purple me-2"></i>New York, USA</span>
                                    <span class="text-truncate me-3"><i class="far fa-clock text-purple me-2"></i>Full Time</span>
                                    <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-purple me-2"></i>$123 - $456</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                                    <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-purple"></i></a>
                                    <a class="btn btn-purple" href="">Apply Now</a>
                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-purple me-2"></i>Date Line: 01 Jan, 2045</small>
                            </div>
                        </div>
                    </div>
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-2.jpg" alt="" style="width: 80px; height: 80px;">
                                <div class="text-start ps-4">
                                    <h5 class="mb-3">Marketing Manager</h5>
                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-purple me-2"></i>New York, USA</span>
                                    <span class="text-truncate me-3"><i class="far fa-clock text-purple me-2"></i>Full Time</span>
                                    <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-purple me-2"></i>$123 - $456</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                                    <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-purple"></i></a>
                                    <a class="btn btn-purple" href="">Apply Now</a>
                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-purple me-2"></i>Date Line: 01 Jan, 2045</small>
                            </div>
                        </div>
                    </div>
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-3.jpg" alt="" style="width: 80px; height: 80px;">
                                <div class="text-start ps-4">
                                    <h5 class="mb-3">Product Designer</h5>
                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-purple me-2"></i>New York, USA</span>
                                    <span class="text-truncate me-3"><i class="far fa-clock text-purple me-2"></i>Full Time</span>
                                    <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-purple me-2"></i>$123 - $456</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                                    <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-purple"></i></a>
                                    <a class="btn btn-purple" href="">Apply Now</a>
                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-purple me-2"></i>Date Line: 01 Jan, 2045</small>
                            </div>
                        </div>
                    </div>
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-4.jpg" alt="" style="width: 80px; height: 80px;">
                                <div class="text-start ps-4">
                                    <h5 class="mb-3">Creative Director</h5>
                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-purple me-2"></i>New York, USA</span>
                                    <span class="text-truncate me-3"><i class="far fa-clock text-purple me-2"></i>Full Time</span>
                                    <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-purple me-2"></i>$123 - $456</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                                    <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-purple"></i></a>
                                    <a class="btn btn-purple" href="">Apply Now</a>
                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-purple me-2"></i>Date Line: 01 Jan, 2045</small>
                            </div>
                        </div>
                    </div>
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-5.jpg" alt="" style="width: 80px; height: 80px;">
                                <div class="text-start ps-4">
                                    <h5 class="mb-3">Wordpress Developer</h5>
                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-purple me-2"></i>New York, USA</span>
                                    <span class="text-truncate me-3"><i class="far fa-clock text-purple me-2"></i>Full Time</span>
                                    <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-purple me-2"></i>$123 - $456</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                                    <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-purple"></i></a>
                                    <a class="btn btn-purple" href="">Apply Now</a>
                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-purple me-2"></i>Date Line: 01 Jan, 2045</small>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-purple py-3 px-5" href="">Browse More Jobs</a>
                </div>
            </div>
        </div>
    </section>

@endsection
