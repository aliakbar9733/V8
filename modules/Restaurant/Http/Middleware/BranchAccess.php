<?php

namespace Module\Restaurant\Middleware;

use App\Helper\Submitter;
use Closure;
use Illuminate\Http\Request;
use Module\JWT\JWT;
use Module\Restaurant\Model\Branch;

class BranchAccess
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
        $branch = Branch::findOrFail($request->route("branch"));
        $user = JWT::getUser();
        if ($user->can("branch") or ($user->can("branch.*") and $branch->admin_id == $user->id))
            return $next($request);
        return Submitter::error("Access Denied");
    }
}