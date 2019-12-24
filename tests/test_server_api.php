<?php
/**
 * Test of the API 0.7
 *
 * @author  Oros42 <oros.checkcrt@ecirtam.net>
 * @link    https://github.com/Oros42/checkcertif
 * @license CC0 Public Domain
 * @version 0.7
 * @date    2019-12-24
 *
 * Run this via :
 * $ php test_server_api.php
 *
 * Source code of the server : https://github.com/Oros42/checkcertif_server
 */

if (!is_file('conf.php')) {
	copy('conf.php.default', 'conf.php');
	die("Check that parameters in conf.php are good.\n");
}

include 'conf.php';

$aesKey64 = base64_encode(random_bytes(32));
$aesIV64 = base64_encode(random_bytes(16));

if (!is_dir($GNUPGHOME)) {
	mkdir($GNUPGHOME);
	chmod($GNUPGHOME, 0700);
} else {

}
if (!is_file($publicKeyName)) {
	file_put_contents($publicKeyName, file_get_contents($urlKey));
}

// JSON with your request
$msgArray = [
	"pwd" => $aesKey64,
	"i" => $aesIV64,
	"url" => $urlToCheck,
	"v" => "0.7"
];
$msgJSON = json_encode($msgArray);

echo "JSON request :\n$msgJSON\n";

// we put the JSON in a GPG container
putenv('GNUPGHOME='.$GNUPGHOME);
$gpg = new gnupg();
$info = $gpg->import(file_get_contents($publicKeyName));
$gpg->addencryptkey($info['fingerprint']);
$msgEnc = $gpg->encrypt($msgJSON);

if (empty($msgEnc)) {
	die("GPG error! Check if gpg is correctly setup and the public.gpg is good.\n"
		."If you have changed the gpg key, do :\nrm -r $GNUPGHOME*\n");
}

echo "GPG request :\n$msgEnc\n";

// and we post this to the server
$boundary = uniqid();
$postdata = "-----------------------------".$boundary."\r\n"
	."Content-Disposition: form-data; name=\"m\"\r\n\r\n"
	.$msgEnc."\r\n"
	."-----------------------------".$boundary."--\r\n";
$opts = [
	'http' =>[
		'method'  => 'POST',
		'header'  => 'Content-Type: multipart/form-data; boundary=---------------------------'.$boundary,
		'content' => $postdata
	]
];
$context  = stream_context_create($opts);
$result = file_get_contents($urlPost, false, $context);
// $result = "<base64 aes-256-gcm response>;<base64 aad>"

echo "Response:\n$result\n";

$response = explode(';', $result);

if (count($response) != 2) {
	die("Unexpected response!\n");
}

// we decrypt the AES
$clearHashs = openssl_decrypt(
	base64_decode($response[0]), // encrypted string
	'aes-256-gcm',
	base64_decode($aesKey64),
	OPENSSL_RAW_DATA,
	base64_decode($aesIV64),
	base64_decode($response[1]) // aad
);

// Now we have a JSON
$hashs = json_decode($clearHashs, true);
// [
//     0 => <RANDOM_DATA>,
//     1 => <SHA1>,
//     2 => <SHA256>
// ]
echo "\nsha1:\n".$hashs[1]."\n\n";
echo "sha256:\n".$hashs[2]."\n";
