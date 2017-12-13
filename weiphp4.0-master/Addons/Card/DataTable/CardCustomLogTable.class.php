<?php
/**
 * CardCustomLog数据模型
 */
class CardCustomLogTable {
	// 数据表模型配置
	public $config = [
			'name' => 'card_custom_log',
			'title' => '客户关怀赠送记录',
			'search_key' => '',
			'add_button' => 1,
			'del_button' => 1,
			'search_button' => 1,
			'check_all' => 1,
			'list_row' => 10,
			'addon' => 'Card'
	];
	
	// 列表定义
	public $list_grid = [ ];
	
	// 字段定义
	public $fields = [
			'custom_id' => [
					'title' => '关怀id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'uid' => [
					'title' => '用户id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'token' => [
					'title' => 'token',
					'field' => 'varchar(255) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'cTime' => [
					'title' => '赠送时间',
					'field' => 'int(10) NULL',
					'type' => 'datetime',
					'is_show' => 1
			],
			'score' => [
					'title' => '赠送积分',
					'field' => 'varchar(50) NULL',
					'type' => 'string',
					'is_show' => 1
			],
			'coupon_id' => [
					'title' => '赠送券id',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1
			],
			'is_send' => [
					'title' => '是否已经赠送',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1,
					'extra' => '0:否
1:是'
			],
			'is_birthday' => [
					'title' => '是否生日赠送',
					'field' => 'int(10) NULL',
					'type' => 'num',
					'is_show' => 1,
					'extra' => '0:公历节日
1:生日关怀'
			]
	];
}	