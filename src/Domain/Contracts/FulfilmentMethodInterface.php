<?php

namespace RedJasmine\Ecommerce\Domain\Contracts;

use RedJasmine\Support\Domain\Contracts\TypeEnumInterface;

/**
 * 履约方式接口
 */
interface FulfilmentMethodInterface extends TypeEnumInterface
{

    /**
     * 是否需要物流运输
     * @return bool
     */
    public function requiresShipping() : bool;

    /**
     * 是否需要收货地址
     * @return bool
     */
    public function requiresAddress() : bool;

    /**
     * 是否需要计算运费
     * @return bool
     */
    public function requiresFreight() : bool;


    /**
     * 是否自动签收
     * @return bool
     */
    public function isAutoSinged() : bool;

}
