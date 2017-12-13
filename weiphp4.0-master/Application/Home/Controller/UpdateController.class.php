<?php

namespace Home\Controller;

class UpdateController extends HomeController {
	function __construct() {
		$this->need_login = false;
		$this->need_appinfo = false;
		parent::__construct ();
	}
	function dealNickName() {
		set_time_limit ( 0 );
		$list = M ( 'user' )->order('uid desc')->field ( 'uid,nickname' )->select ();
		foreach ( $list as $vo ) {
			$save ['nickname'] = deal_emoji ( $vo ['nickname'], 1 );
			if ($save ['nickname'] != $vo ['nickname']) {
				$map ['uid'] = $vo ['uid'];
				M ( 'user' )->where ( $map )->save ( $save );
			}
		}
		dump($vo);
		dump ( 'voere' );
	}
	function moveViewHtml() {
		$dirs = [ 
				'Application',
				'Addons' 
		];
		
		$fileArr = [ ];
		foreach ( $dirs as $dir ) {
			$path = 'F:\xampp7\htdocs\shop4.0' . DIRECTORY_SEPARATOR . $dir;
			$dirfat = dir ( $path );
			while ( false !== $entry = $dirfat->read () ) {
				if ($entry == '.' || $entry == '..') {
					continue;
				}
				$app_path = $path . DIRECTORY_SEPARATOR . $entry . DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR;
				if (! is_dir ( $app_path . 'default' )) {
					continue;
				}
				$fileDir = dir ( $app_path . 'default' );
				while ( false !== $file = $fileDir->read () ) {
					if ($file == '.' || $file == '..') {
						continue;
					}
					rename ( $app_path . 'default' . DIRECTORY_SEPARATOR . $file, $app_path . $file );
				}
				$fileDir->close ();
				rmdir ( $app_path . 'default' );
			}
			
			$dirfat->close ();
		}
	}
}