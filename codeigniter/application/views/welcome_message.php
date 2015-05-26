<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
		<title>CISeed Project</title>
		
		<script type="text/javascript" src="//code.jquery.com/jquery-2.1.0.js"></script>
		<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		
		<style type="text/css">
			body {
			  padding-top: 20px;
			  padding-bottom: 20px;
			}
			.navbar {
			  margin-bottom: 20px;
			}
		</style>
	</head>
	<body>
		<div class="container">
		
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="javascript:void(0)">CISeed Project</a>
					</div>
				</div>
			</nav>
			
			<button id="update" class="btn btn-default">Update</button>
			
			<section>
				<table class="table table-bordered table-hover">
				  <thead>
					<tr>
					  <th>id</th>
					  <th>Username</th>
					  <th>password</th>
					</tr>
				  </thead>
				  <tbody id="tbody">
				  </tbody>
				</table>
			</section>
			
			
		</div>
	
	<script>
		(function() {
			
			function getStudents() {
				$.ajax({
					url: "student", 
					success: function(data){
						$("#tbody").empty()
						$(data.students).each(function() {
							$("#tbody").append('<tr>' +
							'<th scope="row">'+ this.id +'</th>'+
							'<td>'+ this.user_name +'</td>'+
							'<td>'+ this.password +'</td>'+
							'</tr>');
						});
					}
				});
			};
			
			function updateStudents() {
				$.ajax({
					url: "student/updatestudent", 
					success: function(){
						getStudents();
					}
				});
			};
			
			$("#update").click(function() {
				updateStudents();
			});
			
			getStudents();
			
		})();
	</script>
	
	</body>
</html>