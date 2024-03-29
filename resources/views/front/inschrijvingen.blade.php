@extends('front.inc.master')

@section('content')
{{--
    <div class="row">
        <div class="col-12">
            <p class="text-left">@lang('front.inschrijvingen.description')</p>
            <p class="text-left subtitle">@lang('front.inschrijvingen.title')</p>
        </div>
        @if (session('status') && session('status') == 'no_deelnemers')
            <div class="error mb-3">
                @lang('front.inschrijvingen.messages.no_deelnemers')
            </div>
        @endif

        @if (session('status') && session('status') == 'no_voucher')
            <div class="error mb-3">
                @lang('front.inschrijvingen.messages.no_voucher')
            </div>
        @endif

        <div class="col-12" id="div_tbl_inschrijvingen">
            @include('front.inc.tbl_inschrijvingen')
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <p class="text-left subtitle">@lang('front.inschrijvingen.section1')</p>
        </div>
        <div class="col-12">
            <form action="{{ route('inschrijving.submit') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <label for="email" class="text">@lang('front.inschrijvingen.fields.email.label')</label>
                        <input type="text" id="email-administratief" name="email_administratief" class="form-control text  input-text" value="{{ $arr_deelnemers[0]->email ?? '' }}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary btn-submit">@lang('front.inschrijvingen.fields.submit.text')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    --}}
@stop
