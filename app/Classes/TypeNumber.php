<?php
namespace App\Classes;
/**
 * 
 */
class TypeNumber
{
	public $arr;
	public $num;
	public $birthday;

	function __construct($name,$birthday)
	{
		$this->num = $this->to_slug($name);
		$this->birthday =$birthday;
		$this->getNumofBirthDay();
		$this->arr =array(
			"a"=>1,
			"b"=>2,
			"c"=>3,
			"d"=>4,
			"e"=>5,
			"f"=>6,
			"g"=>7,
			"h"=>8,
			"i"=>9,
			"j"=>1,
			"k"=>2,
			"l"=>3,
			"m"=>4,
			"n"=>5,
			"o"=>6,
			"p"=>7,
			"q"=>8,
			"r"=>9,
			"s"=>1,
			"t"=>2,
			"u"=>3,
			"v"=>4,
			"w"=>5,
			"x"=>6,
			"y"=>7,
			"z"=>8
		);
	}

	// 0n
	// 1g
	// 2u
	// 3y
	// 4e
	// 5n
	// Tổng số từ tên
	public function getNameNumber()
	{
		$inner=0;
		for ($i=0; $i <strlen($this->num) ; $i++) {
			$inner+=$this->arr[$this->num[$i]];
		}
		return $inner;
	}
	// chỉ số số lặp
	public function getNumofRepeats()
	{
		$arr =array_count_values([5,4,8,5]);
		$arr_fil = array_filter($arr, function($v)
		{
			return $v>=2;
		});
		$n=0;
		return $arr_fil;
	}
	// chỉ số hoàn thiện
	public function getComplite()
	{
		// return array_diff(array_flip($this->arr),array_unique(str_split($this->num)));
		$num=0;
		$arr=array_unique(str_split($this->num));
		foreach ($arr as $k => $v) {
			$num+=$this->arr[$v];
		}
		return $this->TotalofNum(126-$num);
	}
	// Nguyên âm
	public function getVowel()
	{
		$vowel=0;
		for ($i=0; $i <strlen($this->num) ; $i++) {
			$t= $this->num[$i];
			if($t=="u"||$t=="e"||$t=="o"||$t=="a"||$t=="i")
			$vowel+=$this->arr[$t];
		}
		return $vowel;
	}
	// chuyển 2021-01-02 thành 20210102
	public function getNumofBirthDay()
	{
		$this->birthday= str_replace('-', '', $this->birthday);
		$this->birthday= str_replace('/', '', $this->birthday);
	}
	// Tổng các số trong 1 số
	public function TotalofNum($v)
	{
		$total=0;
		$arr= $v.'';
		for ($i=0; $i <strlen($arr) ; $i++) {
			$total+=intval($arr[$i]);
		}
		return $total;
	}

	//Phụ âm
	public function Consanants()
	{
		$s=0;
		for ($i=0; $i <strlen($this->num) ; $i++) {
			$t= $this->num[$i];
			if($t=="p"||$t=="k"||$t=="f"||$t=="t"||$t=="s")
			$s+=$this->arr[$t];
		}
		return $s;
	}
	// chỉ số thái độ
	public function getAttitude()
	{
		$day_mouth=substr($this->birthday,4);
		return $this->TotalofNum($day_mouth);
	}
	// Chỉ số sứ mệnh
	public function getMission()
	{
		return $this->getNameNumber();
	}
	// chỉ số tâm hồn và tương tác
	public function getMixInnerAndInteractive($value='')
	{
		return abs($this->getInner()-$this->getInteractive());
	}
	// chỉ số đường đời và sứ mệnh
	public function getMixLifeAndMission($value='')
	{
		return abs($this->getLife()-$this->getMission());
	}
	// chỉ số  thành công
	public function getSuccessfully()
	{
		return $this->getLife()+$this->getMission();
	}
	// chỉ số ngày sinh
	public function getDateofBirth()
	{
		$day=substr($this->birthday,6);
		return $this->TotalofNum($day);
	}
	// chỉ số năm cá nhân
	public function getIndividualYear()
	{
		$day=substr($this->birthday,6);
		$month=substr($this->birthday,4,2);
		$y= $day.$month.date("Y");
		return $this->TotalofNum($this->TotalofNum($y));
	}
	// chỉ số đường đời
	public function getLife()
	{
		return $this->TotalofNum($this->birthday);
	}
	// Chỉ số tương tác
	public function getInteractive()
	{
		return $this->Consanants();
	}
	//Chỉ số Tâm hồn
	public function getInner()
	{
		  return $this->TotalofNum($this->getVowel());
	}
	public function to_slug($str) {
    $str = trim(mb_strtolower($str));
    $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
    $str = preg_replace('/(đ)/', 'd', $str);
    $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
    $str = preg_replace('/([\s]+)/', '', $str);
    return $str;
	}
}


?>