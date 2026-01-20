<?php

namespace RedJasmine\Ecommerce\Domain\Strategies\FulfillmentMethod;

use RedJasmine\Ecommerce\Domain\Contracts\FulfilmentMethodInterface;

/**
 * 即时生效发货类型（无需任何操作）
 */
class InstantFulfilmentMethod implements FulfilmentMethodInterface
{
    public function value(): string
    {
        return 'instant';
    }

    public function label(): string
    {
        return __('red-jasmine-ecommerce::ecommerce.enums.fulfillment_method.instant');
    }

    public function icon(): ?string
    {
        return 'emoji-prohibited';
    }

    public function color(): ?string
    {
        return 'success';
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
        return false;
    }

    public function requiresFreight(): bool
    {
        return false;
    }

    public function isAutoSinged(): bool
    {
        return true; // 即时生效，自动签收
    }
}

