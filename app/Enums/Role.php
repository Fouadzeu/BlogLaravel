<?php
namespace App\Enums;

enum Role: string
{
    case Admin='admin';
    case Editor='editor';
    case Default='default';
}

?>
