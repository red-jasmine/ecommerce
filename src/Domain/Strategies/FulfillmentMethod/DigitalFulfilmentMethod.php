<?php

namespace RedJasmine\Ecommerce\Domain\Strategies\FulfillmentMethod;

use RedJasmine\Ecommerce\Domain\Contracts\FulfilmentMethodInterface;

/**
 * 数字卡密发货类型
 */
class DigitalFulfilmentMethod implements FulfilmentMethodInterface
{
    public function value(): string
    {
        return 'digital';
    }

    public function label(): string
    {
        return __('red-jasmine-ecommerce::ecommerce.enums.fulfillment_method.digital');
    }

    public function icon(): ?string
    {
        return 'emoji-e-mail';
    }

    public function color(): ?string
    {
        return 'warning';
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
        return true;
    }
}

