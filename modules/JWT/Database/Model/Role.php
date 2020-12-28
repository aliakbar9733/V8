<?php


namespace Module\JWT\Model;


use Core\Model;

/**
 * @property mixed scopes
 */
class Role extends Model
{
    const TITLE = "title", NAME = "name", SCOPES = "scopes";
    protected $fillable = ["id", "title", "name", "scopes"];
    const ADMIN_SCOPES = ["admin", "branch", "shop.admin", "category", "meal"];

    public function getScopes()
    {
        return json_decode($this->scopes);
    }

    public function addScope(string $scope)
    {
        $this->update([self::SCOPES, array_merge($this->scopes, $scope)]);
    }
}