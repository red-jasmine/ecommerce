<?php

namespace RedJasmine\Ecommerce\Domain\Contracts;

use RedJasmine\Ecommerce\Domain\Models\ValueObjects\CustomerLevel;
use RedJasmine\Support\Domain\Contracts\UserInterface;

/**
 * 客户服务提供者接口（扩展协议）
 *
 * 此接口负责提供客户相关的信息服务，主要用于：
 * - 商品多价格功能：根据客户等级获取对应的价格
 * - 订单处理：获取客户相关信息用于订单计算
 *
 * 实现此接口可以为系统添加客户等级、VIP等功能支持
 *
 * 注意：
 * - 此接口是完全可选的，如果没有注入，系统使用通配符等级（'*'）表示所有客户等级
 * - 客户等级是在某个商户（owner）下的，同一个客户在不同商户下可能有不同的等级
 * - 所有方法都需要传入 owner 参数来指定商户
 */
interface CustomerProviderInterface
{
    /**
     * 获取客户在指定商户下的等级
     *
     * 用于商品多价格功能，根据客户等级匹配对应的价格
     * 例如：'vip'、'gold'、'platinum' 等
     *
     * @param UserInterface $customer 客户对象（买家）
     * @param UserInterface $owner 商户对象（商品所有者）
     * @return string 客户等级代码
     *
     * 注意：
     * - 返回值应该与商品价格表中的 user_level 字段值匹配
     * - 应该返回具体的等级代码，不要返回 '*'（通配符）
     * - 同一个客户在不同商户下可能有不同的等级
     */
    public function getLevel(UserInterface $customer, UserInterface $owner): string;

    /**
     * 批量获取客户在指定商户下的等级
     *
     * 用于批量查询场景，提高性能
     *
     * @param array<UserInterface> $customers 客户对象数组
     * @param UserInterface $owner 商户对象（商品所有者）
     * @return array<string, string> 客户ID => 客户等级的映射数组
     *
     * 注意：
     * - key 为客户的 getID() 返回值
     * - value 为客户在该商户下的等级代码
     */
    public function getLevels(array $customers, UserInterface $owner): array;

    /**
     * 验证指定商户下的客户等级是否存在
     *
     * 用于验证商品价格配置中的客户等级是否有效
     *
     * @param string $level 客户等级代码
     * @param UserInterface $owner 商户对象（商品所有者）
     * @return bool true-存在，false-不存在
     */
    public function levelExists(string $level, UserInterface $owner): bool;

    /**
     * 获取指定商户下所有可用的客户等级列表
     *
     * 用于商品价格配置界面，显示可选的客户等级
     *
     * @param UserInterface $owner 商户对象（商品所有者）
     * @return array<CustomerLevel> 客户等级值对象数组
     *
     * 注意：
     * - 返回客户等级值对象列表，不包含 '*' 通配符等级
     * - '*' 通配符等级由 CustomerDomainService 自动合并
     */
    public function getAvailableLevels(UserInterface $owner): array;
}

