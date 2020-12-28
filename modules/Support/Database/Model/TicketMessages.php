<?php

namespace Module\Support\Model;

use Core\Model;
use Module\JWT\Model\User;

/**
 * @property User user
 * @property mixed user_id
 */
class TicketMessages extends Model
{
    const TICKET_ID = "ticket_id",
        TEXT = "text",
        USER_ID = "user_id",
        FILES = "files";
    protected $fillable = [self::TICKET_ID, self::TEXT, self::USER_ID, self::FILES];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}