<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/26 0026
 * Time: 上午 11:19
 */

namespace Admin\Controller;

use Admin\Model\CenterModel;
use Think\Model;

class CenterController extends  AdminController
{
    //列表展示页面
    public function index(){
        //>> 1 获取数据
        $rows= M('Center')->select();
        //>> 2 分配数据
        $this->assign('rows',$rows);
        //>> 3 选择视图
        $this->meta_title = '报修管理';
        $this->display();
    }
    //添加
    public function add(){
        if (IS_POST){
         //获取post 提交的数据
           $center = D('center');
           $data = $center->create();//使用验证规则
           if ($data){
               $center->time=time();
               $center->status=0;
               $center->order=date('Ymd').rand(10000,99999);
               $re = $center->add();
              if ($re){
                  $this->success('新增成功',U('index'));
              }else{
                  $this->error('新增失败');
              }
           }else{
               $this->error($center->getError());
           }
        }
        $this->display('edit');
    }

    public function edit($id = 0){
        if (IS_POST){ //判断post提交的数据
            $center = D('center');
            $data= $center->create();
            if ($data){
               if ($center->save()){
                   $this->success('编辑成功',U('index'));
               }else{
                   $this->error('编辑失败');
               }
            }else{
                $this->error($center->getError());
            }
        }
      //根据id 查询数据
        $info = M('Center')->find($id);
        if ($info == false){
            $this->error('查询数据失败');
        }
        $this->assign('info',$info);
        $this->display();

    }
    //删除
    public function del(){
        //获取传过来的   id 参数
        $id = array_unique((array)I('id',0));
        //根据id 删除数据
        if (empty($id)){
            $this->error('请选择要删除的id');
        }
        $map = array('id' => array('in', $id) );
        if(M('Center')->where($map)->delete()){
            $this->success('删除成功',U('index'));
        }else{
            $this->error('删除失败');
        }
    }

    //详情查询
    public function detail($id){
        $rows = M('center')->find($id);
        if ($rows == false){
            $this->error('数据查询失败');
        }
        $this->assign('rows',$rows);
        $this->display();
    }

}