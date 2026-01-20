<?php

namespace RedJasmine\Ecommerce\Domain\Models\ValueObjects;

use RedJasmine\Support\Domain\Models\ValueObjects\ValueObject;

/**
 * 市场信息值对象
 *
 * 用于表示市场的基本信息
 */
class MarketInfo extends ValueObject
{
    /**
     * 市场代码
     */
    public string $code;

    /**
     * 市场名称
     */
    public string $name;

    /**
     * 货币代码
     */
    public string $currency;

    /**
     * 是否启用
     */
    public bool $isActive;

    public function __construct(
        string $code,
        string $name,
        string $currency,
        bool $isActive = true
    ) {
        $this->code = $code;
        $this->name = $name;
        $this->currency = $currency;
        $this->isActive = $isActive;
    }
}

