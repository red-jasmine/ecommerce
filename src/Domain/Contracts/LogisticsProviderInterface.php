<?php

namespace RedJasmine\Ecommerce\Domain\Contracts;

use RedJasmine\Ecommerce\Domain\Models\ValueObjects\FreightTemplateInfo;
use RedJasmine\Ecommerce\Domain\Models\ValueObjects\LogisticsCompanyInfo;
use RedJasmine\Support\Domain\Contracts\UserInterface;

/**
 * 物流服务提供者接口（扩展协议）
 *
 * 此接口用于提供物流相关的数据服务，包括：
 * - 物流公司信息查询
 * - 运费模板信息查询
 * - 后续扩展：物流轨迹查询等
 *
 * 实现此接口可以为系统提供物流数据服务：
 * - 获取物流公司列表
 * - 根据物流公司编码获取物流公司信息
 * - 获取商户的运费模板列表
 * - 根据运费模板ID和商户获取运费模板信息
 *
 * 注意：此接口是完全可选的
 * - 如果没有注入，系统使用默认实现（从数据库查询）
 * - 如果注入了实现，系统可以通过该实现获取物流数据
 */
interface LogisticsProviderInterface
{
    /**
     * 获取物流公司列表
     *
     * 获取所有可用的物流公司信息
     *
     * @param array $context 上下文信息（如：过滤条件等）
     * @return array<LogisticsCompanyInfo> 物流公司信息值对象数组
     */
    public function getLogisticsCompanyList(array $context = []): array;

    /**
     * 根据物流公司编码获取物流公司信息
     *
     * @param string $code 物流公司编码
     * @return LogisticsCompanyInfo|null 返回物流公司信息值对象，null 表示不存在
     */
    public function getLogisticsCompanyByCode(string $code): ?LogisticsCompanyInfo;

    /**
     * 获取商户的运费模板列表
     *
     * 获取指定商户（owner）的所有运费模板
     *
     * @param UserInterface $owner 商户对象（商品所有者）
     * @param array $context 上下文信息（如：过滤条件、状态等）
     * @return array<FreightTemplateInfo> 运费模板信息值对象数组
     */
    public function getFreightTemplateListByOwner(UserInterface $owner, array $context = []): array;

    /**
     * 根据运费模板ID和商户获取运费模板信息
     *
     * @param int|string $templateId 运费模板ID
     * @param UserInterface $owner 商户对象（商品所有者）
     * @return FreightTemplateInfo|null 返回运费模板信息值对象，null 表示不存在或不属于该商户
     */
    public function getFreightTemplateByIdAndOwner(int|string $templateId, UserInterface $owner): ?FreightTemplateInfo;

    /**
     * 验证物流公司是否存在
     *
     * @param string $code 物流公司编码
     * @return bool true-存在，false-不存在
     */
    public function logisticsCompanyExists(string $code): bool;

    /**
     * 验证运费模板是否存在且属于指定商户
     *
     * @param int|string $templateId 运费模板ID
     * @param UserInterface $owner 商户对象（商品所有者）
     * @return bool true-存在且属于该商户，false-不存在或不属于该商户
     */
    public function freightTemplateExists(int|string $templateId, UserInterface $owner): bool;
}

