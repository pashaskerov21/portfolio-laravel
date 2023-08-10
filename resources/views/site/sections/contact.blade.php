<section class="contact-section" data-aos="fade-up" id="contact">
    <div class="container">
        <h1 class="section-title">Contact</h1>
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="contact-data">
                    <div class="item">
                        <i class="fa-solid fa-phone"></i>
                        <div class="data">
                            <a target="_blank" href="https://wa.me/{{$settings->phone}}">{{$settings->phone}}</a>
                        </div>
                    </div>
                    <div class="item">
                        <i class="fa-solid fa-envelope"></i>
                        <div class="data">
                            <a target="_blank"
                                href="mailto:{{$settings->mail}}">{{$settings->mail}}</a>
                        </div>
                    </div>
                    <div class="item">
                        <i class="fa-brands fa-github"></i>
                        <div class="data">
                            <a target="_blank" href="{{$settings->github}}">pashaskerov21</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <form action="{{route('index.send-msg')}}" class="contact-form needs-validation" autocomplete="off" method="POST" novalidate>
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="user-email" placeholder="email" name="email" required>
                        <label for="user-email">Email*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="user-name" placeholder="title" name="title" required>
                        <label for="user-name">Title*</label>
                    </div>
                    <div class="form-floating mb-4">
                        <textarea class="form-control" placeholder="Message" id="user-message" name="text" required></textarea>
                        <label for="user-message">Message*</label>
                    </div>
                    <button>Send <i class="fa-solid fa-arrow-right"></i></button>
                </form>
            </div>
        </div>
    </div>
</section>