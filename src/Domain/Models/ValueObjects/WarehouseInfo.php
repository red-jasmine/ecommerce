<?php

namespace RedJasmine\Ecommerce\Domain\Models\ValueObjects;

use RedJasmine\Support\Domain\Models\ValueObjects\ValueObject;

/**
 * 仓库信息值对象
 *
 * 用于表示仓库的基本信息
 */
class WarehouseInfo extends ValueObject
{
    /**
     * 仓库ID
     */
    public int $id;

    /**
     * 仓库代码
     */
    public string $code;

    /**
     * 仓库名称
     */
    public string $name;

    /**
     * 是否启用
     */
    public bool $isActive;

    /**
     * 优先级（用于仓库选择策略）
     */
    public int $priority;

    public function __construct(
        int $id,
        string $code,
        string $name,
        bool $isActive = true,
        int $priority = 0
    ) {
        $this->id = $id;
        $this->code = $code;
        $this->name = $name;
        $this->isActive = $isActive;
        $this->priority = $priority;
    }
}

