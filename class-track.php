<?php
/* interparcel api ajax call*/
include('class_shipment_tracking.php');

add_action('wp_head','interparcel_script');
function interparcel_script(){
?>
	<script>
	jQuery(document).ready(function() {
		
	jQuery('.send_tracking_no').click(function(){
		//alert("test");
		var ajaxurl = 'https://www.ecmindustrial.com.au/wp-admin/admin-ajax.php'; 
		var track_no = jQuery('.tracking_no').val();
		jQuery.ajax({
		  url: ajaxurl,
		  type: 'POST',
		  data : {action : 'interparcel_api_ajaxcall',
				  track_no : track_no
				  
		  },				  
		  success: function(data){
			jQuery('.shipping_track_data').html(data);
			jQuery('.show_details').click(function(){
				jQuery('.table').show();
				jQuery('.hide_details').show();
				jQuery('.show_details').hide();
			});
			jQuery('.hide_details').click(function(){
				jQuery('.table').hide();
				jQuery('.hide_details').hide();
				jQuery('.show_details').show();
			});
		  
		  }
		});
	});
});
	
</script>
<?php	
	
}
function interparcel_api_ajaxcall(){
	//echo "test";
	/*$track_no = $_POST['track_no'];
	$obj = new track;
	$res = $obj->response_shipment_data($track_no);
	echo  $res;*/
	
	$html = '
			<style>
				.trackingPane {
					margin-top: 0;
				}
				.status_date {
					background-color: grey;
					padding: 20px; 
					color: #ffffff; 
					text-align: center;
				}
				.status {
					font-size: 24px; 
					font-weight: 700;
				}
				.date{
					font-weight: 600;
				}
				.track_no{
					font-size: 14px;
				}
				.trackingDetails{
					display: table;
					width: 100%;
					font-size: 13px;
					
				}
				
				
				.trackingDetails > div > div {
					display: table-cell;
					padding-top: 2px;
					padding-bottom: 2px;
					padding-left:5px;
					
				}
				.trackingDetails > div {
					padding-right:5px;
				}
				.abbreviatedEvents {
					display: table;
					width: 100%;
					margin-top: 25px;
				
					border: 1px solid grey;
				}
				
				 .left{
					
					font-size: 12px;
					text-align: right;
					
				}
				 .right{
					
					font-size: 12px;
					text-align: left;
				}
				.icon1{
					display: block;
					margin-left: auto;
					margin-right: auto;
					align : center;
					width : 40px;
					height : 40px;
					border-radius: 50%;
					background-color: green;
				}
				.icon2{
					display: block;
					margin-left: auto;
					margin-right: auto;
					align : center;
					width : 55px;
					height : 40px;
					border-radius: 50%;
					
				}
				.icon3{
					display: block;
					margin-left: auto;
					margin-right: auto;
					width : 40px;
					height : 40px;
					border-radius: 50%;
					
				}
				.icon4{
					display: block;
					margin-left: auto;
					margin-right: auto;
					align : center;
					width : 50px;
					height : 45px;
					border-radius: 50%;
					
				}
				.ship_track{
					margin: 0 0 1.5em;
					width: 100%;
				}
				.tb_row{
					border-bottom: 0px solid
				}
				.show_details {
					float: right;
					margin-top: 12px;
					font-size: 14px;
					cursor: pointer;
					margin-bottom: 10px;
				}
				.table {
					border-collapse: separate;
					border-radius: 3px;
					width: 100%;
					font-size: 12px;
					line-height: 1.6;
					display:none;
					border: 1px solid #e9eaea;
				}
				.header{
					background-color:grey;
					font-weight: 300;
				}
				.hide_details{
					display:none;
					float: right;
					margin-top: 12px;
					font-size: 14px;
					cursor: pointer;
					margin-bottom: 10px;
				}
				.lowerLine {
					position: absolute;
					left: 49%;
					width: 2px;
					background-color: #e5e6e6;
					
				}
				td{
					padding-left:10px;
				}
				 td:first-child{
					 padding-left:10px;
				 }
				table.table:not(.noHeader) tr:first-child td {
					
					font-size: 12px;
					font-weight: 600;
				}
				
			</style>
	
			<div class="trackingPane">
				<div class="status_date">
					<div class="status">DELIVERED</div>
					<div class="date">14th June, 2022</div>
					<div class="track_no">Tracking Number : AU7031394296 </div>
				</div>
			</div>
			<br>
			<div class="trackingDetails">
				<div>
					<div>Delivery Address : </div> <div padding-left="5px"> Canning Vale, WA</div>
				</div>
				<div>
					<div>Status : </div> <div> Delivered</div>
				</div>
			</div>	
			<div class="abbreviatedEvents">
			<table class="ship_track">
				<tr class="tb_row">
					<td class="left">14th June, 2022<br>12:10pm</td>
					<td><img class="icon1" src="'.plugin_dir_url( __FILE__ ).'/images/delivered.png" /><div class="lowerLine"></div></td>
					<td class="right">Delivered<br>Canning Vale, WA</td>
				</tr>
				<tr class="tb_row">
					<td class="left">14th June, 2022<br>10:56am</td>
					<td class="icon2"><img class="icon2" src="'.plugin_dir_url( __FILE__ ).'/images/out_for_delivery.png" /></td>
					<td class="right">Out for delivery today<br>Perth Airport, WA</td>
				</tr>
				<tr class="tb_row">
					<td class="left">14th June, 2022<br>1:29am</td>
					<td><img class="icon3" height="40px" width="40px" src="'.plugin_dir_url( __FILE__ ).'/images/arrows-swap-svgrepo-com.svg" /></td>
					<td class="right">Parcel is in transit<br></td>
				</tr>
				<tr class="tb_row">
					<td class="left">8th June, 2022<br>2:42pm</td>
					<td class="icon4"><img class="icon4" src="'.plugin_dir_url( __FILE__ ).'/images/appointment_booked.svg" /></td>
					<td class="right">Shipment has been booked<br>Online</td>
				</tr>
			</table>
			</div>
			
			<div class="show_details">
				<a type="button" name="show_details" class="show_details">Detailed Events+</a>
				
			</div>
			<div class="hide_details">
				<a type="button" name="hide_details" class="hide_details">Hide Detailed Events-</a> 
			</div>
			<div>
			<table  class="table">
				<tbody><tr class="header">
					<td>Date</td>
					<td>Time</td>
					<td>Event</td>
					<td>Location</td>
				</tr>
				<tr>
					<td class="trackingEventsDate">Tue 14th Jun</td>
					<td class="trackingEventsTime">12:10</td>
					<td style="max-width: 400px;">Delivered</td>
					<td>Canning Vale, WA</td>
				</tr>
				<tr>
					<td class="trackingEventsDate">Tue 14th Jun</td>
					<td class="trackingEventsTime">10:56</td>
					<td style="max-width: 400px;">Onboard for delivery</td>
					<td>Perth Airport, WA</td>
				</tr>
				<tr>
					<td class="trackingEventsDate">Tue 14th Jun</td>
					<td class="trackingEventsTime">01:29</td>
					<td style="max-width: 400px;">Item processed at facility</td>
					<td></td>
				</tr>
				<tr>
					<td class="trackingEventsDate">Thu 9th Jun</td>
					<td class="trackingEventsTime">17:14</td>
					<td style="max-width: 400px;">In transit</td>
					<td>Tullamarine, VIC</td>
				</tr>
				<tr>
					<td class="trackingEventsDate">Thu 9th Jun</td>
					<td class="trackingEventsTime">17:09</td>
					<td style="max-width: 400px;">Item processed at facility</td>
					<td>Tullamarine, VIC</td>
				</tr>
				<tr>
					<td class="trackingEventsDate">Thu 9th Jun</td>
					<td class="trackingEventsTime">12:34</td>
					<td style="max-width: 400px;">Picked up from Sender</td>
					<td>Viewbank, VIC</td>
				</tr>
				<tr>
					<td class="trackingEventsDate">Wed 8th Jun</td>
					<td class="trackingEventsTime">14:42</td>
					<td style="max-width: 400px;">Shipment has been booked</td>
					<td>Online</td>
				</tr>
				</tbody>
			</table>
			</div>
			';
	echo  $html;
	die();
	
}
add_action("wp_ajax_interparcel_api_ajaxcall", "interparcel_api_ajaxcall");
add_action("wp_ajax_nopriv_interparcel_api_ajaxcall", "interparcel_api_ajaxcall");

function interparcel_api_shortcode() { 
	echo "<h1>InterParcel API Settings</h1>";
	
	echo '<label for"tracking_no">Tracking Number:  </label>';
	echo '<input type="text" name="tracking_no" class="tracking_no" value="'.$_POST['tracking_no'].'" />';
	echo '<br>';
	echo '<input type="button" name="send_tracking_no" class="send_tracking_no" value="Submit" /><br><br>';
	
	echo '<div class="shipping_track_data"></div>';
}
add_shortcode('interparcel_api', 'interparcel_api_shortcode');

add_action('admin_head','allox');
function allox(){
	if(isset($_GET['allox'])){
		$obj = new track;
		$data = 'AU6026163370';
		$res = $obj->response_shipment_data($data);
		var_dump($res);
		die();
	}
}
