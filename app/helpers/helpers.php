<?php
function slugify($text)
{
    $text = preg_replace('~[^\pL\d]+~u','-',$text);
    $text = iconv('utf-8','us-ascii//TRANSLIT',$text);
    $text = preg_replace('~[^-\w]+~','',$text);
    $textcount =strlen($text);
    if ($textcount>30) {
        $text=substr($text, 0, 29);
    }
    $text = trim($text,'-');
    $text = preg_replace('~-+~','-',$text);
    $text = strtolower($text);
    $text=$text.time();
    if (empty($text)) {
    return 'n-a';
    }else{

        return $text;
    }

}
