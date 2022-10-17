<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Collection;

class Helper
{

   protected static $familyType = [
        1=> [
            'PREFIX' => 'F',
            'FAMILY_TYPE' => 'FATHER',
        ],
        2 => [
            'PREFIX' => 'M',
            'FAMILY_TYPE' => 'MOTHER',
        ],
        3 => [
            'PREFIX' => 'G',
            'FAMILY_TYPE' => 'GAURDIAN',
        ],

    ];

    protected static $identity = [
        1=> [
            'IDENTITY' => 'ID_CARD',
            'IDENTITY_TYPE' => 'ID CARD',
        ],
        2 => [
            'IDENTITY' => 'PASSPORT',
            'IDENTITY_TYPE' => 'PASSPORT',
        ],
        3 => [
            'IDENTITY' => 'B_FORM',
            'IDENTITY_TYPE' => 'B-FORM',
        ],

    ];

     public static function getFamilType()
    {
        $familyType = (new Collection(self::$familyType))->pluck('FAMILY_TYPE', 'PREFIX')->toArray();

        return $familyType;
    }

    public static function getIdentity()
    {
        $identity = (new Collection(self::$identity))->pluck('IDENTITY', 'IDENTITY_TYPE')->toArray();

        return $identity;
    }

}