<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Balances extends CI_Controller {
	function __construct(){
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->model('members_model');
		$this->load->model('Balance');
	}
	public function balance(){
		$data=array();
		$cur_date=date("m");
		$today_date=date("yy-m-d");
		
	  
		$data['contents']='Balance';
		$data['total_income']=  $this->Balance->totalIncome($cur_date);
		$data['total_expensive']= $this->Balance->totalExpensive($cur_date);
        $data['get_detaile']=$this->Balance->getAllIncomeDetaile($cur_date);
	
		$data['get_detaile_exp']=$this->Balance->getAllExpensiveDetaile($cur_date);
		$data['income_category'] = $this->Balance->getAllIncomeCategory();
	    $data['today_income_transaction']=  $this->Balance->today_income_transaction($today_date);
		$data['today_expensive_transaction']=  $this->Balance->today_expensive_transaction($today_date);
		$data['expensive_category'] = $this->Balance->getAllExpensiveCategory();
		
		
		$this->load->view('content',$data);
	}
	
	public function Incomes(){
		$data=array();
		$cur_date=date("m");
		$data['contents']='income';
		$data['total_income']=  $this->Balance->totalIncome($cur_date);
		$data['month_income_transaction']=$this->Balance->month_income_transaction($cur_date);
		
		
		$this->load->view('content',$data);
	}

	public function Incomecategory(){
		$data=array();
		$data['contents']='income_categories';
		$data['income_categories_views']=$this->Balance->getAllIncomeCategory();
		$this->load->view('content',$data);
	}
	
	public function expensive(){
		$data=array();
		$cur_date=date("m");
		$data['contents']='expensive';
	    $data['total_expensive']= $this->Balance->totalExpensive($cur_date);
	    $data['month_expensive_transaction']=$this->Balance->month_expensive_transaction($cur_date);
		
		$this->load->view('content',$data);
	}
	public function expenesivecategory(){
		$data=array();
		$data['contents']='expensive_category';
	    $data['expensive_categories_views']=$this->Balance->getAllExpensiveCategory();
		$this->load->view('content',$data);
	}
		public function reports(){
		$data=array();
		$data['contents']='reports';
		
		$this->load->view('content',$data);
	}
	
	public function addIncomeCategory(){
		$name=$this->input->post('name');
		
		$this->Balance->AddIncomeCategories($name);
		$this->session->set_flashdata('success', 'Inserted successfully');
		 redirect('Balances/Incomecategory'); 
		
	}
	public function addExpensiveCategory(){
		$name=$this->input->post('name');
		
		$this->Balance->AddExpensiveCategories($name);
	    $this->session->set_flashdata('success', 'Inserted successfully');
		redirect('Balances/expenesivecategory'); 
		
	}
	public function deleteIncomeCategory($id){
		
       $this->Balance->deleteIncomeCategory($id);
	   $this->session->set_flashdata('delete', 'Deleted  successfully');
		redirect('Balances/Incomecategory'); 
		
     
	}
	public function editIncomeCategoryView($id){
		$data=array();
		$data['contents']='editIncomeCategoryView';
		$data['income_categories_views']=$this->Balance->getAllIncomeCategoryView($id);
		$this->load->view('content',$data);
		
		
	}
	public function updateIncomeCategory($id){
		
    $data = array(
    'name' => $this->input->post('name')
    );
    $this->Balance->updateIncomeCategory($id,$data);
	$this->session->set_flashdata('update', 'update  successfully');
	redirect('Balances/Incomecategory'); 
		
		
	}
	public function deleteExpensiveCategory($id){
		
       $this->Balance->deleteExpensiveCategory($id);
	   $this->session->set_flashdata('delete', 'Deleted  successfully');
	   redirect('Balances/expenesivecategory'); 
		
		
     
	}
	public function editExpensiveCategoryView($id){
		$data=array();
		$data['contents']='editExpensiveCategoryView';
		$data['expensive_categories_views']=$this->Balance->getAllExpensiveCategoryView($id);
		$this->load->view('content',$data);
		
		
	}
	public function updateExpensiveCategory($id){
		
    $data = array(
    'name' => $this->input->post('name')
    );
    $this->Balance->updateExpensiveCategory($id,$data);
	$this->session->set_flashdata('update', 'update  successfully');
	redirect('Balances/expenesivecategory'); 
		
		
	}
	public function addIncome(){
		$data=array(
		'amount'=>$this->input->post('amount'),
	    'category'=>$this->input->post('category'),
		'note'=>$this->input->post('note'),
		'cur_date'=>date("Y-m-d"),
		'dates'=>date('yy-m'));
		
		$this->Balance->AddIncome($data);
		$this->session->set_flashdata('success', 'Inserted successfully');
		 redirect('Balances/Balance'); 
		
	}
	public function addExpense(){
		$data=array(
		'amount'=>$this->input->post('amount'),
	    'category'=>$this->input->post('category'),
		'note'=>$this->input->post('note'),
		'cur_date'=>date("Y-m-d"),
		'dates'=>date("yy-m"));
		
		$this->Balance->AddExpense($data);
		$this->session->set_flashdata('success', 'Inserted successfully');
		 redirect('Balances/Balance'); 
		
	}
	public function yearReport(){
		$year_record=$this->Balance->yearIncomeReport();
		$year_record_expensive=$this->Balance->yearExpensiveReport();
		$data = [];
        $year=array("2015","2016","2017","2018","2019","2020");
		
      foreach($year_record as $row) {
		    foreach($year as $result){
				if($result==$row['year']){
            $data['value'][] = $row['amount'];
				}
				else{
				$data['value'][] = 0;	
				}
            }
      }
	   foreach($year_record_expensive as $row) {
		    foreach($year as $result){
				if($result==$row['year']){
            $data['value1'][] = $row['amount'];
				}
				else{
				$data['value1'][] = 0;	
				}
            }
      }
	  
	 echo  json_encode($data);
      
		
	}
	public function monthReport(){
		 $months = array();
        for ($i = 2; $i <= 12; $i++) {
        $timestamp = mktime(0, 0, 0, $i, 0);
        $months[] = date('yy-m', $timestamp);
        }
     
		$month_record=$this->Balance->monthIncomeReport($months);
		$month_record_expensive=$this->Balance->monthExpensiveReport($months);
		$data = [];
       
      
		
      foreach($month_record as $row) {
		    foreach($months as $result){
				if($result==$row['month']){
            $data['value'][] = $row['amount'];
				}
				else{
				$data['value'][] = 0;	
				}
            }
      }
	   foreach($month_record_expensive as $row) {
		    foreach($months as $result){
				if($result==$row['month']){
            $data['value1'][] = $row['amount'];
				}
				else{
				$data['value1'][] = 0;	
				}
            }
      }
	  foreach($months as $month)
	  $data['month'][]=$month;
	 echo  json_encode($data);
      
		
	}
    public function weekReport(){
		 $weeks = array();
        for ($i = 0; $i <= 8; $i++) {
        $timestamp = mktime(0, 0, 0, date('m'), date('d')-$i,date('y'));
        $weeks[] = date('Y-m-d', $timestamp);
        }
  
		$week_record=$this->Balance->weekIncomeReport($weeks);
		$week_record_expensive=$this->Balance->weekExpensiveReport($weeks);
		$data = [];
       
      
		
      foreach($week_record as $row) {
		    foreach($weeks as $result){
				if($result==$row['week']){
            $data['value'][] = $row['amount'];
				}
				else{
				$data['value'][] = 0;	
				}
            }
      }
	   foreach($week_record_expensive as $row) {
		    foreach($weeks as $result){
				if($result==$row['week']){
            $data['value1'][] = $row['amount'];
				}
				else{
				$data['value1'][] = 0;	
				}
            }
      }
	  foreach($weeks as $week)
	  $data['week'][]=$week;
	 echo  json_encode($data);
      
		
	}

	
	
}
