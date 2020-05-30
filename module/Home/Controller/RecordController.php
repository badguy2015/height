<?php

namespace Home\Controller;

Class RecordController extends \core\base
{
    public function indexAction()
    {
        $id = $_REQUEST['id'];
        $userModel = new \Model\UserModel();
        $userInfo = $userModel->getOneById($id);
        if(!$userInfo) die('会员不存在！');
        $this->assign('name',$userInfo['name']);
        $this->assign('userId',$userInfo['id']);

        $model = new \Model\RecordModel();
        $where = ['user_id'=>$userInfo['id']];
        $recordList = $model->getList($where);
        $this->assign('recordList',$recordList);
        $this->display();
    }
    public function addAction()
    {
        if(is_ajax()){
            $data = [
                'user_id' => $_POST['user_id'],
                'value' => $_POST['value'],
                'note' => $_POST['note'],
                'last_id' => $_POST['last_id'],
            ];

            $data = [];
            $model = new \Model\RecordModel();
            $result = $model->save($data);
        }

        $this->display();
    }
}