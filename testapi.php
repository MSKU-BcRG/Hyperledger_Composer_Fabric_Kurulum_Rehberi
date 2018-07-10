// Method: POST, PUT, GET etc
// Data: array("param" => "value") ==> index.php?param=value


function call($method, $url, $data = false)
{
    $curl = curl_init();
	
	if($method == "POST"){
		
		curl_setopt($curl, CURLOPT_POST, 1);
		
		if($data){
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		}
		
	}else{
		if($data){
			$url = sprintf("%s?%s, $url, http_build_query($data));	
			
		}
	}
	
	// optinal authentication:
	curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

    curl_setopt($curl, CURLOPT_URL, $url);
     
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);


    $result = curl_exec($curl);
    curl_close($curl);

    return $result;
}

$url = "http://localhost:3000/api/Commodity";

$res = call("GET", $url);
var_dump($res);

echo "/n";
?>

//Bu php dosyası, blok zincir üzerinde kayıtlı olan Commodity nin Owner, TradingSymbol, TransactionID, mainExchange vb. değerlerini tutar.
//Eğer lokalde olunmasaydı, composer-rest-server dan aldığı verilerle blok zincir kayıtlarını dışarıdan görüntüleyerek eşleyebilecekti.
