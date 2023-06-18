<li class="{{ (request()->is('verifikator/beranda')) ? 'active' : '' }}"><a href="/verifikator/beranda"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>


<li class="header">TRANSAKSI</li>
<li class="{{ (request()->is('verifikator/transaksi/spj')) ? 'active' : '' }}"><a href="/verifikator/transaksi/spj"><i class="fa fa-money"></i> <span>Verifikasi SPJ</span></a></li>


<li class="header">SETTING</li>
<li class="{{ (request()->is('logout')) ? 'active' : '' }}"><a href="/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>