<section class="skill-section" data-aos="fade-up" id="skills">
    <div class="container">
        <h1 class="section-title">Skills</h1>
        <div class="skill-container">
            @foreach ($skills as $skill)
                <div class="skill">
                    <div class="title">
                        <div class="name">
                            <i class="fa-solid fa-code"></i>
                            <span>{{$skill->name}}</span>
                        </div>
                        <span class="percent">{{$skill->percent}}%</span>
                    </div>
                    <div style="--item-value: {{$skill->percent}}%" class="progress-bar"></div>
                </div>
            @endforeach
        </div>
    </div>
</section>
