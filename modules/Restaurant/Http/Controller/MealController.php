<?php


namespace Module\Restaurant\Controller;


use App\Helper\Submitter;
use Illuminate\Http\Request;
use Module\Restaurant\Model\Meal;

class MealController
{
    const REQUIRED = "required";

    public function index()
    {
        return view("meal.index", ["meals" => Meal::get()]);
    }

    public function store(Request $request)
    {
        /*
         * Validate Request
         */
        $fields = $request->all(["title", "start", "end"]);
        validate($fields, $this->rules());
        /*
         * Store Meal
         */
        Meal::create($fields);

        return Submitter::swalRedirect(__("restaurant.mealCreated", "Meal Created Successfully"), "meal");
    }

    public function create()
    {
        return view("meal.create");
    }

    public function edit($mealId)
    {
        /*
         * Validate & Get Meal
         */
        $meal = Meal::findOrFail($mealId);

        return view("meal.edit", ["meal" => $meal]);
    }

    public function update(Request $request, $mealId)
    {
        /*
         * Validate & Get Meal
         */
        $meal = Meal::findOrFail($mealId);

        /*
         * Validate Request
         */
        $fields = $request->all(["title", "start", "end"]);
        validate($fields, $this->rules());
        /*
         * Update Meal
         */
        $meal->update($fields);

        return Submitter::refresh();
    }

    public function rules()
    {
        return [Meal::TITLE => self::REQUIRED, Meal::START => self::REQUIRED, Meal::END => self::REQUIRED];
    }
}