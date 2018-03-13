<?php

/*
 * https://www.w3schools.com/charsets/ref_utf_dingbats.asp
 * for symbols
 */
/* * ************************ */

//print the object
function pre($object)
{
    echo "<pre>";
    print_r($object);
    echo "</pre>";
}

/* * *********************** */

//print the object
//dd=die dump
function dd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die();
}

/* * ********************** */

//to prevent html tage from working
function p_html($string)
{

    return htmlspecialchars($string);
}

/* * ******** */

//to prevent html tage from working
function stop()
{

    die();
}

/* * **************** */

//  ucwords() function
//  it takes string and return string with
//  first letter upper
//  ucwords
//  upper case words
//every word in the string will be start with capital letter
//check this http://php.net/manual/en/function.ucfirst.php

function ucw($string)
{

    return ucwords($string);
}

/* * **************** */