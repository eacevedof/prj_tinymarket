<?php
declare(strict_types=1);
namespace App\Providers;

class SeoProvider
{
    private static $seo = [
        "home"=>[
            "title"=>"Peluquería Doble RR",
            "description"=>"Peluquería unisex Doble RR. Estética, tintes, manicura, maquillaje, recogidos, bodas, fisioterapia. Prosperidad - Madrid",
            "keywords" => "peluquería, estética, tintes, tratamiento cabello, barberia, maquillaje, eventos",
            "h1" => "Peluquería Doble RR"
        ],
        "services"=>[
            "title"=>"Doble RR | Servicios",
            "description"=>"Ofrecemos servicios de: peluquería, estética, masajes deportivos (fisioterapia), tratamiento capilar. Podemos desplazarnos a tu domicilio si es necesario.",
            "keywords" => "Servicios, peluquería, estética, tintes, barbería, productos para el cabello, perfumes, madrid, corte de cabello, corte de pelo",
            "h1" => "Ofrecemos una gama variada de productos y servicios.
                     Tras muchos años prestando servicio nos ha permitido hacer una selección de los mejores porductos para cada tipo de cliente."
        ],
        "contact"=>[
            "title"=>"Doble RR | Contacto",
            "description"=>"Si tienes algúna duda o sugerencia puedes dejarnos un mensaje desde este apartado",
            "keywords" => "Formulario de contacto, sugerencia, mensajes, cita previa, eventos, bodas, a domicilio, horario, dirección",
            "h1" => "Ofrecemos una gama variada de productos y servicios.
                     Tras muchos años de experiencia hemos podido hacer una selección de los mejores porductos para cada tipo de cliente."
        ],
        "about-us"=>[
            "title"=>"Doble RR | La empresa",
            "description"=>"Doble RR es una peluquería unisex situada en el barrio de Prosperidad (Madrid)",
            "keywords" => "La empresa, barrio prosperidad, metro alfonso 13, buscas trabajo?, trabaja con nosotros",
            "h1" => ""
        ],
        "appointment"=>[
            "title"=>"Doble RR | Reservar cita",
            "description"=>"Reserva tu cita online. Selecciona el día y quién deseas que te atienda.",
            "keywords" => "Peluquería Doble RR, citas, pedir cita, solicitar cita, corte de cabello, madrid",
            "h1" => "Formulario petición cita"
        ],
    ];

    public static function get_meta($route)
    {
        return self::$seo[$route];
    }
}