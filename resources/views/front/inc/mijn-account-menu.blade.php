<div class="col-lg-3">
    <div class="row">
        <div class="col-12 mijn-account-menu">
            <p class="text-center subtitle">Mijn account</p>
            <ul>
                <li><a href="{{ route('mijn-account.inschrijvingen') }}" class="{{ Request::segment(2) == 'inschrijvingen' ? 'menu-active':'' }}">Mijn inschrijvingen</a></li>
                <li><a href="{{ route('mijn-account.teams') }}"  class="{{ Request::segment(2) == 'teams' ? 'menu-active':'' }}">Mijn teams</a></li>
                <li><a href="{{ route('logout') }}">Uitloggen</a></li>
            </ul>
            <br>
        </div>
    </div>
</div>
