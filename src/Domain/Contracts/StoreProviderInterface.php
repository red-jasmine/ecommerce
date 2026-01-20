<?php

namespace RedJasmine\Ecommerce\Domain\Contracts;

use RedJasmine\Ecommerce\Domain\Models\ValueObjects\StoreInfo;
use RedJasmine\Support\Domain\Contracts\UserInterface;

/**
 * 门店提供者接口（扩展协议）
 *
 * 此接口只负责提供**扩展门店**的数据，不包含通配符门店（*）
 * 通配符门店由 StoreDomainService 管理
 *
 * 实现此接口可以为系统添加多门店支持
 *
 * 注意：此接口是完全可选的
 * - 如果没有注入，StoreDomainService 只返回通配符门店
 * - 如果注入了实现，StoreDomainService 会合并通配符门店和扩展门店
 */
interface StoreProviderInterface
{
    /**
     * 获取扩展门店信息（不包含通配符门店）
     *
     * @param string $storeType 门店类型
     * @param string $storeId 门店ID
     * @param UserInterface $owner 门店所属者，用于验证门店的 owner 是否匹配
     * @return StoreInfo|null 返回门店信息，null 表示门店不存在或 owner 不匹配
     *
     * 注意：
     * - 不要返回通配符门店（*），通配符门店由领域服务管理
     * - 只返回 owner 与传入参数一致的门店
     */
    public function getStore(string $storeType, string $storeId, UserInterface $owner): ?StoreInfo;

    /**
     * 获取所有启用的扩展门店列表（不包含通配符门店）
     *
     * @param UserInterface $owner 门店所属者，用于过滤门店
     * @return array<StoreInfo> 扩展门店信息数组
     *
     * 注意：
     * - 只返回额外的门店，不要包含通配符门店
     * - 只返回 owner 与传入参数一致的门店
     */
    public function getActiveStores(UserInterface $owner): array;

    /**
     * 验证扩展门店是否存在且 owner 匹配
     *
     * @param string $storeType 门店类型
     * @param string $storeId 门店ID
     * @param UserInterface $owner 门店所属者
     * @return bool true-存在且 owner 匹配，false-不存在或 owner 不匹配
     *
     * 注意：用于验证扩展门店，通配符门店的验证由领域服务处理
     */
    public function exists(string $storeType, string $storeId, UserInterface $owner): bool;
}

