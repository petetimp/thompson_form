<!DOCTYPE html>
<html>
	<head>
    	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
	</head>
    <body>
		<?php
                        echo "script started";
			$json = file_get_contents("php://input");
            		$json_data = json_decode($json, TRUE);
		    	echo $json_data;

			// Create the API URL using the private app credentials
			$url ='https://usltst.ebiz.uapps.net/PersonifyDataServices/PersonifyDataUSL.svc/USLCustomerDetailViews?$filter=(LastName%20eq%20%27Sullivan%27%20and%20FirstName%20eq%20%27Leah%27%20and%20PrimaryEmailAddress%20eq%20%27something@tmaresources.com%27)&$format=json';
			
			$username='thompsonbrothers';
			$password='uHC6G#NG';
			$context = stream_context_create(array(
				'http' => array(
					'header'  => "Authorization: Basic " . base64_encode("$username:$password")
				)
			));
			$data = file_get_contents($url, false, $context);
		?>
		<script>
           	jQuery(document).ready(
			function(){
			}
		);
		</script>
        <?php
			$users_json=json_decode($data, true);
			
			$users=$users_json['d'];
			
			for($index=0; $index < count($users); $index++){
				foreach($users[$index] as $user=>$value){
					echo "<pre>";
					echo $user . " is " .$value;
					echo "</pre>";
				}
			}
		?>
	</body>
</html>