<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CodeIgniter Pagination</title>
	<link rel="stylesheet" type="text/css" href="/codeigniter12/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Pagination in CodeIgniter</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>Address</th>
					</tr>
				</thead>
				<tbody>
				<?php
					foreach($results as $row){
						?>
						<tr>
							<td><?php echo $row->id; ?></td>
							<td><?php echo $row->firstname; ?></td>
							<td><?php echo $row->lastname; ?></td>
							<td><?php echo $row->address; ?></td>
						</tr>
						<?php
					}	
				?>
				</tbody>
			</table>
			<?php
				if(isset($links)){
					echo $links;
				} 
			?>
		</div>
	</div>
</div>
</body>
</html>