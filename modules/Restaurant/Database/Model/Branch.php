<?php


namespace Module\Restaurant\Model;


use Core\Model;
use Module\JWT\Model\Role;
use Module\JWT\Model\User;
use Module\Shop\Model\ProductMeta;

/**
 * @property mixed status
 * @property mixed admin_id
 * @property mixed order_id
 */
class Branch extends Model
{
    const NAME = "name",
        LATITUDE = "latitude",
        LONGITUDE = "longitude",
        TAX = "tax",
        ADMIN_ID = "admin_id",
        ORDER_ID = "order_id",
        MIN_BUY = "min_buy",
        IMAGE = "image",
        ADDRESS = "address",
        STATUS = "status";

    const ACTIVE_STATUS = "active", DIACTIVE_STATUS = "diactive";
    protected $fillable = [self::NAME,
        self::LATITUDE,
        self::LONGITUDE,
        self::TAX,
        self::MIN_BUY,
        self::IMAGE,
        self::ADDRESS,
        self::ADMIN_ID,
        self::ORDER_ID,
        self::STATUS];

    public static function store(array $data, User $adminUser, ?User $orderUser)
    {
        /*
         * Update Users Role
         */
        $adminUser->update([User::ROLE_ID => self::getBranchAdminRole()->id]);
        $orderUser ? $orderUser->update([User::ROLE_ID => self::getBranchOrderRole()->id]) : false;

        /*
         * Create Branch
         */
        self::create($data);
    }

    public static function getBranchAdminRole()
    {
        return Role::where(Role::TITLE, "branch.admin")->first();
    }

    public static function getBranchOrderRole()
    {
        return Role::where(Role::TITLE, "branch.orders")->first();
    }

    private function getFoodsIds()
    {
        return ProductMeta::where(ProductMeta::KEY, "branchId")
            ->where(ProductMeta::VALUE, $this->id)
            ->get([ProductMeta::PRODUCT_ID]);
    }

    public function foods()
    {
        return Food::with("categories")->whereIn(Food::ID,
            $this->getFoodsIds())->get();
    }

    public function withFoods()
    {
        return $this->setAttribute("foods", $this->foods());
    }

    public function getAdminUser()
    {
        return User::find($this->admin_id);
    }

    public function getOrderUser()
    {
        return User::find($this->order_id);
    }

    public static function getBranchesAdmins()
    {
        $branches = self::get([self::ADMIN_ID, self::ORDER_ID]);
        $userIds = [];
        foreach ($branches as $branch) {
            $userIds[] = $branch->admin_id;
            if ($branch->order_id)
                $userIds[] = $branch->order_id;
        }
        return $userIds;
    }

    public function statusLabel()
    {
        $labels = [self::ACTIVE_STATUS => '<span style="font-size: 13px" class="label label-success">فعال</span>',
            self::DIACTIVE_STATUS => '<span  style="font-size: 13px" class="label label-danger">غیر فعال</span>'];
        return $labels[$this->status];
    }
}