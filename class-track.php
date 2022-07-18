<?php 
class track
{
	function response_shipment_data($track_no){
		$url = "https://api.au.interparcel.com/tracking/v1/".$track_no;
		$apikey = get_option('interparcel_api_key');
		
		$curl = curl_init();
		curl_setopt_array( $curl, array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'GET',
				CURLOPT_POSTFIELDS => '',
				CURLOPT_HTTPHEADER => array(
					"X-Interparcel-Auth: oFmvQQcJhSZj4H5CjACt",
					"Content-Type: application/json",	
				)
			));
			
			$response = curl_exec( $curl );
			
			$err = curl_error( $curl );
			curl_close( $curl );
			
			if ( $err ) {
				return false;
			} else {
				return $response;
			}
	}
}
