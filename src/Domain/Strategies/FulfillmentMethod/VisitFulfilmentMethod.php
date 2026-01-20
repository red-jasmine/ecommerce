<?php

namespace RedJasmine\Ecommerce\Domain\Strategies\FulfillmentMethod;

use RedJasmine\Ecommerce\Domain\Contracts\FulfilmentMethodInterface;

/**
 * 上门服务发货类型
 */
class VisitFulfilmentMethod implements FulfilmentMethodInterface
{
    public function value(): string
    {
        return 'visit';
    }

    public function label(): string
    {
        return __('red-jasmine-ecommerce::ecommerce.enums.fulfillment_method.visit');
    }

    public function icon(): ?string
    {
        return 'emoji-house-with-garden';
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
        return false;
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

