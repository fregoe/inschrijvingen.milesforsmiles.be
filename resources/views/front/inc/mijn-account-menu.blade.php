<div class="col-lg-3">
    <div class="row">
        <div class="col-12 mijn-account-menu">
            <ul>
                <li><a href="{{ route('mijn-account.inschrijvingen') }}" class="{{ Request::segment(2) == 'inschrijvingen' ? 'menu-active':'' }}">@lang('front.menu_teams.deelnemers')</a></li>
                <li><a href="{{ route('mijn-account.teams') }}"  class="{{ Request::segment(2) == 'teams' ? 'menu-active':'' }}">@lang('front.menu_teams.teams')</a></li>
                <li><a href="{{ route('logout') }}">@lang('front.menu_teams.logoff')</a></li>
            </ul>
            <br>
        </div>
    </div>
</div>
