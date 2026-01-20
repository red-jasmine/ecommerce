<?php

namespace RedJasmine\Ecommerce\Domain\Contracts;

use RedJasmine\Ecommerce\Domain\Models\ValueObjects\WarehouseInfo;

/**
 * 仓库提供者接口（扩展协议）
 * 
 * 此接口只负责提供**扩展仓库**的数据
 * 默认仓库（warehouse_id = 0）由 WarehouseDomainService 和 DefaultWarehouse 管理
 * 
 * 实现此接口可以为系统添加多仓库支持
 * 
 * 注意：此接口是完全可选的
 * - 如果没有注入，WarehouseDomainService 只返回默认仓库
 * - 如果注入了实现，WarehouseDomainService 会合并默认仓库和扩展仓库
 */
interface WarehouseProviderInterface
{
    /**
     * 获取扩展仓库信息
     * 
     * @param int $warehouseId 仓库ID
     * @return WarehouseInfo|null 返回仓库信息，null 表示仓库不存在
     * 
     * 注意：
     * - 可以处理 warehouse_id = 0（默认仓库），但不是必须的
     * - 领域服务会优先处理默认仓库
     */
    public function getWarehouse(int $warehouseId): ?WarehouseInfo;
    
    /**
     * 获取所有启用的扩展仓库列表
     * 
     * @return array<WarehouseInfo> 仓库信息数组
     * 
     * 注意：
     * - 可以包含或不包含默认仓库
     * - 领域服务会确保默认仓库始终在列表中
     */
    public function getActiveWarehouses(): array;
    
    /**
     * 验证仓库是否存在
     * 
     * @param int $warehouseId 仓库ID
     * @return bool true-存在，false-不存在
     */
    public function exists(int $warehouseId): bool;
    
    /**
     * 根据策略选择仓库（用于自动分配库存）
     * 
     * @param array $context 上下文信息（如：地区、商品、数量等）
     * @return int|null 返回仓库ID，null 表示无可用仓库
     */
    public function selectWarehouse(array $context = []): ?int;
}

