<?php
declare(strict_types=1);
namespace App\Providers;

class HomeProvider
{
    public function get_text_slider():array
    {
        return [
            [
                "background_image"=>"index.jpg",
                "home_title"=>"<h1>cosmética <span>recogidos</span> PeRmAnEnTeS.</h1>",
                //"home_link"=>"",
            ],
            [
                "background_image"=>"slide-03.jpeg",
                "home_title"=>"<h1>barba <span>hIpStEr</span>  degradado</h1>",
                //"home_link"=>"",
            ],
            [
                "background_image"=>"slide-01.jpeg",
                "home_title"=>"<h1>cejas <span>KeRaTiNa</span> manicura.</h1>",
                //"home_link"=>"",
            ],
            [
                "background_image"=>"slide-02.jpeg",
                "home_title"=>"<h1>PeInAdO <span>complementos</span> estilo.</h1>",
                //"home_link"=>"",
            ],
        ];
    }

    public function get_text_services():array
    {
        return [
            [
                "category"=>"Peluquería",
                "icon"=>"mirror.svg",
                "service_title"=>"Peinado",
                "service_text"=>"Peinados con estilo para bodas, eventos especiales o para cualquier momento del día.",
                "price"=>"",
            ],
            [
                "category"=>"Peluquería",
                "icon"=>"facial-mask.svg",
                "service_title"=>"Color y Mechas",
                "service_text"=>"Trabajamos con las mejores marcas en tintes del mercado para lograr un acabado único.",
                "price"=>"",
            ],
            [
                "category"=>"Peluquería",
                "icon"=>"makeup.svg",
                "service_title"=>"Recogidos",
                "service_text"=>"Estudiaremos tu estilo para hacerte el recogido perfecto",
                "price"=>"",
            ],
            [
                "category"=>"Peluquería",
                "icon"=>"facial-mask.svg",
                "service_title"=>"Tratamientos para tu cabello",
                "service_text"=>"Contamos con una amplia gama de tratamientos para los distintos tipos y problemas de cabello",
                "price"=>"",
            ],
            [
                "category"=>"Peluquería",
                "icon"=>"cream-2.svg",
                "service_title"=>"Alisado Queratina",
                "service_text"=>"Si tienes el pelo ondulado este tratamiento es perfecto para ti.",
                "price"=>"",
            ],
            [
                "category"=>"Peluquería",
                "icon"=>"cream.svg",
                "service_title"=>"Extensiones",
                "service_text"=>"Disponemos de distintos tipos de extensiones: fijas, adhesivas, clip, postizos. Daremos con el tono que se ajuste a tu color.",
                "price"=>"",
            ],
            [
                "category"=>"Masajes",
                "icon"=>"masage.svg",
                "service_title"=>"Facial y craneal",
                "service_text"=>"Este masaje no solo tiene un fin terapéutico, sino también estético, al conseguir disminuir líneas de  expresión y arrugas, mejorar el tono y activar e iluminar la piel de la cara.",
                "price"=>"",
            ],
            [
                "category"=>"Masajes",
                "icon"=>"masage.svg",
                "service_title"=>"Deportivo de descarga",
                "service_text"=>"El objetivo principal de la terapia de masaje deportivo es ayudar a aliviar el estrés y la tensión que se acumulan en los tejidos blandos del cuerpo durante la actividad física.",
                "price"=>"",
            ],
            [
                "category"=>"Masajes",
                "icon"=>"masage.svg",
                "service_title"=>"Drenaje linfático",
                "service_text"=>"El drenaje linfático manual (DLM) es una técnica específica de masoterapia, dirigida esencialmente a la activación del sistema linfático superficial.",
                "price"=>"",
            ],
        ];
    }

    public function get_text_products():array
    {
        return [
            [
                "category"=>"Productos",
                "icon"=>"mirror.svg",
                "service_title"=>"Esmalte de uñas",
                "service_text"=>"",
                "price"=>"",
            ],
            [
                "category"=>"Productos",
                "icon"=>"facial-mask.svg",
                "service_title"=>"Champú anticaida",
                "service_text"=>"",
                "price"=>"",
            ],
            [
                "category"=>"Productos",
                "icon"=>"makeup.svg",
                "service_title"=>"Ampollas anticaida",
                "service_text"=>"",
                "price"=>"",
            ],
            [
                "category"=>"Productos",
                "icon"=>"makeup.svg",
                "service_title"=>"Perfume X",
                "service_text"=>"",
                "price"=>"",
            ],
        ];
    }

    public function get_categories():array
    {
        $services = $this->get_text_services();
        $categories = ["Productos"];
        foreach($services as $service)
            $categories[] = $service["category"] ?? "";
        return array_unique($categories);
    }
}