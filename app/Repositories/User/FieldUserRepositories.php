<?php

namespace App\Repositories\User;

use App\Model\Field;
use App\Model\OrderField;
use App\Model\Category;
use Facade\FlareClient\Stacktrace\File;
//use Your Model

/**
 * Class FieldUserRepositories.
 */
class FieldUserRepositories
{
    /**
     * @return string
     *  Return the model
     */
    public function first($id)
    {
        $field = Field::whereId($id)->firstOrFail();

        return $field;
    }

    public function get()
    {
        $field = Field::paginate(10);
        return $field;
    }
    public function firstOrder($id)
    {
        $order = OrderField::whereId($id)->firstOrFail();

        return $order;
    }

    public function getOrder()
    {
        $order = OrderField::paginate(20);
        return $order;
    }

    public function getCategories()
    {
        $category = Category::get();

        return $category;
    }
}
