<?php

namespace RedJasmine\Ecommerce\Domain\Models\ValueObjects;

use RedJasmine\Support\Domain\Models\ValueObjects\ValueObject;

/**
 * 物流公司信息值对象
 *
 * 用于表示物流公司的基本信息
 */
class LogisticsCompanyInfo extends ValueObject
{
    /**
     * 物流公司代码
     */
    public string $code;

    /**
     * 物流公司名称
     */
    public string $name;

    /**
     * 图标/Logo
     */
    public ?string $icon;

    /**
     * 电话
     */
    public ?string $tel;

    /**
     * 网址
     */
    public ?string $url;

    /**
     * 类型（国内/国际）
     */
    public ?string $type;

    /**
     * 是否启用
     */
    public bool $isActive;

    public function __construct(
        string $code,
        string $name,
        ?string $icon = null,
        ?string $tel = null,
        ?string $url = null,
        ?string $type = null,
        bool $isActive = true
    ) {
        $this->code = $code;
        $this->name = $name;
        $this->icon = $icon;
        $this->tel = $tel;
        $this->url = $url;
        $this->type = $type;
        $this->isActive = $isActive;
    }
}

