<?php

function isBase64($c) {
    return (is_string($c) || is_numeric($c) || ($c == '+') || ($c == '/'));
}
function base64Decode($encoded_string) {
    $MyBase64_chars = "L20kg3jMa5P4nzdhcVCiNTZSHqflbyxr9GAvWoD7QEU+XY6sRKIteFm/wuO18JBp";
    $in_len = mb_strlen($encoded_string);
    $i = 0;
    $j = 0;
    $in_ = 0;
    $char_array_4 = array();
    $char_array_3 = array();
    $ret = '';

    while ($in_len-- && ($encoded_string[$in_] != '=') && isBase64($encoded_string[$in_])) {
        $char_array_4[$i++] = $encoded_string[$in_];
        $in_++;
        if ($i == 4) {
            for ($i = 0; $i < 4; $i++) {
                $char_array_4[$i] = strpos($MyBase64_chars, $char_array_4[$i]);
            }

            $char_array_3[0] = ($char_array_4[0] << 2) + (($char_array_4[1] & 0x30) >> 4);
            $char_array_3[1] = (($char_array_4[1] & 0xf) << 4) + (($char_array_4[2] & 0x3c) >> 2);
            $char_array_3[2] = (($char_array_4[2] & 0x3) << 6) + $char_array_4[3];
            for ($i = 0; ($i < 3); $i++) {
                $ret .= chr($char_array_3[$i]);
            }

            $i = 0;
        }
    }
    if ($i) {
        for ($j = $i; $j < 4; $j++) {
            $char_array_4[$j] = 0;
        }

        for ($j = 0; $j < 4; $j++) {
            $char_array_4[$j] = strpos($MyBase64_chars, $char_array_4[$j]);
        }

        $char_array_3[0] = ($char_array_4[0] << 2) + (($char_array_4[1] & 0x30) >> 4);
        $char_array_3[1] = (($char_array_4[1] & 0xf) << 4) + (($char_array_4[2] & 0x3c) >> 2);
        $char_array_3[2] = (($char_array_4[2] & 0x3) << 6) + $char_array_4[3];
        for ($j = 0; ($j < $i - 1); $j++) {
            $ret .= chr($char_array_3[$j]);
        }
    }
    return $ret;
}
function base64Encode($bytes_to_encode) {
    $MyBase64_chars = "L20kg3jMa5P4nzdhcVCiNTZSHqflbyxr9GAvWoD7QEU+XY6sRKIteFm/wuO18JBp";
    $ret = '';
    $in_len = mb_strlen($bytes_to_encode);
    $i = 0;
    $j = 0;
    $char_array_3 = array();
    $char_array_4 = array();
    $offset = 0;
    while ($in_len--) {
        $char_array_3[$i++] = $bytes_to_encode[$offset++];
        if ($i == 3) {
            $char_array_4[0] = (ord($char_array_3[0]) & 0xfc) >> 2;
            $char_array_4[1] = ((ord($char_array_3[0]) & 0x03) << 4) + ((ord($char_array_3[1]) & 0xf0) >> 4);
            $char_array_4[2] = ((ord($char_array_3[1]) & 0x0f) << 2) + ((ord($char_array_3[2]) & 0xc0) >> 6);
            $char_array_4[3] = ord($char_array_3[2]) & 0x3f;
            for ($i = 0; ($i < 4); $i++) {
                $ret .= $MyBase64_chars[$char_array_4[$i]];
            }
            $i = 0;
        }
    }
    if ($i) {
        for ($j = $i; $j < 3; $j++) {
            $char_array_3[$j] = '\0';
        }

        $char_array_4[0] = (ord($char_array_3[0]) & 0xfc) >> 2;
        $char_array_4[1] = ((ord($char_array_3[0]) & 0x03) << 4) + ((ord($char_array_3[1]) & 0xf0) >> 4);
        $char_array_4[2] = ((ord($char_array_3[1]) & 0x0f) << 2) + ((ord($char_array_3[2]) & 0xc0) >> 6);
        $char_array_4[3] = ord($char_array_3[2]) & 0x3f;
        for ($j = 0; ($j < $i + 1); $j++) {
            $ret .= $MyBase64_chars[$char_array_4[$j]];
        }

        while (($i++ < 3)) {
            $ret .= '=';
        }
    }
    return $ret;
}