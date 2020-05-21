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
<div class="row">
<div class="col-md-5">


<?php foreach ($income_categories_views as $row): ?>

 <form action="<?php echo base_url() . "Balances/updateIncomeCategory/" .  $row['id'] ; ?>" method="post">
                            <div class="form-group">
                               <label for="amount">Edit Category:</label>
                               <input type="text"  name="name" class="form-control"  value="<?php echo $row['name']; ?>">
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
  <?php endforeach; ?>
  </div>
  </div>