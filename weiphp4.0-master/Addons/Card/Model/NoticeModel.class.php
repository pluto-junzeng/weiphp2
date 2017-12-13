<?php

namespace Addons\Card\Model;

use Think\Model;

/**
 * Card模型
 */
class NoticeModel extends Model {
	var $tableName = 'card_notice';
	function getUnJoinWhere($uid) {
		$map ['token'] = get_token ();
		$map ['is_del'] = 0;
		// 搜索条件
		$map ['end_time'] = array (
				array (
						'gt',
						NOW_TIME 
				),
				array (
						'exp',
						'IS NULL' 
				),
				'or' 
		);
		$map ['start_time'] = array (
				array (
						'lt',
						NOW_TIME 
				),
				array (
						'exp',
						'IS NULL' 
				),
				'or' 
		);
		
		// 获取用户的会员等级
		$levelInfo = D ( 'Addons://Card/CardLevel' )->getCardMemberLevel ( $uid );
		// 读取模型数据列表
		// dump($map);
		$map ['member'] = array (
				array (
						'LIKE',
						'%,0,%' 
				),
				array (
						'LIKE',
						'%,-1,%' 
				) 
		);
		if ($levelInfo) {
			$levelId = $levelInfo ['id'];
			$map ['member'] [] = [ 
					'LIKE',
					"%,{$levelId},%" 
			];
		}
		$map ['member'] [] = 'or';
		
		return $map;
	}
	function getWapList($uid) {
		$map1 ['token'] = $map ['token'] = get_token ();
		$map1 ['uid'] = $map ['uid'] = $uid;
		
		$map = $this->getUnJoinWhere ( $uid );
		$dataList = $this->where ( $map )->order ( 'id desc' )->select ();
		foreach ( $dataList as &$v ) {
			$nocount = 0;
			$map1 ['card_score_id'] = $v ['id'];
			$logs = M ( 'score_exchange_log' )->where ( $map1 )->count ();
			if ($v ['coupon_type'] == 0) {
				if (is_install ( "ShopCoupon" )) {
					$info = D ( 'Addons://ShopCoupon/ShopCoupon' )->getInfo ( $v ['coupon_id'] );
					$list = D ( 'Common/SnCode' )->getMyList ( $map ['uid'], $v ['coupon_id'], 'ShopCoupon' );
					$my_count = count ( $list );
					if ($info ['limit_num'] > 0 && $my_count >= $info ['limit_num']) {
						$nocount = 1;
					}
					$v ['coupon'] = '代金券：' . $info ['title'];
				}
			} else {
				$info = D ( 'Addons://Coupon/Coupon' )->getInfo ( $v ['coupon_id'] );
				$list = D ( 'Common/SnCode' )->getMyList ( $map ['uid'], $v ['coupon_id'], 'Coupon' );
				$my_count = count ( $list );
				if ($info ['max_num'] > 0 && $my_count >= $info ['max_num']) {
					$nocount = 1;
				}
				
				$v ['coupon'] = '优惠券：' . $info ['title'];
			}
			if ($info ['collect_count'] >= $info ['num']) {
				$nocount = 1;
			} else if (! empty ( $info ['start_time'] ) && $info ['start_time'] > NOW_TIME) {
				$nocount = 1;
			} else if (! empty ( $info ['end_time'] ) && $info ['end_time'] < NOW_TIME) {
				$nocount = 1;
			}
			
			if ($logs > 0 && $logs >= $v ['num_limit']) {
				$nocount = 1;
			}
			$v ['no_count'] = $nocount;
		}
		return $dataList;
	}
	function getNewCount($uid) {
		$count = 0;
		
		$list = $this->getWapList ( $uid );
		foreach ( $list as $vo ) {
			if ($vo ['no_count'] == 0) {
				$count ++;
			}
		}
		return $count;
	}
}
