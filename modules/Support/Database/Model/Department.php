<?php

namespace Module\Support\Model;

use Core\Model;

/**
 * @property mixed slug
 */
class Department extends Model
{
    const TITLE = "title", SLUG = "slug";
    protected $fillable = [self::TITLE, self::SLUG];

}