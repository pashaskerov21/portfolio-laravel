<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 col-xxl-3">
                <div class="logo white">
                    <span>{{ $settings->logo_text }}</span>
                </div>
            </div>
            <div class="col-12 col-xxl-7">
                <div class="footer-links">
                    @foreach ($menuLinks as $link)
                        <a href="#{{$link->name}}"><span>{{ $link->name }}</span></a>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-xxl-2">
                <div class="sosial-icons">
                    <a target="_blank" href="mailto:{{$settings->mail}}"><i class="fa-solid fa-envelope"></i></a>
                    <a target="_blank" href="https://wa.me/{{$settings->phone}}"><i class="fa-brands fa-whatsapp"></i></a>
                    <a target="_blank" href="{{$settings->github}}"><i class="fa-brands fa-github"></i></a>
                    <a target="_blank" href="{{$settings->linkedin}}"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>