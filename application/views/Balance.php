 
 
  
<div class="container-fluid">
    <div class="card">
	    <div class="container-fluid">
		    <div class="row">
				<div class="col-md-3 col-xl-3">
                    <h5>Balance</h5>
				</div>
			    <div class="col-md-6 col-xl-7">
                </div>
				<div class="col-md-3 col-xl-2">
                </div>
            </div>
        </div>
	</div><br>
	<div class="row">
		<div class="col-md-12 col-xl-12">        
            <div class="card">
                <div class="card-header bg-success">		
		            <?php $today = date("F Y");?>
		            <h5 class="text-white"><?php echo $today ?></h5>	
			        <h6 class="text-right text-white"> <button type="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square" aria-hidden="true"></i> Income</button> <button type="button" data-toggle="modal" data-target="#myModal1"><i class="fa fa-minus-square" aria-hidden="true"></i>Expensive</button></h6>
            	</div>
		        <div class="card-body">
				<div class="row">
				<div class="col-md-6">
		            <div class="progress" style="width:100%">
                        <div class="progress-bar bg-success" style="width:<?php if($total_income->amount>0){echo $per=($total_income->amount/($total_income->amount+$total_expensive->amount))*100 ;}?>%">
                          <span class="text-left m-3" >  <i class="fa fa-plus-square" aria-hidden="true"></i> Income -<?php if($total_income->amount>0){echo $per=($total_income->amount/($total_income->amount+$total_expensive->amount))*100 ;}?>% </span>
                        </div>
                        
                    </div>
				</div>
				<div class="col-md-6">
					<div class="progress" style="width:100%" >
					<div class="progress-bar bg-danger" style="width:<?php if($total_income->amount>0){echo $per_exp= $per_exp=($per-100); }?>%">
                          <span class="text-left m-3" >  <i class="fa fa-minus-square" aria-hidden="true"></i> Expensive -<?php if($total_income->amount>0){echo $per_exp= $per_exp=(100-$per); }?>% </span>
                     </div>
					 </div>
				</div>
				</div>
		            <div class="row pt-4">
		                <div class="col-md-10">
			               <h5 class="text-success">Income</h5>
			            </div>
			            <div class="col-md-2">
			              <h5 class="text-success"><i class="fa fa-inr" aria-hidden="true"></i> <?php
                            
                                  echo $total_income->amount;
                              
                              ?>  </h5>
			            </div>
		            </div>
		           <div class="row pt-2">
		                <div class="col-md-10">
			              <h5 class="text-danger">Expensive</h5>
			            </div>
			            <div class="col-md-2">
			              <h5 class="text-danger"><i class="fa fa-inr" aria-hidden="true"></i> <?php
                              
                                  echo $total_expensive->amount;
                             
                              ?> </h5>
			            </div>
		           </div>
	            </div>
		        <div class="card-footer">
		            <div class="row">
		                <div class="col-md-10">
			               <h5 class="text-dark">Balance</h5>
			            </div>
			            <div class="col-md-2">
			               <h5 class="text-dark"><i class="fa fa-inr" aria-hidden="true"></i><?php echo ($total_income->amount-$total_expensive->amount);?></h5>
			            </div>
		            </div>
		        </div>
		    </div>
        </div>
	</div>
	  
	<div class="pt-4 ">
	    <div class="card">
	        <div class="card-header bg-success text-white"><i class="fa fa-align-justify" aria-hidden="true"></i> Todays Transanction
	    </div>
		
	    <div class="card-body">
	        <div class="list-group" >
			 <?php foreach($today_income_transaction as $today){
					?>
                <li  class="list-group-item">
					<h6 class="pull-left text-dark"><?php echo $today['name']; ?></h6>
			        <small class="pull-right text-primary"><i class="fa fa-inr" aria-hidden="true"></i><?php echo $today['amount']; ?> </small>
			    </li>
			    <li  class="list-group-item">
					<h6 class="pull-left text-dark">Note: <?php echo $today['note']; ?> </h6>
				</li>
				  <?php }
				?>
				<?php foreach($today_expensive_transaction as $today1){
					?>
                <li  class="list-group-item">
					<h6 class="pull-left text-dark"><?php echo $today1['name']; ?></h6>
			        <small class="pull-right text-primary"><i class="fa fa-inr" aria-hidden="true"></i><?php echo $today1['amount']; ?> </small>
			    </li>
			    <li  class="list-group-item">
					<h6 class="pull-left text-dark">Note: <?php echo $today1['note']; ?> </h6>
				</li>
				  <?php }
				?>
			</div>
	    </div>
	</div>

	<div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Income</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
               <div class="modal-body">
                    <form action="<?php echo base_url();?>Balances/addIncome" method="post">
                        <div class="form-group">
                            <label for="amount">Amount:</label>
                            <input type="text"  name="amount" class="form-control" placeholder="Enter amount" >
                        </div>
                        <div class="form-group">
                            <label for="Add Category">Add Category:</label>
                            <select name="category" class="form-control">
                               <option value="">Choose categoey</option>
                               <?php
                               foreach($income_category as $category)
                               {
                                  echo '<option value="'.$category['id'].'">'.$category['name'].'</option>';
                               }
                              ?>  
                            </select>
                        </div>
                       <div class="form-group">
                          <label for="Add Category">Add Note:</label>
	                      <textarea class="form-control" rows="5" name="note"></textarea>
                        </div>
                       <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
			</div>
        </div>
    </div>
    <div class="modal" id="myModal1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Expensive</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
				<div class="modal-body">
                    <form action="<?php echo base_url();?>Balances/addExpense" method="post">
                        <div class="form-group">
                           <label for="amount">Amount:</label>
                           <input type="text" name="amount" class="form-control" placeholder="Enter amount" >
                        </div>
                        <div class="form-group">
                           <label for="Add Category">Add Category:</label>
                            <select name="category" class="form-control">
                               <option value="">Choose categoey</option>
                               <?php
                               foreach($expensive_category as $category)
                               {
                                  echo '<option value="'.$category['id'].'">'.$category['name'].'</option>';
                               }
                              ?>  
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Add Category">Add Note:</label>
	                        <textarea class="form-control" name="note" rows="5" id="comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>