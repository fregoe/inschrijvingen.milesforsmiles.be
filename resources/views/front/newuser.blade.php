@extends('front.inc.master')

@section('content')
    <div class="row mt-5">
        <div class="col-lg-3 col-1"></div>
        <div class="col-lg-6 col-10 login">
            <p class="text-center"><strong>@lang('front.nieuwe_gebruiker.title')</strong></p>
            <form method="post" action="{{ route('user.new.submit') }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        @if (session('status') && session('status') == 'user_created')
                            <div class="error mb-3">
                                @lang('front.nieuwe_gebruiker.messages.user_created')
                            </div>
                        @endif
                        @if (session('status') && session('status') == 'user_exists')
                            <div class="error mb-3">
                                @lang('front.nieuwe_gebruiker.messages.user_exists')
                            </div>
                        @endif
                        <input class="form-control mb-2 input-text" name="email" placeholder="E-mailadres gebruiker">
                        <button type="submit" class="btn btn-primary btn-block btn-submit">Verstuur</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3 col-1"></div>
    </div>
@stop
