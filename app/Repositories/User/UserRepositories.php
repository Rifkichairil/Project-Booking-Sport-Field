<?php

namespace App\Repositories\User;

use App\Model\Field;


//use Your Model

/**
 * Class UserRepositories.
 */
class UserRepositories
{
    /**
     * @return string
     *  Return the model
     */
    public function firstField($id)
    {
        $field = Field::whereId($id)->firstOrFail();

        return $field;
    }

    public function getField()
    {
        $field = Field::paginate(10);
        return $field;
    }
}
