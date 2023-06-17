
<section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    @if (Auth::user()->hasRole('superadmin'))
        @include('layouts.menu_superadmin');
    @elseif(Auth::user()->hasRole('admin'))
        @include('layouts.menu_admin');
    @elseif(Auth::user()->hasRole('staf'))
        @include('layouts.menu_staf');
    @elseif(Auth::user()->hasRole('verifikator'))
        @include('layouts.menu_verifikator');
    @elseif(Auth::user()->hasRole('bendahara'))
        @include('layouts.menu_bendahara');
    @endif
    </ul>
</section>