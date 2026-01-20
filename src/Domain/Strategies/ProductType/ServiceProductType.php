<?php

namespace RedJasmine\Ecommerce\Domain\Strategies\ProductType;

use Exception;
use RedJasmine\Ecommerce\Domain\Contracts\ProductTypeInterface;

/**
 * 服务商品类型
 */
class ServiceProductType implements ProductTypeInterface
{
    public function value(): string
    {
        return 'service';
    }

    public function label(): string
    {
        return __('red-jasmine-ecommerce::ecommerce.enums.product_type.service');
    }

    public function icon(): ?string
    {
        return 'emoji-woman-teacher';
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

    /**
     * 获取支持的配送方式
     * @return string[]
     * @throws Exception
     */
    public function getFulfillmentMethods(): array
    {
        return config('red-jasmine-ecommerce.product_type_fulfillment_methods.service.fulfillment_methods', []);
    }

    public function getDefaultShippingType(): ?string
    {
        return config('red-jasmine-ecommerce.product_type_fulfillment_methods.service.default');
    }
}

