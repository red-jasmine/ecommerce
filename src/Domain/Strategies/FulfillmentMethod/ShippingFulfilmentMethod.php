<?php

namespace RedJasmine\Ecommerce\Domain\Strategies\FulfillmentMethod;

use RedJasmine\Ecommerce\Domain\Contracts\FulfilmentMethodInterface;

/**
 * 物流快递发货类型
 */
class ShippingFulfilmentMethod implements FulfilmentMethodInterface
{
    public function value(): string
    {
        return 'shipping';
    }

    public function label(): string
    {
        return __('red-jasmine-ecommerce::ecommerce.enums.fulfillment_method.shipping');
    }

    public function icon(): ?string
    {
        return 'emoji-delivery-truck';
    }

    public function color(): ?string
    {
        return 'primary';
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
        return true;
    }

    public function requiresAddress(): bool
    {
        return true;
    }

    public function requiresFreight(): bool
    {
        return true;
    }

    public function isAutoSinged(): bool
    {
        return false;
    }
}
