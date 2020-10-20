@extends('Admin.layout.layout_index_admin')

@section('title')
Tambah Mobil
@stop

@section('content')
<style type="text/css">
.label-radio{
      padding-top: 0px !important;
}
</style>
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
                                              <option value="{{ $key }}" {{ $key == old('tipe') ? 'selected' : '' }}> 
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
                                              <option value="{{ $key }}" {{ $key == old('merek') ? 'selected' : '' }}> 
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
                                              <option value="{{ $key }}" {{ $key == old('model') ? 'selected' : '' }}> 
                                                {{ $value }}
                                              </option>
                                          @endforeach
            				</select>
            			</div>
            		</div>
            		{{-- <div class="form-group">
            			<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Varian</label>
            			<div class="col-md-6 col-sm-6 col-xs-12">
            				<input  class="form-control col-md-7 col-xs-12" type="text" name="varian">
            			</div>
            		</div> --}}
            		<div class="form-group">
            			<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tahun</label>
            			<div class="col-md-6 col-sm-6 col-xs-12">
            				<select required="required" name="tahun" class="form-control col-md-7 col-xs-12 select2" id="selMerek" >
                                          <option disabled="disabled" selected="true">Pilih Tahun</option>
                                          @foreach ($master_tahun as $key => $value)
                                              <option value="{{ $key }}" {{ $key == old('tahun') ? 'selected' : '' }}> 
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
                                              <option value="{{ $key }}" {{ $key == old('lokasi') ? 'selected' : '' }}> 
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
                                              <option value="{{ $key }}" {{ $key == old('warna') ? 'selected' : '' }}> 
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
                        <input type="radio" class="flat" name="transmisi" id="transmisiA" value="A" required /> &nbsp;
                        <label>Manual:</label>
                        <input type="radio" class="flat" name="transmisi" id="transmisiM" value="M"  />
                      
                          {{-- <input  class="form-control col-md-7 col-xs-12" type="text" name="lokasi" value="{{ $mobils->lokasi }}"> --}}
                        </div>
                      </div>
                       {{-- <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kondisi<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  class="form-control col-md-7 col-xs-12" type="text" name="kondisi" required="" >
                        </div>
					  </div> --}}
					<div class="form-group">
						<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">No Pol</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input  class="form-control col-md-7 col-xs-12" type="text" name="no_pol" required="">
						</div>
            		</div>
            		<div class="form-group">
            			<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Cakupan Mesin (cc)<span class="required">*</span></label>
            			<div class="col-md-6 col-sm-6 col-xs-12">
            				<input  class="form-control col-md-7 col-xs-12" type="text" name="cakupan_mesin" required="">
            			</div>
            		</div>
            		<div class="form-group">
            			<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kapasitas Penumpang</label>
            			<div class="col-md-6 col-sm-6 col-xs-12">
            				<input  class="form-control col-md-7 col-xs-12" type="text" name="kapasitas" required="" onkeypress='validate(event)'>
            			</div>
            		</div>
            		<div class="form-group">
            			<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kilometer{{-- <span class="required">*</span> --}}</label>
            			<div class="col-md-6 col-sm-6 col-xs-12">
            				<input  class="form-control col-md-7 col-xs-12" type="text" name="kilometer" onkeypress='validate(event)'>
            			</div>
            		</div>
            		<div class="form-group">
            			<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Bahan Bakar<span class="required">*</span></label>
            			<div class="col-md-6 col-sm-6 col-xs-12">
            				<select required="required" name="bahan_bakar" class="form-control col-md-7 col-xs-12 select2" id="selMerek" >
                                          <option disabled="disabled" selected="true">Pilih Bahan Bakar</option>
                                          <option value="bensin" {{ old('bahan_bakar') == 'bensin' ? 'selected' : '' }}>Bensin</option>
                                          <option value="diesel" {{ old('bahan_bakar') == 'diesel' ? 'selected' : '' }}>Diesel</option>
                                    </select>
            			</div>
            		</div>
            		<div class="form-group">
            			<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi{{-- <span class="required">*</span >--}}</label>
            			<div class="col-md-6 col-sm-6 col-xs-12">
							<textarea class="form-control col-md-7 col-xs-12" name="deskripsi" id="editor3"></textarea>
            			</div>
            		</div>
            		{{-- <div class="form-group">
            			<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">No Telp<span class="required">*</span></label>
            			<div class="col-md-6 col-sm-6 col-xs-12">
            				<input  class="form-control col-md-7 col-xs-12" type="text" name="no_telp" required="" maxlength="14" onkeypress='validate(event)'>
            			</div>
            		</div> --}}
            		<div class="form-group">
            			<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Harga (Rp)<span class="required">*</span></label>
            			<div class="col-md-6 col-sm-6 col-xs-12">
            				<input  class="form-control col-md-7 col-xs-12" type="text" name="harga" required="">
            			</div>
            		</div>
            		<div class="form-group">
            			<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Spesifikasi{{-- <span class="required">*</span> --}}</label>
            			<div class="col-md-6 col-sm-6 col-xs-12">
            				<textarea class="form-control col-md-7 col-xs-12" name="description" id="editor1"></textarea>
            			</div>
            		</div>
            		<div class="form-group">
            			<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kelengkapan{{-- <span class="required">*</span >--}}</label>
            			<div class="col-md-6 col-sm-6 col-xs-12">
            				<textarea  class="form-control col-md-7 col-xs-12" name="description1" id="editor2" ></textarea>
            			</div>
            		</div>
            		{{-- <div class="form-group">
            			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipe Promo
            			</label>
            			<div class="col-md-6 col-sm-6 col-xs-12">
            				<select name="tipe_promo" class="form-control col-md-7 col-xs-12 select2" id="" >
            					<option selected="true">Pilih Tipe Promo</option>
            					<option value="hot deals" >Hot Deals</option>
            					<option value="rekomendasi" >Rekomendasi</option>
            				</select>
            				
            			</div>
            		</div> --}}
                        <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12 label-radio" for="first-name">Rekomendasi (Home)
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                              <label>Aktif:</label>
                              <input type="radio" class="flat" name="rekomendasi" id="rekomendasia" value="ya" required /> &nbsp;
                              <label>Tidak:</label>
                              <input type="radio" class="flat" name="rekomendasi" id="rekomendasib" value="tidak"  />
                              </div>
                        </div>
                        <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12 label-radio" for="first-name">Hot Deals
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                              <label>Aktif:</label>
                              <input type="radio" class="flat" name="hot_deal" id="hot_deala" value="ya" required /> &nbsp;
                              <label>Tidak:</label>
                              <input type="radio" class="flat" name="hot_deal" id="hot_dealb" value="tidak"  />
                              </div>
                        </div>
            		<div class="form-group">
            			<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Foto Profile Iklan{{-- <span class="required">*</span >--}}</label>
            			<div class="col-md-6 col-sm-6 col-xs-12">
            				<input type="file" class="form-control col-md-7 col-xs-12" name="foto-mobil" >
            			</div>
            		</div>
                        <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Galeri Foto Mobil{{-- <span class="required">*</span >--}}</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" class="form-control col-md-7 col-xs-12" name="galeri[]" multiple="">
                              </div>
                        </div>


            		<div class="ln_solid"></div>
            		<div class="form-group">
            			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Submit</button>
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
@stop