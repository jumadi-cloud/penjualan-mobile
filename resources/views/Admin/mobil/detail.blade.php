@extends('Admin.layout.layout_index_admin')



@section('title')

Detail Mobil

@stop

@section('css')
<style type="">
  .x_panel_box{
    -webkit-box-shadow: -1px 2px 22px -12px rgba(0,0,0,0.75);
    -moz-box-shadow: -1px 2px 22px -12px rgba(0,0,0,0.75);
    box-shadow: -1px 2px 22px -12px rgba(0,0,0,0.75);
    font-weight: 450;
    font-size: 16px;
    padding: 3%;
    text-transform: uppercase;
  }
  .row-detail{
    margin-top: 1%;
  }
</style>
@stop


@section('content')

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>@yield('title')</h3>
      </div>

      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <!--       <h2>Form Design <small>different form elements</small></h2> -->
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                      <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li> -->
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    
                    @foreach($mobil as $mobils)
                    <div class="col-md-6 col-sm-6 col-xs-12  ">
                      <div class="x_panel_box"> 
                        <img src="{{ asset('storage/data/mobil/'.$mobils->foto_mobil) }}" class="img-responsive">
                        <div class="row row-detail">
                          <div class="col-md-12"><h1>  {{ "Rp. ". number_format($mobils->harga, 0, ".", ".") }}</h1></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12  ">
                      <div class="x_panel_box"> 
                        <div class="row row-detail">
                          <div class="col-md-4">Merek</div>
                          <div class="col-md-1">:</div>
                          <div class="col-md-6">{{ $mobils->merek}}</div>
                        </div> 
                        <div class="row row-detail">
                          <div class="col-md-4">Model</div>
                          <div class="col-md-1">:</div>
                          <div class="col-md-6">{{ $mobils->model}}</div>
                        </div> 
                        <div class="row row-detail">
                          <div class="col-md-4">No Pol</div>
                          <div class="col-md-1">:</div>
                          <div class="col-md-6">{{ $mobils->no_pol}}</div>
                        </div> 
                        <div class="row row-detail">
                          <div class="col-md-4">Varian</div>
                          <div class="col-md-1">:</div>
                          <div class="col-md-6">{{ $mobils->varian}}</div>
                        </div> 
                        <div class="row row-detail">
                          <div class="col-md-4">Warna</div>
                          <div class="col-md-1">:</div>
                          <div class="col-md-6">{{ ucwords($mobils->warna)}}</div>
                        </div>
                        <div class="row row-detail">
                          <div class="col-md-4">Tahun</div>
                          <div class="col-md-1">:</div>
                          <div class="col-md-6">{{ $mobils->tahun}}</div>
                        </div>
                        <div class="row row-detail">
                          <div class="col-md-4">Lokasi</div>
                          <div class="col-md-1">:</div>
                          <div class="col-md-6">{{ $mobils->lokasi}}</div>
                        </div>
                        <div class="row row-detail">
                          <div class="col-md-4">No Telp</div>
                          <div class="col-md-1">:</div>
                          <div class="col-md-6">{{ $mobils->no_telp}}</div>
                        </div>
                        <div class="row row-detail">
                          <div class="col-md-4">Tipe Promo</div>
                          <div class="col-md-1">:</div>
                          <div class="col-md-6">{{ ucwords($mobils->tipe_promo)}}</div>
                        </div>
                        <div class="row row-detail">
                          <div class="col-md-4">Kapasitas</div>
                          <div class="col-md-1">:</div>
                          <div class="col-md-6">{{ $mobils->kuota}}</div>
                        </div> 
                        <div class="row row-detail">
                          <div class="col-md-4">Kilometer</div>
                          <div class="col-md-1">:</div>
                          <div class="col-md-6">{{ $mobils->kilometer." KM"}}</div>
                        </div> 
                        <div class="row row-detail">
                          <div class="col-md-4">Bahan Bakar</div>
                          <div class="col-md-1">:</div>
                          <div class="col-md-6">{{ $mobils->bahan_bakar}}</div>
                        </div> 
                        <div class="row row-detail">
                          <div class="col-md-4">Transmisi</div>
                          <div class="col-md-1">:</div>
                          @if($mobils->transmisi == "A")
                          <div class="col-md-6">{{ 'Auto' }}</div>
                          @elseif($mobils->transmisi == "M")
                          <div class="col-md-6">{{ 'Manual'}}</div>
                          @else
                          <div class="col-md-6">-</div>
                          @endif
                        </div>
                        <div class="row row-detail">
                          <div class="col-md-4">Cakupan Mesin</div>
                          <div class="col-md-1">:</div>
                          <div class="col-md-6">{{ $mobils->cakupan_mesin}}</div>
                        </div>
                        <div class="row row-detail">
                          <div class="col-md-4">Kondisi</div>
                          <div class="col-md-1">:</div>
                          <div class="col-md-6">{{ $mobils->kondisi}}</div>
                        </div>
                        <div class="row row-detail">
                          <div class="col-md-4">Spesifikasi</div>
                          <div class="col-md-1">:</div>
                          <div class="col-md-6">{{ ucwords($mobils->spesifikasi)}}</div>
                        </div>
                        <div class="row row-detail">
                          <div class="col-md-4">Kelengkapan</div>
                          <div class="col-md-1">:</div>
                          <div class="col-md-6">{{ $mobils->kelengkapan }}</div>
                        </div>
                        <div class="row row-detail">
                          <div class="col-md-4">Deskripsi</div>
                          <div class="col-md-1">:</div>
                          <div class="col-md-6">{{ $mobils->deskripsi}}</div>
                        </div>
                      </div>
                    </div>{{-- 
                    <div class="col-md-6 col-sm-6 col-xs-12  ">
                      <div class="x_panel_box"> 


                      </div>
                    </div> --}}
                    
                    @endforeach

{{--                     <div class="ln_solid"></div> --}}
                    <div class="" style="margin-top: 3%;">
                      <div class="col-md-12 col-sm-6 col-xs-12 ">
                        <a href="{{ 'data-mobil' }} "><button class="btn btn-primary" type="button">Kembali</button></a>
                          {{-- <button class="btn btn-info" type="reset">Bersihkan</button>
                          <button type="submit" class="btn btn-success">Simpan</button> --}}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>


        @stop

        @section('js')
        <script>
          $('#selMerek').change(function() {
            var merek =  $('#selMerek option:selected').attr('merek');
            $('#namamerek').val(merek);
          });
          $('#selTipe').change(function() {
            var tipe =  $('#selTipe option:selected').attr('tipe');
            $('#namatipe').val(tipe);
          });
        </script>
        @stop