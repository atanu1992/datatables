<?php 

  if($_SERVER['SERVER_NAME'] == 'localhost') {
    $conn = mysqli_connect('localhost','root','','torcsillneo_helicldb');
  }else{
    $conn = mysqli_connect('localhost','torcsillneo_helicusr','yL47WLv9','torcsillneo_helicldb');
  }

  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error(); die;
  }

  $draw = $_POST['draw'];
  $offSet = $_POST['start'];
  $limit = $_POST['length'];

  $result=mysqli_query($conn, "SELECT count(*) as total from `engineering_projects`");
  $data=mysqli_fetch_assoc($result);
  $total = $data['total'];

  
  $datasql = "SELECT * FROM `engineering_projects` LIMIT $limit OFFSET $offSet";
  $res = mysqli_query($conn,$datasql);
  $resultArr = array();
  // $counter = 0;

  while($row = mysqli_fetch_assoc($res)) {
   	$data = array(
   		'id' 				      => $row['i_engineering_projects'],
   		'email_send' 		  => $row['b_email_already_sent'],
   		'egnyte_created' 	=> $row['b_egnyte_created'],
   		'project_name' 		=> $row['Project_Name'],
   		'manufacturer' 		=> $row['manufacturer'],
   		'start_date'   		=> $row['Start_Date']
   	);
    array_push($resultArr,$data);
  }
  // $count = count($resultArr);
  $result=array('draw'=>$draw ,'recordsTotal'=>$total, 'recordsFiltered'=>$total, 'data'=>$resultArr);
  echo json_encode($result); die;
?>