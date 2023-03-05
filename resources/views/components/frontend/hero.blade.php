<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container" data-aos="fade-up">
        @php
            $Verein = str_replace('_', ' ', env('VEREIN_NAME'));
            $SLogen = str_replace('_', ' ', env('VEREIN_SLOGEN'));
        @endphp
        <h1>{{ $Verein }}</h1>
        <h2>{{ $SLogen }}</h2>
        <?php // ToDo:     <a href="#about" class="btn-get-started scrollto"><i class="bx bx-chevrons-down"></i></a> ?>
        <a href="#services" class="btn-get-started scrollto"><i class="bx bx-chevrons-down"></i></a>
    </div>
</section><!-- End Hero -->
