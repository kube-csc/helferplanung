<name id="about">
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Login Helferliste</h2>
                <ol>
                    <li><a href="/">Home</a></li>
                    <li>Login Helferliste</li>
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
                <h2>Login Helferliste</h2>
                <p class="text-justify">
                    @php
                        //ToDo: Beschreibung bearbeiten
                    @endphp
                    @if (session()->has('success'))
                     {!! session('success') !!}
                    @endif
                </p>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-6">
                    <div class="info-box mb-4">
                        <b></b>
                        <p>
                        <form class="border-t-fuchsia-900" autocomplete="off" action="/Helferliste/Login" method="post">
                            @csrf
                            <div class="form-label-group">
                                <label for="loginEmail">Email Adresse</label>
                                <input type="loginEmail" id="loginEmail" name="loginEmail" class="form-control" placeholder="Email" value="{{ old('loginEmail') }}" required autofocus>
                            </div>
                          @if(!isset($_COOKIE['cookie_consent']))
                            <br>
                            <div class="checkbox mb-3">
                                <label>
                                    <input type="checkbox" name="inputAngemeldet" value="remember-me"> Angemeldet bleiben
                                </label>
                            </div>
                          @endif
                            <br>
                            <div>
                                <button type="submit" class="btn btn-primary">Einsatz buchen</button>
                            </div>
                        </form>
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
