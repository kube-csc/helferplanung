@if($key==date('d.m.Y' , strtotime($event->datumvon)))
    @php
        $freeOperationalplans = DB::table('timetabel_helper_lists')
           ->where('event_id' , $event->id )
           ->where('operational_location_id' , $OperationalLocation)
           ->orderBy('datum')
           ->orderBy('startZeit')
           ->get();
        $datummerk="";
    @endphp
    @foreach($freeOperationalplans as $freeOperationalplan)
        @php
            $datum=date('d.m.' , strtotime($freeOperationalplan->datum));
            $ait=strtotime($freeOperationalplan->startZeit);
            $dith=date('H' , strtotime($freeOperationalplan->laenge));
            $ditm=date('i' , strtotime($freeOperationalplan->laenge));
            $dit=$dith*60*60+$ditm*60;
            $eit=strtotime($freeOperationalplan->endZeit);
        @endphp
        @for($i = $ait; $i < $eit; $i=$i+$dit)
            @php
                $aih=date('H:i' , $i);
                $eih=date('H:i' , $i+$dit);
                $dih=date('H:i' , $dit);
                if($i+$dit > $eit){
                    $eih=date('H:i' , $eit);
                }
            @endphp
            @if($datummerk=="")
                <div>
            @else
              @if($datummerk<>$datum)
                </div>
                <br>
                <div>
              @endif
            @endif
              @php
                 $datummerk=$datum;
                 $OperationalPlans = DB::table('operational_bookings')
                           ->where('timetabel_helper_lists_id' , $freeOperationalplan->id)
                           ->where('startZeit' , $aih)
                           ->where('deleted_at' , Null);
                 $freePlan=$freeOperationalplan->anzahlHelfer-$OperationalPlans ->count();
              @endphp

              @if($freePlan>0)
                @if($noData==1)
                    <a class="btn btn-primary mb-lg-2" href="/Einsätzebuchen/direkt/{{ $freeOperationalplan->id }}/{{ $freeOperationalplan->datum }}/{{ $aih }}/{{ $eih }}" role="button">{{ $freePlan }} Helfer {{ $datum }} von {{ $aih }} bis {{ $eih }} Uhr</a>
                @else
                   <a class="btn btn-primary mb-lg-2" href="/Einsätzebuchen/{{ $freeOperationalplan->id }}/{{ $i }}" role="button">{{ $freePlan }} Helfer {{ $datum }} von {{ $aih }} bis {{ $eih }} Uhr</a>
               @endif
              @endif
        @endfor
    @endforeach
                  @if(isset($_COOKIE['log_remember']))
                    @php
                    $OperationalBookingBockeds=DB::table('operational_bookings')
                        ->where('email' , $_COOKIE['log_remember'])
                        ->where('operational_location_id', $freeOperationalplan->operational_location_id)
                        ->where('deleted_at' , Null)
                        ->orderBy('datum')
                        ->orderBy('startZeit')
                        ->get();
                    @endphp
                    @if($OperationalBookingBockeds->count()>0)
                            <p>Meine gebuchten Einsätze:</p>
                    @endif
                    @foreach($OperationalBookingBockeds as $OperationalBookingBocked)
                        @php
                            $datumBocked     = date('d.m.' , strtotime($OperationalBookingBocked->datum));
                            $startZeitBocked = date('H.i.' , strtotime($OperationalBookingBocked->startZeit));
                            $endZeitBocked   = date('H.i.' , strtotime($OperationalBookingBocked->endZeit));
                        @endphp
                        <a class="btn btn-primary mb-lg-2" href="/Einsatz/stornieren/{{$OperationalBookingBocked->id}}" role="button">{{ $datumBocked }} von {{ $startZeitBocked }} bis {{ $endZeitBocked }} Uhr</a>
                    @endforeach
                  @endif
                </div>
 @endif
