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
              DAFTAR NOMINATIF PEMBAYARAN IURAN JKN KIS
                <br/>
                PROGRAM APLIKASI INFORMATIKA
                <br/>
                KEGIATAN PENGELOLAAN E-GOVERNMENT DI LINGKUP PEMERINTAH DAERAH KABUPATEN/KOTA
                <br/>
                SUB KEGIATAN PENGEMBANGAN APLIKASI DAN PROSES BISNIS PEMERINTAHAN BERBASIS ELEKTRONIK
                <br/>
                DINAS KOMUNIKASI, INFORMATIKA DAN STATISTIK KOTA BANJARMASIN
                <br/>
                TAHUN ANGGARAN {{$spj->tahun}}<br/><br/><br/>
            </td>
        </tr>
        
    </table>

    <table width="100%" border=1 cellpadding="3" cellspacing="0">
      <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px;">
        <th class="text-center">No</th>
        <th class="text-center" style="vertical-align: middle">Nama / Jabatan</th>
        <th class="text-center" style="vertical-align: middle">Jumlah Honorarium</th>
        <th class="text-center" style="vertical-align: middle">Standar Potongan Iuran JKN KIS (UMP/UMK)</th>
        <th class="text-center" style="vertical-align: middle" colspan="4">Potongan <br/> JKN KIS 4% (Rp.) Desember</th>
        <th class="text-center" style="vertical-align: middle">Jlh Uang yg diterima (Rp.)</th>
        <th class="text-center" style="vertical-align: middle">Tanda tangan</th>
        <th class="text-center" style="vertical-align: middle">Keterangan</th>
      </tr>
      @php
          $no =1;
      @endphp
      @foreach ($data as $item)
      <tr  style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px;">
        <td valign="top" style="text-align: center">
          {{$no++}}
        </td>
        <td class="text-center">
          {{$item->nama}}<br/>
          {{$item->jabatan}}
        </td>
        <td style="text-align: center">
          {{number_format($item->honor)}}
        </td>
        <td style="text-align: center">
          {{number_format($item->umr)}}
        </td>
        <td style="text-align: center">
          {{number_format($item->potongan)}}
        </td>
        <td style="text-align: center">x</td>
        <td style="text-align: center">{{$item->jumlah}}</td>
        <td style="text-align: center">Bulan</td>
        <td style="text-align: center">
          {{number_format($item->potongan * $item->jumlah)}}
        </td>
        <td></td>
        <td></td>
      </tr>
      @endforeach
      <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px;">
        <td></td>
        <td>JUMLAH</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td style="text-align: center">{{number_format($data->sum('diterima'))}}</td>
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
        
            <u>{{$spj->pengguna}}</u><br/>
            {{$spj->nip_pengguna}}<br/>
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
        
            <u>{{$spj->pptk}}</u><br/>
            {{$spj->nip_pptk}}<br/>
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
