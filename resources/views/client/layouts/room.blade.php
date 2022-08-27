<section class="section">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-7">
                <h2 class="heading" data-aos="fade-up">Rooms &amp; Suites</h2>
                <p data-aos="fade-up" data-aos-delay="100">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            </div>
        </div>
        <div class="row">
        @foreach ($loaiphongs as $loaiphong)
            <div class="col-md-6 col-lg-4" data-aos="fade-up">
                <a href="#" class="room">
                    <figure class="img-wrap">
                        <img src="/client/images/{{ $loaiphong->hinh }}" alt="Free website template" class="img-fluid mb-3">
                    </figure>
                    <div class="p-3 text-center room-info">
                        <h2>{{ $loaiphong->ten }}</h2>
                        <span class="text-uppercase letter-spacing-1">{{ $loaiphong->gia }}$/PER NIGHT</span>
                    </div>
                </a>
            </div>
        @endforeach
        </div>
    </div>
</section>