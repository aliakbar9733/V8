<?php


namespace Core;

use App\Helper\Submitter;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model as BaseModel;

/**
 * @method static static create($array)
 * @method static static first($columns = ["*"])
 * @method static static find($id, $columns = ["*"])
 * @method static Collection get($columns = ["*"])
 * @method static static where(...$condition)
 * @method static static with(...$condition)
 * @method static static orderBy($column, $order)
 * @method static static whereIn(...$condition)
 * @property mixed id
 */
class Model extends BaseModel
{
    const ID = "id";

    /**
     * @param $id
     * @param string $abortMsg
     * @param string[] $columns
     * @return static
     */
    public static function findOrFail($id, $abortMsg = "", $columns = ["*"])
    {
        $row = static::find($id, $columns);
        if (!$row) {
            echo Submitter::error($abortMsg ?? "Wrong Request");
            die();
        }
        return $row;
    }
}