<?php


namespace Module\Support\Middleware;


use App\Helper\Submitter;
use Closure;
use Illuminate\Http\Request;
use Module\Support\Model\Ticket;

class TicketAccess
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
        $ticket = Ticket::findWithMessages($request->route("ticket"));
        if ($ticket and $ticket->userCan()) {
            $request->attributes->add(["ticket" => $ticket]);
            return $next($request);
        }
        return Submitter::error("Access Denied");
    }
}