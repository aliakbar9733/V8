<?php


namespace Module\Restaurant\Model;


use Core\Model;


class Meal extends Model
{
    const TITLE = "title",
        START = "start",
        END = "end",
        STATUS = "status";

    protected $fillable = [self::TITLE, self::STATUS, self::START, self::END];
}