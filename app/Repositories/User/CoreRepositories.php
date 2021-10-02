<?php

namespace App\Repositories\User;

use App\Model\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

//use Your Model

/**
 * Class CoreRepositories.
 */
class CoreRepositories
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

    public function save($req)
    {
        DB::beginTransaction();
        try {
            $user = User::create([
                'first_name' => $req->first_name,
                'last_name'  => $req->last_name,
                'email'      => $req->email,
                'telp'       => $req->telp,
                'password'   => Hash::make($req->password),

            ]);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();

        return $user;
    }

    public function update($req, $id)
    {
        DB::beginTransaction();
        try {
            $user = $this->first($id);

            $user->update([
                'status'     => $req->status,
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();

        return $user;
    }
}
