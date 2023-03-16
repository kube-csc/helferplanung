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
              <a class="btn btn-primary mb-lg-2" href="/Einsätzebuchen/{{ $timetabelHelperList->id }}/{{ $i }}" role="button">{{ $freeOperationalplan->anzahlHelfer }} Helfer {{ $datum }} von {{ $aih }} bis {{ $eih }} Uhr</a>
              @php
                  $datummerk=$datum;
              @endphp
       @endfor
    @endforeach
                </div>
 @endif
