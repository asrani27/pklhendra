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
            <td colspan=7 style="font-family: Arial, Helvetica, sans-serif;font-size:14px;font-weight:bold; text-align:center">
              <u>SURAT PENYATAAN TANGGUNG JAWAB BELANJA (SPTJB)</u>
                <br/>
            </td>
        </tr>
        
    </table>
<br/>
    <table width="100%" cellpadding="0" cellspacing="0" style="font-family: Arial, Helvetica, sans-serif;font-size:10px;font-weight:bold">
      <tr>
        <td>SATUAN KERJA</td>
        <td>:</td>
        <td>{{$ttd->kode_skpd}} {{$ttd->skpd}}</td>
      </tr>
      <tr>
        <td>KODE SATUAN KERJA</td>
        <td>:</td>
        <td>{{$ttd->kode_skpd}}</td>
      </tr>
      <tr>
        <td>TANGGAL/ NO. DPA</td>
        <td>:</td>
        <td>{{\Carbon\Carbon::parse($ttd->tanggal)->translatedFormat('d F Y')}} {{$ttd->no_dpa}}</td>
      </tr>
      <tr>
        <td>PROGRAM</td>
        <td>:</td>
        <td>{{$ttd->kode_program}} {{$ttd->program}}</td>
      </tr>
      <tr>
        <td>KEGIATAN</td>
        <td>:</td>
        <td>{{$ttd->kode_kegiatan}} {{$ttd->kegiatan}}</td>
      </tr>
      <tr>
        <td>SUB KEGIATAN</td>
        <td>:</td>
        <td>{{$ttd->kode_subkegiatan}} {{$ttd->subkegiatan}}</td>
      </tr>
      <tr>
        <td>TAHUN ANGGARAN</td>
        <td>:</td>
        <td>{{$ttd->tahun}}</td>
      </tr>
      
      
  </table>
  <br/>
  <div style="font-family: Arial, Helvetica, sans-serif;font-size:10px;">Yang bertanda tangan di bawah ini Pengguna Anggaran pada Dinas Komunikasi, Informatika dan Statistik Kota Banjarmasin. Menyatakan bahwa saya bertanggung jawab penuh atas kebenaran material, kesesuaian substansi dan uraian dalam Dokumen Pelaksanaan Perubahan Anggaran (DPPA) serta akibat yang timbul dari segala pengeluaran yang lunas oleh bendahara kepada yang berhak menerima dengan perincian sebagai berikut :
  <br/><br/></div>
  <table width="100%" border=1 cellpadding="3" cellspacing="0">
      <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px;">
        <th class="text-center">No</th>
        <th class="text-center" style="vertical-align: middle">Penerima</th>
        <th class="text-center" style="vertical-align: middle">Kode Rekening</th>
        <th class="text-center">Uraian</th>
        <th class="text-center">Jumlah</th>
      </tr>
      @php
          $no =1;
      @endphp
      @foreach ($data as $item)
          <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px;">
            <td>{{$no++}}</td>
            <td class="text-center">
              {{$item->penerima}}
            </td>
            <td class="text-center">
              {{koderekening($item->rekening->koderek->kode1,$item->rekening->koderek->kode2,$item->rekening->koderek->kode3,$item->rekening->koderek->kode4,$item->rekening->koderek->kode5,$item->rekening->koderek->kode6)}} 
            </td>
            <td>
              {{$item->uraian}}
            </td>
            <td style="text-align: right">
              {{number_format($item->pengeluaran)}}
            </td>
            
          </tr>
      @endforeach
      <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px;">
        <td></td>
        <td></td>
        <td>TOTAL</td>
        <td style="text-align: right"></td>
        <td style="text-align: right">{{number_format($data->sum('pengeluaran'))}}</td>
      </tr>
    </table>
    <br/>
    <div style="font-family: Arial, Helvetica, sans-serif;font-size:10px;">
    Surat bukti asli yang menjadi dasar pengeluaran atas beban APBD tersebut di atas disimpan sesuai dengan ketentuan yang berlaku pada Dinas Komunikasi, Informatika dan Statistik Kota Banjarmasin untuk kelengkapan administrasi dan keperluan pemeriksaan aparat pengawasan fungsional (post audit).
    <br/>Demikian Surat Pernyataan ini dibuat dengan sebenarnya.</div>
    <table width="100%">
        <br/><br/>
        <tr style="font-size: 10px; text-align:center">
            <td width="50%"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Banjarmasin,  {{\Carbon\Carbon::today()->translatedFormat('F Y')}}<br/>
            PENGGUNA ANGGARAN,<br/><br/><br/><br/><br/>
        
            <b><u>{{$ttd->pengguna}}</u><br/>
            {{$ttd->nip_pengguna}}<br/></b>
            </td>
          </tr>
    </table>
    
</body>
<script type="text/javascript">
    window.onload = function() { window.print(); }
</script>
</html>
