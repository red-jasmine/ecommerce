<?php

namespace RedJasmine\Ecommerce\Domain\Models\ValueObjects;

use RedJasmine\Support\Domain\Models\ValueObjects\ValueObject;

/**
 * 客户等级值对象
 *
 * 用于表示客户等级的基本信息
 */
class CustomerLevel extends ValueObject
{
    /**
     * 等级代码
     * 例如：'vip'、'gold'、'platinum' 等
     * 注意：'*' 是特殊值，表示所有等级（通配符）
     */
    public string $code;

    /**
     * 等级名称
     */
    public string $name;

    /**
     * 是否启用
     */
    public bool $isActive;

    /**
     * 优先级（用于等级排序，数字越大优先级越高）
     */
    public int $priority;

    /**
     * 等级描述
     */
    public ?string $description;

    public function __construct(
        string $code,
        string $name,
        bool $isActive = true,
        int $priority = 0,
        ?string $description = null
    ) {
        $this->code = $code;
        $this->name = $name;
        $this->isActive = $isActive;
        $this->priority = $priority;
        $this->description = $description;
    }

    /**
     * 是否为通配符等级
     */
    public function isWildcard(): bool
    {
        return $this->code === '*';
    }

    /**
     * 创建"所有客户等级"值对象
     *
     * @return CustomerLevel
     */
    public static function wildcard(): CustomerLevel
    {
        return new self(
            code: '*',
            name: '所有等级',
            isActive: true,
            priority: 0,
            description: '匹配所有客户等级'
        );
    }
}

