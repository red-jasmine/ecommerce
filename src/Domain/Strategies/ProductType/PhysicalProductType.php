<?php

namespace RedJasmine\Ecommerce\Domain\Strategies\ProductType;

use Exception;
use RedJasmine\Ecommerce\Domain\Contracts\ProductTypeInterface;

/**
 * 实物商品类型
 */
class PhysicalProductType implements ProductTypeInterface
{
    public function value(): string
    {
        return 'physical';
    }

    public function label(): string
    {
        return __('red-jasmine-ecommerce::ecommerce.enums.product_type.physical');
    }

    public function icon(): ?string
    {
        return 'emoji-shopping-bags';
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

    /**
     * 获取支持的配送方式
     * @return string[]
     * @throws Exception
     */
    public function getFulfillmentMethods(): array
    {
        return config('red-jasmine-ecommerce.product_type_fulfillment_methods.physical.fulfillment_methods', []);
    }

    public function getDefaultShippingType(): ?string
    {
        return config('red-jasmine-ecommerce.product_type_fulfillment_methods.physical.default');
    }
}
