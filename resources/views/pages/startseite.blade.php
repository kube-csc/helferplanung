@section('title' ,'Startseite')

<x-frontend.layout>

<x-frontend.hero></x-frontend.hero>

<main id="main">

<?php /*
<x-frontend.services></x-frontend.services>
*/ ?>

@include('components.frontend.services');

@include('components.frontend.counts');

<?php /*
<x-frontend.cta></x-frontend.cta>

<x-frontend.portfolio></x-frontend.portfolio>

<x-frontend.testimonials></x-frontend.testimonials>

<x-frontend.team></x-frontend.team>

<x-frontend.contact></x-frontend.contact>
*/ ?>
</main><!-- End #main -->

</x-frontend.layout>
