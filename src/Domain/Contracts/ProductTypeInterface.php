<?php

namespace RedJasmine\Ecommerce\Domain\Contracts;

use RedJasmine\Support\Domain\Contracts\TypeEnumInterface;

/**
 * 商品类型接口
 */
interface ProductTypeInterface extends TypeEnumInterface
{

    /**
     * 获取支持的配送方式
     * @return string[] 配送方式字符串列表
     */
    public function getFulfillmentMethods(): array;

    /**
     * 获取默认配送方式
     * @return string|null
     */
    public function getDefaultShippingType(): ?string;

}
