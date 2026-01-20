<?php

namespace RedJasmine\Ecommerce\Domain\Data\Product;

use RedJasmine\Money\Data\Money;
use RedJasmine\Support\Foundation\Data\Data;

/**
 * 商品价格信息
 */
class ProductPriceInfo extends Data
{
    /**
     * 商品ID
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
     *
     * @var VariantPriceInfo[]
     */
    public array $variants = [];


}