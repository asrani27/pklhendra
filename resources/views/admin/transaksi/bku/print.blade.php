<!DOCTYPE html>
<html>
<style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }
</style>
<body>

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td colspan=7 style="font-family: Arial, Helvetica, sans-serif;font-size:10px;font-weight:bold; text-align:center">
              PEMERINTAH KOTA BANJARMASIN
                <br/>
                BUKU KAS UMUM
                <br/>
                PENGELUARAN
                <br/><br/><br/><br/>
            </td>
        </tr>
        
    </table>

    <table width="100%" border=1 cellpadding="3" cellspacing="0">
      <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px;">
        <th class="text-center">No</th>
        <th class="text-center" style="vertical-align: middle">Tanggal</th>
        <th class="text-center" style="vertical-align: middle">Rekening</th>
        <th class="text-center" style="vertical-align: middle">Uraian</th>
        <th class="text-center">Penerimaan</th>
        <th class="text-center">Pengeluaran</th>
      </tr>
      @php
          $no =1;
      @endphp
      @foreach ($rekening as $item)
      <tr  style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px;">
        <td rowspan="{{$item->detailRekening->count() + 1}}" style="text-align: center">
          {{$no++}}
        </td>
        <td class="text-center" rowspan="{{$item->detailRekening->count() + 1}}">
          @if ($item->tanggal == null)
              
          @else
          {{\Carbon\Carbon::parse($item->tanggal)->format('d-m-Y')}}
          @endif
        </td>
        <td class="text-center" rowspan="{{$item->detailRekening->count() + 1}}">{{koderekening($item->koderek->kode1,$item->koderek->kode2,$item->koderek->kode3,$item->koderek->kode4,$item->koderek->kode5,$item->koderek->kode6)}}
        <br/>
          <a href="#"
          class="btn btn-xs btn-flat tambah-uraian" data-bku_rekening_id="{{$item->id}}"><i class="fa fa-plus-circle"></i></a>
        </td>
        @foreach ($item->detailrekening as $item2)
        <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px;">
          <td >
            {{$item2->uraian}}
          </td>
          <td style="text-align: right">
            {{number_format($item2->penerimaan)}}
          </td>
          <td style="text-align: right">
            {{number_format($item2->pengeluaran)}}
          </td>
        </tr>
        @endforeach
          {{-- <tr>
          <td>
            <a href="#"
              class="btn btn-xs btn-flat tambah-uraian" data-bku_rekening_id="{{$item->id}}"><i class="fa fa-plus-circle"></i></a>
          </td>
          </tr> --}}
      </tr>
      @endforeach
      <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px;">
        <td></td>
        <td></td>
        <td></td>
        <td>Total Bulan Ini</td>
        <td style="text-align: right">{{number_format($total->sum('penerimaan'))}}</td>
        <td style="text-align: right">{{number_format($total->sum('pengeluaran'))}}</td>
      </tr>
    </table>
    <table width="100%">
        <br/><br/>
        <tr style="font-size: 10px; text-align:center">
            <td></td>
            <td>Mengetahui,<br/>
            Pengguna Anggaran<br/><br/><br/><br/><br/>
        
            <u>{{$data->pengguna}}</u><br/>
            {{$data->nip_pengguna}}<br/>
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Banjarmasin,  {{\Carbon\Carbon::today()->translatedFormat('F Y')}}<br/>
            PPTK,<br/><br/><br/><br/><br/>
        
            <u>{{$data->pptk}}</u><br/>
            {{$data->nip_pptk}}<br/>
            </td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
    </table>
    
</body>
<script type="text/javascript">
    window.onload = function() { window.print(); }
</script>
</html>
