@extends('Admin.layout.layout_index_admin')



@section('title')

Mobil

@stop
@section('css')
<link href="{{ asset('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
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
                    @if (session('msg'))
                    @if (session('msg') == "berhasil")
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Berhasil simpan data</strong>
                    </div> 
                    @elseif(session('msg') == "gagal")
                    <div class="alert alert-warning alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Gagal simpan data</strong>
                    </div> 
                    @elseif(session('msg') == "berhasil_hapus")
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Berhasil hapus data</strong>
                    </div> 
                    @elseif(session('msg') == "gagal_hapus")
                    <div class="alert alert-warning alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Gagal hapus data</strong>
                    </div> 
                    @elseif(session('msg') == "berhasil_ubah")
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Berhasil ubah data</strong>
                    </div> 
                    @elseif(session('msg') == "gagal_ubah")
                    <div class="alert alert-warning alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Gagal ubah data</strong>
                    </div> 
                    @elseif(session('msg') == "berhasil_foto")
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Berhasil tambah data gambar</strong>
                    </div> 
                    @elseif(session('msg') == "gagal_foto")
                    <div class="alert alert-warning alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Gagal tambah data gambar</strong>
                    </div> 
                    @endif
                    @endif
                  </div>
                  <div class="x_content">
                    <br />
                    <a href="{{ 'tambah-mobil'}}"><button class="btn btn-primary font-weight-bold">Tambah</button></a>

                    <table id="" class="table table-striped table-bordered dt-responsive nowrap data-table" cellspacing="0" width="100%" style="margin-top: 2%;">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>NO Pol</th>
                          <th>Merek</th>
                          <th>Model</th>
                          <th>Harga</th>
                          <th>Foto</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        

                    </tbody>
                  </table>


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>




    @stop



    @section('js')
    <!-- Datatables -->
    <script src="{{ asset('assets/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/pdfmake/build/vfs_fonts.js') }}"></script>

    <script>
      $(function () {
        
        var table = $('.data-table').DataTable({
          bAutoWidth : false,
          processing: true,
          language: {
                  processing: '<div class="load-ajax text-center bg-white p-10"><i class="fa fa-spinner fa-spin fa-2x"></i><span class="font-w600 ml-10 pb-50">Processing....</span></div>',
            infoEmpty: 'Tidak Ada Data',
            zeroRecords: 'Tidak Ada Data',
            paginate: {
              first:      "Awal",
              last:       "Akhir",
              next:       "Lanjut",
              previous:   "Sebelumnya"
            }
          },
          serverSide: true,
          stateSave: true,
          ajax: {
            url: '{{ url('data-mobil') }}'
          },
          deferRender: true,
          columns: [
            {data: 'no', name: 'no'},
            {data: 'no_pol', name: 'no_pol'},
            {data: 'merek', name: 'merek'},
            {data: 'model', name: 'model'},
            {data: 'harga', name: 'harga'},
            {data: 'foto', name: 'foto'},
            {data: 'aksi', name: 'aksi'},
          ]
        });
      });
    </script>
    
    @stop