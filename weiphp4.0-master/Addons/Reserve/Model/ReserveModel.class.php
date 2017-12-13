<?php

namespace Addons\Reserve\Model;
use Think\Model;

/**
 * Reserve模型
 */
class ReserveModel extends Model{
	function getInfo($id, $update = false, $data = array()) {
		$key = 'Reserve_getInfo_' . $id;
		$info = S ( $key );
		if ($info === false || $update) {
			$info = ( array ) (empty ( $data ) ? $this->find ( $id ) : $data);
			S ( $key, $info, 86400 );
		}
		
		return $info;
	}
	
	// 素材相关
	function getSucaiList($search = '') {
		$map ['token'] = get_token ();
		$map ['uid'] = session ( 'mid' );
		empty ( $search ) || $map ['title'] = array (
				'like',
				"%$search%" 
		);
		
		$data_list = $this->where ( $map )->field ( 'id' )->order ( 'id desc' )->selectPage ();
		foreach ( $data_list ['list_data'] as &$v ) {
			$data = $this->getInfo ( $v ['id'] );
		}
		
		return $data_list;
	}
	function getPackageData($id) {
		$info = get_token_appinfo ();
		$param ['publicid'] = $info ['id'];
		$param ['id'] = $id;
		
		$data ['reserve'] = $this->getInfo ( $id );
		
		return $data;
	}

    function payOK($data, $payment)
    {
        addWeixinLog($data, $payment);
        $payment = M('payment')->find($payment['id']);
        $isSuccess = 0;
        if ($payment['is_pay'] != 1) {
            // 查询订单状态
            $orderRes = D('Common/Payment')->query_order($data['appid'], $data['out_trade_no']);
            if (strtoupper($orderRes['return_code']) == 'SUCCESS' && strtoupper($orderRes['trade_state ']) == 'SUCCESS') {
                // 支付成功
                $isSuccess = 1;
            }
        } else {
            $isSuccess = 1;
        }
        if ($isSuccess) {
            // 处理订单状态
            $map['token'] = $payment['token'];
            $map['out_trade_no'] = $data['out_trade_no'];
            $res = M('reserve_value')->where($map)->setField('is_pay', 1);
            
            if ($payment['is_pay'] != 1) {
                M('payment')->where(array(
                    'id' => $payment['id']
                ))->setField('is_pay', 1);
            }
            $res['status'] = 1;
            return $res;
        } else {
            $res['status'] = 0;
            $res['msg'] = '支付状态设置失败';
            return $res;
        }
    }
}
