<?php
namespace common\helper;

/**
* 通用的树型类，可以生成任何树型结构
*/
class Tree
{
	/**
	* 生成树型结构所需要的2维数组
	* @var array
	*/
	var $arr = array();

	/**
	* 生成树型结构所需修饰符号，可以换成图片
	* @var array
	*/
	var $icon = array('│','├','└');

	/**
	* @access private
	*/
	var $ret = '';

	/**
	* 构造函数，初始化类
	* @param array 2维数组，例如：
	* array(
	*      1 => array('id'=>'1','parentid'=>0,'name'=>'一级栏目一'),
	*      2 => array('id'=>'2','parentid'=>0,'name'=>'一级栏目二'),
	*      3 => array('id'=>'3','parentid'=>1,'name'=>'二级栏目一'),
	*      4 => array('id'=>'4','parentid'=>1,'name'=>'二级栏目二'),
	*      5 => array('id'=>'5','parentid'=>2,'name'=>'二级栏目三'),
	*      6 => array('id'=>'6','parentid'=>3,'name'=>'三级栏目一'),
	*      7 => array('id'=>'7','parentid'=>3,'name'=>'三级栏目二')
	*      )
	*/
	function tree($arr=array())
	{
       $this->arr = $arr;
	   $this->ret = '';
	   return is_array($arr);
	}

    /**
	* 得到父级数组
	* @param int
	* @return array
	*/
	function get_parent($myid)
	{
		$newarr = array();
		if(!isset($this->arr[$myid])) return false;
		$pid = $this->arr[$myid]['parentid'];
		$pid = $this->arr[$pid]['parentid'];
		if(is_array($this->arr))
		{
			foreach($this->arr as $id => $a)
			{
				if($a['parentid'] == $pid) $newarr[$id] = $a;
			}
		}
		return $newarr;
	}

    /**
	* 得到子级数组
	* @param int
	* @return array
	*/
	function get_child($myid)
	{
		$a = $newarr = array();
		if(is_array($this->arr))
		{
			foreach($this->arr as $id => $a)
			{
				if($a['parentid'] == $myid) $newarr[$id] = $a;
			}
		}
		return $newarr ? $newarr : false;
	}

    /**
	* 得到树型结构
	* @param int ID，表示获得这个ID下的所有子级
	* @param string 生成树型结构的基本代码，例如："<option value=\$id \$selected>\$spacer\$name</option>"
	* @param int 被选中的ID，比如在做树型下拉框的时候需要用到
	* @return string
	*/
	function get_tree($myid, $str, $sid = 0, $adds = '', $str_group = '')
	{
		$number=1;
		$child = $this->get_child($myid);
		if(is_array($child))
		{
		    $total = count($child);
			foreach($child as $id=>$a)
			{
				$j=$k='';
				if($number==$total)
				{
					$j .= $this->icon[2];
				}
				else
				{
					$j .= $this->icon[1];
					$k = $adds ? $this->icon[0] : '';
				}
				$spacer = $adds ? $adds.$j : '';
				$selected = $id==$sid ? 'selected' : '';
				@extract($a);
				$parentid == 0 && $str_group ? eval("\$nstr = \"$str_group\";") : eval("\$nstr = \"$str\";");
				$this->ret .= $nstr;
				$this->get_tree($id, $str, $sid, $adds.$k.'&nbsp;',$str_group);
				$number++;
			}
		}
		return $this->ret;
	}
    /**
	* 同上一方法类似,但允许多选
	*/
	function get_tree_multi($myid, $str, $sid = 0, $adds = '')
	{
		$number=1;
		$child = $this->get_child($myid);
		if(is_array($child))
		{
		    $total = count($child);
			foreach($child as $id=>$a)
			{
				$j=$k='';
				if($number==$total)
				{
					$j .= $this->icon[2];
				}
				else
				{
					$j .= $this->icon[1];
					$k = $adds ? $this->icon[0] : '';
				}
				$spacer = $adds ? $adds.$j : '';
				
				$selected = $this->have($sid,$id) ? 'selected' : '';
				//echo $sid.'=>'.$id.' : '.$selected.' . <br/>';
				@extract($a);
				eval("\$nstr = \"$str\";");
				$this->ret .= $nstr;
				$this->get_tree_multi($id, $str, $sid, $adds.$k.'&nbsp;');
				$number++;
			}
		}
		return $this->ret;
	}

	/**
	 * 生成树形结构
	 * @param $data
	 * @param int $parent_id
	 * @param int $level
	 * @return array
	 */
	public static function getTree(&$data, $parent_id = 0, $level = 1)
	{
		static $treeList = [];
		$spacer = '';
		if($data){
			foreach ($data as $key => $val){
				if($val['parentid'] == $parent_id){
					if($val['parentid'] > 0) $spacer = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$level-1).'|---- ';
					$val['catname'] = $spacer.$val['catname'];
					$val['level'] = $level;
					$treeList[] = $val;
					unset($data[$key]);
					self::getTree($data,$val['id'],$level+1);
				}
			}
		}
		return $treeList;
	}

	/**
	 * 根据子类id查找出所有父级分类信息
	 * @param $data 所有分类列表
	 * @param $id 父级分类id
	 * @return array
	 */
	public static function getParent($data,$id){
		static $parentList = [];
		foreach($data as $val){
			if($val['id']== $id){//父级分类id等于所查找的id
				$parentList[]=$val;
				if($val['parentid']>0){
					self::getParent($data,$val['parentid']);
				}
			}
		}
		return $parentList;
	}

	/**
	 * 根据父id获得所有下级子类id的数据
	 * @param $id 父级id
	 * @param $data 所有分类列表
	 * @return array
	 */
	public static function getSon($data,$id){
		static $sonList = [];
		foreach ($data as $k => $v) {
			if($v['parentid'] == $id){
				$sonList[] = $data[$k];
				self::getSon($data,$v['id']);
			}
		}
		return $sonList;
	}


	function have($list,$item){
		return(strpos(',,'.$list.',',','.$item.','));
	}
}
?>