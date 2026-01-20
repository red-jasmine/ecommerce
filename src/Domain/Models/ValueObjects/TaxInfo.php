<?php

namespace RedJasmine\Ecommerce\Domain\Models\ValueObjects;

use RedJasmine\Support\Domain\Models\ValueObjects\ValueObject;

/**
 * 税务信息值对象
 * 
 * 用于表示税类的基本信息
 */
class TaxInfo extends ValueObject
{
    /**
     * 税类代码
     */
    public string $code;
    
    /**
     * 税类名称
     */
    public string $name;
    
    /**
     * 税率
     */
    public float $rate;
    
    /**
     * 是否启用
     */
    public bool $isActive;
    
    public function __construct(
        string $code,
        string $name,
        float $rate,
        bool $isActive = true
    ) {
        $this->code = $code;
        $this->name = $name;
        $this->rate = $rate;
        $this->isActive = $isActive;
    }
}

