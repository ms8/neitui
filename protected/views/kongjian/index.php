<div class="ger">
    <div class="ger_r">
        <div class="xinxi">
            <dl>
                <img style="width:110px; height:110px;" alt="<?php echo $member->nickname; ?>" src="<?php echo $member->imgLink; ?>" />
                <dt>昵称:<?php echo $member->nickname; ?></dt>
                <dt><?php echo date('Y-m-d',$member->create_time); ?>加入</dt>
                <dt>级别:<?php echo $member->role_id?$member->roleOne->name:'普通会员'; ?></dt>
                <dt>积分:<?php echo $member->score?$member->score:'0'; ?></dt>
                <!-- 
        
                <dd>
                    <a class="guanzhu" href="" title="">关注此人 +</a>
                    <a class="faxin" href="" title="">发消息</a>
                </dd>
                <p>性别:保密</p>
                <p>性别:保密</p> -->
            </dl>
        </div>
        <!-- <div class="xshd">
            <h3>牛哥关注的人...</h3>
        </div>
        <div class="yonghu">
            <ul>
                <li>
                    <ol>
                        <a href="#" title="图片名称"><img alt="图片名称" src="/assets/default/images/ger.jpg" /></a>
                        <div class="zx"></div>
                    </ol>
                    <p>小米时光</p>
                </li>
                <li>
                    <ol>
                        <a href="#" title="图片名称"><img alt="图片名称" src="/assets/default/images/ger.jpg" /></a>
                    </ol>
                    <p>小米时光</p>
                </li>
            </ul>
            </br>
            <b>
            <a href="#">> 被1人关注</a>
            </b>
        </div> -->
        <div class="xshd">
            <h3><?php echo $member->nickname; ?>创建的小组...</h3>
        </div>
        <div class="yonghu">
            <ul>
                <?php
                    $member->groupMany?"":$member->groupMany=array();
                ?>
                <?php foreach($member->groupMany as $v){ ?>
                <li>
                    <ol>
                        <a href="<?php echo $this->createUrl('/group/detail',array('id'=>$v->id)); ?>" title="<?php echo $v->name; ?>"><img alt="<?php echo $v->name; ?>" src="<?php echo $v->imgLink; ?>" /></a>
                    </ol>
                    <p>
                        <a href="<?php echo $this->createUrl('/group/detail',array('id'=>$v->id)); ?>"><?php echo $v->name; ?></a>
                        (1<?php echo $v->topicCount; ?>)</p>
                </li>
                <?php } ?>
            </ul>
            </br>
            <!-- <span>本页永久链接:
            <a href="#">http://www.ikphp.com/index.php?app=space</a>
            </span> -->
        </div>

        <div class="xshd">
            <h3><?php echo $member->nickname; ?>参加的小组...</h3>
        </div>
        <div class="yonghu">
            <ul>
                <?php
                    $member->groupMany?"":$member->groupMany=array();
                ?>
                <?php foreach($member->mGroup(array('condition'=>'mGroup.uid !='.$member->id)) as $v){ ?>
                <li>
                    <ol>
                        <a href="<?php echo $this->createUrl('/group/detail',array('id'=>$v->id)); ?>" title="<?php echo $v->name; ?>"><img alt="<?php echo $v->name; ?>" src="<?php echo $v->imgLink; ?>" /></a>
                    </ol>
                    <p>
                        <a href="<?php echo $this->createUrl('/group/detail',array('id'=>$v->id)); ?>"><?php echo $v->name; ?></a>
                        (1<?php echo $v->topicCount; ?>)</p>
                </li>
                <?php } ?>
            </ul>
            </br>
            <!-- <span>本页永久链接:
            <a href="#">http://www.ikphp.com/index.php?app=space</a>
            </span> -->
        </div>

    </div>
</div>
