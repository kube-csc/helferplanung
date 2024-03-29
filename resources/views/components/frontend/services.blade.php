@php
  $delay=100;
@endphp
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
                @php
                    $ausgabetext=$event->beschreibung;
                    $textlaenge=300;
                    $abgeschnitten=0;
                    textmax($ausgabetext,$textlaenge,$abgeschnitten);
                    $datum=date('d.m.Y' , strtotime($event->datumvon));
                @endphp
              @if($loop->first)
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up">
                        <h4 class="title">
                            @if(isset($_COOKIE['log_remember']))
                                <a href="/Einsatz/eintragen/{{ $event->id }}/{{ $datum }}">{{ $event->ueberschrift }}</a>
                            @else
                                <a href="/Einsatz/eintragen/{{ $event->id }}/0">{{ $event->ueberschrift }}</a>
                            @endif
                        </h4>
                        <p class="description">{!! $ausgabetext !!}</p>
                    </div>
                </div>
              @else
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                        <h4 class="title"><a href="/Einsatz/eintagen/{{ $event->id }}/0">{{ $event->ueberschrift }}</a></h4>
                        <p class="description">{!! $ausgabetext !!}</p>
                    </div>
                </div>
              @php
                  $delay=$delay+100;
              @endphp
              @endif
          @endforeach
        </div>

    </div>
</section><!-- End Services Section -->

@php
    function textmax(&$beschreibung,$sollang,&$abgeschnitten)
    {
     $abgeschnitten=0;
     $laenge=strlen($beschreibung);
     if ($laenge>$sollang)
      {
        $beschreibung=substr($beschreibung,0,$sollang);
        $beschreibung=$beschreibung."...";
        $abgeschnitten=1;
      }
    }
@endphp
