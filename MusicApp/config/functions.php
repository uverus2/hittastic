<?php 

function connectWadsongs() {
    $conn = new PDO ("mysql:host=localhost;dbname=users;", "root", '123456' );
    return $conn;
} 


function connectDftiTots() {
    $conn2 = new PDO ("mysql:host=localhost;dbname=dftitutorials;", "root", '123456' );
    return $conn2;
} 

function call_web_service($url, $method="GET", $data="")
{
    
    $uinfo_provided=parse_url($url);
    $uinfo_current=parse_url($_SERVER['PHP_SELF']);

    if($uinfo_provided["path"]==$uinfo_current["path"])
        die("ERROR !!! ".
            "You are trying to call the current script from ".
            "call_web_service()! Please check your code !!!"); 

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    //curl_setopt($ch,CURLOPT_HEADER, 0);

    $fp=null;

    if($method=="PUT")
    {
        curl_setopt($ch,CURLOPT_PUT,1);
        $fp=tmpfile();
        fwrite($fp, $data);
        fseek($fp, 0);
        curl_setopt($ch,CURLOPT_INFILE,$fp);
        curl_setopt($ch,CURLOPT_INFILESIZE,strlen($data));
    }
    elseif($method=="POST")
    {
        $post = array("data" => $data);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$post);
    }
    elseif($method=="DELETE")
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST, "DELETE");

    $response = curl_exec($ch);    

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    if($fp)
        fclose($fp);

    curl_close($ch);

  return array ("code"=>$httpCode, "content"=>$response);
}

?>