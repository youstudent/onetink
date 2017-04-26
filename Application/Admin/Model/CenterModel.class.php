<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/26 0026
 * Time: 上午 11:24
 */

namespace Admin\Model;


use Think\Model;

class CenterModel extends Model
{
    //验证规则
    protected $_validate =array(
      array('name','require','用户名不能为空',self::MUST_VALIDATE,'regex',self::MODEL_BOTH),
      array('tel','require','电话不能为空',self::MUST_VALIDATE,'regex',self::MODEL_BOTH),
      array('address','require','地址不能为空',self::MUST_VALIDATE,'regex',self::MODEL_BOTH),
      array('problem','require','标题不能为空',self::MUST_VALIDATE,'regex',self::MODEL_BOTH),
      array('content','require','内容不能为空',self::MUST_VALIDATE,'regex',self::MODEL_BOTH),

    );

}