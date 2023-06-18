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
            <td colspan=14 style="font-family: Arial, Helvetica, sans-serif;font-size:8px;font-weight:bold; text-align:center">DINAS KOMUNIKASI, INFORMATIKA DAN STATISTIK - PEMERINTAH KOTA BANJARMASIN
                <br/>
                SURAT PENGESAHAN PERTANGGUNG JAWABAN KEGIATAN
                <br/>
                ( SPJ BELANJA )
                <br/><br/><br/><br/>
            </td>
        </tr>
        <tr style="font-family: Arial, Helvetica, sans-serif;font-size:8px;font-weight:bold;">
            <td>NAMA SUB KEGIATAN</td>
            <td></td>
            <td>: {{$data->subkegiatan}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr style="font-family: Arial, Helvetica, sans-serif;font-size:8px;font-weight:bold;">
            <td>PPTK</td>
            <td></td>
            <td>: {{$data->pptk}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr style="font-family: Arial, Helvetica, sans-serif;font-size:8px;font-weight:bold;">
            <td>TAHUN ANGGARAN</td>
            <td></td>
            <td>: {{$data->tahun}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr style="font-family: Arial, Helvetica, sans-serif;font-size:8px;font-weight:bold;">
            <td>BULAN</td>
            <td></td>
            <td>: {{$data->bulan}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>

    <table border=1 cellpadding="3" cellspacing="0">
        <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:10px; ">
            <th class="text-center" rowspan=2 style="vertical-align: middle">Kode Rekening</th>
            <th class="text-center" rowspan=2 style="vertical-align: middle">uraian</th>
            <th class="text-center" rowspan=2 style="vertical-align: middle">Jumlah Anggaran</th>
            <th class="text-center" colspan=3>SPJ - LS GAJI</th>
            <th class="text-center" colspan=3>SPJ - LS BARANG DAN JASA</th>
            <th class="text-center" colspan=3>SPJ - UP/GU/TU</th>
            <th class="text-center" rowspan=2>Jumlah SPJ <br/>(LS+UP/GU/TU) <br/>s.d. Bln ini</th>
            <th class="text-center" rowspan=2>Sisa Pagu <br/>Anggaran</th>
        </tr>
        <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:8px;">
          
            <th class="text-center">s.d. Bln Lalu</th>
            <th class="text-center">Bulan ini</th>
            <th class="text-center">s.d. Bln ini</th>
            <th class="text-center">s.d. Bln Lalu</th>
            <th class="text-center">Bulan ini</th>
            <th class="text-center">s.d. Bln ini</th>
            <th class="text-center">s.d. Bln Lalu</th>
            <th class="text-center">Bulan ini</th>
            <th class="text-center">s.d. Bln ini</th>
        </tr>
        <tr style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:6px;">
          
            <th class="text-center">1</th>
            <th class="text-center">2</th>
            <th class="text-center">3</th>
            <th class="text-center">4</th>
            <th class="text-center">5</th>
            <th class="text-center">6 = (4+5)</th>
            <th class="text-center">7</th>
            <th class="text-center">8</th>
            <th class="text-center">9 = (7+8)</th>
            <th class="text-center">10</th>
            <th class="text-center">11</th>
            <th class="text-center">12=(10+11)</th>
            <th class="text-center">13 = (6+9+12)</th>
            <th class="text-center">14 = (3-13)</th>
        </tr>

        @foreach ($data->detail as $key => $item)
        <tr style="font-size: 8px">
            <td>{{koderekening($item->koderek->kode1,$item->koderek->kode2,$item->koderek->kode3,$item->koderek->kode4,$item->koderek->kode5,$item->koderek->kode6)}} 
              <a href="/admin/transaksi/spj/detail/delete/{{$item->id}}"
                onclick="return confirm('Yakin ingin di hapus');"
                class="btn btn-xs btn-flat"><i class="fa fa-trash"></i></a>
              </td>
            <td>{{$item->koderek->uraian}}</td>
            <td style="text-align: right">
              {{number_format($item->ja)}}
            </td>
            <td style="text-align: right">
                {{number_format($item->ls_gaji1)}}
            </td>
            <td style="text-align: right">
                {{number_format($item->ls_gaji2)}}
              
            </td>
            <td style="text-align: right">
              {{number_format($item->ls_gaji1 + $item->ls_gaji2)}}
              
            </td>
            <td style="text-align: right">
                {{number_format($item->ls_bj1)}}
              
            </td>
            <td style="text-align: right">
                {{number_format($item->ls_bj2)}}
              
            </td>
            <td style="text-align: right">
              {{number_format($item->ls_bj1 + $item->ls_bj2)}}
            </td>
            <td style="text-align: right">
                {{number_format($item->gu1)}}
            
            </td>
            <td style="text-align: right">
                {{number_format($item->gu2)}}
             
            </td>
            <td style="text-align: right">
              {{number_format($item->gu1 + $item->gu2)}}
            
            </td>
            <td style="text-align: right">
              {{number_format($item->jumlah)}}
            </td>
            <td style="text-align: right">
              {{number_format($item->sisa)}}
            </td>
            {{-- <td>
              <a href="/admin/transaksi/spj/detail/{{$item->id}}" class="btn btn-xs btn-flat  btn-success">detail</a>
                <a href="/admin/transaksi/spj/edit/{{$item->id}}" class="btn btn-xs btn-flat  btn-success"><i class="fa fa-edit"></i></a>
                <a href="/admin/transaksi/spj/delete/{{$item->id}}"
                    onclick="return confirm('Yakin ingin di hapus');"
                    class="btn btn-xs btn-flat  btn-danger"><i class="fa fa-trash"></i></a>
            </td> --}}
        </tr>
        @endforeach

        <tr style="font-size: 8px">
            <td></td>
            <td>JUMLAH</td>
            <td style="text-align: right">{{number_format($detail->sum('ja'))}}</td>
            <td style="text-align: right">{{number_format($detail->sum('ls_gaji1'))}}</td>
            <td style="text-align: right">{{number_format($detail->sum('ls_gaji2'))}}</td>
            <td style="text-align: right">{{number_format($detail->sum('ls_gaji3'))}}</td>
            <td style="text-align: right">{{number_format($detail->sum('ls_bj1'))}}</td>
            <td style="text-align: right">{{number_format($detail->sum('ls_bj2'))}}</td>
            <td style="text-align: right">{{number_format($detail->sum('ls_bj3'))}}</td>
            <td style="text-align: right">{{number_format($detail->sum('gu1'))}}</td>
            <td style="text-align: right">{{number_format($detail->sum('gu2'))}}</td>
            <td style="text-align: right">{{number_format($detail->sum('gu3'))}}</td>
            <td style="text-align: right">{{number_format($detail->sum('jumlah'))}}</td>
            <td style="text-align: right">{{number_format($detail->sum('sisa'))}}</td>
          </tr>
          <tr style="font-size: 8px">
            <td></td>
            <td>PENERIMAAN</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr style="font-size: 8px">
            <td></td>
            <td>&nbsp;&nbsp;&nbsp;- SP2D</td>
            <td></td>
            <td style="text-align: right">{{$sp2d->ls_gaji1}}</td>
            <td style="text-align: right">{{$sp2d->ls_gaji2}}</td>
            <td style="text-align: right">{{$sp2d->ls_gaji3}}</td>
            <td style="text-align: right">{{$sp2d->ls_bj1}}</td>
            <td style="text-align: right">{{$sp2d->ls_bj2}}</td>
            <td style="text-align: right">{{$sp2d->ls_bj3}}</td>
            <td style="text-align: right">{{$sp2d->gu1}}</td>
            <td style="text-align: right">{{$sp2d->gu2}}</td>
            <td style="text-align: right">{{$sp2d->gu3}}</td>
            <td style="text-align: right">{{$sp2d->jumlah}}</td>
            <td style="text-align: right"></td>
          </tr>
          <tr style="font-size: 8px">
            <td></td>
            <td>&nbsp;&nbsp;&nbsp;- Potongan Pajak</td>
            <td></td>
            <td style="text-align: right">{{$pp->ls_gaji1}}</td>
            <td style="text-align: right">{{$pp->ls_gaji2}}</td>
            <td style="text-align: right">{{$pp->ls_gaji3}}</td>
            <td style="text-align: right">{{$pp->ls_bj1}}</td>
            <td style="text-align: right">{{$pp->ls_bj2}}</td>
            <td style="text-align: right">{{$pp->ls_bj3}}</td>
            <td style="text-align: right">{{$pp->gu1}}</td>
            <td style="text-align: right">{{$pp->gu2}}</td>
            <td style="text-align: right">{{$pp->gu3}}</td>
            <td style="text-align: right">{{$pp->jumlah}}</td>
            <td style="text-align: right"></td>
          </tr>
          <tr style="font-size: 8px">
            <td></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a. PPN</td>
            <td></td>
            <td style="text-align: right">{{$ppn->ls_gaji1}}</td>
            <td style="text-align: right">{{$ppn->ls_gaji2}}</td>
            <td style="text-align: right">{{$ppn->ls_gaji3}}</td>
            <td style="text-align: right">{{$ppn->ls_bj1}}</td>
            <td style="text-align: right">{{$ppn->ls_bj2}}</td>
            <td style="text-align: right">{{$ppn->ls_bj3}}</td>
            <td style="text-align: right">{{$ppn->gu1}}</td>
            <td style="text-align: right">{{$ppn->gu2}}</td>
            <td style="text-align: right">{{$ppn->gu3}}</td>
            <td style="text-align: right">{{$ppn->jumlah}}</td>
            <td style="text-align: right"></td>
          </tr>
          <tr style="font-size: 8px">
            <td></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. PPh - 21</td>
            <td></td>
            <td style="text-align: right">{{$pph21->ls_gaji1}}</td>
            <td style="text-align: right">{{$pph21->ls_gaji2}}</td>
            <td style="text-align: right">{{$pph21->ls_gaji3}}</td>
            <td style="text-align: right">{{$pph21->ls_bj1}}</td>
            <td style="text-align: right">{{$pph21->ls_bj2}}</td>
            <td style="text-align: right">{{$pph21->ls_bj3}}</td>
            <td style="text-align: right">{{$pph21->gu1}}</td>
            <td style="text-align: right">{{$pph21->gu2}}</td>
            <td style="text-align: right">{{$pph21->gu3}}</td>
            <td style="text-align: right">{{$pph21->jumlah}}</td>
            <td style="text-align: right"></td>
          </tr>
          <tr style="font-size: 8px">
            <td></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c. PPh - 22</td>
            <td></td>
            <td style="text-align: right">{{$pph22->ls_gaji1}}</td>
            <td style="text-align: right">{{$pph22->ls_gaji2}}</td>
            <td style="text-align: right">{{$pph22->ls_gaji3}}</td>
            <td style="text-align: right">{{$pph22->ls_bj1}}</td>
            <td style="text-align: right">{{$pph22->ls_bj2}}</td>
            <td style="text-align: right">{{$pph22->ls_bj3}}</td>
            <td style="text-align: right">{{$pph22->gu1}}</td>
            <td style="text-align: right">{{$pph22->gu2}}</td>
            <td style="text-align: right">{{$pph22->gu3}}</td>
            <td style="text-align: right">{{$pph22->jumlah}}</td>
            <td style="text-align: right"></td>
          </tr>
          <tr style="font-size: 8px">
            <td></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d. PPh - 23</td>
            <td></td>
            <td style="text-align: right">{{$pph23->ls_gaji1}}</td>
            <td style="text-align: right">{{$pph23->ls_gaji2}}</td>
            <td style="text-align: right">{{$pph23->ls_gaji3}}</td>
            <td style="text-align: right">{{$pph23->ls_bj1}}</td>
            <td style="text-align: right">{{$pph23->ls_bj2}}</td>
            <td style="text-align: right">{{$pph23->ls_bj3}}</td>
            <td style="text-align: right">{{$pph23->gu1}}</td>
            <td style="text-align: right">{{$pph23->gu2}}</td>
            <td style="text-align: right">{{$pph23->gu3}}</td>
            <td style="text-align: right">{{$pph23->jumlah}}</td>
            <td style="text-align: right"></td>
          </tr>
          <tr style="font-size: 8px">
            <td></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d. PPh Pasal 4 Ayat 2</td>
            <td></td>
            <td style="text-align: right">{{$pph4->ls_gaji1}}</td>
            <td style="text-align: right">{{$pph4->ls_gaji2}}</td>
            <td style="text-align: right">{{$pph4->ls_gaji3}}</td>
            <td style="text-align: right">{{$pph4->ls_bj1}}</td>
            <td style="text-align: right">{{$pph4->ls_bj2}}</td>
            <td style="text-align: right">{{$pph4->ls_bj3}}</td>
            <td style="text-align: right">{{$pph4->gu1}}</td>
            <td style="text-align: right">{{$pph4->gu2}}</td>
            <td style="text-align: right">{{$pph4->gu3}}</td>
            <td style="text-align: right">{{$pph4->jumlah}}</td>
            <td style="text-align: right"></td>
          </tr>
          <tr style="font-size: 8px">
            <td></td>
            <td>&nbsp;&nbsp;&nbsp;- Lain-lain</td>
            <td></td>
            <td style="text-align: right">{{$lain->ls_gaji1}}</td>
            <td style="text-align: right">{{$lain->ls_gaji2}}</td>
            <td style="text-align: right">{{$lain->ls_gaji3}}</td>
            <td style="text-align: right">{{$lain->ls_bj1}}</td>
            <td style="text-align: right">{{$lain->ls_bj2}}</td>
            <td style="text-align: right">{{$lain->ls_bj3}}</td>
            <td style="text-align: right">{{$lain->gu1}}</td>
            <td style="text-align: right">{{$lain->gu2}}</td>
            <td style="text-align: right">{{$lain->gu3}}</td>
            <td style="text-align: right">{{$lain->jumlah}}</td>
            <td style="text-align: right"></td>
          </tr>
          <tr style="font-size: 8px">
            <td></td>
            <td>JUMLAH PENERIMAAN</td>
            <td></td>
            <td style="text-align: right">{{$penerimaan->sum('ls_gaji1')}}</td>
            <td style="text-align: right">{{$penerimaan->sum('ls_gaji2')}}</td>
            <td style="text-align: right">{{$penerimaan->sum('ls_gaji3')}}</td>
            <td style="text-align: right">{{$penerimaan->sum('ls_bj1')}}</td>
            <td style="text-align: right">{{$penerimaan->sum('ls_bj2')}}</td>
            <td style="text-align: right">{{$penerimaan->sum('ls_bj3')}}</td>
            <td style="text-align: right">{{$penerimaan->sum('gu1')}}</td>
            <td style="text-align: right">{{$penerimaan->sum('gu2')}}</td>
            <td style="text-align: right">{{$penerimaan->sum('gu3')}}</td>
            <td style="text-align: right">{{$penerimaan->sum('jumlah')}}</td>
            <td style="text-align: right"></td>
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
