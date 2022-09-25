@if (Auth::user()->role == 1)
<li class="side-menus {{ Request::is('home*') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class="fas fa-home    "></i><span>Dashboard</span>
    </a>
</li>
<li class="side-menus {{ Request::is('anggotas*') ? 'active' : '' }}"> 
    <a class="nav-link" href="{{ route('anggotas.index') }}"><i class="fas fa-user"></i><span>Anggota</span></a>
</li>

<li class="side-menus {{ Request::is('genres*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('genres.index') }}"><i class="fas fa-spa"></i><span>Genre</span></a>
</li>
<li class="side-menus {{ Request::is('teams*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('teams.index') }}"><i class="fas fa-users"></i><span>Team</span></a>
</li>
<li class="side-menus {{ Request::is('pemesanans*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('pemesanans.index') }}"><i class="fas fa-calendar-check"></i><span>Pemesanan</span></a>
</li>


@else
<li class="side-menus {{ Request::is('home*') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class="fas fa-home    "></i><span>Dashboard</span>
    </a>
</li>
<li class="side-menus {{ Request::is('pemesanans*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('pemesanans.index') }}"><i class="fas fa-calendar-check"></i><span>Pemesanan</span></a>
</li>
@endif