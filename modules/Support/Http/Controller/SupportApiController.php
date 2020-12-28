<?php


namespace Module\Support\Controller;


use App\Helper\Submitter;
use Illuminate\Http\Request;
use Module\JWT\JWT;
use Module\Support\Model\{Department, Ticket};

class SupportApiController
{
    /**
     * Register New Ticket
     * @param Request $request
     * @return false|string
     */
    public function store(Request $request)
    {
        validate($request->all(), ["title" => ["required", "max:255"],
            "department" => ["required", "integer"],
            "text" => "required", "files" => ["sometimes", "required"]]);

        $department = Department::find($request->input("department"));
        if (!$department)
            return Submitter::error("Wrong Department");
        $ticket = Ticket::store($request->input("title"), $request->input("text"), JWT::getUser()->id, $department->id);
        return Submitter::swalRedirect(__("support.ticketStored", "Ticket Stored Successfully"), "", "success", ["ticket" => $ticket]);
    }

    /**
     * Get Ticket With All Data (Messages,Department,Messages.User)
     * @param Request $request
     * @return mixed|null
     */
    public function get(Request $request)
    {
        /*
         * Ticket Passed From Middleware
         */
        return $request->attributes->get("ticket");
    }
}