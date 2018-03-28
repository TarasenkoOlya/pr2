<?php
class Homemodel extends CI_Model
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

		//git pr2

	}

	public function getItemsObject()
	{   
		$query=$this->db->get('recepty');
		return $query->result_array();

	}
		public function getRecipesComments($recid)
	{   
		$query=$this->db->get_where('feedback',array('receptid'=>$recid));
		return $query->result_array();

	}

	public function getItemsSort($sortkyxnyaid)
	{   
		$query=$this->db->get_where('recepty',array('kyxnyaid'=>$sortkyxnyaid));
		return $query->result_array();

	}
	public function getItemsSortSearch($sortsearchid)
	{   $this->db->like('nazva', $sortsearchid);
  
		$this->db->select('*'); 
		$this->db->from('recepty');
		$query=$this->db->get();
		return $query->result_array();
 


	}
	
	public function getMenuSort()
	{   
		$query=$this->db->get('kyxnya');
		return $query->result_array();

	}
	public function getItemById($id)
	{
	 $query=$this->db->get_where('recepty',array('kategoriyaid'=>$id));
		return $query->result_array();
	}

	public function getReceptById($recid)
	{
	 $query=$this->db->get_where('recepty',array('id'=>$recid));
		return $query->result_array();
	}
		public function getReceptByIdIngr($recid)
	{
	 //$query=$this->db->get_where('product_recept',array('receptid'=>$recid));
 $query=$this->db->query('SELECT * FROM product_recept p,edenizm e WHERE p.edenizm= e.id and p.receptid = '.$recid);

		return $query->result_array();
	}
	 
	public function getReceptByIdTop()
	{

		$this->db->order_by("reiting","desc");
		$this->db->limit( 10);
		$this->db->select('*'); 
		$this->db->from('recepty');
		$query=$this->db->get();
		return $query->result_array();
	}
	public function getReceptByIdTop1()
	{

		$this->db->order_by("reiting","desc");
		$this->db->limit( 1);
		$this->db->select('*'); 
		$this->db->from('recepty');
		$query=$this->db->get();
		return $query->result_array();
	}

	public function getReceptByIdTopComment( ) {

 $query=$this->db->query('SELECT COUNT(*)FROM recepty r, feedback f  WHERE f.receptid = r.id ORDER BY r.reiting DESC'); 
		// $this->db->order_by("reiting","desc");
		// $this->db->select('COUNT(*)'); 
		// $this->db->from('feedback','recepty');

		// $this->db->from('recepty');
		// $this->db->where('feedback.receptid','recepty.id');
		// $query=$this->db->get();

		return $query->result_array();
	}
		public function getReceptByIdTopData()
	{

		$this->db->order_by("data","desc");
		$this->db->limit( 10);
		$this->db->select('*'); 
		$this->db->from('recepty');
		$query=$this->db->get();
		return $query->result_array();
	}


		public function getItemsUser()
	{
		$query=$this->db->get('users');

		
		return $query->result_array();



	}

	public function setAddComment($recid,$comment,$avtor) 
	{
		$data = array(
        'receptid' => $recid,
        'feedback' => $comment ,
       'avtor' => $avtor 


         );

         $this->db->insert('feedback', $data);
		 


	}
	public function setAddlike($recid,$like,$reiting)
	{
		 
		         
		$this->db->set('reiting',$reiting);         
		$this->db->set('likekol',$like);
		$this->db->where('id', $recid);
		$this->db->update('recepty');
	} 

	public function setAddDlike($recid,$dlike,$reiting)
	{
		 
		         
		$this->db->set('reiting',$reiting);  
		$this->db->set('dlike',$dlike);
		$this->db->where('id', $recid);
		$this->db->update('recepty');
	} 
}