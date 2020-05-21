<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Balance extends CI_Model {
    function __construct(){
      parent::__construct();
      $this->load->database();
    }
 
   function getAllIncomeCategory(){
     $this->db->select('id,name');
	 $query=$this->db->get('income_category');
     return $query->result_array();
    }
    function getAllExpensiveCategory(){
      $this->db->select('id,name');
	  $query=$this->db->get('expensive_category');
      return $query->result_array();
    }
	function AddIncomeCategories($name){
	$data = array(
    'name' => $name
	);
    $this->db->insert('income_category', $data);
		
	}
    function AddExpensiveCategories($name){
		$data = array(
    'name' => $name
	);
    $this->db->insert('expensive_category', $data);
	}
   function deleteIncomeCategory($id){
	  
	   $this->db->where('id',$id);
	    $this->db->delete('income_category');
	   
   }	
  function getAllIncomeCategoryView($id){
     $this->db->select('id,name');
	 $this->db->where('id',$id);
	 $query=$this->db->get('income_category');
     return $query->result_array();
    } 
   function updateIncomeCategory($id,$data){
	     $this->db->where('id',$id);
	    $this->db->update('income_category',$data);
   }
   function deleteExpensiveCategory($id){
	   $this->db->where('id',$id);
	    $this->db->delete('expensive_category');
   }
function getAllExpensiveCategoryView($id){
     $this->db->select('id,name');
	 $this->db->where('id',$id);
	 $query=$this->db->get('expensive_category');
     return $query->result_array();
    }  
  function updateExpensiveCategory($id,$data){
	     $this->db->where('id',$id);
	    $this->db->update('expensive_category',$data);
   }
function AddIncome($data) {
	 $this->db->insert('income', $data);
}	
function AddExpense($data){
	 $this->db->insert('expense', $data);
	 
}
function totalIncome($cur_date){
	$this->db->select('COUNT(id) as id,SUM(amount)as amount');

	$this->db->where(' month(cur_date)',$cur_date);
	$query=$this->db->get('income');
    return $query->row();
	
	
}
function getAllIncomeDetaile($cur_date){
     $this->db->select('amount');
     $this->db->where(' month(cur_date)',$cur_date);
	
	$query=$this->db->get('income');
     return $query->result_array();
    } 
	

function totalExpensive($cur_date){
	
   $this->db->select('COUNT(id) as id,SUM(amount)as amount');
	$this->db->where(' month(cur_date)',$cur_date);
	$this->db->where(' amount>',0);
	$query=$this->db->get('expense');
	return $query->row();
}
function getAllExpensiveDetaile($cur_date){
	 $this->db->select('amount');
     $this->db->where(' month(cur_date)',$cur_date);
	 $query=$this->db->get('expense');
     return $query->result_array();
	}
	function today_income_transaction($today_date){
		$this->db->select('income.amount,income_category.name,income.note');
		$this->db->from('income');
		$this->db->join('income_category','income_category.id=income.category');
		$this->db->where('date(cur_date)',$today_date);
		$query=$this->db->get();
	    return $query->result_array();
		
	}
	function today_expensive_transaction($today_date){
		$this->db->select('expense.amount,expensive_category.name,expense.note');
		$this->db->from('expense');
		$this->db->join('expensive_category','expensive_category.id=expense.category');
		$this->db->where('date(cur_date)',$today_date);
		$query=$this->db->get();
	    return $query->result_array();
		
	}
	function month_income_transaction($cur_date){
		$this->db->select('income.amount,income_category.name,income.note');
		$this->db->from('income');
		$this->db->join('income_category','income_category.id=income.category');
		$this->db->where('month(cur_date)',$cur_date);
		$query=$this->db->get();
	    return $query->result_array();
		
	}
	function month_expensive_transaction($cur_date){
		$this->db->select('expense.amount,expensive_category.name,expense.note');
		$this->db->from('expense');
		$this->db->join('expensive_category','expensive_category.id=expense.category');
		$this->db->where('month(cur_date)',$cur_date);
		$query=$this->db->get();
	    return $query->result_array();
		
	}
	function yearIncomeReport(){
		$data=array('2015','2016','2017','2018','2019','2020');
		$this->db->select('sum(amount) as amount,year(cur_date) as year');
		$this->db->where_in('year(cur_date)',$data);
		$this->db->group_by('year');
		$query=$this->db->get('income');
	    return $query->result_array();
		
		
	}
	function yearExpensiveReport(){
		$data=array('2015','2016','2017','2018','2019','2020');
		$this->db->select('sum(amount) as amount,year(cur_date) as year');
		$this->db->where_in('year(cur_date)',$data);
		$this->db->group_by('year');
		$query=$this->db->get('expense');
	    return $query->result_array();
		
		
	}
	function monthIncomeReport($months){
		
		$this->db->select('sum(amount) as amount,dates as month');
		$this->db->where_in('dates',$months);
		$this->db->group_by('month');
		$query=$this->db->get('income');
	    return $query->result_array();
		
		
	}
	function monthExpensiveReport($months){
		
		$this->db->select('sum(amount) as amount,dates as month');
		$this->db->where_in('dates',$months);
		$this->db->group_by('month');
		$query=$this->db->get('expense');
	    return $query->result_array();
		
		
	}
	function weekIncomeReport($weeks){
		
		$this->db->select('sum(amount) as amount,date(cur_date) as week');
		$this->db->where_in('date(cur_date)',$weeks);
		$this->db->group_by('week');
		$query=$this->db->get('income');
	    return $query->result_array();
		
		
	}
	function weekExpensiveReport($weeks){
		
		$this->db->select('sum(amount) as amount,date(cur_date) as week');
		$this->db->where_in('date(cur_date)',$weeks);
		$this->db->group_by('week');
		$query=$this->db->get('expense');
	    return $query->result_array();
		
		
	}
}