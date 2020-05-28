<?php
function decode($encoded){
        $decoded = "";
        $encoded = str_replace(array("\r\n", "\r", "\n"), "", $encoded);
        $len = (int)(strlen($encoded)/4);
        for ($i=0, $len = strlen($encoded); $i < $len; $i+=4){
            $decoded .= base64_decode(substr($encoded,$i,4));
        }
        return $decoded;
    }

function validateData($data){
        // json 不用任何转义
        if(substr($data, 0, 1) !== '{' && strpos($data, "%") !== false) $data =  urldecode($data);
        if(substr($data, 0, 1) !== '{') $data = decode($data);
return $data;
}

$a = $_GET['data'];

echo validateData($a);
exit;
