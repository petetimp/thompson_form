<!DOCTYPE html>
<html>
	<head>
    	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
	</head>
    <body>
		<?php 
			$membershipValid;
			$cart;
			$milliseconds = round(microtime(true) * 1000);
			$account=false;
		
			if(empty($_POST["USLid"])){
				$_POST["USLid"]="000003032738";
			}
		
		    /*if(empty($_POST["USLid"])){
				$_POST["USLid"]="100000122688";
			}*/  
		
			// Create the API URL using the private app credentials
			$url ='https://usltst.ebiz.uapps.net/PersonifyDataServices/PersonifyDataUSL.svc/USLCustomerDetailViews?$filter=(MasterCustomerId%20eq%20%27' . $_POST["USLid"] . '%27)&$format=json';
			
			$username='thompsonbrothers';
			$password='uHC6G#NG';
			$context = stream_context_create(array(
				'http' => array(
					'header'  => "Authorization: Basic " . base64_encode("$username:$password")
				)
			));
			$data = file_get_contents($url, false, $context);
		
			$users_json=json_decode($data, true);
			
			$users=$users_json['d'];
			
		    if(empty($users)){
			?>
			<script>
				jQuery("#myModal").removeClass("alert-danger").removeClass("alert-success").addClass("alert-danger");
				jQuery(".modal-footer button").removeClass("btn-danger").removeClass("btn-success").addClass("btn-danger");
				jQuery(".modal-title").text("Oops!");
				jQuery(".modal-body p").text("We could not find your account! Please double check the your USL ID number.  If you're still having trouble, please reach out to USL support for assistance with your membership.");
				jQuery("#modal-activate").trigger("click");
				jQuery(".form-group button.btn-success").removeAttr("disabled");
			</script>	
			<?php
			}else{
				$account=true;
				//echo count($users);
				for($index=0; $index < count($users); $index++){
					foreach($users[$index] as $user=>$value){
						
						if($user =="MembershipClass" && empty($cart)){
							//Add to cart button
							$cart='<div class="selector"><form class="variations_form cart" method="post" enctype="multipart/form-data" data-product_id="3663" data-product_variations="[{&quot;variation_id&quot;:3664,&quot;variation_is_visible&quot;:true,&quot;variation_is_active&quot;:true,&quot;is_purchasable&quot;:true,&quot;display_price&quot;:149,&quot;display_regular_price&quot;:149,&quot;attributes&quot;:{&quot;attribute_grade-level&quot;:&quot;High School (Grades 9-12)&quot;},&quot;image_src&quot;:&quot;&quot;,&quot;image_link&quot;:&quot;&quot;,&quot;image_title&quot;:&quot;&quot;,&quot;image_alt&quot;:&quot;&quot;,&quot;image_caption&quot;:&quot;&quot;,&quot;image_srcset&quot;:&quot;&quot;,&quot;image_sizes&quot;:&quot;&quot;,&quot;price_html&quot;:&quot;<span class=\&quot;price\&quot;><span class=\&quot;woocommerce-Price-amount amount\&quot;><span class=\&quot;woocommerce-Price-currencySymbol\&quot;>&amp;#36;<\/span>149.00<\/span><\/span>&quot;,&quot;availability_html&quot;:&quot;&quot;,&quot;sku&quot;:&quot;&quot;,&quot;weight&quot;:&quot; kg&quot;,&quot;dimensions&quot;:&quot;&quot;,&quot;min_qty&quot;:1,&quot;max_qty&quot;:null,&quot;backorders_allowed&quot;:false,&quot;is_in_stock&quot;:true,&quot;is_downloadable&quot;:false,&quot;is_virtual&quot;:false,&quot;is_sold_individually&quot;:&quot;no&quot;,&quot;variation_description&quot;:&quot;&quot;},{&quot;variation_id&quot;:3665,&quot;variation_is_visible&quot;:true,&quot;variation_is_active&quot;:true,&quot;is_purchasable&quot;:true,&quot;display_price&quot;:199,&quot;display_regular_price&quot;:199,&quot;attributes&quot;:{&quot;attribute_grade-level&quot;:&quot;Youth (Grades 3-8)&quot;},&quot;image_src&quot;:&quot;&quot;,&quot;image_link&quot;:&quot;&quot;,&quot;image_title&quot;:&quot;&quot;,&quot;image_alt&quot;:&quot;&quot;,&quot;image_caption&quot;:&quot;&quot;,&quot;image_srcset&quot;:&quot;&quot;,&quot;image_sizes&quot;:&quot;&quot;,&quot;price_html&quot;:&quot;<span class=\&quot;price\&quot;><span class=\&quot;woocommerce-Price-amount amount\&quot;><span class=\&quot;woocommerce-Price-currencySymbol\&quot;>&amp;#36;<\/span>199.00<\/span><\/span>&quot;,&quot;availability_html&quot;:&quot;&quot;,&quot;sku&quot;:&quot;&quot;,&quot;weight&quot;:&quot; kg&quot;,&quot;dimensions&quot;:&quot;&quot;,&quot;min_qty&quot;:1,&quot;max_qty&quot;:null,&quot;backorders_allowed&quot;:false,&quot;is_in_stock&quot;:true,&quot;is_downloadable&quot;:false,&quot;is_virtual&quot;:false,&quot;is_sold_individually&quot;:&quot;no&quot;,&quot;variation_description&quot;:&quot;&quot;}]"><table class="variations" cellspacing="0"><tbody><tr><td class="label"><label for="grade-level">Grade Level</label></td><td class="value"><select id="grade-level" class="" name="attribute_grade-level" data-attribute_name="attribute_grade-level" "="" data-show_option_none="yes"><option value="">Choose an option</option><option value="Youth (Grades 3-8)" class="attached enabled">Youth (Grades 3-8)</option><option value="High School (Grades 9-12)" class="attached enabled">High School (Grades 9-12)</option></select><a class="reset_variations" href="#" style="visibility: hidden;">Clear</a></td></tr></tbody></table><div class="single_variation_wrap"><div class="woocommerce-variation single_variation" style="display: none;"></div><div class="woocommerce-variation-add-to-cart variations_button woocommerce-variation-add-to-cart-disabled"><div class="quantity buttons_added"><input type="button" value="-" class="minus"><input type="text" step="1" min="" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric"><input type="button" value="+" class="plus"></div><button type="submit" class="single_add_to_cart_button shop-skin-btn shop-flat-btn alt disabled wc-variation-selection-needed"><svg class="mk-svg-icon" data-name="mk-moon-cart-plus" data-cacheid="icon-58c08eae53f67" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M416 96h-272c-16.138 0-29.751 12.018-31.753 28.031l-28.496 227.969h-51.751c-17.673 0-32 14.327-32 32s14.327 32 32 32h80c16.138 0 29.751-12.017 31.753-28.031l28.496-227.969h219.613l57.369 200.791c4.854 16.993 22.567 26.832 39.56 21.978 16.993-4.855 26.833-22.567 21.978-39.56l-64-224c-3.925-13.737-16.482-23.209-30.769-23.209zm-288-80a48 48 2700 1 0 96 0 48 48 2700 1 0-96 0zm192 0a48 48 2700 1 0 96 0 48 48 2700 1 0-96 0zm64 240h-64v-64h-64v64h-64v64h64v64h64v-64h64z" transform="scale(1 -1) translate(0 -480)"></path></svg>Add to cart</button><input type="hidden" name="add-to-cart" value="3663"><input type="hidden" name="product_id" value="3663"><input type="hidden" name="variation_id" class="variation_id" value=""></div></div></form></div>';
						}else if ($user=="BirthDate" && empty($cart) && $index == count(users) - 1){
							/*$date = preg_replace('/\D/', '', $value);
							
							$age = $milliseconds - $date;
							
							$age = $age / 1000 / 60 / 60 / 24 / 365;
							
							$age = floor($age);
							
							if(age > 14){
									
							}else{
								$cart='<div class="selector"><form class="cart" method="post" enctype="multipart/form-data"><div style="display:none" class="quantity buttons_added"><input type="button" value="-" class="minus"><input type="text" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric"><input type="button" value="+" class="plus"></div><input type="hidden" name="add-to-cart" value="3625"><button type="submit" class="single_add_to_cart_button shop-skin-btn shop-flat-btn alt"><svg class="mk-svg-icon" data-name="mk-moon-cart-plus" data-cacheid="icon-58bde64114e83" style=" height:16px; width: 16px; " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M416 96h-272c-16.138 0-29.751 12.018-31.753 28.031l-28.496 227.969h-51.751c-17.673 0-32 14.327-32 32s14.327 32 32 32h80c16.138 0 29.751-12.017 31.753-28.031l28.496-227.969h219.613l57.369 200.791c4.854 16.993 22.567 26.832 39.56 21.978 16.993-4.855 26.833-22.567 21.978-39.56l-64-224c-3.925-13.737-16.482-23.209-30.769-23.209zm-288-80a48 48 2700 1 0 96 0 48 48 2700 1 0-96 0zm192 0a48 48 2700 1 0 96 0 48 48 2700 1 0-96 0zm64 240h-64v-64h-64v64h-64v64h64v64h64v-64h64z" transform="scale(1 -1) translate(0 -480)"></path></svg>Add to cart</button></form></div>';	
							}*/
						}else if($user == "CycleEndDate" && empty($membershipValid) ){
							$endDate = 	preg_replace('/\D/', '', $value);
							if($milliseconds < $endDate && $endDate >= 1492056000000){//Check to see that Membership is valid until end of camp
								$membershipValid=true;
								echo "valid membership";
							}else{
								$membershipValid=false;
								//echo "not valid membership";
							}
						}else{}
						/*echo "<pre>";
						echo $user . " is " .$value;
						echo "</pre>";*/
					}
				}
				
				/*for($index=0; $index < count($users); $index++){
					foreach($users[$index] as $user=>$value){
						echo "<pre>";
						echo $user . " is " .$value;
						echo "</pre>";
					}
				}*/	
			}
		
			if($membershipValid){
			?>
				<script>
					console.log("membership valid");
					jQuery("#myModal").removeClass("alert-danger").removeClass("alert-success").addClass("alert-success");
					jQuery(".modal-footer button").removeClass("btn-danger").removeClass("btn-success").addClass("btn-success");
					jQuery(".modal-title").text("Success!");
					jQuery(".modal-body p").text("You are eligible for the camp. Please click the 'Add to Cart' button to add the 'Camp Event' to your cart.");
					jQuery("#modal-activate").trigger("click");
					jQuery("#contact-form-container").hide();
					jQuery('<?php echo $cart; ?>').insertAfter(jQuery(".description"));
				</script>
			<?php
			}else{
				if($account){
			?>	
				<script>
					
					    console.log("membership invalid");
						jQuery("#myModal").removeClass("alert-danger").removeClass("alert-success").addClass("alert-danger");
						jQuery(".modal-footer button").removeClass("btn-danger").removeClass("btn-success").addClass("btn-danger");
						jQuery(".modal-title").text("Oops!");
						jQuery(".modal-body p").text("Your Membership has expired.  Please renew your USL membership and try again");
						jQuery("#modal-activate").trigger("click");
						jQuery(".form-group button.btn-success").removeAttr("disabled");
				</script>	
			<?php
				}
			}
			?>
	</body>
</html>