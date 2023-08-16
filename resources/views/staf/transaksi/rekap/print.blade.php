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
                DAFTAR TANDA TERIMA HONORARIUM TENAGA AHLI SISTEM INFORMASI
                <br/>
                PROGRAM APLIKASI INFORMATIKA
                <br/>
                KEGIATAN PENGELOLAAN E-GOVERNMENT DI LINGKUP PEMERINTAH DAERAH KABUPATEN/KOTA
                <br/>
                SUB KEGIATAN PENGEMBANGAN APLIKASI DAN PROSES BISNIS PEMERINTAHAN BERBASIS ELEKTRONIK
                <br/>
                DINAS KOMUNIKASI, INFORMATIKA DAN STATISTIK KOTA BANJARMASIN
                <br/>
                TAHUN ANGGARAN {{$data->spj->tahun}}<br/><br/><br/>
            </td>
        </tr>
        
    </table>

    <table width="100%" border=1 cellpadding="3" cellspacing="0">
      <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px;">
        <th class="text-center">No</th>
        <th class="text-center" style="vertical-align: middle">Nama / Jabatan</th>
        <th class="text-center" style="vertical-align: middle">Nomor Rek</th>
        <th class="text-center" style="vertical-align: middle">Besarnya Honorarium (Rp.)</th>
        <th class="text-center" style="vertical-align: middle">Potongan Pajak </th>
        <th class="text-center" style="vertical-align: middle">Jumlah Diterima </th>
        <th class="text-center" style="vertical-align: middle">Tanda Tangan </th>
        <th class="text-center" style="vertical-align: middle">Keterangan </th>
      </tr>
      @php
          $no =1;
      @endphp
      
      <tr  style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px;">
        <td valign="top" style="text-align: center"><br/>
          {{$no++}}<br/><br/>
        </td>
        <td class="text-center">
            <br/>
          {{$data->penerima}}<br/><br/>
        </td>
        <td class="text-center">
          {{$data->id_billing}}<br/>
        </td>
        <td style="text-align: center">
          {{number_format($data->pengeluaran)}}
        </td>
        <td>0</td>
        <td style="text-align: center">
          {{number_format($data->pengeluaran)}}
        </td>
        <td></td>
        <td></td>
      </tr>
      
      
    </table>
    <table width="100%">
        <br/><br/>
        <tr style="font-size: 10px; text-align:center">
            <td></td>
            <td>Mengetahui,<br/>
            Pengguna Anggaran<br/><br/><br/><br/><br/>
        
            <u>{{$data->spj->pengguna}}</u><br/>
            {{$data->spj->nip_pengguna}}<br/>
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
        
            <u>{{$data->spj->pptk}}</u><br/>
            {{$data->spj->nip_pptk}}<br/>
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
