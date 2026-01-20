<?php

namespace RedJasmine\Ecommerce\Domain\Strategies\ProductType;


use RedJasmine\Ecommerce\Domain\Contracts\ProductTypeInterface;
use RedJasmine\Support\Foundation\Manager\EnumManager;

/**
 * 商品类型管理器
 */
class ProductTypeManager extends EnumManager
{
    /**
     * @var array<string, class-string<ProductTypeInterface>>
     */
    protected const DRIVERS = [
        'physical' => PhysicalProductType::class,
        'virtual'  => VirtualProductType::class,
        'service'  => ServiceProductType::class,
        'digital'  => DigitalProductType::class,
    ];

}

