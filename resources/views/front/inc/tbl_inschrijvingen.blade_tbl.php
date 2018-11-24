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
<div class="table-responsive-sm">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Naam</th>
            <th scope="col">Voornaam</th>
            <th scope="col">E-mail</th>
            <th scope="col">Voucher</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @if (isset($arr_deelnemers) && count($arr_deelnemers)>0)
            @foreach ($arr_deelnemers as $key => $deelnemer)
                <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td>{{ $deelnemer->naam }}</td>
                    <td>{{ $deelnemer->voornaam }}</td>
                    <td>{{ $deelnemer->email }}</td>
                    <td>{{ $deelnemer->relVoucher->code ?? '' }}</td>
                    <td><a href="" id="remove_inschrijving" data-referentie="{{ $deelnemer->referentienr }}"><i class="fa fa-trash" aria-hidden="true"></i></td>
                    <!-- <td><a href="" id="edit_inschrijving" data-referentie="{{ $deelnemer->referentienr }}"><i class="fas fa-user-edit"></i></td> -->
                </tr>
            @endforeach
        @endif
        <tr>
            <th scope="row"></th>
            <td><input type="text" class="form-control" id="naam" value="{{ $oldData['naam'] ?? '' }}"></td>
            <td><input type="text" class="form-control" id="voornaam" value="{{ $oldData['voornaam'] ?? '' }}"></td>
            <td><input type="text" class="form-control" id="email" value="{{ $oldData['email'] ?? '' }}"></td>
            <td><input type="text" class="form-control" id="voucher" value="{{ $oldData['voucher'] ?? '' }}"></td>
            <td><a href="" id="add_inschrijving"><i class="fas fa-plus-square" style="font-size: 26px"></i></a></td>
            <td></td>
        </tr>
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-8">
    </div>
    <div class="col-4 totaal-overzicht">
        <div class="row mt-2">
            <div class="col-8 text-right">
                Aantal inschrijvingen:
            </div>
            <div class="col-4">
                {{count($arr_deelnemers)}}
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-8 text-right">
                Totaal te betalen :
            </div>
            <div class="col-4">
                {{ $arr_order->totaal ?? 0 }}&euro;
            </div>
        </div>
    </div>
</div>
