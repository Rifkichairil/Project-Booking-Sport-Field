<?php

namespace App\Repositories;


use App\Model\User;
use Illuminate\Support\Facades\DB;

//use Your Model

/**
 * Class ProfileRepositories.
 */
class ProfileRepositories
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

    public function update($req, $id)
    {
        DB::beginTransaction();
        try {
            //code...
            $user = $this->first($id);

            $user->update([
                'first_name'     => $req->first_name,
                'last_name'      => $req->last_name,
                'email'          => $req->email
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
        return $user;
    }
}
