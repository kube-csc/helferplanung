<name id="about">
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Einsatzplanung</h2>
                <ol>
                    <li><a href="/">Home</a></li>
                    <li>Einsätze buchen</li>
                </ol>
            </div>
        </div>
    </section><!-- End Breadcrumbs Section -->

    <?php // ToDo: Beschreibungen in Beschreibungen anpassen ?>
        <!-- ======= Anfahrt Section ======= -->
    <?php  /*<section class="inner-page">  */?>
    <section id="about" class="about">
        <div class="container">
        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Einsätze buchen</h2>
          <p class="text-justify">
             @php
                 //ToDo: Beschreibung bearbeiten
             @endphp
             Beschreibung eingeben wie man Einsätze bucht
          </p>
        </div>
            <div class="row" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-6">
                    <div class="info-box mb-4">
                        <b></b>
                        <p>
                        <form class="border-t-fuchsia-900" autocomplete="off" action="/Einsätzebuchen/speichern" method="post">
                            @csrf
                            <input type="hidden" id="timetabel_helper_lists_id" name="timetabel_helper_lists_id" value="{{ $operatingPlan->id }}">
                            <input type="hidden" id="datumvon" name="datumvon" value="{{ $operatingPlan->Event->datumvon }}">
                            <input type="hidden" id="datum" name="datum" value="{{ $operatingPlan->datum }}">
                            <input type="hidden" id="startZeit" name="startZeit" value="{{ $startzeit }}">
                            <input type="hidden" id="endZeit" name="endZeit" value="{{ $endzeit }}">
                            <input type="hidden" id="operational_location_id" name="operational_location_id" value="{{ $operational_location_id }}">
                            <input type="hidden" id="event_id" name="event_id" value="{{ $operatingPlan->event_id }}">
                            <input type="hidden" id="user_id" name="user_id" value="">
                            <p>
                                Einsatzort: {{ $operatingPlan->OperationalLocation->einsatzort }} von {{ $operationalDatum }} {{ $startzeit }} Uhr bis {{ $endzeit }} Uhr
                            </p>

                            <div class="form-label-group">
                                <label for="Vorname">Vorname</label>
                                <input type="text" id="Vorname" name="Vorname" class="form-control" placeholder="Vorname" value="{{ old('Vorname') }}">
                                @error('Vorname')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-label-group">
                                <label for="Nachname">Nachname</label>
                                <input type="text" id="Nachname" name="Nachname" class="form-control" placeholder="Nachname" value="{{ old('Nachname') }}">
                                @error('Nachname')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-label-group">
                                <label for="email">Email Adresse</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email address" value="{{ old('email') }}" required autofocus>
                            </div>
                        @if(!isset($_COOKIE['cookie_consent']))
                            <br>
                            <div class="checkbox mb-3">
                                <label>
                                    <input type="checkbox" name="inputAngemeldet" value="remember-me"> Angemeldet bleiben
                                </label>
                            </div>
                        @endif
                            @php /*
                            <div class="form-label-group">
                                <label for="inputPassword">Password</label>
                                <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
                            </div>

                            <div class="checkbox mb-3">
                                <label>
                                    <input type="checkbox" name="inputAngemeldet" value="remember-me"> Angemeldet bleiben
                                </label>
                            </div>
                            */  @endphp
                            <br>
                            <div>
                                <button type="submit" class="btn btn-primary">Einsatz buchen</button>
                            </div>

                        </form>
                        <br>
                        <button type="button" class="btn btn-primary"><a href="/Einsätze/{{ $operatingPlan->event_id }}/{{ $eventDatum }}">Zurück</a></button>
                        </p>
                    </div>
                </div>
            </div>

            <div class="section-title" data-aos="fade-up" data-aos-delay="300">
              <p class="text-justify">
                  @php
                  /*
                  ToDo: Was habe ich gebucht
                  Gebuchte Termine<br>
                  kommt später
                  */
                  @endphp
              </p>
            </div>
        </div>
    </section><!-- End Breadcrumbs Section -->
