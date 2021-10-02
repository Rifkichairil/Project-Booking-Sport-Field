<?php

namespace App\Repositories;

use App\Model\OrderField;
use Illuminate\Support\Facades\DB;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class OrderRepositories.
 */
class OrderRepositories
{
    /**
     * @return string
     *  Return the model
     */

    public function first($id)
    {
        $order = OrderField::whereId($id)->firstOrFail();
        return $order;
    }

    public function get()
    {
        $order = OrderField::with('user')->get();
        return $order;
    }

    public function updateStatus($id)
    {
        DB::beginTransaction();
        try {
            $order = OrderField::whereId($id)->firstOrFail();

            if ($order->status == 0) {
                $order->status = 1;
            } else {
                $order->status = 0;
            }

            $order->save();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();

        return $order;
    }
}
