<section class="education-section" data-aos="fade-up" id="education">
    <div class="container">
        <h1 class="section-title">Education</h1>
        <div class="row">
            @foreach ($educations as $education)
            <div class="col-12 col-md-9" data-aos="zoom-in-up">
                <div class="content">
                    <div class="uni-row">
                        <div class="name">
                            <i class="fa-solid fa-building-columns"></i>{{$education->univercity}}
                        </div>
                    </div>
                    <div class="label">
                        <span>Faculty:</span>
                        <span class="title">{{$education->faculty}}</span>
                    </div>
                    <div class="label">
                        <span>Field of Study:</span>
                        <span class="title">{{$education->field}}</span>
                    </div>
                    <div class="bottom">
                        <div class="status-badge">{{$education->degree}}</div>
                        <div class="date">{{$education->start_date}} - {{$education->end_date}}</div>
                    </div>
                </div>
            </div>    
            @endforeach
        </div>
    </div>
</section>