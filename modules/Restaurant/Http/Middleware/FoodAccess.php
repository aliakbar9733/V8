<?php


namespace Module\Restaurant\Middleware;


use App\Helper\Submitter;
use Closure;
use Illuminate\Http\Request;
use Module\JWT\JWT;
use Module\Restaurant\Model\Food;

class FoodAccess
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
        $user = JWT::getUser();
        $food = Food::findOrFail($request->route("food"));
        if ($user->can("branch") or ($user->can("branch.*") and $food->branch()->admin_id == $user->id)) {
            $request->attributes->add(["food" => $food]);
            return $next($request);
        }
        return Submitter::error("Access Denied");
    }

}