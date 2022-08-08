<?php
use App\Entity\Pais;
use App\Entity\Conexion;
use App;

require __DIR__ . '/../../vendor/autoload.php';

// Carga las variables de entorno
$dotenv = new \Dotenv\Dotenv(__DIR__ . '/../..', Utils::getEnvFileName(__DIR__ . '/../..'));
$dotenv->load();

$entityManager = Utils::getEntityManager();

 $pais1= new Pais("India", 8, 972, "algo");
 $pais_2= new Pais( "Nepal", 8, 1000,"algo" );
 $pais_3= new Pais ("Tailandia", 11, 1175, "algo" );
 $pais_4= new Pais ( "Camboya",  3,  690,  "algo" );
 $pais_5= new Pais ("Singapur",3,  470,  "algo" );
 $pais_6= new Pais ( "Vietnam", 11, 1290, "algo" );
 $pais_7= new Pais ( "Malasia", 7, 1010, "algo" );
 $pais_8= new Pais ("Indonesia", 9, 935, "algo");
 $pais_9= new Pais ( "Filipinas", 8, 900, "algo");

/*paisesList = [
      { id: 1, nombre: "India", cant_dias: 8, precio: 972, imagen: "algo" },
      { id: 2, nombre: "Nepal", cant_dias: 8, precio: 1000, imagen: "algo" },
      { id: 3, nombre: "Tailandia", cant_dias: 11, precio: 1175, imagen: "algo" },
      { id: 4, nombre: "Camboya", cant_dias: 3, precio: 690, imagen: "algo" },
      { id: 5, nombre: "Singapur", cant_dias: 3, precio: 470, imagen: "algo" },
      { id: 6, nombre: "Vietnam", cant_dias: 11, precio: 1290, imagen: "algo" },
      { id: 7, nombre: "Malasia", cant_dias: 7, precio: 1010, imagen: "algo" },
      { id: 8, nombre: "Indonesia", cant_dias: 9, precio: 935, imagen: "algo" },
      { id: 9, nombre: "Filipinas", cant_dias: 8, precio: 900, imagen: "algo" }
    ];*/

$listaPaises = array();
//array_push($listaPaises,$pais1,$pais_2,$pais_3,$pais_4,$pais_5,$pais_6,$pais_7,$pais_8,$pais_9);
array_push($listaPaises,$pais1,$pais_2,$pais_3,$pais_4,$pais_5,$pais_6,$pais_7,$pais_8,$pais_9);

print_r($listaPaises);

  /*$paises = $repository->findAll();
        $paisesArray = [];

        foreach ($paises as $pais){
            $paisesArray[] = [
                'id' => $pais->getId(),
                'precio' => $pais->getPrecio(),
                'origen' => $pais->getOrigen(),
                'destino' => $pais->getDestino()

            ];
        }

        $pais= new Pais();
        $pais->setNombre();
        $pais->setPrecio();
        $pais->setCantDias();
        $pais->setImagen();
try {
 $entityManager->persist($pais);
 $entityManager->flush();
 echo 'Created PAIS with ID #' . $pais->getId() . PHP_EOL;
} catch (Exception $exception) {
 echo $exception->getMessage() . PHP_EOL;
}
*/
/*this.conexionList = [
      { id: 1, precio: -100, origen: pais_1, destino: pais_2 },
      { id: 2, precio: 100, origen: pais_2, destino: pais_3 },
      { id: 3, precio: -150, origen: pais_3, destino: pais_4 },
      { id: 4, precio: 0, origen: pais_4, destino: pais_5 },
      { id: 5, precio: 200, origen: pais_5, destino: pais_6 },
      { id: 6, precio: 0, origen: pais_6, destino: pais_7 },
      { id: 7, precio: 250, origen: pais_7, destino: pais_8 },
      { id: 8, precio: 350, origen: pais_8, destino: pais_9 }

    ];*/

