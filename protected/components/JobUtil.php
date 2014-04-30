<?php
/**
 * Created by JetBrains PhpStorm.
 * User: syd3050
 * Date: 14-4-30
 * Time: 上午10:17
 * To change this template use File | Settings | File Templates.
 */

class JobUtil {

    public function getAllJobs(){
        $criteria = new CDbCriteria; // 创建CDbCriteria对象
        $criteria->order = 'createtime DESC'; // 设置排序条件
        $criteria->limit = 20; // 限定记录的条数
        $criteria->select = 'id,title,createtime'; // 设置结果所包含的字段
        $others = MsJobs::model()->findAll($criteria);
        return $others;
    }

    public function getHotJobs(){
        return $this->getAllJobs();
    }
}