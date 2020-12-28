<?php


namespace Module\Shop\Controller;


use App\Helper\{Submitter, Validator};
use Illuminate\Http\Request;
use Module\Shop\Model\Category;

class CategoryController
{
    public function index()
    {
        return view("category.index", ["categories" => Category::get()]);
    }

    public function edit($categoryId)
    {
        /*
         * Validate & Get Category
         */
        $category = Category::findOrFail($categoryId);

        return view("category.edit", compact("category"));
    }

    public function update(Request $request, $categoryId)
    {
        /*
         * Validate & Get Category
         */
        $category = Category::findOrFail($categoryId);
        /*
         * Validate Request
         */
        $fields = $request->all(["title", "slug", "parent_id", "type"]);
        validate($fields, $this->rules());

        /*
         * Update Category
         */
        $category->update($fields);

        return (new Submitter(true, __("shop.categoryUpdate", "Category Updated Successfully")))->setAction("REFRESH")->send();
    }

    public function store(Request $request)
    {
        /*
         * Validate Request
         */
        $fields = $request->all(["title", "slug", "parent_id", "type"]);
        validate($fields, $this->rules());

        /*
         * Store Category
         */
        $category = Category::create($fields);

        return Submitter::swalRedirect(__("shop.categoryCreated", "Category Created Successfully"), "category", "success", $category);

    }

    public function create()
    {
        return view("category.create");
    }

    public function rules()
    {
        return [Category::TITLE => [Validator::REQUIRED],
            Category::SLUG => [Validator::REQUIRED],
            Category::TYPE => [Validator::REQUIRED]];
    }
}