@if ($errors->any() || $voucherError == true)
    <div class="row">
        <div class="col-12">
            <div class="error">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
                @if($voucherError == true)
                    @lang('front.tbl_inschrijvingen.errors.vouchererror')
                @endif
            </div>
        </div>
    </div>
@endif

<div class="row mb-3 text">
    <div class="col-1 d-none d-lg-block">
        #
    </div>
    <div class="col-2 d-none d-lg-block">
        @lang('front.tbl_inschrijvingen.header.firstname')
    </div>
    <div class="col-2 d-none d-lg-block">
        @lang('front.tbl_inschrijvingen.header.name')
    </div>
    <div class="col-4 d-none d-lg-block">
        @lang('front.tbl_inschrijvingen.header.email')
    </div>
    <div class="col-2 d-none d-lg-block">
        @lang('front.tbl_inschrijvingen.header.voucher')
    </div>
    <div class="col-1 d-none d-lg-block">

    </div>
</div>
@if (isset($arr_deelnemers) && count($arr_deelnemers)>0)
    @foreach ($arr_deelnemers as $key => $deelnemer)
        @if($edit == true && $referentienr == $deelnemer->referentienr)
            <div class="row mb-3 text">
                <div class="col-lg-1 col-12 mb-1">
                    {{ $key+1 }}
                </div>
                <div class="col-lg-2 col-12 mb-1">
                    <input type="text" class="form-control input-text" id="edit_voornaam" value="{{ $deelnemer->voornaam }}">
                </div>
                <div class="col-lg-2 col-12 mb-1">
                    <input type="text" class="form-control input-text" id="edit_naam" value="{{ $deelnemer->naam }}">
                </div>
                <div class="col-lg-4 col-12 mb-1">
                    <input type="text" class="form-control input-text" id="edit_email" value="{{ $deelnemer->email }}">
                </div>
                <div class="col-lg-2 col-12 mb-1">
                    {{ $deelnemer->relVoucher->code ?? '' }}
                </div>
                <div class="col-lg-1 col-12 mb-2  d-none d-lg-block">
                    <a href="" id="update_inschrijving" data-referentie="{{ $deelnemer->referentienr }}"><i class="fas fa-save btn-icon"></i></a>
                </div>
                <div class="col-lg-1 col-12 mb-2 d-lg-none">
                    <a href="" id="update_inschrijving" data-referentie="{{ $deelnemer->referentienr }}" class="btn btn-primary btn-icon" >Bewaar</a>
                </div>
            </div>
        @else
            <div class="row mb-3 text">
                <div class="col-lg-1 col-12 mb-1">
                    {{ $key+1 }}
                </div>
                <div class="col-lg-2 col-12 mb-1">
                    {{ $deelnemer->voornaam }}
                </div>
                <div class="col-lg-2 col-12 mb-1">
                    {{ $deelnemer->naam }}
                </div>
                <div class="col-lg-4 col-12 mb-1">
                    {{ $deelnemer->email }}
                </div>
                <div class="col-lg-2 col-12 mb-1">
                    {{ $deelnemer->relVoucher->code ?? '' }}
                </div>
                <div class="col-lg-1 col-12">
                    <a href="" id="edit_inschrijving" data-referentie="{{ $deelnemer->referentienr }}"><i class="fas fa-user-edit btn-icon"></i></a>
                    <a href="" id="remove_inschrijving" data-referentie="{{ $deelnemer->referentienr }}"><i class="fa fa-trash btn-icon" aria-hidden="true"></i></a>&nbsp;
                </div>
            </div>
        @endif
    @endforeach
@endif

<div class="row text">
    <div class="col-lg-1 col-12 mb-1 d-none d-lg-block">

    </div>
    <div class="col-lg-2 col-12 mb-2">
        <input type="text" class="form-control input-text" id="voornaam" value="{{ $oldData['voornaam'] ?? '' }}" placeholder="Voornaam">
    </div>
    <div class="col-lg-2 col-12 mb-2">
        <input type="text" class="form-control input-text" id="naam" value="{{ $oldData['naam'] ?? '' }}" placeholder="Naam">
    </div>
    <div class="col-lg-4 col-12 mb-2">
        <input type="text" class="form-control input-text" id="email" value="{{ $oldData['email'] ?? '' }}" placeholder="E-mail">
    </div>
    <div class="col-lg-2 col-12 mb-2">
        <input type="text" class="form-control input-text" id="voucher" value="{{ $oldData['voucher'] ?? '' }}" placeholder="Voucher">
    </div>
    <div class="col-lg-1 col-12 mb-2  d-none d-lg-block">
        <a href="" id="add_inschrijving"><i class="fas fa-plus-square btn-icon" style="font-size: 26px"></i></a>
    </div>
    <div class="col-lg-1 col-12 mb-2 d-lg-none">
        <a href="" id="add_inschrijving" class="btn btn-primary btn-submit" >@lang('front.tbl_inschrijvingen.fields.add_inschrijving')</a>
    </div>
</div>

<div class="row mt-5 ml-2 mr-2 text">
    <div class="col-0 col-lg-8">
    </div>
    <div class="col-12 col-lg-4 totaal-overzicht">
        <div class="row mt-2">
            <div class="col-8 col-lg-8 text-right">
                @lang('front.tbl_inschrijvingen.overview.amount'):
            </div>
            <div class="col-4 col-lg-4">
                {{count($arr_deelnemers)}}
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-8 col-lg-8 text-right">
                @lang('front.tbl_inschrijvingen.overview.totalprice'):
            </div>
            <div class="col-4 col-lg-4">
                {{ $arr_order->totaal ?? 0 }}&nbsp;&euro;
            </div>
        </div>
    </div>
</div>
