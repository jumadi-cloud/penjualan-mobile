@extends('Admin.layout.layout_index_admin')



@section('title')

Ubah Mobil

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
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipe <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select required="required" name="tipe" class="form-control col-md-7 col-xs-12 select2" id="selTipe" >
                      <option disabled="disabled" selected="true">Pilih Tipe</option>
                      @foreach ($master_jenis as $key => $value)
                          <option value="{{ $key }}" {{ $key == $mobil->id_tipe ? 'selected' : '' }}> 
                            {{ $value }}
                          </option>
                      @endforeach
                    </select>
                    <br>
                    <input readonly="" class="form-control col-md-7 col-xs-12" type="hidden" name="nama_tipe" id="namatipe">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Merek <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select required="required" name="merek" class="form-control col-md-7 col-xs-12 select2" id="selMerek" >
                      <option disabled="disabled" selected="true">Pilih Merek</option>
                      @foreach ($master_merk as $key => $value)
                                              <option value="{{ $key }}" {{ $key == $mobil->id_merek ? 'selected' : '' }}> 
                                                {{ $value }}
                                              </option>
                                          @endforeach
                    </select>
                    <br>
                    <input readonly="" class="form-control col-md-7 col-xs-12" type="hidden" name="nama_merek" id="namamerek">

                  </div>
                </div>                      
                <div class="form-group">
            			<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Model<span class="required">*</span></label>
            			<div class="col-md-6 col-sm-6 col-xs-12">
            				<select required="required" name="model" class="form-control col-md-7 col-xs-12 select2" id="selMerek" >
            					<option disabled="disabled" selected="true">Pilih Model</option>
            					@foreach ($master_model as $key => $value)
                          <option value="{{ $key }}" {{ $key == $mobil->model ? 'selected' : '' }}> 
                            {{ $value }}
                          </option>
                      @endforeach
            				</select>
            			</div>
            		</div>
                {{-- <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Varian</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input  class="form-control col-md-7 col-xs-12" type="text" name="varian" value="{{ $mobil->varian }}">
                  </div>
                </div> --}}
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tahun</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select required="required" name="tahun" class="form-control col-md-7 col-xs-12 select2" id="selMerek" >
                                          <option disabled="disabled" selected="true">Pilih Tahun</option>
                                          @foreach ($master_tahun as $key => $value)
                                              <option value="{{ $key }}" {{ $key == $mobil->tahun ? 'selected' : '' }}> 
                                                {{ $value }}
                                              </option>
                                          @endforeach
                                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Lokasi</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select required="required" name="lokasi" class="form-control col-md-7 col-xs-12 select2" id="selMerek" >
                                          <option disabled="disabled" selected="true">Pilih Lokasi</option>
                                          @foreach ($master_lokasi as $key => $value)
                                              <option value="{{ $key }}" {{ $key == $mobil->lokasi ? 'selected' : '' }}> 
                                                {{ $value }}
                                              </option>
                                          @endforeach
                                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Warna</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select required="required" name="warna" class="form-control col-md-7 col-xs-12 select2" id="selMerek" >
                                          <option disabled="disabled" selected="true">Pilih Warna</option>
                                          @foreach ($master_warna as $key => $value)
                                              <option value="{{ $key }}" {{ $key == $mobil->warna ? 'selected' : '' }}> 
                                                {{ $value }}
                                              </option>
                                          @endforeach
                                    </select>
                  </div>
                </div>
                  <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12 label-radio">Transmisi</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <label>Auto:</label>
                        <input type="radio" class="flat" name="transmisi" id="transmisiA" value="A" {{ $mobil->transmisi == 'A' ? 'checked' : '' }} /> &nbsp;
                        <label>Manual:</label>
                        <input type="radio" class="flat" name="transmisi" id="transmisiM" value="M" {{ $mobil->transmisi == 'M' ? 'checked' : '' }} />
                        </div>
                      </div>
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">No Pol</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input  class="form-control col-md-7 col-xs-12" type="text" name="no_pol" required="" value="{{ $mobil->no_pol }}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Cakupan Mesin (cc)<span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input  class="form-control col-md-7 col-xs-12" type="text" name="cakupan_mesin" required="" value="{{ $mobil->cakupan_mesin }}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kapasitas Penumpang</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input  class="form-control col-md-7 col-xs-12" type="text" name="kapasitas" required="" onkeypress='validate(event)' value="{{ $mobil->kuota }}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kilometer{{-- <span class="required">*</span> --}}</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input  class="form-control col-md-7 col-xs-12" type="text" name="kilometer" onkeypress='validate(event)' value="{{ $mobil->kilometer }}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Bahan Bakar<span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select required="required" name="bahan_bakar" class="form-control col-md-7 col-xs-12 select2" id="selMerek" >
                                          <option disabled="disabled" selected="true">Pilih Bahan Bakar</option>
                                          <option value="bensin" {{ $mobil->bahan_bakar == 'bensin' ? 'selected' : '' }}>Bensin</option>
                                          <option value="diesel" {{ $mobil->bahan_bakar == 'diesel' ? 'selected' : '' }}>Diesel</option>
                                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi{{-- <span class="required">*</span >--}}</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea  class="form-control col-md-7 col-xs-12" name="deskripsi" id="editor3">{{ $mobil->deskripsi }}</textarea>
                  </div>
                </div>
                {{-- <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">No Telp<span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input  class="form-control col-md-7 col-xs-12" type="text" name="no_telp" required="" maxlength="14" onkeypress='validate(event)'>
                  </div>
                </div> --}}
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Harga<span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input  class="form-control col-md-7 col-xs-12" type="text" name="harga" required="" value="{{ $mobil->harga }}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Spesifikasi{{-- <span class="required">*</span> --}}</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea  class="form-control col-md-7 col-xs-12" name="description" id="editor1">{{ $mobil->spesifikasi }}</textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kelengkapan{{-- <span class="required">*</span >--}}</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea  class="form-control col-md-7 col-xs-12" name="description1" id="editor2">{{ $mobil->kelengkapan }}</textarea>
                  </div>
                </div>
                <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12 label-radio" for="first-name">Rekomendasi
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <label>Aktifkan:</label>
                      <input type="radio" class="flat" name="rekomendasi" id="rekomendasia" value="ya" {{ $mobil->rekomendasi == 'ya' ? 'checked' : '' }} /> &nbsp;
                      <label>Tidak:</label>
                      <input type="radio" class="flat" name="rekomendasi" id="rekomendasib" value="tidak" {{ $mobil->rekomendasi == 'tidak' ? 'checked' : '' }} />
                      </div>
                </div>
                <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12 label-radio" for="first-name">Hot Deals
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <label>Aktifkan:</label>
                      <input type="radio" class="flat" name="hot_deal" id="hot_deala" value="ya" {{ $mobil->hot_deal == 'ya' ? 'checked' : '' }} /> &nbsp;
                      <label>Tidak:</label>
                      <input type="radio" class="flat" name="hot_deal" id="hot_dealb" value="tidak" {{ $mobil->hot_deal == 'tidak' ? 'checked' : '' }} />
                      </div>
                </div>
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Foto Profile Iklan{{-- <span class="required">*</span >--}}</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" class="form-control col-md-7 col-xs-12" name="foto-mobil" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">&nbsp;{{-- <span class="required">*</span >--}}</label>
                  <span>&nbsp;Foto Lama :</span><br>
                  <div class="col-md-6 col-sm-6 col-xs-12"><img src="{{ asset('storage/data/mobil/'.$mobil->foto_mobil)}}" width="120px"></div>
                </div>
                <hr>
                <div class="increment">
                  @php
                  $jum_galeri = count($galeri);
                  @endphp
                  @foreach($galeri as $galeris)
                    <div class="control-group">
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">&nbsp;{{-- <span class="required">*</span >--}}</label>
                        <span>&nbsp;Foto Galeri Lama :</span><br>
                        <div class="col-md-6 col-sm-6 col-xs-12"><img src="{{ asset('storage/data/galeri_mobil/'.$galeris->foto)}}" width="120px" id="img"></div>
                        <div class="col-md-3"><button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Hapus Foto</button></div>
                      </div>
                      <input type="hidden" name="id_galeri[]" value="{{ $galeris->id }}">
                    </div>
                  @endforeach
                </div>
                <div class="control-group">
                    <div class="form-group control-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Gambar Galeri Mobil{{-- <span class="required">*</span >--}}</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" class="form-control col-md-7 col-xs-12" name="galeri[]" id="upload_galeri">
                          </div>
                          <div class="col-md-3"><button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i></button></div>
                    </div>
                </div>
                <div class="clone hide">
                  <div class="form-group control-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Gambar Galeri Mobil Baru{{-- <span class="required">*</span >--}}</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="file" class="form-control col-md-7 col-xs-12" name="galeri[]" id="upload_galeri">
                        </div>
                        <div class="col-md-3"><button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i></button></div>
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group control-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-info">Submit</button>
                    <button class="btn btn-primary" type="button">Cancel</button>
                  </div>
                </div>

              </form>
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
      <script>
        $(document).ready(function (){
          // Replace the <textarea id="editor1"> with a CKEditor
          // instance, using default configuration.
          CKEDITOR.replace('editor1');
          CKEDITOR.replace('editor2');
          CKEDITOR.replace('editor3');
        });
      </script>
      <script type="text/javascript">
          $(document).ready(function() {
            $(".btn-success").click(function(){ 
                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $("body").on("click",".btn-danger",function(){ 
                $(this).parents(".control-group").remove();
            });
          });

      </script>
      @stop