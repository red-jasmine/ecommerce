<?php

namespace RedJasmine\Ecommerce\Domain\Strategies\ProductType;

use Exception;
use RedJasmine\Ecommerce\Domain\Contracts\ProductTypeInterface;

/**
 * 虚拟商品类型
 */
class VirtualProductType implements ProductTypeInterface
{
    public function value(): string
    {
        return 'virtual';
    }

    public function label(): string
    {
        return __('red-jasmine-ecommerce::ecommerce.enums.product_type.virtual');
    }

    public function icon(): ?string
    {
        return 'emoji-globe-with-meridians';
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

    /**
     * 获取支持的配送方式
     * @return string[]
     * @throws Exception
     */
    public function getFulfillmentMethods(): array
    {
        return config('red-jasmine-ecommerce.product_type_fulfillment_methods.virtual.fulfillment_methods', []);
    }

    public function getDefaultShippingType(): ?string
    {
        return config('red-jasmine-ecommerce.product_type_fulfillment_methods.virtual.default');
    }
}

