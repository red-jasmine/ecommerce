<?php

namespace RedJasmine\Ecommerce\Domain\Models\ValueObjects;

use RedJasmine\Support\Domain\Contracts\UserInterface;
use RedJasmine\Support\Domain\Models\ValueObjects\ValueObject;

/**
 * 门店信息值对象
 *
 * 实现 UserInterface，使用 type + id 来标识门店
 * 门店本身就是一个用户实体，通过 type + id 唯一标识
 */
class StoreInfo extends ValueObject implements UserInterface
{
    /**
     * 门店类型（对应 store_type 字段）
     */
    public string $type;

    /**
     * 门店ID（对应 store_id 字段）
     */
    public string $id;

    /**
     * 门店名称
     */
    public string $name;

    /**
     * 是否启用
     */
    public bool $isActive;

    public function __construct(
        string $type,
        string $id,
        string $name,
        bool $isActive = true
    ) {
        $this->type = $type;
        $this->id = $id;
        $this->name = $name;
        $this->isActive = $isActive;
    }

    /**
     * 实现 UserInterface::getType()
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * 实现 UserInterface::getID()
     */
    public function getID(): string
    {
        return $this->id;
    }

    /**
     * 实现 UserInterface::getNickname()
     */
    public function getNickname(): ?string
    {
        return $this->name;
    }

    /**
     * 实现 UserInterface::getAvatar()
     */
    public function getAvatar(): ?string
    {
        return null;
    }

    /**
     * 实现 UserInterface::getUserData()
     */
    public function getUserData(): array
    {
        return [
            'type' => $this->type,
            'id' => $this->id,
            'name' => $this->name,
            'is_active' => $this->isActive,
        ];
    }
}

