<name id="about">
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Helferliste</h2>
                <ol>
                    <li><a href="/">Home</a></li>
                    <li>Helferliste</li>
                </ol>
            </div>
        </div>
    </section><!-- End Breadcrumbs Section -->

    <?php // ToDo: Beschreibungen in anpassen ?>
        <!-- ======= Anfahrt Section ======= -->
    <?php  /*<section class="inner-page">  */?>
    <section id="about" class="about">
        <div class="container">
            <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                <h2>Helferliste</h2>
                <p class="text-justify">
                  Es ist möglich, gebuchte Einsätze zu stornieren. Dazu einfach auf die Schaltfläche der gebuchten Einsätze klicken.
                </p>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-6">
                    <div class="info-box mb-4">
                            @php
                                $eventIdMerk=0;
                                $einsatzortMerk=0;
                                $datumMerk="";
                                $startZeitMerk="";
                            @endphp
                            @foreach($OperationalBookings as $OperationalBooking)
                                @php
                                    $datum=date('d.m.Y', strtotime($OperationalBooking->datum));
                                    $startZeit=date('H:i', strtotime($OperationalBooking->startZeit));
                                    $endZeit=date('H:i', strtotime($OperationalBooking->endZeit));
                                @endphp
                                @if($eventIdMerk<>$OperationalBooking->event_id)
                                    @if($eventIdMerk<>0)
                        </p>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-6">
                    <div class="info-box mb-4">
                        <hr class="mt-3 mb-3"/>
                                    @endif
                        <h1>{{ $OperationalBooking->event->ueberschrift }}</h1>
                        <p>
                                    @php
                                        $datumMerk="";
                                    @endphp
                                @endif
                                @if($datumMerk<>$datum)
                                    @if($datumMerk<>"")
                                      <hr class="mt-3 mb-3"/>
                                    @endif
                                    <h2>{{ $datum }}</h2>
                                    @php
                                      $einsatzortMerk="";
                                    @endphp
                                @endif
                                @if($einsatzortMerk<>$OperationalBooking->operational_location_id)
                                    @if($einsatzortMerk<>"")
                                        <hr class="mt-3 mb-3"/>
                                    @endif
                                    <h3>{{ $OperationalBooking->OperationalLocation->einsatzort }}</h3>
                                    @php
                                      $startZeitMerk="";
                                    @endphp
                                @endif
                                @if($startZeitMerk<>$startZeit)
                                    @if($startZeitMerk<>"" && $startZeitMerk=="")
                                        <hr class="mt-3 mb-3"/>
                                    @endif
                                    <h4>bis {{ $startZeit }} Uhr von {{ $endZeit }} Uhr</h4>
                                    @php
                                      $namenstrenner="";
                                    @endphp
                                @endif
                                @if($loginEmail==$OperationalBooking->email)
                                   {{ $namenstrenner }}<a class="btn btn-outline-primary mb-lg-2" href="/Einsatz/loeschen/{{ $OperationalBooking->id }}" role="button" onclick="return confirm('Wirklich den Einsatz löschen?')">{{ $OperationalBooking->Vorname }} {{ $OperationalBooking->Nachname }}</a>
                                @else
                                   {{ $namenstrenner }}{{ $OperationalBooking->Vorname }} {{ $OperationalBooking->Nachname }}
                                @endif
                                @php
                                    $namenstrenner=", ";
                                    $eventIdMerk=$OperationalBooking->event_id;
                                    $einsatzortMerk=$OperationalBooking->operational_location_id;
                                    $datumMerk=$datum;
                                    $startZeitMerk=$startZeit;
                                @endphp

                            @endforeach
                        </p>
                    </div>
                </div>
            </div>

            <div class="section-title" data-aos="fade-up" data-aos-delay="300">
                <p class="text-justify">

                </p>
            </div>
        </div>
    </section><!-- End Breadcrumbs Section -->
