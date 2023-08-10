<section class="experience-section" data-aos="fade-up" id="experience">
    <div class="container">
        <h1 class="section-title">Experience</h1>
        <div class="row">
            @foreach ($experiences as $experience)
            <div class="col-12 col-md-8" data-aos="zoom-in-up">
                <div class="content">
                    <div class="title">
                        <div class="job-name">{{$experience->position}}</div>
                        <div class="date"><i class="fa-solid fa-calendar-days"></i>{{$experience->start_date}} - {{$experience->end_date}}</div>
                    </div>
                    <div class="company">
                        <div class="name">{{$experience->company}}</div>
                        <div class="location"><i class="fa-solid fa-location-dot"></i> {{$experience->company_location}}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>