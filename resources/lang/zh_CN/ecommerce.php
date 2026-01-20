<?php


return [

    'labels' => [],

    'fields' => [

        'product_type'              => '商品类型',
        'fulfillment_method'        => '发货方式',
        'order_quantity_limit_type' => '下单限制',
        'refund_type'               => '售后类型',

        'after_sales_service' => [
            'refund_type' => '售后类型',
            'is_allowed'  => '是否允许',
            'strategies'  => '策略',
            'strategy'    => [
                'type'                      => '策略类型',
                'stage'                     => '阶段',
                'start'                     => '开始',
                'end'                       => '结束',
                'time_limit'                => '限制时长',
                'time_limit_unit'           => '限制时长单位',
                'is_reason_type_restricted' => '是否限制理由分类',
                'reason_type_scopes'        => '理由分类范围',


            ],
        ],


    ],

    'enums' => [

        'product_type' => [
            'physical' => '实物',
            'virtual'  => '虚拟',
            'digital'  => '数字内容',
            'service'  => '服务',
            'coupons'  => '优惠券',
            'booking'  => '预定类',
        ],

        'fulfillment_method'        => [
            'shipping' => '物流快递',
            'delivery' => '同城配送',
            'onsite'   => '到店服务',
            'pickup'   => '到店自取',
            'virtual'  => '虚拟发货',
            'digital'  => '数字内容',
            'voucher'  => '核销凭证',
            'visit'    => '上门服务',
            'instant'  => '即时生效',
        ],
        'order_quantity_limit_type' => [

            'unlimited' => '不限制',
            'once'      => '单次',
            'lifetime'  => '终身',
            'day'       => '按天',
            'week'      => '按周',
            'month'     => '按月',
            'year'      => '按年',
        ],

        'refund_type' => [
            'refund'              => '仅退款',
            'return_goods_refund' => '退货退款',
            'exchange'            => '换货',
            'warranty'            => '保修',
            'reshipment'          => '补发',
        ],

        'discount_level' => [
            'order'    => '订单',
            'product'  => '商品',
            'shipping' => '运费',
            'checkout' => '结算',
        ],

    ],

    'common' => [

        'all'     => '全部',
        'default' => '默认',
    ]

];
