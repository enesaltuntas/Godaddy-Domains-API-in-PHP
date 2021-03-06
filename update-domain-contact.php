<?php 
error_reporting(0);
if(isset($_POST['domain'])){
	$API_KEY 	= "";
	$API_SECRET = "";
	
	$bodyContent = '{
	  "contactAdmin": {
		"addressMailing": {
		  "address1": "Gomti Nagar",
		  "address2": "Lucknow",
		  "city": "Lucknow",
		  "country": "IN",
		  "postalCode": "226010",
		  "state": "Uttar pradesh"
		},
		"email": "ram@example.com",
		"fax": "",
		"jobTitle": "Full Stack Developer",
		"nameFirst": "Hemant",
		"nameLast": "Vishwakarma",
		"nameMiddle": "",
		"organization": "Wizweb Technology",
		"phone": "+91.9876543210"
	  },
	  "contactBilling": {
		"addressMailing": {
		  "address1": "Gomti Nagar",
		  "address2": "Lucknow",
		  "city": "Lucknow",
		  "country": "IN",
		  "postalCode": "226010",
		  "state": "Uttar pradesh"
		},
		"email": "user@example.com",
		"fax": "",
		"jobTitle": "Full Stack Developer",
		"nameFirst": "Hemant",
		"nameLast": "Vishwakarma",
		"nameMiddle": "",
		"organization": "Wizweb Technology",
		"phone": "+91.9876543210"
	  },
	  "contactRegistrant": {
		"addressMailing": {
		  "address1": "Gomti Nagar",
		  "address2": "Lucknow",
		  "city": "Lucknow",
		  "country": "IN",
		  "postalCode": "226010",
		  "state": "Uttar pradesh"
		},
		"email": "user@example.com",
		"fax": "",
		"jobTitle": "Full Stack Developer",
		"nameFirst": "Hemant",
		"nameLast": "Vishwakarma",
		"nameMiddle": "",
		"organization": "Wizweb Technology",
		"phone": "+91.9876543210"
	  },
	  "contactTech": {
		"addressMailing": {
		  "address1": "Gomti Nagar",
		  "address2": "Lucknow",
		  "city": "Lucknow",
		  "country": "IN",
		  "postalCode": "226010",
		  "state": "Uttar pradesh"
		},
		"email": "user@example.com",
		"fax": "",
		"jobTitle": "Full Stack Developer",
		"nameFirst": "Hemant",
		"nameLast": "Vishwakarma",
		"nameMiddle": "",
		"organization": "Wizweb Technology",
		"phone": "+91.9876543210"
	  }
	}';
		
	
//	------------------UPDATE DOMAIN CONTACT DETAILS---------------	
	$urlUContact = "https://api.ote-godaddy.com/v1/domains/".$_POST['domain'].'/contacts';	
	
	$header = array(
		'Authorization: sso-key '.$API_KEY.':'.$API_SECRET.'',
		"Content-Type: application/json",
		'Accept: application/json'
	);
	$ch = curl_init();

	$timeout=600;

	curl_setopt($ch, CURLOPT_URL, $urlUContact);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH'); // Values: GET, POST, PUT, DELETE, PATCH, UPDATE 
	curl_setopt($ch, CURLOPT_POSTFIELDS, $bodyContent);
	//curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	//execute call and return response data.
	$result = curl_exec($ch);
	//close curl connection
	curl_close($ch);
	$latestDetail = json_decode($result, true);
//	print_r($latestDetail);exit;
	
	
	//------------GET DOMAIN DETAIL-------------------------------	
	
	$urlDetail = "https://api.ote-godaddy.com/v1/domains/".$_POST['domain'];
	
	$header = array(
		'Authorization: sso-key '.$API_KEY.':'.$API_SECRET.''
	);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $urlDetail);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);  
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	$result = curl_exec($ch);
	curl_close($ch);
	$domainDetail = json_decode($result, true);
}
?>


<html>
	<head>
		<title>Godaddy API - Update Domain Contacts Detail</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container" style="margin-top: 3%">
			<h1 class="text-center">Youtube - <a target="_blank" href="https://www.youtube.com/playlist?list=PLuKH7Xd7LecedHne7xz5aEeshwFhoy60g">Go To Playlist</a></h1>
			<h3 class="text-center">Update Domain Contacts Detail</h3>
			<?php if($domainDetail['code']){
				echo '<div class="alert alert-danger">'.$domainDetail['message'].'</div>';
			}?>
			<form action="" method="post">
				<div class="form-group">
					<label>Domain Name</label>
					<input type="text" class="form-control" name="domain">
				</div>
				<div class="text-center">
				<button type="submit" class="btn btn-success text-center">Update Domain Contacts Details</button>
				</div>
			</form>
			<hr>
			
			<table class="table table-bordered">
				<thead>
					<th>Domain Name</th>
					<th>Expires</th>
					<th>Status</th>
					<th>Auto Renew</th>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $domainDetail['domain']?></td>
						<td><?php echo $domainDetail['expires']?></td>
						<td><?php echo $domainDetail['status']?></td>
						<td><?php echo $domainDetail['renewAuto']=='1'?'Yes':'No'?></td>
					</tr>
				</tbody>
			</table>
			<h4>Contact Admin Detail</h4>
			<table class="table table-bordered">
				<thead>
					<th>First Name</th>
					<th>Last name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>organization</th>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $domainDetail['contactAdmin']['nameFirst']?></td>
						<td><?php echo $domainDetail['contactAdmin']['nameLast']?></td>
						<td><?php echo $domainDetail['contactAdmin']['email']?></td>
						<td><?php echo $domainDetail['contactAdmin']['phone']?></td>
						<td><?php echo $domainDetail['contactAdmin']['organization']?></td>
					</tr>
				</tbody>
			</table>
			<table class="table table-bordered">
				<thead>
					<th>address1</th>
					<th>address2</th>
					<th>city</th>
					<th>country</th>
					<th>postalCode</th>
					<th>state</th>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $domainDetail['contactAdmin']['addressMailing']['address1']?></td>
						<td><?php echo $domainDetail['contactAdmin']['addressMailing']['address2']?></td>
						<td><?php echo $domainDetail['contactAdmin']['addressMailing']['city']?></td>
						<td><?php echo $domainDetail['contactAdmin']['addressMailing']['country']?></td>
						<td><?php echo $domainDetail['contactAdmin']['addressMailing']['postalCode']?></td>
						<td><?php echo $domainDetail['contactAdmin']['addressMailing']['state']?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</body>
</html>