<li class="{{ (request()->is('admin/beranda')) ? 'active' : '' }}"><a href="/admin/beranda"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
<li class="{{ (request()->is('admin/data/koderek*')) ? 'active' : '' }}"><a href="/admin/data/koderek"><i class="fa fa-list"></i> <span>Data Kode Rek</span></a></li>

<li class="header">TRANSAKSI</li>
<li class="{{ (request()->is('admin/transaksi/spj')) ? 'active' : '' }}"><a href="/admin/transaksi/spj"><i class="fa fa-list"></i> <span>SPJ</span></a></li>
<li class="{{ (request()->is('admin/transaksi/bku')) ? 'active' : '' }}"><a href="/admin/transaksi/bku"><i class="fa fa-list"></i> <span>BKU</span></a></li>
<li class="{{ (request()->is('admin/transaksi/npd')) ? 'active' : '' }}"><a href="/admin/transaksi/npd"><i class="fa fa-list"></i> <span>NPD</span></a></li>
<li class="{{ (request()->is('admin/transaksi/sptjb')) ? 'active' : '' }}"><a href="/admin/transaksi/sptjb"><i class="fa fa-list"></i> <span>SPTJB</span></a></li>
<li class="{{ (request()->is('admin/transaksi/kuitansi')) ? 'active' : '' }}"><a href="/admin/transaksi/kuitansi"><i class="fa fa-list"></i> <span>KUITANSI SATU SATU</span></a></li>

<li class="header">SETTING</li>
<li class="{{ (request()->is('logout')) ? 'active' : '' }}"><a href="/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>