<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	public $pageKeyword=array(
				'title'=>'快入职 | 专注it类应届生求职',
				'keywords'=>'快入职，应届生，应届生求职，应届生招聘，求职，垂直招聘，垂直互联网招聘, 快入职官网, 快入职百科, IT招聘,O2O招聘, LBS招聘, 社交招聘, 校园招聘, 校招',
				'description'=>'快入职是专注IT类应届生的招聘网站，以众多优质IT资源为依托，发布圈内招聘信息，为IT应届生和优秀企业搭建快捷通道，以帮助应届生就业为己任。',
		);

}