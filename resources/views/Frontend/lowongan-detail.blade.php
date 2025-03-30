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
                            <h3 class="mb-3">Marketing Manager</h3>
                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-purple me-2"></i>New York, USA</span>
                            <span class="text-truncate me-3"><i class="far fa-clock text-purple me-2"></i>Full Time</span>
                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-purple me-2"></i>$123 - $456</span>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h4 class="mb-3">Job description</h4>
                        <p>Dolor justo tempor duo ipsum accusam rebum gubergren erat. Elitr stet dolor vero clita labore gubergren. Kasd sed ipsum elitr clita rebum ut sea diam tempor. Sadipscing nonumy vero labore invidunt dolor sed, eirmod dolore amet aliquyam consetetur lorem, amet elitr clita et sed consetetur dolore accusam. Vero kasd nonumy justo rebum stet. Ipsum amet sed lorem sea magna. Rebum vero dolores dolores elitr vero dolores magna, stet sea sadipscing stet et. Est voluptua et sanctus at sanctus erat vero sed sed, amet duo no diam clita rebum duo, accusam tempor takimata clita stet nonumy rebum est invidunt stet, dolor.</p>
                        <h4 class="mb-3">Responsibility</h4>
                        <p>Magna et elitr diam sed lorem. Diam diam stet erat no est est. Accusam sed lorem stet voluptua sit sit at stet consetetur, takimata at diam kasd gubergren elitr dolor</p>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-angle-right text-purple me-2"></i>Dolor justo tempor duo ipsum accusam</li>
                            <li><i class="fa fa-angle-right text-purple me-2"></i>Elitr stet dolor vero clita labore gubergren</li>
                            <li><i class="fa fa-angle-right text-purple me-2"></i>Rebum vero dolores dolores elitr</li>
                            <li><i class="fa fa-angle-right text-purple me-2"></i>Est voluptua et sanctus at sanctus erat</li>
                            <li><i class="fa fa-angle-right text-purple me-2"></i>Diam diam stet erat no est est</li>
                        </ul>
                        <h4 class="mb-3">Qualifications</h4>
                        <p>Magna et elitr diam sed lorem. Diam diam stet erat no est est. Accusam sed lorem stet voluptua sit sit at stet consetetur, takimata at diam kasd gubergren elitr dolor</p>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-angle-right text-purple me-2"></i>Dolor justo tempor duo ipsum accusam</li>
                            <li><i class="fa fa-angle-right text-purple me-2"></i>Elitr stet dolor vero clita labore gubergren</li>
                            <li><i class="fa fa-angle-right text-purple me-2"></i>Rebum vero dolores dolores elitr</li>
                            <li><i class="fa fa-angle-right text-purple me-2"></i>Est voluptua et sanctus at sanctus erat</li>
                            <li><i class="fa fa-angle-right text-purple me-2"></i>Diam diam stet erat no est est</li>
                        </ul>
                    </div>

                    <div class="">
                        <h4 class="mb-4">Apply For The Job</h4>
                        <form>
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" placeholder="Your Name" fdprocessedid="1ygddk">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control" placeholder="Your Email" fdprocessedid="dvslkh">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" placeholder="Portfolio Website" fdprocessedid="b2car5">
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
                    <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: slideInUp;">
                        <h4 class="mb-4">Job Summery</h4>
                        <p><i class="fa fa-angle-right text-purple me-2"></i>Published On: 01 Jan, 2045</p>
                        <p><i class="fa fa-angle-right text-purple me-2"></i>Vacancy: 123 Position</p>
                        <p><i class="fa fa-angle-right text-purple me-2"></i>Job Nature: Full Time</p>
                        <p><i class="fa fa-angle-right text-purple me-2"></i>Salary: $123 - $456</p>
                        <p><i class="fa fa-angle-right text-purple me-2"></i>Location: New York, USA</p>
                        <p class="m-0"><i class="fa fa-angle-right text-purple me-2"></i>Date Line: 01 Jan, 2045</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
