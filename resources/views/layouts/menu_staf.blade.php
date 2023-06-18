<li class="{{ (request()->is('staf/beranda')) ? 'active' : '' }}"><a href="/staf/beranda"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>


<li class="header">TRANSAKSI</li>
<li class="{{ (request()->is('staf/transaksi/spj')) ? 'active' : '' }}"><a href="/staf/transaksi/spj"><i class="fa fa-money"></i> <span>Pembuatan SPJ</span></a></li>

<li class="header">SETTING</li>
<li class="{{ (request()->is('logout')) ? 'active' : '' }}"><a href="/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>