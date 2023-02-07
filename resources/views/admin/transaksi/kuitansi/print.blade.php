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
          <td>Nama Kegiatan</td>
          <td>:</td>
          <td></td>
          <td>Dibayar Tanggal</td>
          <td>:</td>
          <td></td>
        </tr>
        <tr>
          <td>Kode Rekening</td>
          <td>:</td>
          <td></td>
          <td>BKU Nomor</td>
          <td>:</td>
          <td></td>
        </tr>
        <tr>
          <td>Tahun Anggaran</td>
          <td>:</td>
          <td></td>
          <td>Paraf</td>
          <td>:</td>
          <td></td>
        </tr>
        
    </table>

    <table width="100%" cellpadding="0" cellspacing="0" style="font-family: Arial, Helvetica, sans-serif;font-size:10px">
      <tr>
          <td colspan="4">Bendahara</td>
      </tr>
      <tr>
          <td>SKPD</td>
          <td></td>
          <td>:</td>
          <td>{{$data->kode_skpd}}  {{$data->skpd}}</td>
      </tr>
      <tr>
          <td colspan="4">Supaya mencairkan dana kepada</td>
      </tr>
      <tr>
          <td>1.</td>
          <td>Pejabat Pelaksana Teknis Kegiatan</td>
          <td>:</td>
          <td>{{$data->pptk}}</td>
      </tr>
      <tr>
          <td>2.</td>
          <td>Program</td>
          <td>:</td>
          <td>{{$data->kode_program}} {{$data->program}}</td>
      </tr>
      <tr>
          <td>3.</td>
          <td>Kegiatan</td>
          <td>:</td>
          <td>{{$data->kode_kegiatan}} {{$data->kegiatan}}</td>
      </tr>
      <tr>
          <td>4.</td>
          <td>Sub Kegiatan</td>
          <td>:</td>
          <td>{{$data->subkegiatan}}</td>
      </tr>
      <tr>
          <td>5.</td>
          <td>No.DPA/DPAL/DPPA-SKPD</td>
          <td>:</td>
          <td>{{$data->no_dpa}} {{$data->tanggal}}</td>
      </tr>
      <tr>
          <td>6.</td>
          <td>Tahun Anggaran</td>
          <td>:</td>
          <td>{{$data->tahun}}</td>
      </tr>
      <tr>
          <td>7.</td>
          <td>Jumlah Dana yang diminta</td>
          <td>:</td>
          <td>{{number_format($detail->sum('psi'))}}</td>
      </tr>
      <tr>
          <td></td>
          <td>Terbilang</td>
          <td>:</td>
          <td>{{terbilang($detail->sum('psi'))}} rupiah</td>
      </tr>
      <tr>
          <td colspan="4">
            <br/>
            <br/>
            Pembebanan Pada Kode Rekening
          <br/><br/></td>
      </tr>
      
  </table>

    <table width="100%" border=1 cellpadding="3" cellspacing="0">
      <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px;">
        <th class="text-center">No</th>
        <th class="text-center" style="vertical-align: middle">Kode Rekening</th>
        <th class="text-center" style="vertical-align: middle">Uraian</th>
        <th class="text-center">Anggaran</th>
        <th class="text-center">Akumulasi Pencairan Sebelumnya</th>
        <th class="text-center">Pencairan Saat Ini</th>
        <th>Sisa</th>
      </tr>
      @php
          $no =1;
      @endphp
      @foreach ($detail as $item)
          <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px;">
            <td>{{$no++}}</td>
            <td class="text-center">
              {{koderekening($item->koderek->kode1,$item->koderek->kode2,$item->koderek->kode3,$item->koderek->kode4,$item->koderek->kode5,$item->koderek->kode6)}} 
            </td>
            <td>
              {{$item->koderek->uraian}}
            </td>
            <td style="text-align: right">
              {{number_format($item->ja)}}
            </td>
            <td style="text-align: right">
              {{number_format($item->aps)}}
            </td>
            <td style="text-align: right">
              {{number_format($item->psi)}}
            </td>
            <td style="text-align: right">
              {{number_format($item->sisa_npd)}}
            </td>
            
          </tr>
      @endforeach
      <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px;">
        <td></td>
        <td></td>
        <td>Jumlah</td>
        <td style="text-align: right">{{number_format($detail->sum('ja'))}}</td>
        <td style="text-align: right">{{number_format($detail->sum('aps'))}}</td>
        <td style="text-align: right">{{number_format($detail->sum('psi'))}}</td>
        <td style="text-align: right">{{number_format($detail->sum('sisa_npd'))}}</td>
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
