<div class="container-fluid">
		    <div class="card">
			    <div class="container-fluid">
				    <div class="row">
				        <div class="col-md-3 col-xl-3">
                          <h5>Income Categories</h5>
					    </div>
					    <div class="col-md-6 col-xl-7">
                        </div>
				        <div class="col-md-3 col-xl-2">
                             <button type="button" class="btn btn-success pull-right"  data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square" aria-hidden="true"></i> Add</button>  
					    </div>
                
                    </div>
                </div>
		    </div><br>
		    <?php if($this->session->flashdata('success')){ ?>
               <div class="alert alert-success">
                 <a href="#" class="close" data-dismiss="alert">&times;</a>
                  <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
               </div>
             <?php } ?>
			  <?php if($this->session->flashdata('delete')){ ?>
               <div class="alert alert-danger">
                 <a href="#" class="close" data-dismiss="alert">&times;</a>
                  <strong>Success!</strong> <?php echo $this->session->flashdata('delete'); ?>
               </div>
             <?php } ?>
			  <?php if($this->session->flashdata('update')){ ?>
               <div class="alert alert-success">
                 <a href="#" class="close" data-dismiss="alert">&times;</a>
                  <strong>Success!</strong> <?php echo $this->session->flashdata('update'); ?>
               </div>
             <?php } ?>
	    <div class="pt-4 ">
	        <table id="example2" class="table table-bordered table-hover bg-white">
                <thead class="thead-dark">
                   <tr>
                    <th class="text-success">Categories</th>
                    <th class="text-success">Action</th>
			       </tr>
                </thead>
                <tbody>
				<?php foreach($income_categories_views as $income_view){
					?>
                    <tr>
                      <td><?php echo $income_view['name']; ?></td>
                      <td><a href="<?php echo base_url() . "Balances/deleteIncomeCategory/" . $income_view['id'] ; ?>"  class="btn btn-link"><i class="fa fa-trash" aria-hidden="true"></i></a> &nbsp;&nbsp;  <a href="<?php echo base_url() . "Balances/editIncomeCategoryView/" . $income_view['id'] ; ?>"  class="btn btn-link"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                    </tr>
			    <?php }
				?>
				</tbody>
				
            </table>
	    </div>
	  
	   <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Income</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                   <div class="modal-body">
                       <form action="<?php echo base_url();?>Balances/addIncomeCategory" method="post">
                            <div class="form-group">
                               <label for="amount">New Category:</label>
                               <input type="text"  name="name" class="form-control" placeholder="Enter Category" required>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
			    </div>
  </div>
</div>   
	 <div class="modal" id="myModaledit">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Income</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                   <div class="modal-body">
                       <form action="<?php echo base_url();?>Balances/addIncomeCategory" method="post">
                            <div class="form-group">
                               <label for="amount">New Category:</label>
                               <input type="text"  name="name" class="form-control" placeholder="Enter Category" required>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
			    </div>
  </div>
</div>   
	    