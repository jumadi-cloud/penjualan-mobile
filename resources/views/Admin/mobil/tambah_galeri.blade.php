@extends('Admin.layout.layout_index_admin')



@section('title')

Tambah Galeri Mobil

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
                      @foreach($mobil as $mobils)
                          <input class="form-control col-md-7 col-xs-12" type="hidden" name="id_mobil" value="{{$mobils->id}}"> 
                          <input class="form-control col-md-7 col-xs-12" type="hidden" name="merek" value="{{$mobils->merek}}"> 
                          <input class="form-control col-md-7 col-xs-12" type="hidden" name="tipe" value="{{$mobils->tipe}}"> 
                      @endforeach
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Upload Foto <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="file" name="foto_galeri" >

                        </div>
                      </div>                      
                      
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="{{ 'data-mobil' }} "><button class="btn btn-primary" type="button">Kembali</button></a>
                          <button class="btn btn-info" type="reset">Bersihkan</button>
                          <button type="submit" class="btn btn-success">Simpan</button> 
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
      @stop