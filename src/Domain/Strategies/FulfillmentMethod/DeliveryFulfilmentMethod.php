<?php

namespace RedJasmine\Ecommerce\Domain\Strategies\FulfillmentMethod;

use RedJasmine\Ecommerce\Domain\Contracts\FulfilmentMethodInterface;

/**
 * 同城配送发货类型
 */
class DeliveryFulfilmentMethod implements FulfilmentMethodInterface
{
    public function value(): string
    {
        return 'delivery';
    }



    public function label(): string
    {
        return __('red-jasmine-ecommerce::ecommerce.enums.fulfillment_method.delivery');
    }

    public function icon(): ?string
    {
        return 'emoji-motor-scooter';
    }

    public function color(): ?string
    {
        return 'info';
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

