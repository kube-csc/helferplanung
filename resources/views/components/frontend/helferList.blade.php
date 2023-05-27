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
                  Es ist möglich, gebuchte Einsätze zu stornieren. Dazu müssen Sie nur auf die Schaltfläche Ihrer Einsätze klicken.
                </p>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-6">
                    <div class="info-box mb-4">
                        <b></b>
                        <p>
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
                                    <h1>{{ $OperationalBooking->event->ueberschrift }}</h1>
                                @endif
                                @if($datumMerk<>$datum)
                                    <h2>{{ $datum }}</h2>
                                @endif
                                @if($einsatzortMerk<>$OperationalBooking->operational_location_id)
                                     <h3>{{ $OperationalBooking->OperationalLocation->einsatzort }}</h3>
                                @endif
                                @if($startZeitMerk<>$startZeit)
                                     <h4>bis {{ $startZeit }} von {{ $endZeit }}</h4>
                                @endif
                                @if($loginEmail==$OperationalBooking->email)
                                    <a class="btn btn-outline-primary mb-lg-2" href="/Einsatz/loeschen/{{ $OperationalBooking->id }}" role="button">{{ $OperationalBooking->Vorname }} {{ $OperationalBooking->Nachname }}</a>
                                @else
                                    {{ $OperationalBooking->Vorname }} {{ $OperationalBooking->Nachname }}
                                @endif
                            @php
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
