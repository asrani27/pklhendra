<li class="{{ (request()->is('bendahara/pengeluaran/beranda')) ? 'active' : '' }}"><a href="/bendahara/pengeluaran/beranda"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>


<li class="header">TRANSAKSI</li>
<li class="{{ (request()->is('bendahara/pengeluaran/spj/masuk')) ? 'active' : '' }}"><a href="/bendahara/pengeluaran/spj/masuk"><i class="fa fa-list"></i> <span>SPJ Masuk</span></a></li>
<li class="{{ (request()->is('bendahara/pengeluaran/spj/disetujui')) ? 'active' : '' }}"><a href="/bendahara/pengeluaran/spj/disetujui"><i class="fa fa-list"></i> <span>SPJ Disetujui</span></a></li>


<li class="header">SETTING</li>
<li class="{{ (request()->is('logout')) ? 'active' : '' }}"><a href="/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>