<?php

if(!isset($_SESSION['userId']))
{
 
    die("you have to login to see this page");
}