<ul class="sidebar-nav">
    <li class="sidebar-brand">
        <a href="{{ route('home') }}">Dashboard</a>
    </li>
    @if(Auth::user()->role == 1)
    <li>
        <a href="{{ route('pegawai.index') }}">Data Pegawai</a>
    </li>
    <li>
        <a href="{{ route('pengajuan-claim.index') }}">Pengajuan Claim</a>
    </li>
    @endif
    <li>
        <a href="" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>
