<!DOCTYPE html>
<html>
<head>
	<title>Data table</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

</head>
<body>
<div class="container">
	<div class="col-md-12">
		<table id="alldata" class="display" style="width:100%">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Email Send</th>
                <th>Egnyte</th>
                <th>Project Name</th>
                <th>Manufacturer</th>
                <th>Start Date</th>
            </tr>
        </thead>			
		</table>
	</div>
</div>

<script type="text/javascript">
 $(document).ready(function() {

 	var table = $("#alldata").DataTable({
 		"processing": true,
        "serverSide": true,
        "ajax" : {
        	"url" : "ajax.php",
        	"type" : "POST",
        },
	    "columns": [
				{data : 'id'},
				{data : 'email_send'},
				{data : 'egnyte_created'},
				{data : 'project_name'},
				{data : 'manufacturer'},
				{data : 'start_date'}
	    ]
 	});
 });

</script>
</body>
</html>