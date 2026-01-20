<?php

namespace RedJasmine\Ecommerce\Domain\Data\Product;

use RedJasmine\Money\Data\Money;
use RedJasmine\Support\Foundation\Data\Data;

class VariantPriceInfo extends Data
{
    /**
     * 规格ID
     * @var int
     */
    public int $id;

    public string $currency;

    /**
     * 销售价
     * @var Money
     */
    public Money $price;

    /**
     * 原始价
     * @var Money|null
     */
    public ?Money $originalPrice;

    /**
     * 成本价
     * @var Money|null
     */
    protected ?Money $costPrice = null;

    public function getCostPrice() : ?Money
    {
        return $this->costPrice;
    }

    public function setCostPrice(?Money $costPrice) : static
    {
        $this->costPrice = $costPrice;
        return $this;
    }


}