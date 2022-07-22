<?php

namespace App\Services\Pricing;

use App\Models\Pricing as ModelsPricing;
use App\Models\PricingDetail;
use Illuminate\Support\Facades\DB;

class Pricing
{
    public function getAll()
    {
        $data = ModelsPricing::with('detailPricing')->get();

        $status = true;
        $message = "Success get Pricing data";

        // dd($data);
        $result = [
            'status'    => $status,
            'message'   => $message,
            'data'      => $data,
        ];

        return $result;
    }

    public function store($data)
    {
        DB::beginTransaction();

        try {
            $pricing = ModelsPricing::create([
                'package_name'          => $data->package_name,
                'package_description'   => $data->package_description,
                'package_price'         => $data->price,
            ]);

            foreach ($data->description as $item) {
                PricingDetail::create([
                    'pricing_id'            => $pricing->id,
                    'description'           => $item,
                ]);
            }

            DB::commit();

            $status = true;
            $message = "Success add Pricing data";

            $result = [
                'status'    => $status,
                'message'   => $message,
            ];

            return $result;
        } catch (\Throwable $th) {
            DB::rollback();

            $status = false;

            $result = [
                'status'    => $status,
                'message'   => $th->getMessage(),
            ];

            return $result;
        }
    }

    public function getById($id)
    {
        $data = ModelsPricing::with('detailPricing')->find($id);

        $status = true;
        $message = "Success get Pricing data";

        $result = [
            'status'    => $status,
            'message'   => $message,
            'data'      => $data,
        ];

        return $result;
    }

    public function update($data, $id)
    {
        DB::beginTransaction();

        try {
            PricingDetail::where('pricing_id', $id)->delete();

            $pricing = ModelsPricing::where('id', $id)->update([
                'package_name'          => $data->package_name,
                'package_description'   => $data->package_description,
                'package_price'         => $data->price,
            ]);

            foreach ($data->description as $item) {
                PricingDetail::create([
                    'pricing_id'            => $id,
                    'description'           => $item,
                ]);
            }

            $true = true;
            $message = "Success update Pricing data";

            $result = [
                'status'    => $true,
                'message'   => $message,
            ];

            DB::commit();

            return $result;

            //code...
        } catch (\Throwable $th) {
            //throw $th;
            $status = false;
            $message = $th->getMessage();

            $result = [
                'status'    => $status,
                'message'   => $message,
            ];

            return $result;
        }
        // 

    }
    public function delete($id)
    {
        $data = ModelsPricing::where('id', $id)->delete();

        $status = true;
        $message = "Success delete Pricing data";

        $result = [
            'status'    => $status,
            'message'   => $message,
        ];

        return $result;
    }
}
