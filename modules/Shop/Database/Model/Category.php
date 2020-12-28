<?php


namespace Module\Shop\Model;


use Core\Model;

class Category extends Model
{
    const TITLE = "title",
        SLUG = "slug",
        TYPE = "type",
        PARENT_ID = "parent_id",
        STATUS = "status";

    protected $fillable = [self::TITLE,
        self::PARENT_ID,
        self::STATUS,
        self::SLUG,
        self::TYPE];
}