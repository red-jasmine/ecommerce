<?php

namespace RedJasmine\Ecommerce\Domain\Strategies\FulfillmentMethod;

use RedJasmine\Ecommerce\Domain\Contracts\FulfilmentMethodInterface;

/**
 * 到店自取发货类型
 */
class PickupFulfilmentMethod implements FulfilmentMethodInterface
{
    public function value(): string
    {
        return 'pickup';
    }

    public function label(): string
    {
        return __('red-jasmine-ecommerce::ecommerce.enums.fulfillment_method.pickup');
    }

    public function icon(): ?string
    {
        return 'emoji-house';
    }

    public function color(): ?string
    {
        return 'gray';
    }

    public function tips(): ?string
    {
        return null;
    }

    public function disabled(): bool
    {
        return false;
    }

    public function requiresShipping(): bool
    {
        return false;
    }

    public function requiresAddress(): bool
    {
        return false; // 到店自取不需要收货地址
    }

    public function requiresFreight(): bool
    {
        return false; // 到店自取不需要运费
    }

    public function isAutoSinged(): bool
    {
        return true; // 自取后自动签收
    }
}

