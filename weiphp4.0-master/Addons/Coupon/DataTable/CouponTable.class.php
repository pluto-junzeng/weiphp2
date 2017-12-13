<?php
/**
 * Coupon数据模型
 */
class CouponTable {
	// 数据表模型配置
	public $config = [
			'name' => 'coupon',
			'title' => '优惠券',
			'search_key' => 'title',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 20,
			'addon' => 'Coupon'
	];
	
	// 列表定义
	public $list_grid = [
			'id' => [
					'title' => '编号',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'id',
					'function' => '',
					'href' => [ ]
			],
			'title' => [
					'title' => '标题',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'title',
					'function' => '',
					'href' => [ ]
			],
			'num' => [
					'title' => '计划发送数',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'num',
					'function' => '',
					'href' => [ ]
			],
			'collect_count' => [
					'title' => '已领取数',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'collect_count',
					'function' => '',
					'href' => [ ]
			],
			'use_count' => [
					'title' => '已使用数',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'use_count',
					'function' => '',
					'href' => [ ]
			],
			'start_time' => [
					'title' => '开始时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'start_time',
					'function' => '',
					'href' => [ ]
			],
			'end_time' => [
					'title' => '结束时间',
					'come_from' => 0,
					'width' => '',
					'is_sort' => 0,
					'name' => 'end_time',
					'function' => '',
					'href' => [ ]
			],
			'ids' => [
					'title' => '操作',
					'come_from' => 1,
					'width' => '',
					'is_sort' => 0,
					'href' => [
							'0' => [
									'title' => '编辑',
									'url' => '[EDIT]'
							],
							'1' => [
									'title' => '删除',
									'url' => '[DELETE]'
							],
							'2' => [
									'title' => '成员管理',
									'url' => 'Sn/lists?target_id=[id]&target=_blank'
							],
							'3' => [
									'title' => '预览',
									'url' => 'preview?id=[id]&target=_blank'
							]
					],
					'name' => 'ids',
					'function' => ''
			]
	];
	
	// 字段定义
	public $fields = [
			'background' => [
					'title' => '素材背景图',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'keyword' => [
					'title' => '关键词',
					'field' => 'varchar(100) NULL',
					'type' => 'string',
					'placeholder' => '请输入内容'
			],
			'use_tips' => [
					'title' => '使用说明',
					'field' => 'text NULL',
					'type' => 'editor',
					'remark' => '用户获取优惠券后显示的提示信息',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'title' => [
					'title' => '标题',
					'field' => 'varchar(255) NOT NULL',
					'type' => 'string',
					'is_must' => 1,
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'intro' => [
					'title' => '封面简介',
					'field' => 'text NULL',
					'type' => 'textarea',
					'placeholder' => '请输入内容'
			],
			'end_time' => [
					'title' => '领取结束时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'cover' => [
					'title' => '优惠券图片',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'cTime' => [
					'title' => '发布时间',
					'field' => 'int(10) unsigned NULL',
					'type' => 'datetime',
					'auto_rule' => 'time',
					'auto_time' => 1,
					'auto_type' => 'function',
					'placeholder' => '请输入内容'
			],
			'token' => [
					'title' => 'Token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'auto_rule' => 'get_token',
					'auto_time' => 1,
					'auto_type' => 'function',
					'placeholder' => '请输入内容'
			],
			'start_time' => [
					'title' => '开始时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'end_tips' => [
					'title' => '领取结束说明',
					'field' => 'text NULL',
					'type' => 'textarea',
					'remark' => '活动过期或者结束说明',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'end_img' => [
					'title' => '领取结束提示图片',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'remark' => '可为空',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'num' => [
					'title' => '优惠券数量',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'remark' => '0表示不限制数量',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'max_num' => [
					'title' => '每人最多允许获取次数',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'value' => 1,
					'remark' => '0表示不限制数量',
					'placeholder' => '请输入内容'
			],
			'follower_condtion' => [
					'title' => '粉丝状态',
					'field' => 'char(50) NULL',
					'type' => 'select',
					'value' => 1,
					'remark' => '粉丝达到设置的状态才能获取',
					'extra' => '0:不限制
1:已关注
2:已绑定信息
3:会员卡成员',
					'placeholder' => '请输入内容'
			],
			'credit_conditon' => [
					'title' => '积分限制',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'remark' => '粉丝达到多少积分后才能领取，领取后不扣积分',
					'placeholder' => '请输入内容'
			],
			'credit_bug' => [
					'title' => '积分消费',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'remark' => '用积分中的财富兑换、兑换后扣除相应的积分财富',
					'placeholder' => '请输入内容'
			],
			'addon_condition' => [
					'title' => '插件场景限制',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '格式：[插件名:id值]，如[投票:10]表示对ID为10的投票投完才能领取，更多的说明见表单上的提示',
					'placeholder' => '请输入内容'
			],
			'collect_count' => [
					'title' => '已领取数',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'placeholder' => '请输入内容'
			],
			'view_count' => [
					'title' => '浏览人数',
					'field' => 'int(10) unsigned NULL',
					'type' => 'num',
					'placeholder' => '请输入内容'
			],
			'addon' => [
					'title' => '插件',
					'field' => 'char(50) NULL',
					'type' => 'select',
					'value' => 'public',
					'extra' => 'public:通用
invite:微邀约',
					'placeholder' => '请输入内容'
			],
			'shop_uid' => [
					'title' => '商家管理员ID',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'placeholder' => '请输入内容'
			],
			'use_count' => [
					'title' => '已使用数',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'placeholder' => '请输入内容'
			],
			'pay_password' => [
					'title' => '核销密码',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'empty_prize_tips' => [
					'title' => '奖品抽完后的提示',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'remark' => '不填写时默认显示：您来晚了，优惠券已经领取完',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'start_tips' => [
					'title' => '活动还没开始时的提示语',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'more_button' => [
					'title' => '其它按钮',
					'field' => 'text NULL',
					'type' => 'textarea',
					'remark' => '格式：按钮名称|按钮跳转地址，每行一个。如：查看官网|http://weiphp.cn',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'over_time' => [
					'title' => '使用的截止时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'remark' => '券的使用截止时间，为空时表示不限制',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'use_start_time' => [
					'title' => '使用开始时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'shop_name' => [
					'title' => '商家名称',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'value' => '优惠商家',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'shop_logo' => [
					'title' => '商家LOGO',
					'field' => 'int(10) unsigned NULL',
					'type' => 'picture',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'head_bg_color' => [
					'title' => '头部背景颜色',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'value' => '#35a2dd',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'button_color' => [
					'title' => '按钮颜色',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'value' => '#0dbd02',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'template' => [
					'title' => '素材模板',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'value' => 'default',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'member' => [
					'title' => '选择人群',
					'field' => 'varchar(100) NULL',
					'type' => 'checkbox',
					'is_show' => 1,
					'extra' => '0:所有用户
-1:所有会员',
					'placeholder' => '请输入内容'
			],
			'is_del' => [
					'title' => '是否删除',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'placeholder' => '请输入内容'
			],
			'use_time_type' => [
					'title' => '有效时间类型',
					'type' => 'bool',
					'field' => 'tinyint(2) NULL',
					'extra' => '0:固定时间段
1:领取后多少天内',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'use_time_limit' => [
					'title' => '领取后多少天内有效',
					'type' => 'num',
					'field' => 'int(10) NULL',
					'remark' => '0 表示不限制',
					'is_show' => 1,
					'placeholder' => '请输入内容'
			],
			'is_public' => [
					'title' => '领取范围',
					'type' => 'bool',
					'field' => 'tinyint(2) NULL',
					'extra' => '0:通用券
1:活动赠送券',
					'value' => 0,
					'remark' => '通用券在会员卡就可领取，活动券只有参与活动后才能领取，如积分兑换',
					'is_show' => 1,
					'is_must' => 0
			]
	];
}	