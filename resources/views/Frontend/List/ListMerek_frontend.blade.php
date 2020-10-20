@extends('Frontend.layout.app')



@section('title')

List

@stop



@section('css')

@stop



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
                                @foreach($mobil as $mobils)
                                <section class="b-goods-1 b-goods-1_mod-a s-best" @if($mobils->tipe_promo == "standar" || $mobils->tipe_promo == "rekomendasi") style="background: #fff;" @else @endif>

                                    <div class="row">

                                        <div class="b-goods-1__img">
                                            @if($mobils->foto_mobil != "")
                                            <a class="js-zoom-images" href="{{ asset('storage/data/mobil/'.$mobils->foto_mobil) }}">

                                                <img class="img-responsive" src="{{ asset('storage/data/mobil/'.$mobils->foto_mobil) }}" alt="foto" />
                                            @else
                                            <a class="js-zoom-images" href="{{ asset('assets/assets/img/car-dummy.jpg') }}">

                                                <img class="img-responsive" src="{{ asset('assets/assets/img/car-dummy.jpg') }}" alt="foto" />
                                            @endif

                                            </a><span class="b-goods-1__price hidden-th">{{ "Rp. ". number_format($mobils->harga, 0, ".", ".") }}{{-- <span class="b-goods-1__price-msrp">MSRP $27,000</span> --}}</span>

                                        </div>

                                        <div class="b-goods-1__inner">

                                            <div class="b-goods-1__header"><a class="b-goods-1__choose hidden-th" href="listing-1.html">{{-- <i class="icon fa fa-heart-o"></i> --}}</a>

                                                @if($mobils->tipe_promo == "hot deals")<span class="badge-deal hidden-th"><img class="list-img" src="{{ asset('assets/assets/media/content/icon/thumbs-up-compact.png') }}"> Hot deals</span>@else @endif
                                                @if($mobils->transmisi == "A")
                                                <h2 class="b-goods-1__name"><a href="{{ '../car-details/'.$mobils->id.'/'.$mobils->merek}}">{{ $mobils->tahun." ".$mobils->merek." ".$mobils->model.", A/T"}}{{--  Honda HR-V --}}</a></h2>
                                                @endif
                                                @if($mobils->transmisi == "M")
                                                <h2 class="b-goods-1__name"><a href="{{ '../car-details/'.$mobils->id.'/'.$mobils->merek}}">{{ $mobils->tahun." ".$mobils->merek." ".$mobils->model.", M/T"}}{{--  Honda HR-V --}}</a></h2>
                                                @endif
                                                @if($mobils->transmisi == "")
                                                <h2 class="b-goods-1__name"><a href="{{ '../car-details/'.$mobils->id.'/'.$mobils->merek}}">{{ $mobils->tahun." ".$mobils->merek." ".$mobils->model.", -"}}{{--  Honda HR-V --}}</a></h2>
                                                @endif

                                            </div>

                                            <div class="b-goods-1__info"> {{ ($mobils->deskripsi) }} 
                                                                                            {{-- @php                                          
$string = strip_tags($mobils->deskripsi);
if (strlen($string) > 5) {

    // truncate string
    $stringCut = substr($string, 0, 5);
    $endPoint = strrpos($stringCut, ' ');

    //if the string doesn't contain any space then it will cut without word basis.
    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
    $string .= '<span class="b-goods-1__info-link" data-toggle="collapse" data-target="#info-1">
                                                </span> ';
}
echo $string;
@endphp 
{{-- @php $string = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.";
if (strlen($string) > 25) {
$trimstring = substr($string, 0, 25). ' <a href="">readmore...</a>';
} else {
$trimstring = $string;
}
echo $trimstring;
//Output : Lorem Ipsum is simply dum [readmore...][1]
@endphp --}}
                                                 
                                            </div>

                                            <div class="collapse in" id="list-1">

                                                <ul class="b-goods-1__list list list-mark-5">

                                                    <div class="col-md-6">

                                                    <li class="b-goods-1__list-item"><strong>Lokasi</strong> {{ $mobils->lokasi}}</li>

                                                    <li class="b-goods-1__list-item"><strong>Mesin</strong> {{ $mobils->cakupan_mesin." cc"}}</li>

                                                    </div>

                                                    <div class="col-md-6">

                                                    <li class="b-goods-1__list-item"><strong>Kilometer</strong> {{ $mobils->kilometer}} Km</li>

                                                    <li class="b-goods-1__list-item"><strong>Bahan Bakar</strong> {{ $mobils->bahan_bakar}}</li>

                                                    </div>

                                                </ul>

                                            </div>

                                            <div class="col-md-6">

                                            <a href="{{ '../car-details/'.$mobils->id.'/'.$mobils->merek}}"><button class="list-btn faded-green"><img class="list-img" src="{{ asset('assets/assets/media/content/icon/car-compact.png') }}">  &nbsp;Lihat Detail</button></a>

                                            </div>

                                            <div class="col-md-6">
                                            @php 
                                                    $no_Telp = substr($mobils->no_telp,1);
                                            @endphp
                                            <a href="https://api.whatsapp.com/send?phone={{ '62'.$no_Telp }}"><button class="list-btn blue"><img class="list-img" src="{{ asset('assets/assets/media/content/icon/phone-compact.png') }}">  &nbsp;Hubungi Kami</button></a>

                                            </div>

                                            {{-- <span class="b-goods-1__price_th text-primary visible-th">$45,000<span class="b-goods-1__price-msrp">MSRP $27,000</span><a class="b-goods-1__choose" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>

                                            </span> --}}

                                            {{-- <div class="b-goods-1__section">

                                                <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#desc-1">Highlights</h3>

                                                <div class="collapse in" id="desc-1">

                                                    <ul class="b-goods-1__desc list-unstyled">

                                                        <li class="b-goods-1__desc-item">35,000 mi</li>

                                                        <li class="b-goods-1__desc-item"><span class="hidden-th">Model:</span> 2017</li>

                                                        <li class="b-goods-1__desc-item">Auto</li>

                                                        <li class="b-goods-1__desc-item hidden-th">320 hp</li>

                                                    </ul>

                                                </div>

                                            </div>

                                            <div class="b-goods-1__section hidden-th">

                                                <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#list-1">specifications</h3>

                                                <div class="collapse in" id="list-1">

                                                    <ul class="b-goods-1__list list list-mark-5">

                                                        <li class="b-goods-1__list-item">Engine DOHC 24-valve V-6</li>

                                                        <li class="b-goods-1__list-item">Audio Controls on Steering Wheel</li>

                                                        <li class="b-goods-1__list-item">Power Windows</li>

                                                        <li class="b-goods-1__list-item">Daytime Running Lights</li>

                                                        <li class="b-goods-1__list-item">Cruise Control, ABS</li>

                                                    </ul>

                                                </div>

                                            </div> --}}

                                        </div>

                                        <div class="b-goods-1__inner">

                                            

                                        </div>

                                    </div>

                                </section>
                                @endforeach

                                <!-- end .b-goods-1-->

                                {{-- <section class="b-goods-1 b-goods-1_mod-a s-best">

                                    <div class="row">

                                        <div class="b-goods-1__img">

                                            <a class="js-zoom-images" href="{{ asset('assets/assets/media/content/posts/car/hr-v.jpg') }}">

                                                <img class="img-responsive" src="{{ asset('assets/assets/media/content/posts/car/hr-v.jpg') }}" alt="foto" />

                                            </a><span class="b-goods-1__price hidden-th">Rp 200.000.000</span>

                                        </div>

                                        <div class="b-goods-1__inner">

                                            <div class="b-goods-1__header"><a class="b-goods-1__choose hidden-th" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>

                                                <span class="badge-deal hidden-th"><img class="list-img" src="{{ asset('assets/assets/media/content/icon/thumbs-up-compact.png') }}"> Hot deals</span>

                                                <h2 class="b-goods-1__name"><a href="car-details.html">2018 Honda HR-V</a></h2>

                                            </div>

                                            <div class="b-goods-1__info">Duis aute irure reprehender voluptate velit esacium fugiat nula pariatur excepteurd magna aliqua ut enim ad minim veniam quis nostrud Lorem ipsum dolor sit amet con sectetur adipisicing elit sed do eiusmod tempor

                                                incididunt<span class="b-goods-1__info-more collapse" id="info-1"> lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit aut rerum numquam hic eum, aperiam fuga, pariatur repellendus. Incidunt corporis iusto illo nesciunt soluta optio eius aliquam. Similique, laborum dicta!</span>

                                                <span

                                                class="b-goods-1__info-link" data-toggle="collapse" data-target="#info-1"></span>

                                            </div>

                                            <div class="collapse in" id="list-1">

                                                <ul class="b-goods-1__list list list-mark-5">

                                                    <div class="col-md-6">

                                                    <li class="b-goods-1__list-item"><strong>Tahun</strong> 20XX</li>

                                                    <li class="b-goods-1__list-item"><strong>Mesin</strong> ****cc</li>

                                                    </div>

                                                    <div class="col-md-6">

                                                    <li class="b-goods-1__list-item"><strong>Kilometer</strong> *** Km</li>

                                                    <li class="b-goods-1__list-item"><strong>Lokasi</strong> Jateng</li>

                                                    </div>

                                                </ul>

                                            </div>

                                            <div class="col-md-6">

                                            <button class="list-btn faded-green"><img class="list-img" src="{{ asset('assets/assets/media/content/icon/car-compact.png') }}">  &nbsp;Lihat Detail</button>

                                            </div>

                                            <div class="col-md-6">

                                            <button class="list-btn blue"><img class="list-img" src="{{ asset('assets/assets/media/content/icon/phone-compact.png') }}">  &nbsp;Hubungi Kami</button>

                                            </div>

                                        </div>

                                    </div>

                                </section>

                                <!-- end .b-goods-1-->

                                <section class="b-goods-1 b-goods-1_mod-a">

                                    <div class="row">

                                        <div class="b-goods-1__img">

                                            <a class="js-zoom-images" href="{{ asset('assets/assets/media/content/posts/car/jazz.jpeg') }}">

                                                <img class="img-responsive" src="{{ asset('assets/assets/media/content/posts/car/jazz.jpeg') }}" alt="foto" />

                                            </a><span class="b-goods-1__price hidden-th">Rp 200.000.000</span>

                                        </div>

                                        <div class="b-goods-1__inner">

                                            <div class="b-goods-1__header"><a class="b-goods-1__choose hidden-th" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>

                                                <h2 class="b-goods-1__name"><a href="car-details.html">2018 Honda Jazz</a></h2>

                                            </div>

                                            <div class="b-goods-1__info">Duis aute irure reprehender voluptate velit esacium fugiat nula pariatur excepteurd magna aliqua ut enim ad minim veniam quis nostrud Lorem ipsum dolor sit amet con sectetur adipisicing elit sed do eiusmod tempor

                                                incididunt<span class="b-goods-1__info-more collapse" id="info-1"> lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit aut rerum numquam hic eum, aperiam fuga, pariatur repellendus. Incidunt corporis iusto illo nesciunt soluta optio eius aliquam. Similique, laborum dicta!</span>

                                                <span

                                                class="b-goods-1__info-link" data-toggle="collapse" data-target="#info-1"></span>

                                            </div>

                                            <div class="collapse in" id="list-1">

                                                <ul class="b-goods-1__list list list-mark-5">

                                                    <div class="col-md-6">

                                                    <li class="b-goods-1__list-item"><strong>Tahun</strong> 20XX</li>

                                                    <li class="b-goods-1__list-item"><strong>Mesin</strong> ****cc</li>

                                                    </div>

                                                    <div class="col-md-6">

                                                    <li class="b-goods-1__list-item"><strong>Kilometer</strong> *** Km</li>

                                                    <li class="b-goods-1__list-item"><strong>Lokasi</strong> Jateng</li>

                                                    </div>

                                                </ul>

                                            </div>

                                            <div class="col-md-6">

                                            <button class="list-btn faded-green"><img class="list-img" src="{{ asset('assets/assets/media/content/icon/car-compact.png') }}">  &nbsp;Lihat Detail</button>

                                            </div>

                                            <div class="col-md-6">

                                            <button class="list-btn blue"><img class="list-img" src="{{ asset('assets/assets/media/content/icon/phone-compact.png') }}">  &nbsp;Hubungi Kami</button>

                                            </div>

                                        </div>

                                    </div>

                                </section>

                                <!-- end .b-goods-1-->

                                <section class="b-goods-1 b-goods-1_mod-a">

                                    <div class="row">

                                        <div class="b-goods-1__img">

                                            <a class="js-zoom-images" href="{{ asset('assets/assets/media/content/posts/car/hr-v.jpg') }}">

                                                <img class="img-responsive" src="{{ asset('assets/assets/media/content/posts/car/hr-v.jpg') }}" alt="foto" />

                                            </a><span class="b-goods-1__price hidden-th">Rp 200.000.000</span>

                                        </div>

                                        <div class="b-goods-1__inner">

                                            <div class="b-goods-1__header"><a class="b-goods-1__choose hidden-th" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>

                                                <h2 class="b-goods-1__name"><a href="car-details.html">2018 Honda HR-V</a></h2>

                                            </div>

                                            <div class="b-goods-1__info">Duis aute irure reprehender voluptate velit esacium fugiat nula pariatur excepteurd magna aliqua ut enim ad minim veniam quis nostrud Lorem ipsum dolor sit amet con sectetur adipisicing elit sed do eiusmod tempor

                                                incididunt<span class="b-goods-1__info-more collapse" id="info-1"> lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit aut rerum numquam hic eum, aperiam fuga, pariatur repellendus. Incidunt corporis iusto illo nesciunt soluta optio eius aliquam. Similique, laborum dicta!</span>

                                                <span

                                                class="b-goods-1__info-link" data-toggle="collapse" data-target="#info-1"></span>

                                            </div>

                                            <div class="collapse in" id="list-1">

                                                <ul class="b-goods-1__list list list-mark-5">

                                                    <div class="col-md-6">

                                                    <li class="b-goods-1__list-item"><strong>Tahun</strong> 20XX</li>

                                                    <li class="b-goods-1__list-item"><strong>Mesin</strong> ****cc</li>

                                                    </div>

                                                    <div class="col-md-6">

                                                    <li class="b-goods-1__list-item"><strong>Kilometer</strong> *** Km</li>

                                                    <li class="b-goods-1__list-item"><strong>Lokasi</strong> Jateng</li>

                                                    </div>

                                                </ul>

                                            </div>

                                            <div class="col-md-6">

                                            <button class="list-btn faded-green"><img class="list-img" src="{{ asset('assets/assets/media/content/icon/car-compact.png') }}">  &nbsp;Lihat Detail</button>

                                            </div>

                                            <div class="col-md-6">

                                            <button class="list-btn blue"><img class="list-img" src="{{ asset('assets/assets/media/content/icon/phone-compact.png') }}">  &nbsp;Hubungi Kami</button>

                                            </div>

                                        </div>

                                    </div>

                                </section>

                                <!-- end .b-goods-1-->

                                <section class="b-goods-1 b-goods-1_mod-a">

                                    <div class="row">

                                        <div class="b-goods-1__img">

                                            <a class="js-zoom-images" href="{{ asset('assets/assets/media/content/posts/car/jazz.jpeg') }}">

                                                <img class="img-responsive" src="{{ asset('assets/assets/media/content/posts/car/jazz.jpeg') }}" alt="foto" />

                                            </a><span class="b-goods-1__price hidden-th">Rp 200.000.000</span>

                                        </div>

                                        <div class="b-goods-1__inner">

                                            <div class="b-goods-1__header"><a class="b-goods-1__choose hidden-th" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>

                                                <h2 class="b-goods-1__name"><a href="car-details.html">2018 Honda Jazz</a></h2>

                                            </div>

                                            <div class="b-goods-1__info">Duis aute irure reprehender voluptate velit esacium fugiat nula pariatur excepteurd magna aliqua ut enim ad minim veniam quis nostrud Lorem ipsum dolor sit amet con sectetur adipisicing elit sed do eiusmod tempor

                                                incididunt<span class="b-goods-1__info-more collapse" id="info-1"> lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit aut rerum numquam hic eum, aperiam fuga, pariatur repellendus. Incidunt corporis iusto illo nesciunt soluta optio eius aliquam. Similique, laborum dicta!</span>

                                                <span

                                                class="b-goods-1__info-link" data-toggle="collapse" data-target="#info-1"></span>

                                            </div>

                                            <div class="collapse in" id="list-1">

                                                <ul class="b-goods-1__list list list-mark-5">

                                                    <div class="col-md-6">

                                                    <li class="b-goods-1__list-item"><strong>Tahun</strong> 20XX</li>

                                                    <li class="b-goods-1__list-item"><strong>Mesin</strong> ****cc</li>

                                                    </div>

                                                    <div class="col-md-6">

                                                    <li class="b-goods-1__list-item"><strong>Kilometer</strong> *** Km</li>

                                                    <li class="b-goods-1__list-item"><strong>Lokasi</strong> Jateng</li>

                                                    </div>

                                                </ul>

                                            </div>

                                            <div class="col-md-6">

                                            <button class="list-btn faded-green"><img class="list-img" src="{{ asset('assets/assets/media/content/icon/car-compact.png') }}">  &nbsp;Lihat Detail</button>

                                            </div>

                                            <div class="col-md-6">

                                            <button class="list-btn blue"><img class="list-img" src="{{ asset('assets/assets/media/content/icon/phone-compact.png') }}">  &nbsp;Hubungi Kami</button>

                                            </div>

                                        </div>

                                    </div>

                                </section>

                                <!-- end .b-goods-1-->

                                <section class="b-goods-1 b-goods-1_mod-a">

                                    <div class="row">

                                        <div class="b-goods-1__img">

                                            <a class="js-zoom-images" href="{{ asset('assets/assets/media/content/posts/car/jazz.jpeg') }}">

                                                <img class="img-responsive" src="{{ asset('assets/assets/media/content/posts/car/jazz.jpeg') }}" alt="foto" />

                                            </a><span class="b-goods-1__price hidden-th">Rp 200.000.000</span>

                                        </div>

                                        <div class="b-goods-1__inner">

                                            <div class="b-goods-1__header"><a class="b-goods-1__choose hidden-th" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>

                                                <h2 class="b-goods-1__name"><a href="car-details.html">2018 Honda Jazz</a></h2>

                                            </div>

                                            <div class="b-goods-1__info">Duis aute irure reprehender voluptate velit esacium fugiat nula pariatur excepteurd magna aliqua ut enim ad minim veniam quis nostrud Lorem ipsum dolor sit amet con sectetur adipisicing elit sed do eiusmod tempor

                                                incididunt<span class="b-goods-1__info-more collapse" id="info-1"> lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit aut rerum numquam hic eum, aperiam fuga, pariatur repellendus. Incidunt corporis iusto illo nesciunt soluta optio eius aliquam. Similique, laborum dicta!</span>

                                                <span

                                                class="b-goods-1__info-link" data-toggle="collapse" data-target="#info-1"></span>

                                            </div>

                                            <div class="collapse in" id="list-1">

                                                <ul class="b-goods-1__list list list-mark-5">

                                                    <div class="col-md-6">

                                                    <li class="b-goods-1__list-item"><strong>Tahun</strong> 20XX</li>

                                                    <li class="b-goods-1__list-item"><strong>Mesin</strong> ****cc</li>

                                                    </div>

                                                    <div class="col-md-6">

                                                    <li class="b-goods-1__list-item"><strong>Kilometer</strong> *** Km</li>

                                                    <li class="b-goods-1__list-item"><strong>Lokasi</strong> Jateng</li>

                                                    </div>

                                                </ul>

                                            </div>

                                            <div class="col-md-6">

                                            <button class="list-btn faded-green"><img class="list-img" src="{{ asset('assets/assets/media/content/icon/car-compact.png') }}">  &nbsp;Lihat Detail</button>

                                            </div>

                                            <div class="col-md-6">

                                            <button class="list-btn blue"><img class="list-img" src="{{ asset('assets/assets/media/content/icon/phone-compact.png') }}">  &nbsp;Hubungi Kami</button>

                                            </div>

                                        </div>

                                    </div>

                                </section> --}}

                                <!-- end .b-goods-1-->

                            </div>

                            <!-- end .goods-group-2-->

                            <ul class="pagination text-center">

                                <li><a href="#"><i class="icon fa fa-angle-double-left"></i></a>

                                </li>

                                <li><a href="#">1</a>

                                </li>

                                <li class="active"><a href="#">2</a>

                                </li>

                                <li><a href="#">3</a>

                                </li>

                                <li><a href="#"><i class="icon fa fa-angle-double-right"></i></a>

                                </li>

                            </ul>

                        </main>

                        <!-- end .l-main-content-->

                    </div>

                    <div class="col-md-3 col-md-pull-9">

                        <aside class="l-sidebar">

                            <form class="b-filter-2 bg-grey" action="{{ '../searchListFilter'}}" method="get">

                                <h3 class="b-filter-cus__title">Cari Mobil</h3>

                                <div class="b-filter-2__inner">


                                    <div class="b-filter-2__group">

                                        {{-- <div class="b-filter-2__group-title">keyword</div> --}}
                                    
                                        <select class="selectpicker" data-width="100%" name="tipeFilter">
                                            <option selected="" disabled="">Jenis Kendaraan</option>
                                            @foreach($tipe as $tipes)
                                            

                                            <option value="{{ $tipes->tipe }}">{{ $tipes->tipe }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                    <div class="b-filter-2__group">

                                        {{-- <div class="b-filter-2__group-title">keyword</div> --}}

                                       <select class="selectpicker" data-width="100%" name="merekFilter">
                                        <option selected="" disabled="">Merek</option>
                                            @foreach($merek as $mereks)
                                            <option value="{{ $mereks->merek }}">{{ $mereks->merek }}</option>
                                            @endforeach

                                        </select>


                                    </div>

                                    <div class="b-filter-2__group">

                                        <select class="selectpicker" data-width="100%" name="tahunFilter">
                                            <option selected="" disabled="">Tahun</option>
                                            @foreach($tahun as $tahuns)
                                            <option value="{{ $tahuns->tahun }}">{{ $tahuns->tahun }}</option>
                                            @endforeach

                                        </select>

                                    </div>

                                    <div class="b-filter-2__group">

                                        <select class="selectpicker" data-width="100%" name="hargaFilter">
                                            <option selected="" disabled="">Harga</option>
                                            @foreach($harga as $hargas)
                                            <option value="{{ $hargas->harga }}">{{ $hargas->harga }}</option>
                                            @endforeach

                                        </select>

                                    </div>

                                    <div class="b-filter-2__group">

                                        <select class="selectpicker" data-width="100%" name="kondisiFilter">
                                            <option selected="" disabled="">Kondisi</option>
                                            @foreach($kondisi as $kondisis)
                                            <option value="{{ $kondisis->kondisi }}">{{ $kondisis->kondisi }}</option>
                                            @endforeach

                                        </select>

                                    </div>

                                    <div class="b-filter-2__group">

                                       <select class="selectpicker" data-width="100%" name="lokasiFilter">
                                        <option selected="" disabled="">Lokasi</option>
                                            @foreach($lokasi as $lokasis)
                                            <option value="{{ $lokasis->lokasi }}">{{ $lokasis->lokasi }}</option>
                                            @endforeach

                                        </select>

                                    </div>

                                    {{-- <div class="b-filter-2__group">

                                        

                                            <div class="col-md-6" style="padding:0px 5px 0px 0px;">

                                                <select class="selectpicker" data-width="100%">

                                                    <option>Min KM</option>

                                                    <option>KM 1</option>

                                                    <option>KM 2</option>

                                                </select>

                                            </div>

                                            <div class="col-md-6"style="padding:0px 0px 0px 5px;">

                                                <select class="selectpicker" data-width="100%">

                                                    <option>Max KM</option>

                                                    <option>KM 1</option>

                                                    <option>KM 2</option>

                                                </select>

                                            </div>

                                        

                                    </div> --}}

                                    <div class="b-filter-2__group">

                                        <select class="selectpicker" data-width="100%" name="transmisiFilter">
                                            <option selected="" disabled="">Transmisi</option>
                                            @foreach($transmisi as $transmisis)
                                            <option value="{{ $transmisis->transmisi }}">{{ $transmisis->transmisi }}</option>
                                            @endforeach

                                        </select>

                                    </div>

                                    <div class="b-filter-2__group" style="padding-bottom: 10px;">

                                        <select class="selectpicker" data-width="100%" name="bahan_bakarFilter">
                                            <option selected="" disabled="">Bahan Bakar</option>
                                            @foreach($bahan_bakar as $bahanbakar)
                                            <option value="{{ $bahanbakar->bahan_bakar }}">{{ $bahanbakar->bahan_bakar }}</option>
                                            @endforeach

                                        </select>

                                    </div>

                                    {{-- <div class="b-filter-2__group">

                                        <div class="b-filter-2__group-title">Filter Price</div>

                                        <div class="ui-filter-slider">

                                            <div id="slider-price"></div>

                                            <div class="ui-filter-slider__info">

                                                <div class="ui-filter-slider__label">Kisaran Harga : <br></div><br><span class="ui-filter-slider__current" id="slider-snap-value-lower"></span>-<span class="ui-filter-slider__current" id="slider-snap-value-upper"></span>

                                            </div>

                                        </div>

                                    </div> --}}

                                    {{-- <div class="b-filter-2__group">

                                        <div class="b-filter-2__group-title">Body style</div>

                                        <div class="b-filter-type-2">

                                            <div class="b-filter-type-2__item">

                                                <input class="b-filter-type-2__input" id="typePickup" type="checkbox" />

                                                <label class="b-filter-type-2__label" for="typePickup"><i class="b-filter-type-2__icon flaticon-pick-up"></i><span class="b-filter-type-2__title">PICKUP</span>

                                                </label>

                                            </div>

                                            <div class="b-filter-type-2__item">

                                                <input class="b-filter-type-2__input" id="typeSuv" type="checkbox" />

                                                <label class="b-filter-type-2__label" for="typeSuv"><i class="b-filter-type-2__icon flaticon-car-of-hatchback-model"></i><span class="b-filter-type-2__title">SUV</span>

                                                </label>

                                            </div>

                                            <div class="b-filter-type-2__item">

                                                <input class="b-filter-type-2__input" id="typeCoupe" type="checkbox" />

                                                <label class="b-filter-type-2__label" for="typeCoupe"><i class="b-filter-type-2__icon flaticon-coupe-car"></i><span class="b-filter-type-2__title">coupe</span>

                                                </label>

                                            </div>

                                            <div class="b-filter-type-2__item">

                                                <input class="b-filter-type-2__input" id="typeConvertible" type="checkbox" checked="checked" />

                                                <label class="b-filter-type-2__label" for="typeConvertible"><i class="b-filter-type-2__icon flaticon-cabrio-car"></i><span class="b-filter-type-2__title">CONVERTIBLE</span>

                                                </label>

                                            </div>

                                            <div class="b-filter-type-2__item">

                                                <input class="b-filter-type-2__input" id="typeSedan" type="checkbox" />

                                                <label class="b-filter-type-2__label" for="typeSedan"><i class="b-filter-type-2__icon flaticon-sedan-car-model"></i><span class="b-filter-type-2__title">sedan</span>

                                                </label>

                                            </div>

                                            <div class="b-filter-type-2__item">

                                                <input class="b-filter-type-2__input" id="typeMinicar" type="checkbox" />

                                                <label class="b-filter-type-2__label" for="typeMinicar"><i class="b-filter-type-2__icon flaticon-car-1"></i><span class="b-filter-type-2__title">MINICAR</span>

                                                </label>

                                            </div>

                                        </div>

                                    </div> --}}

                                    {{-- <div class="b-filter-2__group">

                                        <div class="b-filter-2__group-title">TRANSMISSION</div>

                                        <div class="checkbox-group">

                                            <input class="forms__check hidden" id="check-1" type="checkbox" />

                                            <label class="forms__label forms__label-check forms__label-check-1" for="check-1">4 Speed Automatic</label>

                                            <input class="forms__check hidden" id="check-2" type="checkbox" />

                                            <label class="forms__label forms__label-check forms__label-check-1" for="check-2">4 Speed Manual</label>

                                            <input class="forms__check hidden" id="check-3" type="checkbox" checked="checked" />

                                            <label class="forms__label forms__label-check forms__label-check-1" for="check-3">5 Speed Automatic</label>

                                            <input class="forms__check hidden" id="check-4" type="checkbox" />

                                            <label class="forms__label forms__label-check forms__label-check-1" for="check-4">5 Speed Manual</label>

                                            <input class="forms__check hidden" id="check-5" type="checkbox" checked="checked" />

                                            <label class="forms__label forms__label-check forms__label-check-1" for="check-5">6-Speed Semi-Auto</label>

                                            <input class="forms__check hidden" id="check-6" type="checkbox" />

                                            <label class="forms__label forms__label-check forms__label-check-1" for="check-6">6-Speed Manual</label>

                                        </div>

                                    </div> --}}

                                    <div class="b-filter-2__group">

                                        <button type="submit" class="btn btn-lg btn-primary" style="width: 100%;background-color: #fff;border-color: #2566AF;color: #000">Search</button>

                                    </div>

                                    <div class="b-filter-2__group">

                                        <button class="btn btn-lg btn-primary" onClick="document.location.reload(true)" style="width: 100%;background-color: #7ED501;">Reset Filter</button>

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
</script>
@stop

