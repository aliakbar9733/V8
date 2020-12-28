<?php
/*
 * ["name" => "Negul"]
 * {"name" : "negul"}
 * ["091321","564564650","alo"]
 *
 */
namespace Module\Support\Model;

use Core\{Model};
use Module\JWT\JWT;
use phpDocumentor\Reflection\Types\Boolean;


/**
 * @property mixed user_id
 * @property Department department
 * @property TicketMessages[] messages
 * @property Boolean read
 */
class Ticket extends Model
{
    const TITLE = "title",
        USER_ID = "user_id",
        RECEIVER_ID = "receiver_id",
        DEPARTMENT_ID = "department_id",
        READ = "read",
        STATUS = "status";

    const ANSWERED = "answered",
        WAITING = "waiting",
        CLOSED = "closed";

    protected $fillable = [self::TITLE, self::USER_ID, self::DEPARTMENT_ID];



    public static function store($title, $text, $userId, $departmentId, $files = null, $status = self::WAITING)
    {
        $ticket = self::create([self::TITLE => $title,
            self::USER_ID => $userId,
            self::DEPARTMENT_ID => $departmentId,
            self::STATUS => $status]);
        $ticket->addMessage($text, $userId, $files);
        return $ticket;
    }


    public function addMessage($text, $userId, $files = null)
    {
        return TicketMessages::create([TicketMessages::TICKET_ID => $this->id,
            TicketMessages::TEXT => $text,
            TicketMessages::USER_ID => $userId,
            TicketMessages::FILES => $files]);
    }

    public function userCan($user = null)
    {
        $user = $user ?? JWT::getUser();
        return $user->can($this->department->slug) or $this->user_id == $user->id;
    }

    public static function findWithMessages($id, $columns = ['*'])
    {
        return self::with(["messages", "department", "messages.user"])->find($id, $columns);
    }

    public function messages()
    {
        return $this->hasMany(TicketMessages::class)->orderByDesc(TicketMessages::ID);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * @return TicketMessages
     */
    public function getLastMessage()
    {
        return $this->messages[0];
    }

    public function changeStatus($status = self::WAITING)
    {
        $this->update([self::STATUS => $status]);
        return $this;
    }
}