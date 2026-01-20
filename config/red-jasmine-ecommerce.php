<?php
return [


    /**
     * 默认货币
     */
    'currency'                         => 'CNY',

    /**
     * 售后支持： 退款、换货、保修
     */
    'promise_services'                 => [
        [
            'name'  => 'refund',
            'value' => '',// 不允许
        ],
        [
            'name' => 'exchange',

        ],
        [
            'name' => 'service',
        ]
        ,


    ],

    /**
     * 商品类型支持的配送方式配置
     * 格式: 'product_type' => ['fulfillment_methods' => [...], 'default' => 'xxx']
     */
    'product_type_fulfillment_methods' => [
        'physical' => [
            'fulfillment_methods' => ['shipping', 'delivery', 'onsite'],
            'default'             => 'shipping',
        ],
        'virtual'  => [
            'fulfillment_methods' => ['virtual', 'instant'],
            'default'             => 'virtual',
        ],
        'digital'  => [
            'fulfillment_methods' => ['digital'],
            'default'             => 'digital',
        ],
        'service'  => [
            'fulfillment_methods' => ['visit', 'onsite', 'pickup', 'instant'],
            'default'             => 'visit',
        ],
    ],

];
