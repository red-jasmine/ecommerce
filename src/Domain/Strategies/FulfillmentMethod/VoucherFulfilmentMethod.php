<?php

namespace RedJasmine\Ecommerce\Domain\Strategies\FulfillmentMethod;

use RedJasmine\Ecommerce\Domain\Contracts\FulfilmentMethodInterface;

/**
 * 核销凭证发货类型
 */
class VoucherFulfilmentMethod implements FulfilmentMethodInterface
{
    public function value(): string
    {
        return 'voucher';
    }

    public function label(): string
    {
        return __('red-jasmine-ecommerce::ecommerce.enums.fulfillment_method.voucher');
    }

    public function icon(): ?string
    {
        return 'emoji-ticket';
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
        return true; // 核销凭证自动生效
    }
}

