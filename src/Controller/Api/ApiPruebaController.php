<?php

namespace App\Controller\Api;

use App\Entity\Prueba;
use App\Repository\PruebaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ApiPruebaController extends AbstractController
{
    /*private $logger;

    public function __construct(LoggerInterface $logger)
    {
    //parent::__construct();
        $this->logger = $logger;

    }*/

    /**
     * @Route("prueba/pruebas", name="pruebas_get")
     *
     * @return void
     */
    public function list(Request $request, PruebaRepository $repository){
         $nombre = $request->get('nombre');
         $pruebas = $repository->findAll();
         $pruebasArray = [];

         foreach ($pruebas as $prueba){
             $pruebasArray[] = [
                 'id' => $prueba->getId(),
                 'nombre' => $prueba->getNombre(),
                 'precio' => $prueba->getPrecio()
             ];
         }
         $response = new JsonResponse();
         $response->setData([
             'sucess' => true,
             'data' => $pruebasArray
         ]);
         return $response;
    }

    /**
     * @Route("prueba/create", name="prueba_create")
     *
     */
    public function create(Request $request,EntityManagerInterface $em){
       $prueba = new Prueba();
       $response = new JsonResponse();
       $nombre = $request->get("nombre",null);

       if(empty($nombre)){
           $response->setData([
               'sucess' => false,
               'error' => 'Nombre cannot be empty',
               'data' =>null
           ]);
           return $response;
       }

       $prueba->setNombre($nombre);
       $prueba->setPrecio(24.45);
       $em->persist($prueba);
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
    }

/*
    public function list(Request $request, LoggerInterface $logger){
        // $response = new Response();
        // $response->setContent('<div>Hola Mundo</div>');
       //  return $response;

        $nombre = $request->get('nombre');
        //$this->logger->info('List action called Constructor');

        $logger->info('List action called pasada por Metodo');

        $response = new JsonResponse();
        $response->setData([
            'sucess' => true,
            'data' => [
                [
                    'id' => 1,
                    'nombre' => 'Prueba 1 Json'
                ],
                [
                    'id' => 2,
                    'nombre' => 'Prueba 2 Json'
                ],
                [
                    'id' => 3,
                    'nombre' => $nombre
                ]
            ]
        ]);
        return $response;
    }
*/


}