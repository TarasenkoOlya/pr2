<?php
class Adminmodel extends CI_Model
{
	
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		 
	}
	public function getItemsKat()
	{
		$query=$this->db->get('kategoriya');
		return $query->result_array();
	}
	 public function getItemsCountry()
	{
		$query=$this->db->get('kyxnya');
		return $query->result_array();
	} 
	 public function getItemsKatProd()
	{
		$query=$this->db->get('katproduct');
		return $query->result_array();
	} 
	 public function getItemsProd()
	{
		$query=$this->db->get('product');
		return $query->result_array();
	} 
	 public function getItemsRec()
	{
		$query=$this->db->get('recepty');
		return $query->result_array();
	}  
	public function getItemsEd()
	{
		$query=$this->db->get('edenizm');
		return $query->result_array();
	} 

	public function setAddRecepty($recnazva,$reckatid,$foto,$foto1,$foto2,$foto3,$foto4,$foto5,$foto6,$foto7,$foto8,$foto9,$foto10,$foto11,$foto12,$foto13,$foto14,$foto15,$shag1,$shag2,$shag3,$shag4,$shag5,$shag6,$shag7,$shag8,$shag9,$shag10,$shag11,$shag12,$shag13,$shag14,$shag15,$kratkoe_opisanie,$polnoe_opisanie,$reccountryid ,$dates,$fvideo,$ingrid,$avtor)
	{
		$data = array(
        'nazva' => $recnazva,
        'foto' => $foto,
        'kategoriyaid' => $reckatid,
        'shag1_foto' => $foto1,
        'shag2_foto' => $foto2,
        'shag3_foto' => $foto3,
        'shag4_foto' => $foto4,
        'shag5_foto' => $foto5,
        'shag6_foto' => $foto6,
        'shag7_foto' => $foto7,
        'shag8_foto' => $foto8,
        'shag9_foto' => $foto9,
        'shag10_foto' => $foto10,
        'shag11_foto' => $foto11,
        'shag12_foto' => $foto12,
        'shag13_foto' => $foto13,
        'shag14_foto' => $foto14,
        'shag15_foto' => $foto15,

        'shag1' => $shag1,
        'shag2' => $shag2,
        'shag3' => $shag3,
        'shag4' => $shag4,
        'shag5' => $shag5,
        'shag6' => $shag6,
        'shag7' => $shag7,
        'shag8' => $shag8,

        'shag9' => $shag9,
        'shag10' => $shag10,
        'shag11' => $shag11,
        'shag12' => $shag12,
        'shag13' => $shag13,
        'shag14' => $shag14,
        'shag15' => $shag15,

        'kratkoe_opisanie'=>$kratkoe_opisanie,
        
        'polnoe_opisanie'=>$polnoe_opisanie,

        'kyxnyaid'=>$reccountryid,
        'data'=>$dates,
        'video'=>$fvideo,
        'ingrid'=>$ingrid,
        'avtor'=>$avtor

         );

         $this->db->insert('recepty', $data);
		 

	} 

	public function setAddIngr($idlast,$ingr,$kol,$edizm )
	{
		$data = array(
        'receptid' => $idlast,
        'product' => $ingr ,
       'kol' => $kol,
        'edenizm' =>$edizm


         );

         $this->db->insert('product_recept', $data);
		 

	} 
	public function setAddKat($idcat)
	{
		$data = array(
        'nazva' => $idcat
         );

         $this->db->insert('kategoriya', $data);
		 

	} 
 public function setAddKatProd($catidprod)
	{
		$data = array(
        'nazva' => $catidprod
         );

         $this->db->insert('katproduct', $data);
		 
	} 


	public function setDellKatProd($idkatpro)
	{
		$data = array(
        'id' => $idkatpro
         );

         $this->db->delete('katproduct', $data);
		 
	} 


	public function setAddCountry($countryid)
	{
		$data = array(
        'nazva' => $countryid
         );

         $this->db->insert('kyxnya', $data);
		 
	} 


	public function setDellKat($dellkategoriya)
	{
		$data = array(
        'id' => $dellkategoriya
         );

         $this->db->delete('kategoriya', $data);
		 
	} 
	public function setDellRec($idr)
	{
		$data = array(
        'id' => $idr
         );

         $this->db->delete('recepty', $data);
		 
	} 
	public function setDellCountry($idcountry)
	{
		$data = array(
        'id' => $idcountry
         );

         $this->db->delete('kyxnya', $data);
		 
	} 
		public function setAddProd($idprod,$idkatd)
	{
		$data = array(
        'nazva' => $idprod,
        'katid' => $idkatd
         );

         $this->db->insert('product', $data);
		 
	} 


	public function setDellProd($idpro)
	{
		$data = array(
        'id' => $idpro
         );

         $this->db->delete('product', $data);
		 
	} 

}