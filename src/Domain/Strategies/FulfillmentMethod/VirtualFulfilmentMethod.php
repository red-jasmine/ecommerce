<?php

namespace RedJasmine\Ecommerce\Domain\Strategies\FulfillmentMethod;

use RedJasmine\Ecommerce\Domain\Contracts\FulfilmentMethodInterface;

/**
 * 虚拟履约发货类型（需发货操作，无数据）
 */
class VirtualFulfilmentMethod implements FulfilmentMethodInterface
{
    public function value(): string
    {
        return 'virtual';
    }

    public function label(): string
    {
        return __('red-jasmine-ecommerce::ecommerce.enums.fulfillment_method.virtual');
    }

    public function icon(): ?string
    {
        return 'emoji-high-voltage';
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
        return false; // 需要发货操作，不自动签收
    }
}

