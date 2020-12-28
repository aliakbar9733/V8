<?php


namespace App\Model;


use Core\Model;

class Config extends Model
{
    const KEY = "key", VALUE = "value";
    protected $table = "config";
    protected $fillable = [self::KEY, self::VALUE];

    public static function set($key, $value = null)
    {
        return self::create([self::KEY => $key, self::VALUE => $value]);
    }

    public static function get($key)
    {
        return self::where(self::KEY, $key)->first();
    }
}