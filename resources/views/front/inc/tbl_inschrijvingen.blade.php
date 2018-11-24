@if ($errors->any() || $voucherError == true)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            @if($voucherError == true)
                <li>Voucher code reeds gebruikt</li>
            @endif
        </ul>
    </div>
@endif

<div class="row mb-3">
    <div class="col-1 d-none d-lg-block">
        #
    </div>
    <div class="col-2 d-none d-lg-block">
        Naam
    </div>
    <div class="col-2 d-none d-lg-block">
        Voornaam
    </div>
    <div class="col-4 d-none d-lg-block">
        E-mail
    </div>
    <div class="col-2 d-none d-lg-block">
        Voucher
    </div>
    <div class="col-1 d-none d-lg-block">

    </div>
</div>
@if (isset($arr_deelnemers) && count($arr_deelnemers)>0)
    @foreach ($arr_deelnemers as $key => $deelnemer)
        @if($edit == true && $referentienr == $deelnemer->referentienr)
            <div class="row mb-3">
                <div class="col-lg-1 col-12 mb-1">
                    {{ $key+1 }}
                </div>
                <div class="col-lg-2 col-12 mb-1">
                    <input type="text" class="form-control" id="edit_naam" value="{{ $deelnemer->naam }}">
                </div>
                <div class="col-lg-2 col-12 mb-1">
                    <input type="text" class="form-control" id="edit_voornaam" value="{{ $deelnemer->voornaam }}">
                </div>
                <div class="col-lg-4 col-12 mb-1">
                    <input type="text" class="form-control" id="edit_email" value="{{ $deelnemer->email }}">
                </div>
                <div class="col-lg-2 col-12 mb-1">
                    {{ $deelnemer->relVoucher->code ?? '' }}
                </div>
                <div class="col-lg-1 col-12 mb-2  d-none d-lg-block">
                    <a href="" id="update_inschrijving" data-referentie="{{ $deelnemer->referentienr }}"><i class="fas fa-save"></i></a>
                </div>
                <div class="col-lg-1 col-12 mb-2 d-lg-none">
                    <a href="" id="update_inschrijving" data-referentie="{{ $deelnemer->referentienr }}" class="btn btn-primary" >Bewaar</a>
                </div>
            </div>
        @else
            <div class="row mb-3">
                <div class="col-lg-1 col-12 mb-1">
                    {{ $key+1 }}
                </div>
                <div class="col-lg-2 col-12 mb-1">
                    {{ $deelnemer->naam }}
                </div>
                <div class="col-lg-2 col-12 mb-1">
                    {{ $deelnemer->voornaam }}
                </div>
                <div class="col-lg-4 col-12 mb-1">
                    {{ $deelnemer->email }}
                </div>
                <div class="col-lg-2 col-12 mb-1">
                    {{ $deelnemer->relVoucher->code ?? '' }}
                </div>
                <div class="col-lg-1 col-12">
                    <a href="" id="edit_inschrijving" data-referentie="{{ $deelnemer->referentienr }}"><i class="fas fa-user-edit"></i></a>
                    <a href="" id="remove_inschrijving" data-referentie="{{ $deelnemer->referentienr }}"><i class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;
                </div>
            </div>
        @endif
    @endforeach
@endif

<div class="row">
    <div class="col-lg-1 col-12 mb-1 d-none d-lg-block">

    </div>
    <div class="col-lg-2 col-12 mb-2">
        <input type="text" class="form-control" id="naam" value="{{ $oldData['naam'] ?? '' }}" placeholder="Naam">
    </div>
    <div class="col-lg-2 col-12 mb-2">
        <input type="text" class="form-control" id="voornaam" value="{{ $oldData['voornaam'] ?? '' }}" placeholder="Voornaam">
    </div>
    <div class="col-lg-4 col-12 mb-2">
        <input type="text" class="form-control" id="email" value="{{ $oldData['email'] ?? '' }}" placeholder="E-mail">
    </div>
    <div class="col-lg-2 col-12 mb-2">
        <input type="text" class="form-control" id="voucher" value="{{ $oldData['voucher'] ?? '' }}" placeholder="Voucher">
    </div>
    <div class="col-lg-1 col-12 mb-2  d-none d-lg-block">
        <a href="" id="add_inschrijving"><i class="fas fa-plus-square" style="font-size: 26px"></i></a>
    </div>
    <div class="col-lg-1 col-12 mb-2 d-lg-none">
        <a href="" id="add_inschrijving" class="btn btn-primary" >Voeg toe</a>
    </div>
</div>

<div class="row mt-5 ml-2 mr-2">
    <div class="col-0 col-lg-8">
    </div>
    <div class="col-12 col-lg-4 totaal-overzicht">
        <div class="row mt-2">
            <div class="col-8 col-lg-8 text-right">
                Aantal inschrijvingen:
            </div>
            <div class="col-4 col-lg-4">
                {{count($arr_deelnemers)}}
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-8 col-lg-8 text-right">
                Totaal te betalen :
            </div>
            <div class="col-4 col-lg-4">
                {{ $arr_order->totaal ?? 0 }}&euro;
            </div>
        </div>
    </div>
</div>
