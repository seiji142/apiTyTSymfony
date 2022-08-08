<?php

namespace App\Controller\Api;

use App\Entity\Pais;
use App\Repository\ConexionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\PaisDto;

class ConexionController extends AbstractController
{
    /**
     * @Route("prueba/conexiones", name="conexiones_get")
     *
     * @return void
     */
    public function list(Request $request, ConexionRepository $repository){
        $nombre = $request->get('id');
        $conexiones = $repository->findAll();
        $conexionesArray = [];

        $paisArray = [];

        foreach ($conexiones as $conexion){

            $pais1= new PaisDto($conexion->getOrigen()->getId(),$conexion->getOrigen()->getNombre(),
                $conexion->getOrigen()->getCantDias(),$conexion->getOrigen()->getPrecio(),
                $conexion->getOrigen()->getImagen());
            $pais2= new PaisDto($conexion->getDestino()->getId(),$conexion->getDestino()->getNombre(),
                $conexion->getDestino()->getCantDias(),$conexion->getDestino()->getPrecio(),
                $conexion->getDestino()->getImagen());

            $conexionesArray[] = [
                'id' => $conexion->getId(),
                'precio' => $conexion->getPrecio(),
                'origen' => $paisArray = ['id' => $conexion->getOrigen()->getId(),
                    'nombre' => $conexion->getOrigen()->getNombre(),
                    'cant_dias' => $conexion->getOrigen()->getCantDias(),
                    'precio' => $conexion->getOrigen()->getPrecio(),
                    'imagen' =>  $conexion->getOrigen()->getImagen()],

                'destino' => $paisArray = ['id' => $conexion->getDestino()->getId(),
                                      'nombre' => $conexion->getDestino()->getNombre(),
                                      'cant_dias' => $conexion->getDestino()->getCantDias(),
                                      'precio' => $conexion->getDestino()->getPrecio(),
                                      'imagen' =>  $conexion->getDestino()->getImagen()]
            ];
        }
        $response = new JsonResponse();
        $response->setData([
            'sucess' => true,
            'data' => $conexionesArray
        ]);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

}