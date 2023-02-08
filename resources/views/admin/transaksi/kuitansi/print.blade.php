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

    <table width="100%" cellpadding="0" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif; font-size:10px;">
        <tr>
          <td>Nama Kegiatan</td>
          <td>:</td>
          <td>{{$data->spj->kegiatan}}</td>
          <td>Dibayar Tanggal</td>
          <td>:</td>
          <td>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{\Carbon\Carbon::today()->translatedFormat('F Y')}}</td>
        </tr>
        <tr>
          <td>Kode Rekening</td>
          <td>:</td>
          <td>
            {{koderekening($data->rekening->koderek->kode1,$data->rekening->koderek->kode2,$data->rekening->koderek->kode3,$data->rekening->koderek->kode4,$data->rekening->koderek->kode5,$data->rekening->koderek->kode6)}} </td>
          <td>BKU Nomor</td>
          <td>:</td>
          <td></td>
        </tr>
        <tr>
          <td>Tahun Anggaran</td>
          <td>:</td>
          <td>{{$data->spj->tahun}}</td>
          <td>Paraf</td>
          <td>:</td>
          <td></td>
        </tr>
    </table>
    <center><h4 style="font-family:Arial, Helvetica, sans-serif;">KUITANSI</h4></center>

    <table width="100%" cellpadding="0" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif; font-size:10px;">
      <tr>
        <td>Sudah Terima Dari</td>
        <td>:</td>
        <td>PPTK {{$data->spj->kegiatan}}</td>
      </tr>
      <tr>
        <td><br/></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>Uang Sejumlah</td>
        <td>:</td>
        <td>{{terbilang($data->pengeluaran)}} rupiah</td>
      </tr>
      
    </table>
    {{-- <table width="100%">
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
    </table> --}}
    
</body>
<script type="text/javascript">
    window.onload = function() { window.print(); }
</script>
</html>
