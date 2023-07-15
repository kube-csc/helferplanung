<h1>Helferliste</h1>
<p>
Helferliste ist eine APP, die eine Liste von Personen verwaltet, die bereit sind, bei einem Event, einer Veranstaltung oder einem Projekt zu helfen. 
Die Liste enthält die Namen und E-Mail-Adressen der Helfer. Die Helferliste wird von der Person oder Organisation erstellt, die für die Organisation der Veranstaltung verantwortlich ist. Die Liste kann verwendet werden, um 
die Helfer zu koordinieren und sicherzustellen, dass alle Aufgaben abgedeckt sind.
</p>
<a href="https://helfer.kel-datteln.de">Beispiel eines Frontend</a>

<h2>Installierte Programme / Templets</h2>
<ul>
  <li><a href="https://jetstream.laravel.com/2.x/introduction.html" target="_blank">Laravel 9.*</a> mit jetstream 3.* , <a href="https://jetstream.laravel.com/3.x/stacks/livewire.html" target="_blank">livewire 3.* teams und tailwindcss</a> 
  <li><a href="https://boxicons.com/">boxicons</a> (Frontend)</li>
  <li><a href="https://tailwindcss.com/">Tailwindcss</a> (Backend)</li>
  <li><a href="https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/">BootstrapMade.com </a></li>
  <li><a href="https://filamentphp.com">Filament 2.x</a></li>  
<li>.htaccess für ionos.de (1und1.de) Server</li>
</ul>

<h2>Benötigte Lizenzen</h2>
Es wird eine Lizenz für
<a href="https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/">Squadfree von bootstrapmade</a>
benötigt.

<h2>Frontend</h2>
<ul>
    <li>Leanding Page mit Events für Helferlisten
         <ul>
          <li>Einsatzplan</li>
          <li>Anmelden bzw. Abmelden</li>
          <li>Helferliste</li>
         </ul>
    </li>
    <li>Footer
    <ul>
        <li>Dokumente aus dem Dokumentenmanagement werden angezeigt</li>
        <li>Impresssum</li>
        <li>Datenschutzerklärung</li>
    </ul>
  </li>
</ul>

<h2>Backend</h2>
<h3>Vereinsverwaltung</h3>
<strong>Demodaten</strong>
<p>
  Email: info@info.de<br>
  Password: password
</p>

<h2>Installation</h2>
<ul>
   <li>git clone https://github.com/kube-csc/helferplanung.git</li>
   <li>cd vereinsverwaltung</li>
   <li>.env Datei ausfüllen (Es werden auch Informationen über den Verein abgefragt.)
  <ul>
    <li>mit Demodaten: .env Daten zur eigener Datenbank vom Projekt</li>
    <li>ohne Demodaten: .env Daten zur Datenbank vom Projekt https://github.com/kube-csc/vereinsverwaltung.git</li>
  </ul>

   </li>
   <li>curl -sS https://getcomposer.org/installer</li>
   <li>php composer.phar</li>
   <li>php composer.phar install</li>
   <li>in Ordner "public sind die folgenden Dateien anzulegen:
   <ul>
     <li>apple-touch-icon.png</li>
     <li>favicon.ico</li>
   </ul>
   <li>mit Demodaten: php artisan migrate --seed<br>(Datenbank wird mit Demodaten geladen)</li>
</ul>

<h2>Update</h2>
<ul>
   <li>git pull origin main</li>
   <li>mit Demodaten: php artisan migrate:fresh --seed (solange noch keine einige Daten in die Datenbank eingegeben worden sind / Alle Daten werden gelöscht)</li>
   <li>mit Demodaten: php artisan migrate (Wenn schon eigene Daten in der Datenbank vorhanden sind)</li>
</ul>

<h2>Zugehörige Projekte</h2>
<h3>Präsentation der Regatta</h3>
<p>
    Für die live Präsentation der Regatta kann folgende Software verwendet werden.<br>
    Die Version V00.11.XX <a href="https://github.com/kube-csc/regattaView.git" target="_blank">https://github.com/kube-csc/regattaView.git</a> ist kompatibel mit der Version V00.03.XX <a href="https://github.com/kube-csc/vereinsverwaltung.git" target="_blank">https://github.com/kube-csc/vereinsverwaltung.git</a>.
</p>
<h3>Helferlisten</h3>
<p>
Eine Helferliste ist eine Liste von Personen, die bereit sind, bei einer bestimmten Veranstaltung oder einem bestimmten Projekt zu helfen. Die Liste enthält die Namen und die e-Emil der Helfer. Die Helferliste wird von der Person oder Organisation erstellt, die für die Organisation der Veranstaltung verantwortlich ist.
Die Liste kann verwendet werden, um die Helfer zu koordinieren und sicherzustellen, dass alle Aufgaben abgedeckt sind.<br>
Die Version V00.01.XX <a href="https://github.com/kube-csc/helferplanung.git" target="_blank">https://github.com/kube-csc/helferplanung.git</a> ist kompatibel mit der Version V00.04.XX <a href="https://github.com/kube-csc/helferplanung.git" target="_blank">https://github.com/kube-csc/helferplanung.git</a>.
</p>

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
