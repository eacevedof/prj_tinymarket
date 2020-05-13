<?php
declare(strict_types=1);
namespace App\Providers;

class SeoProvider
{
    private static $seo = [
        "home"=>[
            "title"=>"Tiny Marketplace v1.0.0",
            "description"=>"Sale and purchase anything fast",
            "keywords" => "marketplace, small business, ",
            "h1" => "Tiny Marketplace for small business"
        ],
    ];

    public static function get_meta($route)
    {
        return self::$seo[$route];
    }
}