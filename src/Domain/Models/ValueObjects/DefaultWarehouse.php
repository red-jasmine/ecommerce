<?php

namespace RedJasmine\Ecommerce\Domain\Models\ValueObjects;

/**
 * 默认仓库值对象
 *
 * 表示电商领域的固定规则：warehouse_id = 0 表示默认仓库/总仓
 *
 * 这是一个单例值对象，所有地方都应该使用同一个实例
 */
final class DefaultWarehouse extends WarehouseInfo
{
    /**
     * 默认仓库ID（电商领域固定规则）
     */
    public const ID = 0;
    public const CODE = 'default';

    private static ?self $instance = null;

    /**
     * 获取默认仓库名称（多语言）
     *
     * @return string
     */
    public static function name(): string
    {
        return __('red-jasmine-product::product.warehouse.default_name');
    }

    /**
     * 私有构造函数，使用 instance() 方法获取单例
     */
    private function __construct()
    {
        parent::__construct(
            id: self::ID,
            code: self::CODE,
            name: self::name(),
            isActive: true,
            priority: 0
        );
    }

    /**
     * 获取默认仓库实例（单例模式）
     */
    public static function instance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * 获取默认仓库ID
     */
    public static function id(): int
    {
        return self::ID;
    }
}

