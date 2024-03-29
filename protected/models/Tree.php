<?php

/**
 * This is the model class for table "tbl_tree".
 *
 * The followings are the available columns in table 'tbl_tree':
 * @property integer $id
 * @property integer $lft
 * @property integer $rgt
 * @property integer $level
 * @property string $title
 * @property string $url
 */
class Tree extends CActiveRecord
{
	public $parent;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Tree the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{tree}}';
	}

	public function behaviors()
	{
		return array(
			'TreeBehavior' => array(
				'class' => 'application.extensions.nestedset.TreeBehavior',
                '_idCol' => 'id',
                '_lftCol' => 'lft',
                '_rgtCol' => 'rgt',
                '_lvlCol' => 'level',
			),
		);
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lft, rgt, level, title', 'required'),
			array('lft, rgt, level', 'numerical', 'integerOnly'=>true),
			array('title, url', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, lft, rgt, level, title, url', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'lft' => 'Lft',
			'rgt' => 'Rgt',
			'level' => 'Level',
			'parent' => '上级',
			'title' => '标题',
			'url' => 'URL',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('lft',$this->lft);
		$criteria->compare('rgt',$this->rgt);
		$criteria->compare('level',$this->level);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('url',$this->url,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

	public function getTreeList()
	{
        $root = $this->findByPK(1);
		if(!isset($root))
		{
			$model = new Tree;
			$model->attributes = array('lft'=>'0','rgt'=>'1','level'=>'0','title'=>'后台管理');
			$model->save();
		}
		$tree = $root->getNestedTree();
        foreach($tree as $subtree)
        {
            $message = $this->printNestedTree($subtree);
        }
        return $message;
	}

    private function printNestedTree($tree)
	{
	    $result = false;
	    if(@is_array($tree['children']))
	    {
	        foreach($tree['children'] as $child)
    	    {

    	        $result[] = array('text'=>$child['node']->url?CHtml::link($child['node']->title,'admin.php?r='.$child['node']->url):$child['node']->title,'children'=>$this->printNestedTree($child));

    	    }
	    }
	    
	    return $result;
	}

	public function getParent()
	{
        $root = $this->findByPK(1);
		$tree = $root->getTree();
		$data = CHtml::listData($tree, 'id', 'title');
		return $data;
	}
}