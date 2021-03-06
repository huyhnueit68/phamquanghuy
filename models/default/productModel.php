<?php

class productModel extends Model
{
	/*private $masp, $tensp, $gia;*/
	function __construct()
	{
		parent::__construct();
	}

    /**
     * @param $orderBy
     * @param $start
     * @param $last
     * @param null $where
     * @return array
     */
	function getPrds($orderBy, $start, $last, $where = null){
		if($where === null){
			$sql = "SELECT * FROM sanpham ORDER BY ".$orderBy." desc LIMIT ".$start.",".$last;
		} else {
			$sql = "SELECT * FROM sanpham WHERE ".$where." ORDER BY ".$orderBy." desc LIMIT ".$start.",".$last;
		}
		$prd = array();
		foreach($this->conn->query($sql) as $row){
			$prd[] = $row;
		}
		return $prd;
	}

    /**
     * @param $orderBy
     * @param $start
     * @param $last
     * @param null $where
     * @return array
     */
    function getPrdsWishList($orderBy, $start, $last, $where = null){
        if($where === null){
            $sql = "SELECT * FROM sanphamyeuthich ORDER BY ".$orderBy." desc LIMIT ".$start.",".$last;
        } else {
            $sql = "SELECT * FROM sanphamyeuthich WHERE ".$where." ORDER BY ".$orderBy." desc LIMIT ".$start.",".$last;
        }
        $prd = array();
        foreach($this->conn->query($sql) as $row){
            $prd[] = $row;
        }
        return $prd;
    }

    /**
     * @param $masp
     * @return array
     */
	function getPrdById($masp){
		$sql = "SELECT * FROM sanpham WHERE masp = ".$masp;
		$prd = array();
		foreach($this->conn->query($sql) as $row){
			$prd = $row;
		}
		return $prd;
	}

}