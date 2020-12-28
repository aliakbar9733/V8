<?php


namespace Module\Shop\Model;


use Core\Model;

/**
 * @property Category[] categories
 */
class Product extends Model
{
    protected $table = "products";
    const NAME = "name",
        DESCRIPTION = "description",
        PRICE = "price",
        PRIORITY = "priority",
        IMAGES = "images",
        TYPE = "type",
        STATUS = "status";
    protected $fillable = [self::NAME, self::DESCRIPTION, self::PRICE, self::PRIORITY, self::IMAGES, self::TYPE, self::STATUS];

    public function metaKeys()
    {
        return $this->belongsToMany(ProductMeta::class);
    }

    public function withMeta($key)
    {
        return $this->setAttribute($key, $this->getMeta($key));
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, "product_categories", "product_id");
    }

    public function getCategoryIds()
    {
        $categoryIds = [];
        foreach ($this->categories as $category) {
            $categoryIds[] = $category->id;
        }
        return $categoryIds;
    }

    public function getMeta($key): ?ProductMeta
    {
        return ProductMeta::where(ProductMeta::KEY, $key)->where(ProductMeta::PRODUCT_ID, $this->id)->first();
    }

    public function setMeta($key, $value): ?ProductMeta
    {
        $meta = $this->getMeta($key);
        if ($meta) {
            $meta->update([ProductMeta::VALUE => $value]);
            return $meta;
        }
        return ProductMeta::create([ProductMeta::KEY => $key, ProductMeta::VALUE => $value, ProductMeta::PRODUCT_ID => $this->id]);
    }
}