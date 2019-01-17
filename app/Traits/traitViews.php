<?php

namespace App\Traits;

use Illuminate\Support\Str;

use App\Models\Orders;
use App\Models\Teams;
use App\Models\Deelnemers;

trait traitViews
{
    /**
     * @param null $oldData
     * @param bool $voucherError
     * @param bool $edit
     * @param null $referentienr
     * @return array
     */
    public function getInschrijvingsData($oldData = null, $voucherError = false, $edit = false, $referentienr = null)
    {
        if(session('ss_order_id')) {
            $arr_deelnemers = Deelnemers::where('order_uuid',session('ss_order_id'))->get();
        }
        else {
            $arr_deelnemers = [];
        }

        $arr_order = Orders::where('uuid',session('ss_order_id'))->first();

        $data = [
            'arr_deelnemers'    => $arr_deelnemers,
            'oldData'           => $oldData,
            'voucherError'      => $voucherError,
            'arr_order'         => $arr_order,
            'edit'              => $edit,
            'referentienr'      => $referentienr
        ];

        return $data;
    }

    /**
     * @param Teams $arr_team
     * @param bool $alreadyLinked
     * @param bool $maxTeamleden
     * @param bool $unknownDeelnemer
     * @return array
     */
    public function getTeamledenData(Teams $arr_team, $alreadyLinked = false, $maxTeamleden = false, $unknownDeelnemer = false, $hasNotPaid = false)
    {
        $data = [
            'arr_team'         => $arr_team,
            'alreadyLinked'    => $alreadyLinked,
            'maxTeamleden'     => $maxTeamleden,
            'unknownDeelnemer' => $unknownDeelnemer,
            'hasNotPaid'       => $hasNotPaid
        ];

        return $data;
    }
}
