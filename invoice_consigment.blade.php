<html>
<head>
    <title>Inovoice Consigment</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<style type="text/css">
    table{
        font-size: small;
        width: 100%;
    }
    .content{
        border: 1px solid black;
        min-height: 500px;
    }

    .tb td,.tb th{
        border: 1px solid black;
    }

    .tb th{
        text-align: center;
    }

    .center-tb{
        text-align: center;
    }
</style>
<div class="content">
    <table style="border-bottom:1px solid black;">
        <tr>
            <th style="text-align:center"><img src="{{ asset('storage/pdf/'.Helper::kop_pdf('image')) }}" alt="" class="img-responsive" width="80px"></th>
            <td>
                <b>{{ Helper::kop_pdf('nama') }}</b><br>
                <span>{{ Helper::kop_pdf('alamat_jalan') }},{{ Helper::kop_pdf('alamat_daerah') }},{{ Helper::kop_pdf('kota_pos') }}</span><br>
                <span>NPWP No: {{ Helper::kop_pdf('npwp_no') }}</span>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="text-align:center;" colspan="7"><b>Invoice Consigment</b></td>
        </tr>
        <tr>
            <td width="10%">
                Date
            </td>
            <td width="2%">
                :
            </td>
            <td width="33%" style="border-bottom:1px solid black;">
                    {{ date('m/d/Y', strtotime($data->tanggal_invoice)) }}
            </td>
            <td width="10%"></td>
            <td width="10%">
                Your Ref
            </td>
            <td width="2%">
                :
            </td>
            <td width="33%" style="border-bottom:1px solid black;">
            </td>
        </tr>
        <tr>
            <td width="10%">
                UP
            </td>
            <td width="2%">
                :
            </td>
            <td width="33%" style="border-bottom:1px solid black;">
            </td>
            <td width="10%"></td>
            <td width="10%">
                TO
            </td>
            <td width="2%">
                :
            </td>
            <td width="33%" style="border-bottom:1px solid black;">
                    {{ $data->customers }}
            </td>
        </tr>
        <tr>
            <td width="10%">
                Phone
            </td>
            <td width="2%">
                :
            </td>
            <td width="33%" style="border-bottom:1px solid black;">
            </td>
            <td width="10%"></td>
            <td width="10%">
                Phone
            </td>
            <td width="2%">
                :
            </td>
            <td width="33%" style="border-bottom:1px solid black;">
            </td>
        </tr>
        <tr>
            <td width="10%">
                Email
            </td>
            <td width="2%">
                :
            </td>
            <td width="33%" style="border-bottom:1px solid black;">
            </td>
            <td width="10%"></td>
            <td width="10%">
                Currency
            </td>
            <td width="2%">
                :
            </td>
            <td width="33%" style="border-bottom:1px solid black;">
            </td>
        </tr>
        <tr>
            {{-- <td width="10%">
                Shipment Method
            </td>
            <td width="2%">
                :
            </td>
            <td width="33%" style="border-bottom:1px solid black;">
                {{ $data->shipments }}
            </td> --}}
            {{-- <td width="10%"></td> --}}
            <td width="10%">
                UP
            </td>
            <td width="2%">
                :
            </td>
            <td width="33%" style="border-bottom:1px solid black;">
                {{ $data->nama_customer }}
            </td>
        </tr>
        <tr>
            <td width="10%">
                Ship To
            </td>
            <td width="2%">
                :
            </td>
            <td width="33%" style="border-bottom:1px solid black;">
            </td>
            <td width="10%"></td>
            {{-- <td width="10%">
                Currency
            </td>
            <td width="2%">
                :
            </td>
            <td width="33%" style="border-bottom:1px solid black;">
            </td> --}}
        </tr>
        <tr>
            <td width="10%">
                Bill To
            </td>
            <td width="2%">
                :
            </td>
            <td width="33%" style="border-bottom:1px solid black;">
            </td>
            <td width="10%"></td>
            {{-- <td width="10%">
                TOP
            </td>
            <td width="2%">
                :
            </td>
            <td width="33%" style="border-bottom:1px solid black;">
                {{ $data->tops }}
            </td> --}}
        </tr>
    </table>
    <table>
        <tr>
            <td>We Here by Submit the order of goods as follows:</td>
        </tr>
    </table>
    <table class="tb">
        <thead>
            <tr>
                <th width="5%">NO</th>
                <th width="21%">Description</th>
                <th width="21%">Part Number</th>
                <th width="11%">Qty</th>
                <th width="12%">Unit</th>
                {{-- <th width="8%">Diskon (%)</th> --}}
                <th width="15%">Unit Price</th>
                <th width="15%">Total Price</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 0;
            @endphp
            @foreach ($detail as $item)
            @php
                $no = $no + 1;
            @endphp
            <tr>
                <td class="center-tb">{{ $no }}</td>
                <td class="center-tb">{{ $item->deskripsi_produk }}</td>
                <td class="center-tb">{{ $item->part_number }}</td>
                <td class="center-tb">{{ $item->qty }}</td>
                <td class="center-tb">{{ $item->units }}</td>
                {{-- <td class="center-tb">{{ $item->discount }}</td> --}}
                <td class="center-tb">{{ number_format($item->price) }}</td>
                <td class="center-tb">{{ number_format($item->total_harga) }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td style="border:0px solid black !important;"><i>Noted</i></td>
                <td colspan="4" style="border:0px solid black !important;">:</td>
                <td><b>Total Price</b></td>
                <td>{{ number_format($data->total_harga) }}</td>
            </tr>
            {{-- <tr>
                <td style="border:0px solid black !important;"></td>
                <td colspan="5" style="border:0px solid black !important;"></td>
                <td><b>Total Diskon</b></td>
                <td>{{ number_format($data->total_diskon) }}</td>
            </tr>
            <tr>
                <td style="border:0px solid black !important;"></td>
                <td colspan="5" style="border:0px solid black !important;"></td>
                <td><b>Total Delivery</b></td>
                <td>{{ number_format($data->deliver) }}</td>
            </tr>
            <tr>
                <td style="border:0px solid black !important;"></td>
                <td colspan="5" style="border:0px solid black !important;"></td>
                <td><b>{{ $data->tax }}-{{ $data->jumlah_persen }}%</b></td>
                <td>{{ number_format($data->total_pajak) }}</td>
            </tr>
            <tr>
                <td style="border:0px solid black !important;"></td>
                <td colspan="5" style="border:0px solid black !important;"></td>
                <td><b>Subtotal</b></td>
                <td>{{ number_format($data->total_all) }}</td>
            </tr> --}}
            <tr>
                <td style="border:0px solid black !important;"></td>
                <td colspan="4" style="border:0px solid black !important;"></td>
                <td colspan="2" style="border:0px solid black !important;">
                    Authorized Signature by,
                </td>
            </tr>
            <tr>
                <td style="border:0px solid black !important;"></td>
                <td colspan="4" style="border:0px solid black !important;"></td>
                <td colspan="2" style="border:0px solid black !important;text-align:center;">
                    Director
                </td>
            </tr>
            <tr>
                <td style="border:0px solid black !important;"></td>
                <td colspan="4" style="border:0px solid black !important;"></td>
                <td colspan="2" style="border:0px solid black !important;text-align:center;">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td style="border:0px solid black !important;"></td>
                <td colspan="4" style="border:0px solid black !important;"></td>
                <td colspan="2" style="border:0px solid black !important;text-align:center;">
                    ({{ Helper::nama_ttd('director') }})
                </td>
            </tr>
        </tfoot>
    </table>
</div>
</body>
</html>