<li class="{{ (request()->is('bendahara/pencairan/beranda')) ? 'active' : '' }}"><a href="/bendahara/pencairan/beranda"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>


<li class="header">TRANSAKSI</li>
<li class="{{ (request()->is('bendahara/pencairan/*')) ? 'active' : '' }}"><a href="/bendahara/pencairan/spj/disetujui"><i class="fa fa-list"></i> <span>SPJ Disetujui</span></a></li>


<li class="header">SETTING</li>
<li class="{{ (request()->is('logout')) ? 'active' : '' }}"><a href="/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>