<li class="{{ (request()->is('staf/beranda')) ? 'active' : '' }}"><a href="/staf/beranda"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>


<li class="header">TRANSAKSI</li>
<li class="{{ (request()->is('staf/transaksi/spj')) ? 'active' : '' }}"><a href="/staf/transaksi/spj"><i class="fa fa-money"></i> <span>Pembuatan SPJ</span></a></li>

<li class="header">LAPORAN</li>
<li class="{{ (request()->is('staf/laporan/spj')) ? 'active' : '' }}"><a href="/staf/laporan/spj"><i class="fa fa-file"></i> <span>Cetak SPJ Administratif</span></a></li>
<li class="{{ (request()->is('staf/laporan/spj')) ? 'active' : '' }}"><a href="/staf/laporan/bku"><i class="fa fa-file"></i> <span>Cetak BKU</span></a></li>
<li class="{{ (request()->is('staf/laporan/spj')) ? 'active' : '' }}"><a href="/staf/laporan/npd"><i class="fa fa-file"></i> <span>Cetak NPD</span></a></li>
<li class="{{ (request()->is('staf/laporan/spj')) ? 'active' : '' }}"><a href="/staf/laporan/sptjb"><i class="fa fa-file"></i> <span>Cetak SPTJB</span></a></li>
<li class="{{ (request()->is('staf/laporan/spj')) ? 'active' : '' }}"><a href="/staf/laporan/kwitansi"><i class="fa fa-file"></i> <span>Cetak Kwitansi</span></a></li>
<li class="{{ (request()->is('staf/laporan/spj')) ? 'active' : '' }}"><a href="/staf/laporan/ttjkn"><i class="fa fa-file"></i> <span>Cetak Tanda Terima JKN</span></a></li>
<li class="{{ (request()->is('staf/laporan/spj')) ? 'active' : '' }}"><a href="/staf/laporan/ttjkk"><i class="fa fa-file"></i> <span>Cetak Tanda Terima JKK</span></a></li>
<li class="{{ (request()->is('staf/laporan/spj')) ? 'active' : '' }}"><a href="/staf/laporan/ttjkm"><i class="fa fa-file"></i> <span>Cetak Tanda Terima JKM</span></a></li>
<li class="{{ (request()->is('staf/laporan/spj')) ? 'active' : '' }}"><a href="/staf/laporan/nodin"><i class="fa fa-file"></i> <span>Cetak Nota Dinas</span></a></li>

<li class="header">SETTING</li>
<li class="{{ (request()->is('logout')) ? 'active' : '' }}"><a href="/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>