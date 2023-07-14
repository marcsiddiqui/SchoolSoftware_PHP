<?php

function GenerateUrlData($email) {
    if (!empty($email)) {
        // Get the current datetime
        $current_datetime = new DateTime();
        // add 15 minutes on time as expiration
        $current_datetime->add(new DateInterval('PT15M'));
        // join email and time with a sign " | "
        // 2023-07-13 09:15:25
        // abc@gmail.com|2023-07-13 09:15:25
        $str = $email . "|" . $current_datetime->format("Y-m-d H:i:s");
        $result = EncryptString($str);
        return $result;
    }
}

function BreakUrlData($data) {
    $result = DecryptString($data);

    // break the string with a sign " | ", same as like we joined.
    $data_s = explode("|", $result);

    $email = $data_s[0];
    $time = $data_s[1];

    // now convert the string into date time typr
    $given_datetime = DateTime::createFromFormat("Y-m-d H:i:s", $time);

    // Get the current datetime
    $current_datetime = new DateTime();

    // if url time is greater than current time
    if ($given_datetime > $current_datetime) {
        //header("Location:http://localhost:82/sms/ResetPassword.php");

        return $email;
    }
    else {
        header("Location:http://localhost:82/sms/LinkExpired.php");
    }
}

function EncryptString($str) {
    
    // Store a string into the variable which
    // need to be Encrypted
    $simple_string = $str;
    
    // Store the cipher method
    $ciphering = "AES-128-CTR";
    
    $options = 0;
    
    // Non-NULL Initialization Vector for encryption
    $encryption_iv = '1234567891011121';
    
    // Store the encryption key
    $encryption_key = "272Arsalan_SMS";
    
    // Use openssl_encrypt() function to encrypt the data
    $encryption = openssl_encrypt($simple_string, $ciphering,
                $encryption_key, $options, $encryption_iv);
    
    return $encryption;
}

function DecryptString($str) {

    // Store the cipher method
    $ciphering = "AES-128-CTR";
    
    $options = 0;

    // Non-NULL Initialization Vector for decryption
    $decryption_iv = '1234567891011121';
    
    // Store the decryption key
    $decryption_key = "272Arsalan_SMS";
    
    // Use openssl_decrypt() function to decrypt the data
    $decryption=openssl_decrypt($str, $ciphering,
            $decryption_key, $options, $decryption_iv);
    
    return $decryption;
}

?>