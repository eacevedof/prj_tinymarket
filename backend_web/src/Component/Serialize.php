<?php
namespace App\Component;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Serializer;

use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;

class Serialize
{


    private static function get_metadata_class()
    {
        return $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
    }

    public static function get_jsonarray(array $array): string
    {
        //print_r($array);die;
        $encoders = [new JsonEncoder()];
        $normalizers = [new DateTimeNormalizer(),
            new ObjectNormalizer(
                self::get_metadata_class(),
                new CamelCaseToSnakeCaseNameConverter())
        ];

        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($array, 'json',[
            //ObjectNormalizer::SKIP_NULL_VALUES => true,
            "groups" => "admins"
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