<?php

namespace RedJasmine\Ecommerce\Domain\Strategies\FulfillmentMethod;


use RedJasmine\Ecommerce\Domain\Contracts\FulfilmentMethodInterface;
use RedJasmine\Support\Foundation\Manager\EnumManager;

/**
 * 发货类型管理器
 * @method FulfilmentMethodInterface create(string $name)
 */
class FulfilmentMethodManager extends EnumManager
{
    /**
     * @var array<string, class-string<FulfilmentMethodInterface>>
     */
    protected const DRIVERS = [
        'shipping' => ShippingFulfilmentMethod::class,
        'digital'  => DigitalFulfilmentMethod::class,
        'pickup'   => PickupFulfilmentMethod::class,
        'delivery' => DeliveryFulfilmentMethod::class,
        'virtual'  => VirtualFulfilmentMethod::class,
        'instant'  => InstantFulfilmentMethod::class,
        'onsite'   => OnsiteFulfilmentMethod::class,
        'visit'    => VisitFulfilmentMethod::class,
        'voucher'  => VoucherFulfilmentMethod::class,
    ];
}

