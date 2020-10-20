


{{-- @foreach(App\Merek::where('deleted_at',null)->get() as $menuMerek)
  @if( $menuMerek != "") --}}
  <li><a class="header-list__link" href="{{ url('searchFilter')}}" tabindex="-1">Semua Merek</a></li>
  @php
  $data_merek = $request->get('data_merek');
  @endphp
  @foreach($data_merek as $mereks)
  <li><a class="header-list__link" href="{{ url('searchFilter?merekFilter='.$mereks->merek)}}" tabindex="-1">{{ $mereks->merek }}</a></li>
  @endforeach

<!-- <li><a class="header-list__link" href="{{ url('car-details') }}" tabindex="-1">Car Detail</a> -->

  {{-- @else
    <li>
    Nothing
      </li>

  @endif

@endforeach --}}

