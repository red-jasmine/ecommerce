<?php

namespace RedJasmine\Ecommerce\Domain\Contracts;

use RedJasmine\Ecommerce\Domain\Models\ValueObjects\TaxInfo;
use RedJasmine\Money\Data\Money;

/**
 * 税务提供者接口
 * 
 * 用于计算商品税率和税额
 * 
 * 注意：此接口是完全可选的
 * - 如果没有注入，TaxDomainService 返回零税率
 * - 如果注入了实现，TaxDomainService 使用该实现计算税额
 */
interface TaxProviderInterface
{
    /**
     * 获取税率
     * 
     * @param string|null $taxClass 税类（如：standard, reduced, zero）
     * @param array $context 上下文信息（如：地区、商品类别、买家信息等）
     * @return float 税率（如：0.13 表示 13%）
     */
    public function getTaxRate(?string $taxClass, array $context = []): float;
    
    /**
     * 获取税务信息
     * 
     * @param string $taxClass 税类代码
     * @return TaxInfo|null 返回税务信息，null 表示税类不存在
     */
    public function getTaxInfo(string $taxClass): ?TaxInfo;
    
    /**
     * 计算税额
     * 
     * @param Money $amount 金额（含税或不含税，根据业务需求）
     * @param string|null $taxClass 税类
     * @param array $context 上下文信息
     * @return Money 税额
     */
    public function calculateTax(Money $amount, ?string $taxClass, array $context = []): Money;
    
    /**
     * 获取默认税率
     * 
     * @return float 默认税率
     */
    public function getDefaultTaxRate(): float;
    
    /**
     * 验证税类是否存在
     * 
     * @param string $taxClass 税类代码
     * @return bool true-存在，false-不存在
     */
    public function taxClassExists(string $taxClass): bool;
    
    /**
     * 获取所有可用的税类列表
     * 
     * @return array<TaxInfo> 税类信息数组
     */
    public function getAvailableTaxClasses(): array;
}

