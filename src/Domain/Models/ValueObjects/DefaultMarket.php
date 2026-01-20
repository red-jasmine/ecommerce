<?php

namespace RedJasmine\Ecommerce\Domain\Models\ValueObjects;

/**
 * 默认市场值对象
 *
 * 表示电商领域的固定规则：存在一个默认市场
 *
 * 这是一个单例值对象，所有地方都应该使用同一个实例
 */
final class DefaultMarket extends MarketInfo
{
    public const CODE = 'default';

    private static ?self $instance = null;

    /**
     * 获取默认市场名称（多语言）
     *
     * @return string
     */
    public static function name(): string
    {
        return __('red-jasmine-ecommerce::ecommerce.common.default');
    }

    /**
     * 私有构造函数，使用 instance() 方法获取单例
     */
    private function __construct()
    {

        $currency = config('red-jasmine-ecommerce.currency', 'CNY');

        parent::__construct(
            code: self::CODE,
            name: self::name(),
            currency: $currency,
            isActive: true
        );
    }

    /**
     * 获取默认市场实例（单例模式）
     */
    public static function instance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * 获取默认市场代码
     */
    public static function code(): string
    {
        return self::CODE;
    }
}

