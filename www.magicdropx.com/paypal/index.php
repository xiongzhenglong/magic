<?PHP
function paytoken(){
    session_start();
    if(isset($_SESSION['token'])){
        if($_SESSION['token']['time']<=time())
        {
            $token=paytokencurl();
            $_SESSION['token']=array('token'=>$token,'time'=>time()+3600);
        }
    }else{
        $token=paytokencurl();
        $_SESSION['token']=array('token'=>$token,'time'=>time()+3600);
    }
    //echo($token);
    return $_SESSION['token']['token'];
}
 
function paytokencurl(){
    $url = "https://api-m.paypal.com/v1/oauth2/token";
    $clientId = "AaL993gX9unoCpd2v94PdtU7OXGjLTQbSX3TBI0UFd7xd3GWwqQVeEPLSjGDNDG5Z7h2O8LYgZBPiDFS";
    $clientSecret = "EH9iMHICCTpxI6bG9rdhhQ_83Fie83rY4OfCvQu1dFuRpWK1HYfifxJcBdou1XIU9QzeRDzIO3jrXrc_";
    $ch = curl_init ();
    curl_setopt ( $ch, CURLOPT_URL, $url );
    curl_setopt ( $ch, CURLOPT_HEADER, false );
    curl_setopt ( $ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "Accept-Language: en_US"
    ));
    curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt ( $ch, CURLOPT_POST, true );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt ( $ch, CURLOPT_USERPWD, $clientId . ":" . $clientSecret );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials" );
    $result = curl_exec($ch);
    curl_close($ch);
    $token=json_decode($result,true);
    //print_r($token);
    return $token['access_token'];
}

function index($money){
        $url = "https://api-m.paypal.com/v2/checkout/orders";
        $body = [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "amount" => [
                    "value" => $money,
                    "currency_code" => "PHP"
                ]
            ]],
            "application_context" => [
                "cancel_url" => "https://www.magicdropx.com/paypal/return.php",
                "return_url" => "https://www.magicdropx.com/paypal/return.php"
            ]
        ];
        $token=paytoken();
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_HEADER, false );
        curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt(  $ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . $token,
            'Accept: application/json',
            'Content-Type: application/json'
        ));
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, json_encode($body) );
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }


$str=index(10);
//echo $str;
//session_start();
//$token=$_SESSION['token']['token'];

//echo $token.'<br>';


$str=json_decode($str);
print_r($str);
$urltoken=$str->id;

?>