<?php
require 'Cookies.class.php';

$type = isset($_GET['type'])? strtolower($_GET['type']) : '';

if(!in_array($type, array('set','get','update','clear'))){
    exit('type not exists');
}

$obj = new Cookies('member', '', 10); // obj

switch($type){

    case 'set': // 设置
        $data = array(
            'name' => 'fdipzone',
            'gender' => 'male'
        );
        $obj->set('me', $data, 5);
        echo 'set cookies';
        break;

    case 'get': // 读取
        $result = $obj->get('me');

        echo '<pre>';
        print_r($result);
        echo '</pre>';

        echo 'get cookies';
        break;

    case 'update': // 更新
        $data = array(
            'name' => 'angelababy',
            'gender' => 'female'
        );
        $flag = $obj->update('me', $data);

        if($flag){
            echo 'update cookies success';
        }else{
            echo 'update cookies false';
        }

        break;

    case 'clear': // 清除
        $obj->clear('me');
        echo 'clear cookies';
        break;
}

?>