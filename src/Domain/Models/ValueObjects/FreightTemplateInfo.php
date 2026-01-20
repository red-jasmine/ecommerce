<?php

namespace RedJasmine\Ecommerce\Domain\Models\ValueObjects;

use RedJasmine\Support\Domain\Models\ValueObjects\ValueObject;

/**
 * 运费模板信息值对象
 *
 * 用于表示运费模板的基本信息
 */
class FreightTemplateInfo extends ValueObject
{
    /**
     * 运费模板ID
     */
    public int|string $id;

    /**
     * 运费模板名称
     */
    public string $name;

    /**
     * 状态
     */
    public string $status;

    /**
     * 是否启用
     */
    public bool $isActive;

    /**
     * 是否包邮
     */
    public bool $isFree;

    /**
     * 计费类型
     */
    public ?string $chargeType;

    /**
     * 排序
     */
    public int $sort;

    public function __construct(
        int|string $id,
        string $name,
        string $status,
        bool $isActive = true,
        bool $isFree = false,
        ?string $chargeType = null,
        int $sort = 0
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->status = $status;
        $this->isActive = $isActive;
        $this->isFree = $isFree;
        $this->chargeType = $chargeType;
        $this->sort = $sort;
    }
}

