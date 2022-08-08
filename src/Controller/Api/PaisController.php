<?php

namespace App\Controller\Api;

use App\Entity\Prueba;
use App\Repository\PaisRepository;
use App\Repository\PruebaRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View as ViewAttribute;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PaisController extends AbstractFOSRestController
{

    /**
     * @Route("prueba/paises", name="paises_get")
     *
     * @return void
     */
    public function list(Request $request, PaisRepository $repository){
        $nombre = $request->get('nombre');
        $paises = $repository->findAll();
        $paisesArray = [];

        foreach ($paises as $pais){
        $paisesArray[] = [
                'id' => $pais->getId(),
                'nombre' => $pais->getNombre(),
                'cant_dias' => $pais->getCantDias(),
                'precio' => $pais->getPrecio(),
                'imagen' => $pais->getImagen()
            ];
        }
        $response = new JsonResponse();
        $response->setData([
            'sucess' => true,
            'data' => $paisesArray
        ]);

        //$response->setData($paisesArray);
        //$response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        // Or a predefined website
        return $response;
    }

    /**
     * @Route("pais/create", name="pais_create")
     *
     */
    /*public function create(Request $request,EntityManagerInterface $em){
        $pais = new Pais();
        $response = new JsonResponse();
        $pais->setNombre($nombre);
        $pais->setPrecio(24.45);
        $em->persist($pais);
        $em->flush();

        $response->setData([
            'sucess' => true,
            'data' => [
                [
                    'id' => $prueba->getId(),
                    'nombre' => $prueba->getNombre(),
                    'precio' => $prueba->getPrecio()
                ]
            ]
        ]);
        return $response;
    }*/

}