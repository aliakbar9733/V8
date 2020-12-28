<?php


namespace Module\Support\Middleware;


use Closure;
use Illuminate\Http\Request;
use Module\JWT\JWT;
use Module\Support\Model\Ticket;

class TicketReadStatus
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /**
         * @var Ticket $ticket
         * Get Ticket From Previous Middleware
         */
        $ticket = $request->attributes->get("ticket");
        $user = JWT::getUser();
        /**
         * Get Ticket Last Posted Message
         */
        $lastMessage = $ticket->getLastMessage();
        if (!$ticket->read)
            if ($user->id != $lastMessage->user_id)
                $ticket->update([Ticket::READ => true]);
        return $next($request);
    }
}