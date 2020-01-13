<?php

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://restcountries.eu/rest/v2/all?fields=name;alpha3Code;translations");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);
		$arr = json_decode($output, true);

		$temp = array();
		foreach($arr as $row){
			$value = $row['name'];
			$key = $row['alpha3Code'];
			$trValues = $row['translations'];	
			$temp[$key] = isset($trValues['de']) ? $trValues['de'] : $value ;
		}

        curl_close($ch);     
?>