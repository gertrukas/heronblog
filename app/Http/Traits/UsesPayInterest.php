<?php

namespace App\Http\Traits;

use App\Models\PayInterest;

trait UsesPayInterest
{



    public function paymentGenerator($processInvestment)
    {
        // {{-- 1 Mensual --}}
        //     {{-- 2 Unico --}}

        //     {{-- 1 Eectivo --}}
        //     {{-- 2 Transferencia --}}

        foreach (range(1, $processInvestment->investment->payment_way_id == 2 ? 1 : $processInvestment->investment->period) as $mont) {


            // Fila uno pay_date
            if ($processInvestment->investment->payment_way_id == 2) {
                $date = changeFormatDateApp($processInvestment->investment->deposit_date)->addMonths($processInvestment->investment->period);
            } else {
                $date =  changeFormatDateApp($processInvestment->investment->deposit_date)->addMonths($mont);
            }

            // Fila dos gross_amount

            if ($processInvestment->investment->payment_way_id == 2) {
                // Unico
                $bruto = percentageApp($processInvestment->investment->amount, $processInvestment->investment->interest) * $processInvestment->investment->period;
            } else {
                // Mensual
                $bruto = percentageApp($processInvestment->investment->amount, $processInvestment->investment->interest);
            }


            // Fila Tres interest

            $interest =   $processInvestment->investment->interest;




            // Fila Cuatro poliza

            if ($processInvestment->investment->poliza_id) {

                if ($processInvestment->investment->payment_way_id == 2) {
                    // unico
                    $poliza = $processInvestment->investment->poliza->price * $processInvestment->investment->period;
                } else {
                    // Mensual
                    $poliza = $processInvestment->investment->poliza->price;
                }
            } else {
                $poliza = 0;
            }


            // Fila cinco comission value

            if ($processInvestment->cash_commission) {
                $comission = percentageApp($bruto, $processInvestment->cash_commission ?? 0);
            } else {


                if ($processInvestment->investment->payment_method_id == 1) {
                    $comission = percentageApp($bruto, 6);
                } else {
                    $comission = 0;
                }
            }

            // Fila seis
            $neto = ($bruto - $poliza ) -  $comission;


            $payInterest = new PayInterest();
            $payInterest->pay_date =  $date;
            $payInterest->gross_amount =  $bruto;
            $payInterest->interest =   $interest;
            $payInterest->poliza_value = $poliza;
            $payInterest->comission =  $comission;
            $payInterest->net_amount =   $neto;
            $payInterest->investment_id = $processInvestment->investment_id;
            $payInterest->client_id =  $processInvestment->client_id;
            $payInterest->process_investment_id = $processInvestment->id;

            $payInterest->save();
        }
    }
    public function paymentComissionGenerator($processInvestment)
    {
        // {{-- 1 Mensual --}}
        //     {{-- 2 Unico --}}

        //     {{-- 1 Eectivo --}}
        //     {{-- 2 Transferencia --}}

        foreach (range(1, $processInvestment->investment->payment_way_id == 2 ? 1 : $processInvestment->investment->period) as $mont) {


            // Fila uno pay_date
            if ($processInvestment->investment->payment_way_id == 2) {
                $date = changeFormatDateApp($processInvestment->investment->deposit_date)->addMonths($processInvestment->investment->period);
            } else {
                $date =  changeFormatDateApp($processInvestment->investment->deposit_date)->addMonths($mont);
            }

          
        }
    }
}
