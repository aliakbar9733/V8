<?php


namespace Module\Restaurant\Controller;


use Module\Restaurant\Model\Branch;
use Module\Restaurant\Model\Food;
use Module\Restaurant\Model\Meal;

class FrontendController
{
    public function index()
    {
        $branches = Branch::get();
        $meals = Meal::get();
        $foods = Food::with("categories")->get()->map(function (Food $model) {
            return $model->withMeals();
        });
        return view("frontend.index", compact("branches", "meals", "foods"));
    }
}