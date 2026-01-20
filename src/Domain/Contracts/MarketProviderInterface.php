<?php

namespace RedJasmine\Ecommerce\Domain\Contracts;

use RedJasmine\Ecommerce\Domain\Models\ValueObjects\MarketInfo;

/**
 * 市场提供者接口（扩展协议）
 * 
 * 此接口只负责提供**扩展市场**的数据，不包含默认市场
 * 默认市场由 MarketDomainService 管理
 * 
 * 实现此接口可以为系统添加多市场支持
 * 
 * 注意：此接口是完全可选的
 * - 如果没有注入，MarketDomainService 只返回默认市场
 * - 如果注入了实现，MarketDomainService 会合并默认市场和扩展市场
 */
interface MarketProviderInterface
{
    /**
     * 获取扩展市场信息（不包含默认市场）
     * 
     * @param string $marketCode 市场代码（如：cn, us, de）
     * @return MarketInfo|null 返回市场信息，null 表示市场不存在
     * 
     * 注意：不要返回默认市场（default），默认市场由领域服务管理
     */
    public function getMarket(string $marketCode): ?MarketInfo;
    
    /**
     * 获取所有启用的扩展市场列表（不包含默认市场）
     * 
     * @return array<MarketInfo> 扩展市场信息数组
     * 
     * 注意：只返回额外的市场，不要包含默认市场
     */
    public function getActiveMarkets(): array;
    
    /**
     * 验证扩展市场是否存在
     * 
     * @param string $marketCode 市场代码
     * @return bool true-存在，false-不存在
     * 
     * 注意：用于验证扩展市场，默认市场的验证由领域服务处理
     */
    public function exists(string $marketCode): bool;
}

