<?php


namespace Module\Restaurant\Model;


use Module\Shop\Model\Product;

/**
 * @property mixed meals
 * @property mixed priority
 */
class Food extends Product
{
    protected $table = "products";

    const MEALS = "meals";
    const FOOD = "food";
    const CATEGORIES = "categories";
    const ACTIVE_STATUS = "active", DIACTIVE_STATUS = "diactive";

    public static function store(array $productArray, array $meals, array $categories, int $branchId)
    {
        $product = parent::create(array_merge([parent::TYPE => Food::FOOD], $productArray));
        $product->categories()->sync($categories);
        $product->setMeta("branchId", $branchId);
        $product->setMeta("meals", json_encode($meals));
        return $product;
    }

    public function branch()
    {
        return Branch::find(@$this->getMeta("branchId")->value);
    }

    public function withBranch()
    {
        return $this->setAttribute("branch", $this->branch());
    }

    public function withMeals()
    {
        $this->meals = $this->meals();
        return $this->setAttribute("meals", $this->meals);
    }

    public function getMealsIds()
    {
        $mealsIds = [];
        foreach ($this->meals as $meal) {
            $mealsIds[] = $meal->id;
        }
        return $mealsIds;
    }

    public function meals()
    {
        return Meal::whereIn(self::ID, json_decode(@$this->getMeta(self::MEALS)->value))->get();
    }

    public function statusLabel()
    {
        $labels = [self::ACTIVE_STATUS => '<span style="font-size: 13px" class="label label-success">فعال</span>',
            self::DIACTIVE_STATUS => '<span  style="font-size: 13px" class="label label-danger">غیر فعال</span>'];
        return $labels[$this->status];
    }

    public function __toString()
    {
        $this->attributes["meals"] = $this->meals();
        return parent::__toString();
    }
}