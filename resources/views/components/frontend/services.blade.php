<!-- ======= Services Section ======= -->
<section id="services" class="services">
    <div class="container">

        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
            <h2>Events</h2>
            <p>Wir suchen begeisterte Mitglieder, die unserem Team beitreten und dazu beitragen, dass unsere Event ein Erfolg wird.
                Dies ist eine großartige Gelegenheit, sich im Team zu engagieren und wertvolle Erfahrungen bei der Organisation von Veranstaltungen zu sammeln.</p>
        </div>
        <div class="row">
          @foreach ( $events as $event )
              @if($loop->first)
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up">
                        <h4 class="title"><a href="">{{ $event->ueberschrift }}</a></h4>
                        <p class="description">{{ $event->beschreibung }}</p>
                    </div>
                </div>
              @else
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <h4 class="title"><a href="">{{ $event->ueberschrift }}</a></h4>
                        <p class="description">{{ $event->beschreibung }}</p>
                    </div>
                </div>
              @endif
          @endforeach
        </div>

    </div>
</section><!-- End Services Section -->
