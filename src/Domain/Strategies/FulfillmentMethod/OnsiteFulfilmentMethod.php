<?php

namespace RedJasmine\Ecommerce\Domain\Strategies\FulfillmentMethod;

use RedJasmine\Ecommerce\Domain\Contracts\FulfilmentMethodInterface;

/**
 * 到店服务发货类型
 */
class OnsiteFulfilmentMethod implements FulfilmentMethodInterface
{
    public function value(): string
    {
        return 'onsite';
    }

    public function label(): string
    {
        return __('red-jasmine-ecommerce::ecommerce.enums.fulfillment_method.onsite');
    }

    public function icon(): ?string
    {
        return 'emoji-house';
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
        return true; // 到店服务需要服务地址
    }

    public function requiresFreight(): bool
    {
        return false; // 到店服务通常不需要运费
    }

    public function isAutoSinged(): bool
    {
        return false; // 需要服务完成确认
    }
}

