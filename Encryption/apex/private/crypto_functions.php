<?php

// Symmetric Encryption

// Cipher method to use for symmetric encryption
const CIPHER_METHOD = 'AES-256-CBC';

function key_encrypt($string, $key, $cipher_method=CIPHER_METHOD) {
  //TODO Use PHP's OpenSSL functions to encrypt data with a key
  // Needs a key of length 32 (256-bit)
  $key = str_pad($key, 32, '*');

  // Create an initialization vector which randomizes the
  // initial settings of the algorithm, making it harder to decrypt.
  // Start by finding the correct size of an initialization vector
  // for this cipher method.
  $iv_length = openssl_cipher_iv_length($cipher_method);
  $iv = openssl_random_pseudo_bytes($iv_length);

  // Encrypt
  $encrypted = openssl_encrypt($string, $cipher_method, $key, OPENSSL_RAW_DATA, $iv);

  // Return $iv at front of string, need it for decoding
  $message = $iv . $encrypted;

  // Encode just ensures encrypted characters are viewable/savable

  return base64_encode($message);
}

function key_decrypt($string, $key, $cipher_method=CIPHER_METHOD) {
  //TODO Use PHP's OpenSSL functions to decrypt data with a key

  // Needs a key of length 32 (256-bit)
  $key = str_pad($key, 32, '*');

  // Base64 decode before decrypting
  $iv_with_ciphertext = base64_decode($string);

  // Separate initialization vector and encrypted string
  $iv_length = openssl_cipher_iv_length($cipher_method);
  $iv = substr($iv_with_ciphertext, 0, $iv_length);
  $ciphertext = substr($iv_with_ciphertext, $iv_length);

  // Decrypt
  $plaintext = openssl_decrypt($ciphertext, $cipher_method, $key, OPENSSL_RAW_DATA, $iv);

  return $plaintext;
  // This is a secret.
}


// Asymmetric Encryption / Public-Key Cryptography

// Cipher configuration to use for asymmetric encryption
const PUBLIC_KEY_CONFIG = array(
    "digest_alg" => "sha512",
    "private_key_bits" => 2048,
    "private_key_type" => OPENSSL_KEYTYPE_RSA,
);

function generate_keys($config=PUBLIC_KEY_CONFIG) {
  //TODO Generate keys using PHP's OpenSSL functions
  $resource = openssl_pkey_new($config);

  // Extract private key from the pair
  openssl_pkey_export($resource, $private_key);

  // Extract public key from the pair
  $key_details = openssl_pkey_get_details($resource);
  $public_key = $key_details["key"];
  return array('private' => $private_key, 'public' => $public_key);
}

function pkey_encrypt($string, $public_key) {
  //TODO Use PHP's OpenSSL functions to encrypt using the public key.
  openssl_public_encrypt($string, $encrypted, $public_key);
  $message = base64_encode($encrypted);
  // Use base64_encode to make contents viewable/sharable
  return $message;
}

function pkey_decrypt($string, $private_key) {
  //TODO Use PHP's OpenSSL functions to decrypt using the private key.

  // Decode from base64 to get raw data
  $ciphertext = base64_decode($string);

  openssl_private_decrypt($ciphertext, $decrypted, $private_key);

  return $decrypted;
}

// Digital signatures using public/private keys

function create_signature($data, $private_key) {
  //TODO Use PHP's OpenSSL functions to sign the data with the private key.

  openssl_sign($data, $raw_signature, $private_key);
  return base64_encode($raw_signature);
}

function verify_signature($data, $signature, $public_key) {
  //TODO Use PHP's OpenSSL functions to verify using the public key.

  $raw_signature = base64_decode($signature);
  // returns 1 if data and signature match
  // returns 0 if data and signature do not match
  return openssl_verify($data, $raw_signature, $public_key);
}

?>
