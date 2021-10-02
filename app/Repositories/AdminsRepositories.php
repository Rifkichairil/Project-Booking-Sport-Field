<?php

namespace App\Repositories;

use App\Model\User;
use Illuminate\Support\Facades\DB;

//use Your Model

/**
 * Class AdminsRepositories.
 */
class AdminsRepositories
{
    /**
     * @return string
     *  Return the model
     */
    public function first($id)
    {
        $user = User::whereId($id)->firstOrFail();

        return $user;
    }

    public function get()
    {

        $user = User::paginate(10);
        return $user;
    }

    public function updateStatusEmail($id)
    {
        DB::beginTransaction();
        try {
            $user = User::whereId($id)->firstOrFail();

            if ($user->status == 0) {
                $user->status = 1;
            } else {
                $user->status = 0;
            }

            $user->save();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();

        return $user;
    }
}
