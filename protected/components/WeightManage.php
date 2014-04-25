<?php
/**
 * Created by JetBrains PhpStorm.
 * User: syd3050
 * Date: 14-4-6
 * Time: 下午4:51
 * To change this template use File | Settings | File Templates.
 */

class WeightManage {

    public function cityUpdate($companyid,$citycode){
        $weight = KrzWeight::model()->findByAttributes(array('cid'=>$companyid));
        if($weight != null){
            $pos = strpos($weight->citycode,$citycode);
            if(strpos($weight->citycode,$citycode) == false){
                $weight->citycode = $weight->citycode.';'.$citycode;
                $weight->save(false);
            }
        }
    }

    public function weightUpdate($cid){
        KrzWeight::model()->updateAll(array('weight'=>1),"cid=:companyid",array('companyid'=>$cid));
    }

    /**
     * 创建公司时目前的策略是往权限表新增一条数据
     * @param $model mscompany对象
     */
    public function createCompany($model){
        $weight = new KrzWeight();
        $weight->cid = $model->id;
        $weight->cname = $model->name;
        $weight->citycode='';
        $weight->weight=0; //创建时默认为0，新增岗位时修改为1
        $weight->createtime = date("Y-m-d H:i:s");
        $weight->updatetime = date("Y-m-d H:i:s");
        $weight->save(false);
    }

    public function getCompanys(){
        $criteria = new CDbCriteria;

        $criteria->select = 't.*';
        $criteria->alias = 't';
        $criteria->join = "inner join krz_weight on krz_weight.cid = t.id";
        $criteria->addCondition("krz_weight.weight=1");
        $criteria->limit = 24;
        $criteria->order = " krz_weight.updatetime desc";

        return MsCompany::model()->findAll($criteria);
    }
}