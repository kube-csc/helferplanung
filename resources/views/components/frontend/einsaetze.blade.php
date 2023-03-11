
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="/Startseite">Home</a></li>
          <li><a href="/Einsätze/{{ $event->id }}">{{ $event->ueberschrift }}</a></li>
        </ol>
        <h2>{{ $event->ueberschrift }}</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              @php /*
              <div class="entry-img">
                <img src="/assets/img/Avator.PNG" alt="" class="img-fluid">
              </div>
              */ @endphp
              <h2 class="entry-title">
                <a href="/Einsätze/{{ $event->id }}">{{ $event->ueberschrift }}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  @php /* <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="blog-single.html">John Doe</a></li> */
                    $datum=date('d.m.Y', strtotime($event->datumvon));
                  @endphp
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="/Einsätze/{{ $event->id }}"><time datetime="{{ $event->datumvon }}">{{ $datum }}</time></a></li>
                  @php /* <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="blog-single.html">14 Comments</a></li>*/ @endphp
                </ul>
              </div>

              <div class="entry-content">
                  <p>
                      {!! $event->beschreibung !!}
                  </p>
                @php /*
                <p>
                  Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta.
                  Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt.
                </p>

                <p>
                  Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.
                </p>

                <blockquote>
                  <i class="icofont-quote-left quote-left"></i>
                  <p>
                    Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.
                  </p>
                  <i class="las la-quote-right quote-right"></i>
                  <i class="icofont-quote-right quote-right"></i>
                </blockquote>

                <p>
                  Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat.
                </p>
                */ @endphp
                @php
                    $OperationalLocation="";
                @endphp
                @foreach( $timetabelHelperLists as $timetabelHelperList)
                  @if($timetabelHelperList->OperationalLocation->einsatzort<>$OperationalLocation)
                      @if ($OperationalLocation <> "")
                        </ul>
                      @endif
                    <name id="{{ $timetabelHelperList->OperationalLocation->einsatzort }}"></name>
                    <h3>{{ $timetabelHelperList->OperationalLocation->einsatzort }}</h3>
                    <p>
                        {!! $timetabelHelperList->OperationalLocation->beschreibung !!}
                    </p>
                      Arbeitseinsätze:
                      <ul>
                  @endif
                      @php
                          $startZeit=date('d.m.Y H:i', strtotime($timetabelHelperList->startZeit));
                          $endZeit=date('H:i', strtotime($timetabelHelperList->endZeit));
                          $laenge=date('H:i', strtotime($timetabelHelperList->laenge));
                      @endphp
                    <li>
                        {{$timetabelHelperList->anzahlHelfer}} Helfer in der {{ $startZeit }} Uhr von {{$endZeit}} Uhr für {{$laenge}} Stunden
                    </li>
                    @php /*
                    <img src="assets/img/blog-inside-post.jpg" class="img-fluid" alt="">
                    */ @endphp
                    @php
                      $OperationalLocation=$timetabelHelperList->OperationalLocation->einsatzort;
                    @endphp
                @endforeach
                     </ul>

              </div>
              @php /*
              <div class="entry-footer clearfix">
                <div class="float-left">
                  <i class="icofont-folder"></i>
                  <ul class="cats">
                    <li><a href="#">Business</a></li>
                  </ul>

                  <i class="icofont-tags"></i>
                  <ul class="tags">
                    <li><a href="#">Creative</a></li>
                    <li><a href="#">Tips</a></li>
                    <li><a href="#">Marketing</a></li>
                  </ul>
                </div>

                <div class="float-right share">
                  <a href="" title="Share on Twitter"><i class="icofont-twitter"></i></a>
                  <a href="" title="Share on Facebook"><i class="icofont-facebook"></i></a>
                  <a href="" title="Share on Instagram"><i class="icofont-instagram"></i></a>
                </div>

              </div>
              /* @endphp
            </article><!-- End blog entry -->

            @php /*
            <div class="blog-author clearfix">
              <img src="assets/img/blog-author.jpg" class="rounded-circle float-left" alt="">
              <h4>Jane Smith</h4>
              <div class="social-links">
                <a href="https://twitters.com/#"><i class="icofont-twitter"></i></a>
                <a href="https://facebook.com/#"><i class="icofont-facebook"></i></a>
                <a href="https://instagram.com/#"><i class="icofont-instagram"></i></a>
              </div>
              <p>
                Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde voluptas.
              </p>
            </div><!-- End blog author bio -->
            */ @endphp

            @php /*
            <div class="blog-comments">

              <h4 class="comments-count">8 Comments</h4>

              <div id="comment-1" class="comment clearfix">
                <img src="assets/img/comments-1.jpg" class="comment-img  float-left" alt="">
                <h5><a href="">Georgia Reader</a> <a href="#" class="reply"><i class="icofont-reply"></i> Reply</a></h5>
                <time datetime="2020-01-01">01 Jan, 2020</time>
                <p>
                  Et rerum totam nisi. Molestiae vel quam dolorum vel voluptatem et et. Est ad aut sapiente quis molestiae est qui cum soluta.
                  Vero aut rerum vel. Rerum quos laboriosam placeat ex qui. Sint qui facilis et.
                </p>

              </div><!-- End comment #1 -->

              <div id="comment-2" class="comment clearfix">
                <img src="assets/img/comments-2.jpg" class="comment-img  float-left" alt="">
                <h5><a href="">Aron Alvarado</a> <a href="#" class="reply"><i class="icofont-reply"></i> Reply</a></h5>
                <time datetime="2020-01-01">01 Jan, 2020</time>
                <p>
                  Ipsam tempora sequi voluptatem quis sapiente non. Autem itaque eveniet saepe. Officiis illo ut beatae.
                </p>

                <div id="comment-reply-1" class="comment comment-reply clearfix">
                  <img src="assets/img/comments-3.jpg" class="comment-img  float-left" alt="">
                  <h5><a href="">Lynda Small</a> <a href="#" class="reply"><i class="icofont-reply"></i> Reply</a></h5>
                  <time datetime="2020-01-01">01 Jan, 2020</time>
                  <p>
                    Enim ipsa eum fugiat fuga repellat. Commodi quo quo dicta. Est ullam aspernatur ut vitae quia mollitia id non. Qui ad quas nostrum rerum sed necessitatibus aut est. Eum officiis sed repellat maxime vero nisi natus. Amet nesciunt nesciunt qui illum omnis est et dolor recusandae.

                    Recusandae sit ad aut impedit et. Ipsa labore dolor impedit et natus in porro aut. Magnam qui cum. Illo similique occaecati nihil modi eligendi. Pariatur distinctio labore omnis incidunt et illum. Expedita et dignissimos distinctio laborum minima fugiat.

                    Libero corporis qui. Nam illo odio beatae enim ducimus. Harum reiciendis error dolorum non autem quisquam vero rerum neque.
                  </p>

                  <div id="comment-reply-2" class="comment comment-reply clearfix">
                    <img src="assets/img/comments-4.jpg" class="comment-img  float-left" alt="">
                    <h5><a href="">Sianna Ramsay</a> <a href="#" class="reply"><i class="icofont-reply"></i> Reply</a></h5>
                    <time datetime="2020-01-01">01 Jan, 2020</time>
                    <p>
                      Et dignissimos impedit nulla et quo distinctio ex nemo. Omnis quia dolores cupiditate et. Ut unde qui eligendi sapiente omnis ullam. Placeat porro est commodi est officiis voluptas repellat quisquam possimus. Perferendis id consectetur necessitatibus.
                    </p>

                  </div><!-- End comment reply #2-->

                </div><!-- End comment reply #1-->

              </div><!-- End comment #2-->

              <div id="comment-3" class="comment clearfix">
                <img src="assets/img/comments-5.jpg" class="comment-img  float-left" alt="">
                <h5><a href="">Nolan Davidson</a> <a href="#" class="reply"><i class="icofont-reply"></i> Reply</a></h5>
                <time datetime="2020-01-01">01 Jan, 2020</time>
                <p>
                  Distinctio nesciunt rerum reprehenderit sed. Iste omnis eius repellendus quia nihil ut accusantium tempore. Nesciunt expedita id dolor exercitationem aspernatur aut quam ut. Voluptatem est accusamus iste at.
                  Non aut et et esse qui sit modi neque. Exercitationem et eos aspernatur. Ea est consequuntur officia beatae ea aut eos soluta. Non qui dolorum voluptatibus et optio veniam. Quam officia sit nostrum dolorem.
                </p>

              </div><!-- End comment #3 -->

              <div id="comment-4" class="comment clearfix">
                <img src="assets/img/comments-6.jpg" class="comment-img  float-left" alt="">
                <h5><a href="">Kay Duggan</a> <a href="#" class="reply"><i class="icofont-reply"></i> Reply</a></h5>
                <time datetime="2020-01-01">01 Jan, 2020</time>
                <p>
                  Dolorem atque aut. Omnis doloremque blanditiis quia eum porro quis ut velit tempore. Cumque sed quia ut maxime. Est ad aut cum. Ut exercitationem non in fugiat.
                </p>

              </div><!-- End comment #4 -->

              <div class="reply-form">
                <h4>Leave a Reply</h4>
                <p>Your email address will not be published. Required fields are marked * </p>
                <form action="">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input name="name" type="text" class="form-control" placeholder="Your Name*">
                    </div>
                    <div class="col-md-6 form-group">
                      <input name="email" type="text" class="form-control" placeholder="Your Email*">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <input name="website" type="text" class="form-control" placeholder="Your Website">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Post Comment</button>

                </form>

              </div>

            </div><!-- End blog comments -->
            */ @endphp

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Einsatzorte</h3>
              <div class="sidebar-item categories">
                <ul>
                    @foreach( $timetabelHelperLists as $timetabelHelperList)
                       <li><a href="#{{ $timetabelHelperList->OperationalLocation->einsatzort }}">{{ $timetabelHelperList->OperationalLocation->einsatzort }}<span></span></a></li>
                    @endforeach
                </ul>

              </div><!-- End sidebar categories-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

