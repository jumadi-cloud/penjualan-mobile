@extends('Frontend.layout.app')

@section('title')
Home
@stop



@section('css')
<style type="">

        .list-rekomendasi img{
            width: 30px;
        }
    .owl-theme {
  max-width: 1920px;
  margin-right: auto;
  margin-left: auto;
}

.owl-theme .owl-dots {
  position: absolute;
  right: 0;
  bottom: 0;
  width: 100%;
  text-align: center;
}

.owl-theme .owl-dots .owl-dot {
  position: relative;
  display: inline-block;
  width: 12px;
  height: 12px;
  margin: 0 5px;
  -webkit-transition: all .3s;
  transition: all .3s;
  vertical-align: middle;
  border: 1px solid #ccc;
  border-radius: 50%;
  background-color: white;
}

.owl-theme .owl-dots .owl-dot span {
  position: absolute;
  top: 50%;
  left: 50%;
  display: block;
  width: 0;
  height: 0;
  -webkit-transition: all .3s;
  transition: all .3s;
  border-radius: 50%;
  background-color: transparent;
}

.owl-theme .owl-dots .owl-dot.active, .owl-theme .owl-dots .owl-dot:hover {
  width: 18px;
  height: 18px;
}

.owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span {
  width: 8px;
  height: 8px;
  margin-top: -4px;
  margin-left: -4px;
}

.owl-theme .owl-nav {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
}

.owl-theme .owl-nav div {
  display: inline-block;
  width: 40px;
  height: 40px;
  margin: 0 2px;
  font: normal normal 18px FontAwesome;
  line-height: 36px;
  -webkit-transition: all .3s;
  transition: all .3s;
  text-align: center;
  vertical-align: middle;
  opacity: .5;
  color: #fff;
  border: 1px solid #ddd;
  border-radius: 2px;
}

.owl-theme .owl-nav div:hover {
  opacity: 1;
  background-color: #222;
}

.owl-theme .owl-nav div:hover:after {
  border-top-color: #fff;
  border-left-color: #fff;
}

.owl-theme .owl-nav .owl-prev:after, .owl-theme .owl-nav .owl-next:after {
  display: inline-block;
  width: 10px;
  height: 10px;
  content: '';
  -webkit-transition: all .3s;
  transition: all .3s;
  border-top: 2px solid #000;
  border-left: 2px solid #000;
}

.owl-theme .owl-nav .owl-prev:after {
  margin-left: 5px;
  -webkit-transform: rotate(-45deg);
          transform: rotate(-45deg);
}

.owl-theme .owl-nav .owl-next:after {
  margin-right: 3px;
  -webkit-transform: rotate(135deg);
          transform: rotate(135deg);
}

.owl-theme_w-btn {
  padding-bottom: 105px;
}

.owl-theme_mod-arrs .owl-nav {
  top: 50%;
  bottom: auto;
  margin-top: -25px;
}

.owl-theme_mod-arrs .owl-nav div {
  width: 50px;
  height: 50px;
  line-height: 50px;
  opacity: 1;
  border: none;
  border-radius: 2px;
  background-color: rgba(0, 0, 0, 0.2);
}

.owl-theme_mod-arrs .owl-nav .owl-prev, .owl-theme_mod-arrs .owl-nav .owl-next {
  position: absolute;
  top: 0;
  display: block;
}

.owl-theme_mod-arrs .owl-nav .owl-prev {
  left: 20px;
}

.owl-theme_mod-arrs .owl-nav .owl-next {
  right: 20px;
}

.owl-theme_mod-arrs .owl-nav .owl-prev:after, .owl-theme_mod-arrs .owl-nav .owl-next:after {
  width: 15px;
  height: 15px;
  border-top: 4px solid #fff;
  border-left: 4px solid #fff;
}

.related-carousel {
  margin-top: 40px;
}

.owl-carousel .owl-item img {
    display: block;
    width: 100%;
}

.top-search{
  margin-bottom: 60px;
  margin-top: -190px;
}

.b-team-2__name {
    margin-top: 5px !important;
    margin-bottom: 0px !important;
    font-size: 18px !important;
    letter-spacing: normal !important;
    text-transform: none !important;
    text-align: left;
    color: #205aa7 !important;
    min-height: 49px;
    font-family: sfui;
}

.b-team-2__category {
    font: 600 12px Poppins;
        font-size: 12px;
    color: #888;
    text-align: left !important;
    font-size: 16px !important;
    color: #ff0a35 !important;
}

.team-carousel-2{
  padding-top: 10px !important;
}

.owl-theme_w-btn {
    padding-bottom: 30px !important;
}

.owl-carousel .owl-item img{
    height: 150px;
}

@media (min-width: 1025px) and (max-width: 1199px) {
  
  .owl-carousel .owl-item img{
      height: 240px !important;
  }
  
}

@media (min-width: 320px) and (max-width: 480px) {
  
  .owl-carousel .owl-item img{
      height: 210px !important;
  }

  .b-team-2__name {
    min-height: auto !important;
  }

  .img-merk{
    width: 75%;
    margin: 0px 15% !important;
  }
  
}

@media (min-width: 768px) and (max-width: 1024px) {
  
  .owl-carousel .owl-item img{
      height: 210px !important;
  }

  .b-team-2__name {
    min-height: auto !important;
  }
  
}

@media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {
  
  .owl-carousel .owl-item img{
      height: 270px !important;
  }

  .b-team-2__name {
    min-height: auto !important;
  }
  
}

@media (min-width: 481px) and (max-width: 767px) {
.owl-carousel .owl-item img{
    height: 330px !important;
}
  
}


.badge-hot{
  width: 60px;
}

.no-padding{
  margin: 0px !important;
  padding: 0px !important;
}

.badge-deal{
  width: auto !important;
  font-size: 12px !important;
  padding: 3px 4px !important;
  margin-right: 4px !important;
  margin-left: 15px;
}
.sp-image{
  width: 100% !important;
}

@media (max-width: 767px) {
  
  .main-slider-2 {
      margin-top: 85px !important;
  }

  .top-search{
    margin-top: 0px !important;
  }

  
}

@media (max-width: 990px) {
  .section-advantages-2{
    padding-top: 0px !important;
  }
}

.section-klien {
    padding-top: 10px !important;
}

.section-merek{
  z-index: 0;
}
.slider-home{
  margin-top: 85px;
}
/* .owl-item.active{
  width: 250px !important;
} */
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
    .img-mbl{
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

.pdf-laporan{
  border: 2px solid gray;
  /* margin-left: 20px; */
  max-height: 527px;
  min-height: 527px;
  max-width: 374px;
  min-width: 374px;
}

a.fill-div {
    display: block;
    height: 100%;
    width: 100%;
    text-decoration: none;
    z-index: 99;
}

</style>
<style>
  .pdfobject-container { height: 30rem; border: 1rem solid rgba(0,0,0,.1); }
</style>
@stop



@section('slider')
{{-- <div class="main-slider main-slider-2">
  <div class="slider-pro" id="main-slider" data-slider-width="100%" data-slider-height="700px" data-slider-arrows="true" data-slider-buttons="false">
    <div class="entry-media">
        <div class="owl-carousel owl-theme owl-theme_mod-arrs enable-owl-carousel" data-pagination="false" data-navigation="true" data-items="1" data-auto-play="7000" data-transition-style="fade" data-main-text-animation="true" data-after-init-delay="3000" data-after-move-delay="1000"
        data-stop-on-hover="true">
        @foreach($slider as $sliders)
            <div class="sp-slides">
              <img class="sp-image" src="{{ asset('storage/data/slider/'.$sliders->foto) }}" alt="Foto" />
            </div>
        @endforeach
        </div>
    </div>
  </div>
</div> --}}
{{-- <div class="main-slider main-slider-2">
    <div class="slider-pro" id="main-slider" data-slider-width="100%" data-slider-height="700px" data-slider-arrows="true" data-slider-buttons="false">
        <div class="sp-slides">
            @foreach($slider as $sliders)
            <div class="sp-slide">
                <img class="sp-image" src="{{ asset('storage/data/slider/'.$sliders->foto) }}" alt="slider" />
            </div>
            @endforeach
        </div>
    </div>
</div> --}}
<div class="slider-home">
    @foreach($slider as $sliders)
     <div> <img class="sp-image" src="{{ asset('storage/data/slider/'.$sliders->foto) }}" alt="slider" /></div>
    @endforeach
</div>
@stop



@section('content')
{{-- FILTER --}}
<section class="section-dark area-bg parallax top-search">
    <div class="area-bg__inner">
        <div class="container b-advantages-2" style="border-radius: 15px;">
            <div class="row">  
                <form method="get" action="{{ url('searchFilter') }}">
                    <div class="col-md-4 col-sm-6">
                        <select class="selectpicker" data-width="100%" name="tipeMobilFilter" id='merek' >
                            <option selected="" disabled="">Jenis Kendaraan</option>
                            <option value="">Semua Jenis Kendaraan</option>
                            @foreach ($master_jenis as $key => $value)
                              <option value="{{ $key }}"> 
                                {{ $value }}
                              </option>
                            @endforeach
                        </select>
                        <select class="selectpicker" data-width="100%" name="lokasiFilter" id='merek' >
                            <option selected="" disabled="">Lokasi</option>
                            <option value="">Semua Lokasi</option>
                            @foreach ($master_lokasi as $key => $value)
                              <option value="{{ $key }}"> 
                                {{ $value }}
                              </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <select class="selectpicker" data-width="100%" name="merekFilter" id='merek' >
                            <option selected="" disabled="">Merk</option>
                            <option value="">Semua Merk</option>
                            @foreach ($master_merk as $key => $value)
                              <option value="{{ $key }}"> 
                                {{ $value }}
                              </option>
                            @endforeach
                        </select>
                        <select class="selectpicker" data-width="100%" name="tahunFilter" id='tahun'>
                        <option selected="" disabled="">Tahun</option>
                        <option value="">Semua Tahun</option>
                            @foreach ($master_tahun as $key => $value)
                              <option value="{{ $key }}"> 
                                {{ $value }}
                              </option>
                            @endforeach
                    </select>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <select class="selectpicker" data-width="100%" name="modelFilter" id='merek' >
                            <option selected="" disabled="">Model</option>
                            <option value="">Semua Model</option>
                            @foreach ($master_model as $key => $value)
                              <option value="{{ $key }}"> 
                                {{ $value }}
                              </option>
                            @endforeach
                        </select>


                    {{-- <div class="b-filter__btns"> --}}
                        <button type="submit" class="btn btn-lg btn-primary" style="width: 100%;background-color: #7ED501;">Search</button>{{-- <a class="btn-link" href="#">ADVANCED SEARCH</a> --}}
                    {{-- </div> --}}
                </div>
            </form>
        </div> 
    </div>
</div>
</section>

{{-- END FILTER --}}

{{-- MEREK --}}

<section class="section-advantages-2 section-dark area-bg parallax section-merek" >
    <div class="area-bg__inner">
        <div class="container">
            <h3 class="b-head-1__title">Merek Populer <hr class="head"></h3>
        </div>
    </div>
</section>
<section class="section-dark area-bg parallax section-merek" {{-- style="background-image: url({{ asset('assets/assets/media/content/bg/bg-1.jpg') }})" --}}>
    {{-- <h3 class="b-advantages-1__title">Largest Dealership of Cars</h3> --}}
    <div class="area-bg__inner">
        <div class="container">
            <div class="row">
                @foreach($merek as $mereks)
                <div class="col-md-2 col-xs-6 col-sm-4 text-align-center" style="padding: 1% 3%;">
                    <a href="{{ url('searchFilter?merekFilter='.$mereks->merek)}}">
                        <img class="img-responsive img-merk" src="{{ asset('storage/data/merek/'.$mereks->foto_merek) }}" alt="Foto" />
                    </a>
                </div>
                @endforeach
            </div>
            {{-- <img class="img-responsive" src="{{ asset('assets/assets/media/content/posts/merek/Component-2.png') }}" alt="Foto" /> --}}
        </div>
    </div>
</section>

{{-- END MEREK --}}

{{-- Rekomendasi --}}


<section class="section-dark area-bg parallax" style="margin-bottom: 2%;margin-top:15px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                {{-- <div class="text-center"> --}}
                    <h3 class="b-head-1__title">Mobil Rekomendasi <hr class="head"></h3>
                {{-- </div> --}}
            </div>
        </div>
    </div>
    <div class="container" >
       {{--  <div class="featured-carousel owl-carousel owl-theme owl-theme_w-btn enable-owl-carousel" data-min768="2" data-min992="3" data-min1200="5" data-margin="30" data-pagination="false" data-navigation="true" data-auto-play="3000" data-stop-on-hover="true">
            @foreach($mobil_rekomendasi as $rekomendasi)
                <div class="b-goods-feat">
                    <a href="{{ 'car-details/'.$rekomendasi->id.'/'.$rekomendasi->merek}}">
                    <div class="b-goods-feat__img">
                        @if($rekomendasi->foto_mobil != "")
                        <img class="img-responsive" src="{{ asset('storage/data/mobil/'.$rekomendasi->foto_mobil) }}" alt="foto" />
                        @else
                        <img class="img-responsive" src="{{ asset('assets/assets/img/car-dummy.jpg') }}" alt="foto" />                        @endif
                    </div>
                <div style="margin-top: 2%;">
                <h3 class="b-goods-feat__name" style="font-size: 22px;">{{ $rekomendasi->tahun." ".$rekomendasi->merek." ".$rekomendasi->model}}</strong></h3>
                <h3 class="b-goods-feat__info" style="color: #d01818">{{ "Rp. ". number_format($rekomendasi->harga, 0, ".", ".")}}</h3>
                </div>
                </a>
            </div>
        @endforeach --}}
        <div class="team-carousel-2 owl-carousel owl-theme owl-theme_w-btn enable-owl-carousel" data-min768="2" data-min992="3" data-min1200="5" data-margin="30" data-pagination="false" data-navigation="false" data-auto-play="4000" data-stop-on-hover="true">
            @foreach($mobil_rekomendasi as $rekomendasi)
            <section class="b-team-2">
              <a href="{{ url('car-details/'.$rekomendasi->id.'/'.$rekomendasi->merek)}}">
                <div class="b-team-2__media">
                    <figure class="img-mbl">
                      @php
                          $image_get = storage_path('data/mobil_300_200/'.$rekomendasi->foto_mobil);
                      @endphp
                      @if (file_exists($image_get))
                      <img class="img-responsive img-figure" src="{{ asset('storage/data/mobil_300_200/'.$rekomendasi->foto_mobil) }}" alt="foto" sizes="(min-width: 1280px) 15vw, (min-width: 1024px) 20vw, (min-width: 960px) 25vw, (min-width: 540px) 25vw, (min-width: 320px) 30vw, 35vw" onerror="imgError(this);"/>
                      @else
                      <img class="img-responsive img-figure" src="{{ asset('storage/data/mobil/'.$rekomendasi->foto_mobil) }}" alt="foto" sizes="(min-width: 1280px) 15vw, (min-width: 1024px) 20vw, (min-width: 960px) 25vw, (min-width: 540px) 25vw, (min-width: 320px) 30vw, 35vw" onerror="imgError(this);"/>
                      @endif
                  </figure>
                </div>
                <h3 class="b-team-2__name">{{ $rekomendasi->tahun." ".$rekomendasi->merek." ".$rekomendasi->model}}</h3>
                <div class="row">
                  {{-- <div class="col-md-5 col-xs-4 no-padding">
                      <span class="badge-deal hidden-th"><img class="list-img" src="{{ asset('assets/assets/media/content/icon/thumbs-up-compact.png') }}" style="height: 10px !important;width: 10px !important;">&nbsp;Hot deals</span>
                  </div> --}}
                  <div class="col-md-12 col-xs-12 no-padding">
                      <span class="badge-deal hidden-th"><img class="list-img" src="{{ asset('assets/assets/media/content/icon/thumbs-up-compact.png') }}" style="height: 10px !important;width: 10px !important;">&nbsp;Hot deals</span>
                      @if(is_numeric($rekomendasi->harga))
                      <div class="b-team-2__category">{{ "Rp ". number_format($rekomendasi->harga, 0, ".", ".")}}</div>
                      @else
                      <div class="b-team-2__category">{{ "Rp ". $rekomendasi->harga }}</div>
                      @endif
                  </div>
                </div>
                </a>
            </section>
            @endforeach
        </div>
        <!-- end .b-goods-featured-->
    </div>
</div>
<!-- end .featured-carousel-->
</section>




{{-- END REKOMENDASi --}}

{{-- CLIENT  --}}
<section class="section-dark area-bg parallax section-merek" >
    <div class="area-bg__inner">
        <div class="container">
            <h3 class="b-head-1__title">Klien Kami <hr class="head"></h3>
        </div>
    </div>
</section>

<section class="section-advantages-2 section-dark area-bg parallax section-klien" {{-- style="background-image: url({{ asset('assets/assets/media/content/bg/bg-1.jpg') }})" --}} >
    {{-- <h3 class="b-advantages-1__title">Largest Dealership of Cars</h3> --}}
  <div class="container">
    <img class="img-responsive" src="{{ asset('assets/asset-new/klien-min.jpg') }}" alt="Foto" style="margin-bottom: 2%;width:100%" />

    {{-- <div class="area-bg__inner">

        <div class="container">



        </div>
    </div> --}}
  </div>
</section>

{{-- END CLIENT --}}

{{-- Laporan Tahunan  --}}
<section class="section-dark area-bg parallax section-merek" >
  <div class="area-bg__inner">
      <div class="container">
          <h3 class="b-head-1__title">Laporan Tahunan <hr class="head"></h3>
      </div>
  </div>
</section>

<section class="team-carousel-2">
  <div class="container">
    <div class="row">
      @foreach ($pdf as $key => $pdfs)
      <div class="col-md-4 text-center">
        <a href="{{ url('storage/data/pdf/'.$pdfs->pdf) }}" target="_blank">
          <canvas class="pdf-laporan" id="pdf-canvas{{ $key }}" width="370"></canvas>
        </a>
        <b>{{ $pdfs->name }}</b>
      </div>
      @endforeach
    </div>
  </div>
</section>
@stop



@section('js')
<script>
  function redirectRow(url){
      location.href = url;
  }
</script>
<script>
  function imgError(image) {
    image.onerror = "";
    image.src = "{{ url('') }}" + "/assets/assets/img/car-dummy.jpg";
    return true;
  }
  </script>
  {{-- <script src="{{ asset('assets/assets/js/pdfobject.js') }}"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.2.228/pdf.min.js"></script>
  <script>
  @foreach ($pdf as $key => $pdfs)
  showPDF{{ $key }}('{{ asset('') }}storage/data/pdf/{{ $pdfs->pdf }}','#pdf-canvas{{ $key }}');
  @endforeach
  // showPDF2('http://localhost/patramobil/storage/data/pdf/form.pdf','#pdf-canvas2');

  // initialize and load the PDF
    // async function showPDF(pdf_url,canvas,no) {
    //     // get handle of pdf document
        
    //     // show the first page
    //     showPage(1,canvas);
    // }

  // load and render specific page of the PDF
  @foreach ($pdf as $key => $pdfs)
  async function showPDF{{ $key }}(pdf_url,canvas) {
      var _PDF_DOC{{ $key }};
      _CANVAS{{ $key }} = document.querySelector(canvas);
      try {
          _PDF_DOC{{ $key }} = await pdfjsLib.getDocument({ url: pdf_url });
      }
      catch(error) {
          alert(error.message);
      }

      var page_no = 1;
      
      // get handle of page
      try {
          var page = await _PDF_DOC{{ $key }}.getPage(page_no);
      }
      catch(error) {
          alert(error.message);
      }

      // original width of the pdf page at scale 1
      var pdf_original_width = page.getViewport(1).width;
      
      // as the canvas is of a fixed width we need to adjust the scale of the viewport where page is rendered
      var scale_required = _CANVAS{{ $key }}.width / pdf_original_width;

      // get viewport to render the page at required scale
      var viewport = page.getViewport(scale_required);

      // set canvas height same as viewport height
      _CANVAS{{ $key }}.height = viewport.height;

      var render_context = {
          canvasContext: _CANVAS{{ $key }}.getContext('2d'),
          viewport: viewport
      };
          
      // render the page contents in the canvas
      try {
          await page.render(render_context);
      }
      catch(error) {
          alert(error.message);
      }
  }
  @endforeach
</script>
{{-- <script>
PDFObject.embed("http://www.africau.edu/images/default/sample.pdf", "#pdf1");
</script> --}}
{{-- <!-- Slider-->
<script src="{{ asset('assets/assets/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
<!-- NoUiSlider-->
<script src="{{ asset('assets/assets/plugins/noUiSlider/nouislider.min.js') }}"></script>
<script src="{{ asset('assets/assets/plugins/noUiSlider/wNumb.js') }}"></script>
<!-- Animations-->
<script src="{{ asset('assets/assets/plugins/scrollreveal/scrollreveal.min.js') }}"></script>
<!-- Main slider-->
<script src="{{ asset('assets/assets/plugins/slider-pro/jquery.sliderPro.min.js') }}"></script>  --}}
@stop

