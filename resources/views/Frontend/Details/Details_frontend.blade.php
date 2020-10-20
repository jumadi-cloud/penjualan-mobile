@extends('Frontend.layout.app')



@section('title')

Details

@stop



@section('css')
    <style type="text/css">
        p{
            color: #000;
        }
        .sp-bottom-thumbnails.sp-has-pointer{
            width: auto !important;
        }
        .img-sld{
            width: 140px;
            height: 70px;
        }
        .slider-pro img.sp-image{
            height: 100% !important;
        }
        .img-car{
            min-height: 130px !important;
            max-height: 130px !important;
            width: 100%;
            padding: 0% 5%;
        }
        @media (min-width: 768px) and (max-width: 1024px) {
            .img-car{
                min-height: 170px !important;
                max-height: 170px !important;
            }
        }
        .b-head-2__title{
            text-align: center;
        }
        .img-slick-for{
            width: 100%;
            max-height: 500px;
        }
        .img-slick-nav{
            height: 125px;
        }
        .same .slick-track{
            width: auto !important;
        }
        @media (max-width: 550px) {
            .img-slick-nav{
                height: 90px !important;
            }
        }
        @media (min-width: 320px) and (max-width: 480px) {
            .img-slick-nav{
                height: 70px !important;
            }
        }
        .b-head-2__title{
            font-size: 18px !important;
        }
        .b-car-details .slider-nav .slick-list .slick-track{
            width: auto !important;
            transform: translate3d(0px, 0px, 0px) !important;
        }
        .b-car-details .slider-nav .slick-list{
            padding: 0px !important;
        }
        .b-car-details .slider-nav .slick-list .slick-track .slick-slide{
            width: 25% !important;
            text-align: -webkit-center !important;
            margin: 10px !important;;
            border: 1px solid rgba(0,47,52,.2) !important;
        }
        .lain-height{
            min-height: 267px;
        }
        .b-car-info__price{
            text-transform: none;
        }
        .img-mbl{
            background-color: #fff;
            position: relative;
            box-sizing: border-box;
            margin: 0;
            overflow: hidden;
            text-align: -webkit-center !important;
            text-align: -moz-center;
            width: 100%;
        }
        .img-figure{
            max-width: 100%;
            max-height: 100%;
            min-height: 100%;
        }
        @media (min-width: 1281px) {
            .img-mbl-slider{
                height: 445px;
            }
            .img-mbl-rekomen{
                height: 145px;
            }
        }
        /*==================================================
        * Effect 7
        * ===============================================*/
        .effect7
        {
            position:relative;
            -webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
            -moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
                    box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
        }
    </style>
@stop



@section('slider')


{{-- <div class="section-title-page area-bg area-bg_dark area-bg_op_70">

    <div class="area-bg__inner">

        <div class="container">

            <div class="row">

                <div class="col-xs-12">

                    <h1 class="b-title-page bg-primary_a">cars details</h1>

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

                    <li><a href="listings-1.html.html">Vehicle Inventry</a>

                    </li>

                    <li class="active">Car Details</li>

                </ol>

            </div>

        </div>

    </div>

</div> --}}

@stop



@section('content')
@inject('request', 'Illuminate\Http\Request')

<main class="l-main-content">

    <div class="container" style="margin-top: 70px;">

        <div class="row">

            <div class="col-md-8">

                <section class="b-car-details">
                    @foreach($mobil as $mobils)
                    <div class="b-car-details__header">
                        @php 
                        function tanggal_indo($tanggal)
{
    $bulan = array (1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}
                        @endphp
                        <h2 class="b-car-details__title">{{ $mobils->no_pol == "" ? '' : $mobils->no_pol.' ' }}{{ $mobils->merek." ".$mobils->tahun }}</h2>
                        <div class="b-car-details__subtitle" style="margin-top: 2px;">{{ tanggal_indo(substr($mobils->created_at,0,10)).", ".$mobils->lokasi}}</div> 

                        {{-- <div class="b-car-details__address"><i class="icon fa fa-map-marker text-primary"></i> 13165 N Auto Show Ave Surprise, AZ 85388</div>

                        <div class="b-car-details__links"><a class="b-car-details__link" href="car-details.html"><i class="icon fa fa-exchange text-primary"></i> Add to Compare</a><a class="b-car-details__link" href="car-details.html"><i class="icon fa fa-car text-primary"></i> Car Brochure</a>

                            <a

                            class="b-car-details__link" href="car-details.html"><i class="icon fa fa-share-alt text-primary"></i> Share</a>

                        </div> --}}

                    </div>

                    {{-- <div class="slider-car-details slider-pro" id="slider-car-details">

                        <div class="sp-slides">
                            <div class="sp-slide">

                                <img class="sp-image" src="{{ asset('storage/data/mobil/'.$mobils->foto_mobil)}}" alt="img" />

                            </div>
                            @foreach($galeri as $galeris)
                            @if($galeris->foto != "")
                            <div class="sp-slide">

                                <img class="sp-image" src="{{ asset('storage/data/galeri_mobil/'.$galeris->foto)}}" alt="img" />

                            </div>
                            @else
                            <div class="sp-slide">

                                <img class="sp-image" src="{{ asset('assets/assets/img/car-dummy.jpg')}}" alt="img" />

                            </div>
                            @endif

                            @endforeach

                        </div>

                        <div class="sp-thumbnails">
                            <div class="sp-thumbnail">

                                <img class="img-responsive img-sld" src="{{ asset('storage/data/mobil/'.$mobils->foto_mobil)}}" alt="img" />

                            </div>
                            @foreach($galeri as $galeris)
                            @if($galeris->foto != "")
                            <div class="sp-thumbnail">

                                <img class="img-responsive img-sld" src="{{ asset('storage/data/galeri_mobil/'.$galeris->foto)}}" alt="img" />

                            </div>
                            @else
                            <div class="sp-thumbnail">
                                <img class="img-responsive img-sld" src="{{ asset('assets/assets/img/car-dummy.jpg')}}" alt="img" />
                            </div>
                            @endif

                            @endforeach


                        </div>

                    </div> --}}

                    <div class="slider-for">
                        <div>
                            <figure class="img-mbl img-mbl-slider effect7">
                                @php
                                    $image_get = storage_path('data/mobil_600_400/'.$mobils->foto_mobil);
                                @endphp
                                @if (file_exists($image_get))
                                <img class="img-responsive img-figure" src="{{ asset('storage/data/mobil_600_400/'.$mobils->foto_mobil)}}" alt="foto" sizes="(min-width: 1280px) 15vw, (min-width: 1024px) 20vw, (min-width: 960px) 25vw, (min-width: 540px) 25vw, (min-width: 320px) 30vw, 35vw" onerror="imgError(this);"/>
                                @else
                                <img class="img-responsive img-figure" src="{{ asset('storage/data/mobil/'.$mobils->foto_mobil)}}" alt="foto" sizes="(min-width: 1280px) 15vw, (min-width: 1024px) 20vw, (min-width: 960px) 25vw, (min-width: 540px) 25vw, (min-width: 320px) 30vw, 35vw" />
                                @endif
                            </figure>
                        </div>
                        @foreach($galeri as $galeris)
                        @if($galeris->foto != "")
                        <div>
                            @php
                                $image_get = storage_path('data/galeri_mobil_600_400/'.$galeris->foto);
                            @endphp
                            @if (file_exists($image_get))
                            <figure class="img-mbl img-mbl-slider effect7">
                                <img class="img-responsive img-figure" src="{{ asset('storage/data/galeri_mobil_600_400/'.$galeris->foto)}}" alt="foto" sizes="(min-width: 1280px) 15vw, (min-width: 1024px) 20vw, (min-width: 960px) 25vw, (min-width: 540px) 25vw, (min-width: 320px) 30vw, 35vw" onerror="imgError(this);"/>
                            </figure>
                            @else
                            <figure class="img-mbl img-mbl-slider effect7">
                                <img class="img-responsive img-figure" src="{{ asset('storage/data/galeri_mobil/'.$galeris->foto)}}" alt="foto" sizes="(min-width: 1280px) 15vw, (min-width: 1024px) 20vw, (min-width: 960px) 25vw, (min-width: 540px) 25vw, (min-width: 320px) 30vw, 35vw" onerror="imgError(this);"/>
                            </figure>
                            @endif
                        </div>
                        @else
                        <div>
                            <figure class="img-mbl img-mbl-slider effect7">
                                <img class="img-responsive img-figure" src="{{ asset('assets/assets/img/car-dummy.jpg')}}" alt="foto" sizes="(min-width: 1280px) 15vw, (min-width: 1024px) 20vw, (min-width: 960px) 25vw, (min-width: 540px) 25vw, (min-width: 320px) 30vw, 35vw" />
                            </figure>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="slider-nav">
                        <div>
                            <img class="img-responsive img-slick-nav" src="{{ asset('storage/data/mobil/'.$mobils->foto_mobil)}}" alt="img" />
                        </div>
                        @foreach($galeri as $galeris)
                        @if($galeris->foto != "")
                        <div>
                            <img class="img-responsive img-slick-nav" src="{{ asset('storage/data/galeri_mobil/'.$galeris->foto)}}" alt="img" />
                        </div>
                        @else
                        <div>
                            <img class="img-responsive img-slick-nav" src="{{ asset('assets/assets/img/car-dummy.jpg')}}" alt="img" />
                        </div>
                        @endif
                        @endforeach
                    </div>

                    {{-- DEskripsi --}}

                    <h3 class="b-head-1__title">Deskripsi <hr class="head"></h3>

                    <p class="detail-p">@php echo $mobils->deskripsi @endphp</p>

                    {{-- end --}}

                    <!-- end .b-thumb-slider-->

                    

                    {{-- <div class="b-car-details__section">

                        <h3 class="b-car-details__section-title ui-title-inner">Car Overview</h3>

                        <div class="b-car-details__section-subtitle">Eiusmod tempor incididunt ut labore et dolore magna aliqua enim ad minim veniam.</div>

                        <p>Motorland nisi aliquip exea consequat duis lorem ipsum dolor sit amet consectetura dipisicing elit dui sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation.

                        Slamco em laborisa aliquip ex ea comdo consequat uis aute irure dolor sraeprehenderit voluptate velit.</p>

                    </div> --}}

                    <ul class="b-car-details__nav nav nav-tabs bg-primary">

                        <li class="active"><a href="#specifications" data-toggle="tab">Spesifikasi</a>

                        </li>

                        <li><a href="#details" data-toggle="tab">Kelengkapan</a>

                        </li>

                        {{-- <li><a href="#contact" data-toggle="tab">contact</a>

                        </li> --}}

                    </ul>

                    <div class="b-car-details__tabs tab-content">

                        <div class="tab-pane active fade in" id="specifications">

                            <p><?php echo $mobils->spesifikasi ?>.</p>

                            {{-- <div class="b-car-details__tabs-title">more features</div>

                            <ul class="list list-mark-5 list_mark-prim list-2-col">

                                <li>Drivetrain Oil Cooler: Auxiliary</li>

                                <li>Engine Alternator: 160 Amps</li>

                                <li>Exterior Mirrors Manual Folding</li>

                                <li>Seatbelts Seatbelt Warning Sensors</li>

                                <li>Front Headrests Adjustable</li>

                                <li>Cruise Control System</li>

                                <li>Crumple Zones Front</li>

                                <li>Roll Stability Control</li>

                                <li>Multi-Function Display</li>

                                <li>ABS Brakes (4-Wheel)</li>

                                <li>Audio System 6 Speakers</li>

                                <li>Electronic Brakeforce Distribution</li>

                            </ul> --}}

                        </div>

                        <div class="tab-pane fade" id="details">

                            <p><?php echo $mobils->kelengkapan ?>.</p>

                        </div>

                    </div>

                    <h3 class="b-head-1__title" style="font-size: 25px;margin: 25px 0px 10px">Mobil yang tersedia dengan kategori yang sama</h3>

                    <hr style="width: 100%;border:1px solid #eeeeee;margin: 12px 0px;">
                    @php
                        $count_mobil_lain = count($mobil_lain);
                    @endphp
                    @if($count_mobil_lain == 0)
                    <div class="row">
                        <div class="col-md-4">
                            <section class="b-head-2">
                                <h6>Tidak ada mobil dengan kategori yang sama</h6>
                            </section>
                        </div>
                    </div>
                    @endif
                    @if($mobil_lain != "" )
                    <div class="row">
                        @foreach($mobil_lain as $datas)
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 lain-height"><a href="{{ url('car-details/'.$datas->id.'/'.$datas->merek) }}" >
                              @if($datas->foto_mobil != "")
                                @php
                                    $image_get = storage_path('data/mobil_300_200/'.$datas->foto_mobil);
                                @endphp
                                @if (file_exists($image_get))
                                <figure class="img-mbl img-mbl-rekomen effect7">
                                    <img class="img-responsive img-figure" src="{{ asset('storage/data/mobil_300_200/'.$datas->foto_mobil) }}" alt="foto" sizes="(min-width: 1280px) 15vw, (min-width: 1024px) 20vw, (min-width: 960px) 25vw, (min-width: 540px) 25vw, (min-width: 320px) 30vw, 35vw" onerror="imgError(this);"/>
                                </figure>
                                @else
                                <figure class="img-mbl img-mbl-rekomen effect7">
                                    <img class="img-responsive img-figure" src="{{ asset('storage/data/mobil/'.$datas->foto_mobil) }}" alt="foto" sizes="(min-width: 1280px) 15vw, (min-width: 1024px) 20vw, (min-width: 960px) 25vw, (min-width: 540px) 25vw, (min-width: 320px) 30vw, 35vw" onerror="imgError(this);"/>
                                </figure>
                                @endif
                              @else
                                <figure class="img-mbl img-mbl-rekomen effect7">
                                    <img class="img-responsive img-figure" src="{{ asset('assets/assets/img/car-dummy.jpg') }}" alt="foto" sizes="(min-width: 1280px) 15vw, (min-width: 1024px) 20vw, (min-width: 960px) 25vw, (min-width: 540px) 25vw, (min-width: 320px) 30vw, 35vw" />
                                </figure>
                              @endif
                              <h4 class="b-head-2__title">{{ $datas->tahun." ".$datas->merek." ".$datas->model." "}} {{ $datas->transmisi == "A" ? '(A/T)' : '(M/T)' }}</h4>
                            </a>
                        </div>
                        @endforeach
                    </div>
                  @endif

          </section>



      </div>

      <div class="col-md-4 col-sm-6">

        <aside class="l-sidebar-2">

            <div class="b-car-info">
                
                @if(is_numeric($mobils->harga))
                <div class="b-car-info__price">{{ number_format($mobils->harga, 0, ".", ".") }}
                </div>
                @else
                <div class="b-car-info__price">{{ $mobils->harga }}
                </div>
                @endif

                <div class="b-car-info__item">

                    {{-- <div class="col-md-4">

                        <img class="img-responsive" src="{{ asset('assets/assets/media/content/user/user.png') }}">

                    </div>

                    <div class="col-md-8" style="margin-top: 10px;">

                        <span class="b-car-info__item-name">
                            <span class="b-car-info__item-info_sm"> Kontak Penjual <br><span class="nomer-detail"> +{{ $data_setting->no_telp }}</span></span>

                        </span>

                    </div> --}}
                    <div class="col-md-12" style="padding-bottom:15px;text-align:center">
                        <img class="normal-logo" src="{{ asset('assets/asset-new/PARLOGO2.png') }}" alt="logo" width="80%" />
                    </div>

                    <div class="col-md-12" style="padding-top: 20px;">
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
                        <a href="https://api.whatsapp.com/send?phone={{ $data_setting->no_telp }}&text=Halo%20saya%20ingin%20menanyakan%20mobil%2C%20%20%20Tipe%20%3A%20{{ $nama_mobil }}%20Link%20%3A%20{{ url('car-details').'/'.$mobils->id.'/'.$mobils->merek }}"><button class="list-btn faded-green b-radius"><img class="detail-img" src="{{ asset('assets/assets/media/content/icon/phone-compact.png') }}">  &nbsp;Hubungi Kami</button></a>

                        {{-- <button class="list-btn light-green b-radius"><img class="detail-img" src="{{ asset('assets/assets/media/content/icon/whatsapp-compact.png') }}">  &nbsp;Whatsapp Penjual</button> --}}

                    </div>

                </div>
                <div class="b-car-info__item">
                    <dl class="b-car-info__desc dl-horizontal bg-grey">

                        <dt class="b-car-info__desc-dt">Merek</dt>

                        <dd class="b-car-info__desc-dd">{{ $mobils->merek}}</dd>

                        <dt class="b-car-info__desc-dt">NO Pol</dt>

                        <dd class="b-car-info__desc-dd">{{ $mobils->no_pol }}</dd>

                        <dt class="b-car-info__desc-dt">Model</dt>

                        <dd class="b-car-info__desc-dd">{{ $mobils->model}}</dd>

                        {{-- <dt class="b-car-info__desc-dt">Varian</dt>

                        <dd class="b-car-info__desc-dd">{{ $mobils->varian}}</dd> --}}

                        <dt class="b-car-info__desc-dt">Tahun</dt>

                        <dd class="b-car-info__desc-dd">{{ $mobils->tahun}}</dd>

                        <dt class="b-car-info__desc-dt">Cakupan Mesin</dt>

                        <dd class="b-car-info__desc-dd">{{ $mobils->cakupan_mesin." cc"}}</dd>

                        {{-- <dt class="b-car-info__desc-dt">Penumpang</dt>

                        <dd class="b-car-info__desc-dd">{{ $mobils->kuota }}</dd> --}}

                        <dt class="b-car-info__desc-dt">Kilometer</dt>

                        <dd class="b-car-info__desc-dd">{{$mobils->kilometer}} KM</dd>

                        <dt class="b-car-info__desc-dt">Warna</dt>

                        <dd class="b-car-info__desc-dd">{{ $mobils->warna}}</dd>

                        <dt class="b-car-info__desc-dt">Bahan Bakar</dt>

                        <dd class="b-car-info__desc-dd">{{ $mobils->bahan_bakar}}</dd>

                    </dl>


                </div>
                    {{-- <div class="b-car-info__item"><span class="b-car-info__item-name"><i class="icon flaticon-car"></i> Vehicle Demand</span>

                        <div class="b-car-info__item-inner"><span class="b-car-info__item-info">HIGH</span>

                        </div>

                    </div> --}}

                    <!-- end .b-banner-->

                </div>

            </aside>

        </div>

    </div>

</div>
@endforeach

<!-- end .b-car-details-->

{{-- <section class="section-default_top">

    <div class="container">

        <div class="row">

            <div class="col-xs-12">

                <h2 class="ui-title-block">Related Cars</h2>

                <div class="ui-decor"></div>

                <div class="related-carousel owl-carousel owl-theme owl-theme_w-btn enable-owl-carousel" data-min768="2" data-min992="3" data-min1200="3" data-margin="30" data-pagination="false" data-navigation="true" data-auto-play="4000" data-stop-on-hover="true">

                    <div class="b-goods-feat">

                        <div class="b-goods-feat__img">

                            <img class="img-responsive" src="assets/media/components/b-goods/featured-1.jpg" alt="foto" /><span class="b-goods-feat__label">$45,000<span class="b-goods-feat__label_msrp">MSRP $27,000</span></span>

                        </div>

                        <ul class="b-goods-feat__desc list-unstyled">

                            <li class="b-goods-feat__desc-item">35,000 mi</li>

                            <li class="b-goods-feat__desc-item">Model: 2017</li>

                            <li class="b-goods-feat__desc-item">Auto</li>

                            <li class="b-goods-feat__desc-item">320 hp</li>

                        </ul>

                        <h3 class="b-goods-feat__name"><a href="car-details.html">Lexus GX 490i Hybird</a></h3>

                        <div class="b-goods-feat__info">Duis aute irure reprehender voluptate velit ese acium fugiat nulla pariatur excepteur ipsum.</div>

                    </div>

                    <!-- end .b-goods-featured-->

                    <div class="b-goods-feat">

                        <div class="b-goods-feat__img">

                            <img class="img-responsive" src="assets/media/components/b-goods/featured-2.jpg" alt="foto" /><span class="b-goods-feat__label">$45,000<span class="b-goods-feat__label_msrp">MSRP $27,000</span></span>

                        </div>

                        <ul class="b-goods-feat__desc list-unstyled">

                            <li class="b-goods-feat__desc-item">35,000 mi</li>

                            <li class="b-goods-feat__desc-item">Model: 2017</li>

                            <li class="b-goods-feat__desc-item">Auto</li>

                            <li class="b-goods-feat__desc-item">320 hp</li>

                        </ul>

                        <h3 class="b-goods-feat__name"><a href="car-details.html">Toyota Avalon TX</a></h3>

                        <div class="b-goods-feat__info">Duis aute irure reprehender voluptate velit ese acium fugiat nulla pariatur excepteur ipsum.</div>

                    </div>

                    <!-- end .b-goods-featured-->

                    <div class="b-goods-feat">

                        <div class="b-goods-feat__img">

                            <img class="img-responsive" src="assets/media/components/b-goods/featured-3.jpg" alt="foto" /><span class="b-goods-feat__label">$45,000<span class="b-goods-feat__label_msrp">MSRP $27,000</span></span>

                        </div>

                        <ul class="b-goods-feat__desc list-unstyled">

                            <li class="b-goods-feat__desc-item">35,000 mi</li>

                            <li class="b-goods-feat__desc-item">Model: 2017</li>

                            <li class="b-goods-feat__desc-item">Auto</li>

                            <li class="b-goods-feat__desc-item">320 hp</li>

                        </ul>

                        <h3 class="b-goods-feat__name"><a href="car-details.html">Lexus GX 490i Hybird</a></h3>

                        <div class="b-goods-feat__info">Duis aute irure reprehender voluptate velit ese acium fugiat nulla pariatur excepteur ipsum.</div>

                    </div>

                    <!-- end .b-goods-featured-->

                    <div class="b-goods-feat">

                        <div class="b-goods-feat__img">

                            <img class="img-responsive" src="assets/media/components/b-goods/featured-4.jpg" alt="foto" /><span class="b-goods-feat__label">$45,000<span class="b-goods-feat__label_msrp">MSRP $27,000</span></span>

                        </div>

                        <ul class="b-goods-feat__desc list-unstyled">

                            <li class="b-goods-feat__desc-item">35,000 mi</li>

                            <li class="b-goods-feat__desc-item">Model: 2017</li>

                            <li class="b-goods-feat__desc-item">Auto</li>

                            <li class="b-goods-feat__desc-item">320 hp</li>

                        </ul>

                        <h3 class="b-goods-feat__name"><a href="car-details.html">Lexus GX 490i Hybird</a></h3>

                        <div class="b-goods-feat__info">Duis aute irure reprehender voluptate velit ese acium fugiat nulla pariatur excepteur ipsum.</div>

                    </div>

                    <!-- end .b-goods-featured-->

                    <div class="b-goods-feat">

                        <div class="b-goods-feat__img">

                            <img class="img-responsive" src="assets/media/components/b-goods/featured-5.jpg" alt="foto" /><span class="b-goods-feat__label">$45,000<span class="b-goods-feat__label_msrp">MSRP $27,000</span></span>

                        </div>

                        <ul class="b-goods-feat__desc list-unstyled">

                            <li class="b-goods-feat__desc-item">35,000 mi</li>

                            <li class="b-goods-feat__desc-item">Model: 2017</li>

                            <li class="b-goods-feat__desc-item">Auto</li>

                            <li class="b-goods-feat__desc-item">320 hp</li>

                        </ul>

                        <h3 class="b-goods-feat__name"><a href="car-details.html">Lexus GX 490i Hybird</a></h3>

                        <div class="b-goods-feat__info">Duis aute irure reprehender voluptate velit ese acium fugiat nulla pariatur excepteur ipsum.</div>

                    </div>

                    <!-- end .b-goods-featured-->

                </div>

                <!-- end .related-carousel-->

            </div>

        </div>

    </div>

</section> --}}

<!-- end .section-default_top-->

</main>

@stop



@section('js')
<script>
    function imgError(image) {
      image.onerror = "";
      image.src = "{{ url('') }}" + "/assets/assets/img/car-dummy.jpg";
      return true;
    }
    </script>
@stop

