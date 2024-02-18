<?php
//echo 'ok';
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
$urltoken=$_REQUEST["token"];
        $url = "https://api-m.sandbox.paypal.com/v2/checkout/orders/".$urltoken."/capture";
        $ch = curl_init ();
        $token=paytoken();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_HEADER, false );
        curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json'
        ));
        $paypal_redate = curl_exec($ch);
        curl_close($ch);
?>