@extends('Frontend.layout.app')



@section('title')
List
@stop



@section('css')
<style>
.b-filter-cus__title{
    font-weight: 500;
    padding-left: 20px !important;
}
.l-sidebar {
    padding-top: 90px !important;
}
.l-main-content {
    padding-top: 80px !important;
}
.img-mbl{
    width: 100%;
}

.b-goods-1__list-item strong{
    padding-right: 15px;
}

@media (min-width: 1281px) {
    .img-mbl{
        height: 145px;
    }
}
.row-list{
    padding: 15px 0px;
}
.row-hot{
    background: aliceblue;
}
.img-hot{
    width: 15px !important;
    margin: 3px 0px;
    float: left;
}
.badge-deal{
    width: 100% !important;
    font-size: 12px !important
}
.b-goods-1__img{
    width: 30% !important;
    margin-right: 15px;
    border: 1px solid rgba(0,47,52,.2);
    padding: 0px !important;
}
@media (max-width: 767px) {
    .b-goods-1__img{
        width: 100% !important;
        margin-right: 0px;
    }
    .hot-div{
        padding-bottom: 10px;
    }
}
.pdg-rata{
    padding-left: 0px !important;
}
.img-mbl{
    background-color: #fff;
    position: relative;
    box-sizing: border-box;
    margin: 0;
    overflow: hidden;
    text-align: -webkit-center !important;
    text-align: -moz-center;
}
.img-figure{
    max-width: 100%;
    max-height: 100%;
    min-height: 100%;
}
</style>
@stop

@section('nav-search')
<div class="header-navibox-3">
    <ul class="yamm main-menu nav navbar-nav" style="margin-right: 40px !important">
        <li class="text-truncate">
            <form class="input-group" style="width: 438px;" action="{{ url('searchFilter') }}" method="get">
                <input class="form-control in-search" name="search" placeholder="Temukan mobil yang anda inginkan" autocomplete="off" autofocus="autofocus" type="text" aria-label="Small" value="{{ $search }}">
                <div class="input-group-btn">
                    <button class="btn btn-outline-success btn-primary btn-search" type="submit"><i class="fa fa-white fa-search"></i></button>
                </div>
                <input type="hidden" name="tipeMobilFilter" value="{{ $tipe }}">
                <input type="hidden" name="merekFilter" value="{{ $merek }}">
                <input type="hidden" name="tahunFilter" value="{{ $tahun }}">
                <input type="hidden" name="lokasiFilter" value="{{ $lokasi }}">
                <input type="hidden" name="transmisiFilter" value="{{ $transmisi }}">
                <input type="hidden" name="bahan_bakarFilter" value="{{ $bahan_bakar }}">
                <input type="hidden" name="filterHargaLow" value="{{ $harga_low }}">
                <input type="hidden" name="filterHargaHigh" value="{{ $harga_high }}">
            </form>
        </li>    
    </ul>
</div>
@endsection

@section('nav-search-mobil')
<form class="form-inline my-2 my-lg-0" action="{{ url('searchFilter') }}" method="get">
    <input class="form-control mr-sm-2 in-search-mobile" type="search" placeholder="Temukan mobil yang anda inginkan" aria-label="Search" value="{{ $search }}" name="search">
    <button class="btn btn-outline-success my-2 my-sm-0 btn-search-mobile btn-success" type="submit">Cari </button>
    <input type="hidden" name="tipeMobilFilter" value="{{ $tipe }}">
    <input type="hidden" name="merekFilter" value="{{ $merek }}">
    <input type="hidden" name="tahunFilter" value="{{ $tahun }}">
    <input type="hidden" name="lokasiFilter" value="{{ $lokasi }}">
    <input type="hidden" name="transmisiFilter" value="{{ $transmisi }}">
    <input type="hidden" name="bahan_bakarFilter" value="{{ $bahan_bakar }}">
    <input type="hidden" name="filterHargaLow" value="{{ $harga_low }}">
    <input type="hidden" name="filterHargaHigh" value="{{ $harga_high }}">
</form>
@endsection



@section('slider')
{{-- <div class="section-title-page area-bg area-bg_dark area-bg_op_70">

    <div class="area-bg__inner">

        <div class="container">

            <div class="row">

                <div class="col-xs-12">

                    <h1 class="b-title-page bg-primary_a">cars listings II</h1>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- end .b-title-page-->

<div class="bg-grey">

    <div class="container">

        <div class="row">

            <div class="col-xs-12">

                <ol class="breadcrumb">

                    <li><a href="home.html"><i class="icon fa fa-home"></i></a>

                    </li>

                    <li class="active">Vehicle Inventry</li>

                </ol>

            </div>

        </div>

    </div>

</div> --}}

@stop



@section('content')

<div class="container" style="margin-top: 60px;">

                <div class="row">

                    <div class="col-md-9 col-md-push-3">

                        <main class="l-main-content">

                            <div class="filter-goods">

                                <div class="filter-goods__select">{{-- <span class="hidden-xs">Sort</span> --}}

                                    <div>

                                    {{-- <select class="selectpicker" data-width="172">

                                        <option>Pencarian Terbaik</option>

                                        <option>A-Z</option>

                                        <option>Z-A</option>

                                    </select> --}}

                                    </div>

                                    {{-- <div class="btns-switch"><i class="btns-switch__item js-view-th icon fa fa-th-large"></i><i class="btns-switch__item js-view-list active icon fa fa-th-list"></i>

                                    </div> --}}

                                </div>

                                {{-- <div class="filter-goods__info">Showing results from<strong> 1 - 10</strong> of total<strong> 35</strong>

                                </div> --}}

                            </div>

                            <!-- end .filter-goods-->

                            <div class="goods-group-2 list-goods">
                                @php
                                    $count_filter = count($mobil_filter);
                                @endphp
                                @if ($count_filter == 0)
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h3>Tidak ada mobil yang tersedia di kategori ini.</h3>
                                        <br>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <img src="{{ asset('assets/assets/media/general/not-found.png') }}" alt="">
                                    </div>
                                </div>         
                                @endif
                                @foreach($mobil_filter as $mobils)
                                <section class="b-goods-1 b-goods-1_mod-a s-best" @if($mobils->tipe_promo == "standar" || $mobils->tipe_promo == "rekomendasi") style="background: #fff;" @else @endif>

                                    <div class="row row-list {{ $mobils->hot_deal == 'ya' ? 'row-hot' : '' }}">

                                        <div class="b-goods-1__img">
                                            @if($mobils->foto_mobil != "")
                                            <a class="js-zoom-images" href="{{ asset('storage/data/mobil/'.$mobils->foto_mobil) }}">
                                            <figure class="img-mbl">
                                                @php
                                                    $image_get = storage_path('data/mobil_300_200/'.$mobils->foto_mobil);
                                                @endphp
                                                @if (file_exists($image_get))
                                                <img class="img-responsive img-figure" src="{{ asset('storage/data/mobil_300_200/'.$mobils->foto_mobil) }}" alt="foto" sizes="(min-width: 1280px) 15vw, (min-width: 1024px) 20vw, (min-width: 960px) 25vw, (min-width: 540px) 25vw, (min-width: 320px) 30vw, 35vw" onerror="imgError(this);" />
                                                @else
                                                <img class="img-responsive img-figure" src="{{ asset('storage/data/mobil/'.$mobils->foto_mobil) }}" alt="foto" sizes="(min-width: 1280px) 15vw, (min-width: 1024px) 20vw, (min-width: 960px) 25vw, (min-width: 540px) 25vw, (min-width: 320px) 30vw, 35vw" onerror="imgError(this);"/>
                                                @endif
                                            </figure>
                                            @else
                                            <a class="js-zoom-images" href="{{ asset('assets/assets/img/car-dummy.jpg') }}">

                                                <img class="img-responsive img-mbl" src="{{ asset('assets/assets/img/car-dummy.jpg') }}" alt="foto" />
                                            @endif

                                            </a>
                                            @if(is_numeric($mobils->harga))
                                            <span class="b-goods-1__price hidden-th">{{ number_format($mobils->harga, 0, ".", ".") }}</span>
                                            @else
                                              <span class="b-goods-1__price hidden-th">{{ $mobils->harga }}</span>
                                            @endif

                                        </div>

                                        <div class="b-goods-1__inner">

                                            <div class="b-goods-1__header">
                                                <div class="row">
                                                    @if($mobils->hot_deal == "ya")
                                                    <div class="col-md-3 hot-div" style="padding: 10px 10px;">
                                                        <span class="badge-deal hidden-th"><img class="img-responsive img-hot" src="{{ asset('assets/assets/media/content/icon/thumbs-up-compact.png') }}"> Hot deals</span>
                                                    </div>
                                                    @else @endif
                                                    <div class="col-md-9" style="padding: 7px 10px;">
                                                        {{-- @if($mobils->transmisi == "A")
                                                        <h2 class="b-goods-1__name"><a href="{{ '../car-details/'.$mobils->id.'/'.$mobils->merek}}">{{ $mobils->tahun." ".$mobils->merek." ".$mobils->model." (A/T)"}}</a></h2>
                                                        @endif
                                                        @if($mobils->transmisi == "M")
                                                        <h2 class="b-goods-1__name"><a href="{{ '../car-details/'.$mobils->id.'/'.$mobils->merek}}">{{ $mobils->tahun." ".$mobils->merek." ".$mobils->model." (M/T)"}}</a></h2>
                                                        @endif
                                                        @if($mobils->transmisi == "")
                                                        <h2 class="b-goods-1__name"><a href="{{ '../car-details/'.$mobils->id.'/'.$mobils->merek}}">{{ $mobils->tahun." ".$mobils->merek." ".$mobils->model.", -"}}</a></h2>
                                                        @endif --}}
                                                        <h2 class="b-goods-1__name"><a href="{{ url('car-details/'.$mobils->id.'/'.$mobils->merek) }}">{{ $mobils->no_pol == "" ? '' : $mobils->no_pol.' ' }}{{ $mobils->merek." ".$mobils->tahun }}</a></h2>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="b-goods-1__info">{{-- {{ $mobils->deskripsi}} --}}
                                            @php                                          
                                                $string = strip_tags($mobils->deskripsi);
                                                if (strlen($string) > 60) {

                                                    // truncate string
                                                    $stringCut = substr($string, 0, 60);
                                                    $endPoint = strrpos($stringCut, ' ');

                                                    //if the string doesn't contain any space then it will cut without word basis.
                                                    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                    $string .= '...';
                                                }
                                                echo $string;
                                            @endphp
                                                 
                                            </div>

                                            <div class="collapse in" id="list-1">

                                                <ul class="b-goods-1__list list list-mark-5">

                                                    <div class="col-md-6 pdg-rata">

                                                    <li class="b-goods-1__list-item"><strong>Lokasi</strong> {{ $mobils->lokasi}}</li>

                                                    <li class="b-goods-1__list-item"><strong>Mesin</strong> {{ $mobils->cakupan_mesin." cc"}}</li>

                                                    </div>

                                                    <div class="col-md-6 pdg-rata">

                                                    <li class="b-goods-1__list-item"><strong>Kilometer</strong> {{ $mobils->kilometer}} Km</li>

                                                    <li class="b-goods-1__list-item"><strong>Bahan Bakar</strong> {{ $mobils->bahan_bakar}}</li>

                                                    </div>

                                                </ul>

                                            </div>

                                            <div class="col-md-6 pdg-rata">

                                            <a href="{{ url('/car-details/'.$mobils->id.'/'.$mobils->merek) }}"><button class="list-btn faded-green"><img class="list-img" src="{{ asset('assets/assets/media/content/icon/car-compact.png') }}">  &nbsp;Lihat Detail</button></a>

                                            </div>

                                            <div class="col-md-6 pdg-rata">
											@php
											$text_wa = 'Halo%20saya%20ingin%20menanyakan%20mobil,'.'%20%20%20%20%20%20%20'.'Tipe%20:honda%20civiv'.'%20%20%20%20%20%20%20'.'%20%20%20%20%20%20%20'.'Link%20:'.url('car-details').'/'.$mobils->id.'/'.$mobils->merek;
											if ($mobils->transmisi == "A") {
												$tipe_transmisi = '(A/T)';
											}else{
												$tipe_transmisi = '(M/T)';
											}
											$nama_mobil_get = $mobils->tahun."%20".$mobils->merek."%20".$mobils->model."%20".$tipe_transmisi;

											$nama_mobil = str_replace(' ', '%20', $nama_mobil_get);
											@endphp
                                            <a href="https://api.whatsapp.com/send?phone={{ $data_setting->no_telp }}&text=Halo%20saya%20ingin%20menanyakan%20mobil%2C%20%20%20Tipe%20%3A%20{{ $nama_mobil }}%20Link%20%3A%20{{ url('car-details').'/'.$mobils->id.'/'.$mobils->merek }}"><button class="list-btn blue"><img class="list-img" src="{{ asset('assets/assets/media/content/icon/phone-compact.png') }}">  &nbsp;Hubungi Kami</button></a>

                                            </div>

                                        </div>

                                        <div class="b-goods-1__inner">

                                            

                                        </div>

                                    </div>

                                </section>
                                @endforeach

                            </div>
                            {{-- @if ($mobil_filter->lastPage() > 1)
                            <ul class="pagination">
                                <li class="{{ ($mobil_filter->currentPage() == 1) ? ' disabled' : '' }}">
                                    <a href="{{ $mobil_filter->url(1) }}">Previous</a>
                                </li>
                                @for ($i = 1; $i <= $mobil_filter->lastPage(); $i++)
                                    <li class="{{ ($mobil_filter->currentPage() == $i) ? ' active' : '' }}">
                                        <a href="{{ $mobil_filter->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="{{ ($mobil_filter->currentPage() == $mobil_filter->lastPage()) ? ' disabled' : '' }}">
                                    <a href="{{ $mobil_filter->url($mobil_filter->currentPage()+1) }}" >Next</a>
                                </li>
                            </ul>
                            @endif --}}
                            @php
                                $link_limit = 7;
                                $link_add = '&search='.$search.'&tipeMobilFilter='.$tipe.'&merekFilter='.$merek.'&tahunFilter='.$tahun.'&lokasiFilter='.$lokasi.'&transmisiFilter='.$transmisi.'&bahan_bakarFilter='.$bahan_bakar.'&filterHargaLow='.$harga_low.'&filterHargaHigh='.$harga_high;
                            @endphp
                            @if ($mobil_filter->lastPage() > 1)
                                <ul class="pagination text-center">
                                    <li class="page-item {{ ($mobil_filter->currentPage() == 1) ? ' disabled' : '' }}">
                                        <a class="page-link" href="{{ $mobil_filter->previousPageUrl().$link_add }}"><</a>
                                    </li>
                                    @php
                                        $cek_page = $mobil_filter->currentPage() / 4;
                                    @endphp
                                    @if ($cek_page > 1)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $mobil_filter->url(1).$link_add }}">1</a>
                                    </li>
                                    <li class="page-item disabled">
                                        <a class="page-link" href="">...</a>
                                    </li>    
                                    @endif
                                    @for ($i = 1; $i <= $mobil_filter->lastPage(); $i++)
                                        <?php
                                        $half_total_links = floor($link_limit / 2);
                                        $from = $mobil_filter->currentPage() - $half_total_links;
                                        $to = $mobil_filter->currentPage() + $half_total_links;
                                        if ($mobil_filter->currentPage() < $half_total_links) {
                                        $to += $half_total_links - $mobil_filter->currentPage();
                                        }
                                        if ($mobil_filter->lastPage() - $mobil_filter->currentPage() < $half_total_links) {
                                            $from -= $half_total_links - ($mobil_filter->lastPage() - $mobil_filter->currentPage()) - 1;
                                        }
                                        ?>
                                        @if ($from < $i && $i < $to)
                                            <li class="page-item {{ ($mobil_filter->currentPage() == $i) ? ' active' : '' }}">
                                                <a class="page-link" href="{{ $mobil_filter->url($i).$link_add }}">{{ $i }}</a>
                                            </li>
                                        @endif
                                    @endfor
                                    @php
                                        $cek_page_last = $mobil_filter->lastPage() - $mobil_filter->currentPage();
                                    @endphp
                                    @if ($cek_page_last > 3)
                                        <li class="page-item disabled">
                                            <a class="page-link" href="">...</a>
                                        </li> 
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $mobil_filter->url($mobil_filter->lastPage()).$link_add }}">{{ $mobil_filter->lastPage() }}</a>
                                        </li>    
                                    @endif
                                    <li class="page-item {{ ($mobil_filter->currentPage() == $mobil_filter->lastPage()) ? ' disabled' : '' }}">
                                        <a class="page-link" href="{{ $mobil_filter->nextPageUrl().$link_add }}">></a>
                                    </li>
                                </ul>
                            @endif

                        </main>

                        <!-- end .l-main-content-->

                    </div>

                    <div class="col-md-3 col-md-pull-9">

                        <aside class="l-sidebar">

                             <form class="b-filter-2 bg-grey" method="get" action="{{ url('searchFilter') }}">

                                <h3 class="b-filter-cus__title">Cari Mobil</h3>

                                <div class="b-filter-2__inner">


                                    <div class="b-filter-2__group">

                                        {{-- <div class="b-filter-2__group-title">keyword</div> --}}
                                    
                                        <select class="selectpicker" data-width="100%" name="tipeMobilFilter">
                                            <option disabled="">Jenis Kendaraan</option>
                                            <option value="" {{ $tipe == "" ? 'selected' : '' }}>Semua Jenis Kendaraan</option>
                                            @foreach ($master_jenis as $key => $value)
                                              <option value="{{ $key }}" {{ $tipe == $key ? 'selected' : '' }}> 
                                                {{ $value }}
                                              </option>
                                            @endforeach

                                        </select>

                                    </div>
                                    <div class="b-filter-2__group">

                                        {{-- <div class="b-filter-2__group-title">keyword</div> --}}

                                       <select class="selectpicker" data-width="100%" name="merekFilter">
                                        <option disabled="">Merek</option>
                                        <option value="" {{ $merek == '' ? 'selected' : '' }}>Semua Merek</option>
                                            @foreach ($master_merk as $key => $value)
                                              <option value="{{ $key }}" {{ $merek == $key ? 'selected' : '' }}> 
                                                {{ $value }}
                                              </option>
                                            @endforeach

                                        </select>


                                    </div>

                                    <div class="b-filter-2__group">

                                        <select class="selectpicker" data-width="100%" name="tahunFilter">
                                            <option disabled="">Tahun</option>
                                            <option value="" {{ $tahun == '' ? 'selected' : '' }}>Semua Tahun</option>
                                            @foreach ($master_tahun as $key => $value)
                                              <option value="{{ $key }}" {{ $tahun == $key ? 'selected' : '' }}> 
                                                {{ $value }}
                                              </option>
                                            @endforeach

                                        </select>

                                    </div>

                                    {{-- <div class="b-filter-2__group">

                                        <select class="selectpicker" data-width="100%" name="hargaFilter">
                                            <option disabled="">Harga</option>
                                            <option value="" {{ $harga == '' ? 'selected' : '' }}>Semua Harga</option>
                                            @foreach($harga_filter as $hargas)
                                            <option value="{{ $hargas->harga }}" {{ $harga == $hargas->harga ? 'selected' : '' }}>{{ $hargas->harga }}</option>
                                            @endforeach

                                        </select>

                                    </div> --}}

                                    <div class="b-filter-2__group">

                                       <select class="selectpicker" data-width="100%" name="lokasiFilter">
                                        <option disabled="">Lokasi</option>
                                        <option value="" {{ $lokasi == '' ? 'selected' : '' }}>Semua Lokasi</option>
                                            @foreach ($master_lokasi as $key => $value)
                                              <option value="{{ $key }}" {{ $lokasi == $key ? 'selected' : '' }}> 
                                                {{ $value }}
                                              </option>
                                            @endforeach

                                        </select>

                                    </div>

                                    <div class="b-filter-2__group">

                                        <select class="selectpicker" data-width="100%" name="transmisiFilter">
                                            <option disabled="">Transmisi</option>
                                            <option value="" {{ $transmisi == '' ? 'selected' : '' }}>Semua Transmisi</option>
                                            <option value="A" {{ $transmisi == 'auto' ? 'selected' : '' }}>Automatic</option>
                                            <option value="M" {{ $transmisi == 'manual' ? 'selected' : '' }}>Manual</option>
                                        </select>

                                    </div>

                                    <div class="b-filter-2__group" style="margin-bottom:10px;">
        
                                        <select class="selectpicker" data-width="100%" name="bahan_bakarFilter">
                                            <option disabled="">Bahan Bakar</option>
                                            <option value="" {{ $bahan_bakar == '' ? 'selected' : '' }}>Semua Bahan Bakar</option>
                                            <option value="bensin" {{ $bahan_bakar == 'bensin' ? 'selected' : '' }}>Bensin</option>
                                            <option value="diesel" {{ $bahan_bakar == 'diesel' ? 'selected' : '' }}>Diesel</option>

                                        </select>

                                    </div>

                                    <div class="b-filter-2__group">
                                        <label for="hargalow">Filter Harga</label>
                                        <input type="text" name="filterHargaLow" class="form-control" placeholder="Harga Minimum" onkeypress='validate(event)' value="{{ $harga_low }}" style="margin-top:0px !important;">

                                    </div>

                                    <div class="b-filter-2__group" style="padding-bottom: 10px;">
                                        <input type="text" name="filterHargaHigh" class="form-control" placeholder="Harga Maksimum" onkeypress='validate(event)' value="{{ $harga_high }}">

                                    </div>

                                    <div class="b-filter-2__group">

                                        <button type="submit" class="btn btn-lg btn-primary" style="width: 100%;background-color: #fff;border-color: #2566AF;color: #000">Search</button>

                                    </div>

                                    <div class="b-filter-2__group">

                                        <a href="{{ url('searchFilter') }}"><button type="button" class="btn btn-lg btn-primary" style="width: 100%;background-color: #7ED501;">Reset Filter</button></a>

                                    </div>

                                </div>

                            </form>
                            <!-- end .b-filter-->

                        </aside>

                        <!-- end .l-sidebar-->

                    </div>

                </div>

            </div>

@stop



@section('js')
<script>
function reloadpage()
{
location.reload()
}
function imgError(image) {
    image.onerror = "";
    image.src = "{{ url('') }}" + "/assets/assets/img/car-dummy.jpg";
    return true;
}
</script>
@stop

