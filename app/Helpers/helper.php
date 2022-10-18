<?php

if (!function_exists('getFamilType')) {

function getFamilType()
{

    $familyType = ['F' => 'FATHER', 'M' => 'MOTHER', 'G' => 'GUARDIAN'];

    return $familyType;
}

}

if (!function_exists('getIdentity')) {

function getIdentity()
{
    $identity = ['ID_CARD' => 'ID CARD', 'PASSPORT' => 'PASSPORT', 'B_FORM' => 'B-FORM'];

    return $identity;
}

}