<?php

namespace RedJasmine\Ecommerce\Domain\Strategies\ProductType;

use Exception;
use RedJasmine\Ecommerce\Domain\Contracts\ProductTypeInterface;

/**
 * 数字内容商品类型
 */
class DigitalProductType implements ProductTypeInterface
{
    public function value(): string
    {
        return 'digital';
    }

    public function label(): string
    {
        return __('red-jasmine-ecommerce::ecommerce.enums.product_type.digital');
    }

    public function icon(): ?string
    {
        return 'emoji-left-luggage';
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

    /**
     * 获取支持的配送方式
     * @return string[]
     * @throws Exception
     */
    public function getFulfillmentMethods(): array
    {
        return config('red-jasmine-ecommerce.product_type_fulfillment_methods.digital.fulfillment_methods', []);
    }

    public function getDefaultShippingType(): ?string
    {
        return config('red-jasmine-ecommerce.product_type_fulfillment_methods.digital.default');
    }
}

