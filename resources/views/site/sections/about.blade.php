<section class="about-section" data-aos="fade-up" id="about">
    <div class="container">
        <h1 class="section-title">About me</h1>
        <div class="row overflow-hidden">
            <div class="col-12 col-lg-6 overflow-hidden" data-aos="fade-right">
                <div class="image" style="background-image: url('{{asset('uploads/about/images/'.$about->image)}}')"></div>
            </div>
            <div class="col-12 col-lg-6 overflow-hidden" data-aos="fade-left">
                <div class="content">
                    <div class="text">
                        <p>{{$about->text}}</p>
                    </div>
                    <div class="bottom">
                        <a class="download-button" download href="{{asset('uploads/about/files/'.$about->cv)}}">Download CV <i
                                class="fa-solid fa-file-arrow-down"></i></a>
                        <div class="sosial-icons">
                            <a target="_blank" href="mailto:{{$settings->mail}}"><i class="fa-solid fa-envelope"></i></a>
                            <a target="_blank" href="https://wa.me/{{$settings->phone}}"><i class="fa-brands fa-whatsapp"></i></a>
                            <a target="_blank" href="{{$settings->github}}"><i class="fa-brands fa-github"></i></a>
                            <a target="_blank" href="{{$settings->linkedin}}"><i class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>