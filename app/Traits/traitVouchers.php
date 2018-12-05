<?php

namespace App\Traits;

use Illuminate\Support\Str;

use App\Models\Vouchers;

trait traitVouchers
{
    /**
     * @param $voucherCode
     * @return bool
     */
    public function checkVoucherUsed($voucherCode)
    {
        $arr_voucher = Vouchers::where('code',$voucherCode)->first();
        if(isset($arr_voucher)) {
            if($arr_voucher->gebruikt == 'N' && $arr_voucher->deelnemer_id == null) {
                return false;
            }
            else {
                return true;
            }
        }
        else {
            return true;
        }
    }

    /**
     * @param $voucherCode
     * @param $deelnemerId
     * @return int
     */
    public function assignVoucher($voucherCode, $deelnemerId)
    {
        $arr_voucher = Vouchers::where('code',$voucherCode)->first();

        $arr_voucher->deelnemer_id  = $deelnemerId;
        $arr_voucher->gebruikt      = 'Y';
        $arr_voucher->save();

        return $arr_voucher->id;
    }

    /**
     * @param $deelnemerId
     */
    public function unlinkVoucher($deelnemerId)
    {
        $arr_voucher                = Vouchers::where('deelnemer_id',$deelnemerId)->first();
        $arr_voucher->gebruikt      = 'N';
        $arr_voucher->deelnemer_id  = null;
        $arr_voucher->save();
    }
}
