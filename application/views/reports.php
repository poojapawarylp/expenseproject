 
<div class="container-fluid">
		    <div class="card">
			    <div class="container-fluid">
				    <div class="row">
				        <div class="col-md-3 col-xl-3">
                          <h5>Reports</h5>
					    </div>
					    <div class="col-md-6 col-xl-7">
                        </div>
				        <div class="col-md-3 col-xl-2">
                           
					    </div>
                
                    </div>
                </div>
		    </div><br>
	  
	  <div class="row">
	    <div class="col-md-5">
		    <div class="form-group">
                <label for="Add Category">Select Report:</label>
                <select id="sel_reports" class="form-control">
				   <option value=""></option>
                   <option value="1">Year</option>
                   <option value="2">Month</option>
                   <option value="3">Week</option>
                </select>
            </div>
		</div>
      </div>	  
	<div id="year" style="display:none">
	    <div class="pt-4 ">
	        <div class="card">
                <div class="card-header bg-white">
	               <h5 class="text-dark ">Year Report</h5>
	            </div>
	            <div class="card-body">
				    <canvas id = "yearchart"  width="250" height="50"> </canvas > 
	            </div>
	        </div>
	    </div>
	</div>
	<div id="month"  style="display:none">
	    <div class="pt-4 ">
	        <div class="card">
	            <div class="card-header bg-white">
	               <h5 class="text-dark ">Month Report</h5>
	            </div>
	            <div class="card-body">
				  <canvas id = "monthchart"  width="250" height="50"> </canvas > 
	            </div>
	        </div>
	    </div>
	</div>
	<div id="week"  style="display:none">
	    <div class="pt-4 ">
	        <div class="card">
	            <div class="card-header bg-white">
	                <h5 class="text-dark ">Week  Report</h5>
					
	            </div>
	            <div class="card-body">
				    <canvas id = "weekchart"  width="250" height="50"> </canvas > 
	            </div>
	        </div>
	    </div>
	</div>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type='text/javascript'>
  $(document).ready(function(){
 
   $('#sel_reports').change(function(){
    var report_id = $(this).val();
    if(report_id==1){
    
	  $.ajax({
     url:'<?php echo base_url();?>Balances/yearReport',
     method: 'GET',
     data: {report_id: report_id},
     dataType: 'json',
     success: function(response){
		console.log(response);
		 var ctx = document.getElementById ('yearchart'). getContext ('2d');
                    var chart = new Chart (ctx, {
                        type: 'bar',
                        data: {
                            labels:["2015","2016","2017","2018","2019","2020"],
                            datasets: [
							{
                                label: 'Income',
                                backgroundColor: 'rgb(60, 179, 113)',
                                borderColor: 'rgb (255, 255, 255)',
                                data:response.value
                            },
							{
                                label: 'Expensive',
                                backgroundColor: 'rgb(255, 0, 0)',
                                borderColor: 'rgb (255, 255, 255)',
                                data:response.value1
                            },
							
							
							
							]
                        },
                        options: {}
                    });
	  }
    
     
   });
      
   
	  $('#year').show();
	  $('#month').hide();
	  $('#week').hide();
	}	

    if(report_id==2){
		 $.ajax({
     url:'<?php echo base_url();?>Balances/monthReport',
     method: 'GET',
     data: {report_id: report_id},
     dataType: 'json',
     success: function(response){
		console.log(response);
		 var ctx = document.getElementById ('monthchart'). getContext ('2d');
                    var chart = new Chart (ctx, {
                        type: 'bar',
                        data: {
                            labels:response.month,
                            datasets: [
							{
                                label: 'Income',
                                backgroundColor: 'rgb(60, 179, 113)',
                                borderColor: 'rgb (255, 255, 255)',
                                data:response.value
                            },
							{
                                label: 'Expensive',
                                backgroundColor: 'rgb(255, 0, 0)',
                                borderColor: 'rgb (255, 255, 255)',
                                data:response.value1
                            },
							
							
							
							]
                        },
                        options: {}
                    });
	  }
    
     
   });
      
	  $('#year').hide();
	  $('#month').show();
	  $('#week').hide();
		
	}
	 if(report_id==3){
		  $.ajax({
     url:'<?php echo base_url();?>Balances/weekReport',
     method: 'GET',
     data: {report_id: report_id},
     dataType: 'json',
     success: function(response){
		console.log(response);
		 var ctx = document.getElementById ('weekchart'). getContext ('2d');
                    var chart = new Chart (ctx, {
                        type: 'bar',
                        data: {
                            labels:response.week,
                            datasets: [
							{
                                label: 'Income',
                                backgroundColor: 'rgb(60, 179, 113)',
                                borderColor: 'rgb (255, 255, 255)',
                                data:response.value
                            },
							{
                                label: 'Expensive',
                                backgroundColor: 'rgb(255, 0, 0)',
                                borderColor: 'rgb (255, 255, 255)',
                                data:response.value1
                            },
							
							
							
							]
                        },
                        options: {}
                    });
	  }
    
     
   });
	  $('#year').hide();
	  $('#month').hide();
	  $('#week').show();
	}
  });
 });
 </script>   
	  