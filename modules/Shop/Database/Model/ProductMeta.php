<?php


namespace Module\Shop\Model;

use Core\Model;

/**
 * @property string value
 * @property string key
 * @property integer product_id
 */
class ProductMeta extends Model
{
    protected $table = "product_meta";
    const KEY = "key", VALUE = "value", PRODUCT_ID = "product_id";
    protected $fillable = [self::KEY, self::VALUE, self::PRODUCT_ID];
}