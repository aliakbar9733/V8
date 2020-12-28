<?php


namespace App\Model;


use Core\Model;

class Meta extends Model
{
    const KEY = "key", VALUE = "value";
    protected $table = "meta";
    protected $fillable = ["key", "value"];

    public function metaable()
    {
        return $this->morphTo();
    }

}