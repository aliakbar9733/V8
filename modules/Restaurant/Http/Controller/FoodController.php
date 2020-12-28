<?php


namespace Module\Restaurant\Controller;

use App\Helper\{File, Submitter, Validator};
use Illuminate\Http\Request;
use Module\JWT\JWT;
use Module\Restaurant\Model\{Branch, Food, Meal};
use Module\Shop\Model\Category;

class FoodController
{
    const REQUIRED = "required";

    public function index($branchId)
    {
        /*
         * Validate Branch
         */
        $branch = Branch::findOrFail($branchId);
        return view("food.index", ["foods" => $branch->foods(), "branch" => $branch]);
    }

    public function create($branchId)
    {
        /*
         * Validate Branch
         */
        $branch = Branch::findOrFail($branchId);

        /*
         * Get Food Categories
         */
        $categories = Category::where(Category::TYPE, "food")->get();

        /*
         * Get Meals
         */
        $meals = Meal::get();

        return view("food.create", compact("branch", "categories", "meals"));
    }

    public function store(Request $request, $branchId)
    {
        /*
         * Validate Request
         */
        $fields = $request->all(["name", "description", "price", "image", "meals", "categories"]);
        validate($fields, $this->rules());

        /*
         * Validate Branch
         */
        Branch::findOrFail($branchId);

        /*
         * Validate Categories
         */
        if (!is_array($fields["categories"]))
            $fields["categories"] = explode(",", $fields['categories']);
        foreach ($fields["categories"] as $category)
            Category::findOrFail($category, "Category {$category} Not Found");
        /*
         * Validate Meals
         */
        if (!is_array($fields["meals"]))
            $fields["meals"] = explode(",", $fields['meals']);
        foreach ($fields["meals"] as $meal)
            Meal::findOrFail($meal, "Meal {$meal} Not Found");

        /*
         * Validate & Store image
         */
        if ($request->hasFile("image")) {
            validate($request->all(["image"]), ["image" => ["file", "max:2048", "mimes:jpeg,png,jpg"]]);
            $fields["images"] = File::instance($request->file("image"))->store("food");
        }

        /*
         * Store Food
         */
        Food::store($fields, $fields["meals"], $fields["categories"], $branchId);

        return Submitter::swalRedirect(__("restaurant.foodCreated", "Food Created Successfully"), "food/{$branchId}");

    }

    public function edit(Request $request)
    {
        /**
         * Get Food (Attached In FoodAccess Middleware)
         * @var Food $food
         */
        $food = $request->attributes->get("food")->withMeals();

        /*
         * Get Food Categories
         */
        $categories = Category::where(Category::TYPE, "food")->get();

        /*
         * Get Meals
         */
        $meals = Meal::get();

        return view("food.update", compact("food", "meals", "categories"));
    }

    public function update(Request $request)
    {
        /*
         * Validate Request
         */
        $fields = $request->all(["name", "description", "price", "image", "meals", "categories"]);
        validate($fields, $this->rules());

        /**
         * Get Food (Attached In FoodAccess Middleware)
         * @var Food $food
         */
        $food = $request->attributes->get("food");

        /*
         * Validate Categories
         */
        if (!is_array($fields["categories"]))
            $fields["categories"] = explode(",", $fields['categories']);
        foreach ($fields["categories"] as $category)
            Category::findOrFail($category, "Category {$category} Not Found");

        /*
         * Validate Meals
         */
        if (!is_array($fields["meals"]))
            $fields["meals"] = explode(",", $fields['meals']);
        foreach ($fields["meals"] as $meal)
            Meal::findOrFail($meal, "Meal {$meal} Not Found");

        /*
         * Validate & Store image
         */
        if ($request->hasFile("image")) {
            validate($request->all(["image"]), ["image" => ["file", "max:2048", "mimes:jpeg,png,jpg"]]);
            $fields["images"] = File::instance($request->file("image"))->store("food");
        }

        $food->update($fields);
        $food->categories()->sync($fields["categories"]);
        $food->setMeta("meals", $fields["meals"]);

        return (new Submitter(true, "Food Updated"))->setAction("REFRESH")->send();

    }

    public function get($foodId)
    {
        /*
         * Validate Food
         */
        $food = Food::with("categories")->find($foodId);
        if (!$food)
            return Submitter::error(__("restaurant.foodWrong", "Food Was Wrong"));
        return $food->withBranch()->withMeals();
    }

    public function delete(Request $request)
    {
        /**
         * Get Food (Attached In FoodAccess Middleware)
         * @var Food $food
         */
        $request->attributes->get("food")->delete();

        /*
         * Get User Branch Id
         */
        $userBranchId = JWT::getUser()->getMeta("branchId")->value;

        return Submitter::toastRedirect(__("base.deleteSuccessful", "Item Deleted Successful"), "food/{$userBranchId}");
    }

    public function rules()
    {
        return [Food::NAME => [Validator::REQUIRED],
            Food::DESCRIPTION => [Validator::REQUIRED],
            Food::PRICE => [Validator::REQUIRED],
            Food::MEALS => [Validator::REQUIRED, "min:1"],
            Food::CATEGORIES => [Validator::REQUIRED, "min:1"]];
    }
}