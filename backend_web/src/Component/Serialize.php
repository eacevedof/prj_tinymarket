<?php
namespace App\Component;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class Serialize
{

    public static function get_jsonarray(array $array): string
    {
        //print_r($array);die;
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($array, 'json',[
            //ObjectNormalizer::SKIP_NULL_VALUES => true,
        ]);
        //print_r($jsonContent);die;
        return $jsonContent;
    }

    public static function get_json(Object $object): string
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($object, 'json');

        return $jsonContent;
    }

}