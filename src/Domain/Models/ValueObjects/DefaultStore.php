<?php

namespace RedJasmine\Ecommerce\Domain\Models\ValueObjects;

/**
 * 默认门店值对象（通配符门店）
 *
 * 表示电商领域的固定规则：store_type = "*" 且 store_id = "*" 表示所有门店/全部门店
 *
 * 这是一个单例值对象，所有地方都应该使用同一个实例
 */
final class DefaultStore extends StoreInfo
{
    /**
     * 通配符门店类型（表示所有门店）
     */
    public const TYPE = '*';

    /**
     * 通配符门店ID（表示所有门店）
     */
    public const ID = '*';

    private static ?self $instance = null;

    /**
     * 获取通配符门店名称（多语言）
     *
     * @return string
     */
    public static function name(): string
    {
        return __('red-jasmine-ecommerce::ecommerce.common.all');
    }

    /**
     * 私有构造函数，使用 instance() 方法获取单例
     */
    private function __construct()
    {
        parent::__construct(
            type: self::TYPE,
            id: self::ID,
            name: self::name(),
            isActive: true
        );
    }

    /**
     * 获取通配符门店实例（单例模式）
     */
    public static function instance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * 获取通配符门店类型
     */
    public static function type(): string
    {
        return self::TYPE;
    }

    /**
     * 获取通配符门店ID
     */
    public static function id(): string
    {
        return self::ID;
    }

    /**
     * 判断是否为同一个值对象
     *
     * 由于 DefaultStore 是单例，可以直接使用 === 比较实例
     * 此方法用于与其他 StoreInfo 进行比较
     *
     * @param StoreInfo $other 要比较的门店信息
     * @return bool
     */
    public function equals(StoreInfo $other): bool
    {
        // 如果是同一个 DefaultStore 实例，直接返回 true
        if ($other === $this) {
            return true;
        }

        // 比较 type 和 id 是否相同
        return $other->type === self::TYPE && $other->id === self::ID;
    }

    /**
     * 判断给定的门店信息是否为默认门店（通配符门店）
     *
     * @param StoreInfo $store 要判断的门店信息
     * @return bool
     */
    public static function isDefaultStore(StoreInfo $store): bool
    {
        return $store->type === self::TYPE && $store->id === self::ID;
    }
}

