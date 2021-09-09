<?php
require 'vendor/autoload.php';
require 'bootstrap.php';
use Simenic\Ontologija;
use Composer\Autoload\ClassLoader;

Flight::route('/', function(){
  $foaf = \EasyRdf\Graph::newAndLoad('https://oziz.ffos.hr/nastava20202021/msimenic_20/ontologija/simenic-ontologija.rdf');
  echo $foaf->dump();
});

Flight::route('GET /search', function(){

  $doctrineBootstrap = Flight::entityManager();
  $em = $doctrineBootstrap->getEntityManager();
  $repozitorij=$em->getRepository('Simenic\Ontologija');

  $zapisi = $repozitorij->findAll();
  // var_dump($doctrineBootstrap->getJson($zapisi));
  // die();
  echo $doctrineBootstrap->getJson($zapisi);

});

Flight::route('GET /search/@ime_redatelja', function($ime_redatelja){

  $doctrineBootstrap = Flight::entityManager();
  $em = $doctrineBootstrap->getEntityManager();
  $repozitorij=$em->getRepository('Simenic\Ontologija');
  $zapisi = $repozitorij->createQueryBuilder('i')
                        ->where('i.ime_redatelja LIKE :ime_redatelja')
                        ->setParameter('ime_redatelja', '%' . $ime_redatelja . '%')
                        ->getQuery()
                        ->getResult();
  echo $doctrineBootstrap->getJson($zapisi);

});

Flight::route('GET /unosPodataka', function(){

  $foaf = \EasyRdf\Graph::newAndLoad('https://oziz.ffos.hr/nastava20202021/msimenic_20/ontologija/simenic-ontologija.rdf');

  // print_r('test');
  // die();

  foreach ($foaf->resources() as $resource) {

    if($foaf->get($resource, '<http://oziz.ffos.hr/tsw2/msimenic/zarada_filma#ime_redatelja>') != ''){

      $ime_redatelja = ''.$foaf->get($resource, '<http://oziz.ffos.hr/tsw2/msimenic/zarada_filma#ime_redatelja>');

      $grad_premijere = ''.$foaf->get($resource, '<http://oziz.ffos.hr/tsw2/msimenic/zarada_filma#grad_premijere>');

      $uDrzavi= ''.$foaf->get($resource, '<http://oziz.ffos.hr/msimenic/frj-ontologija#uDrzavi>');

      $jePremijernoPrikazan = ''.$foaf->get($resource, '<http://oziz.ffos.hr/msimenic/frj-ontologija#jePremijernoPrikazan>');

      $uGodini= ''.$foaf->get($resource, '<http://oziz.ffos.hr/msimenic/frj-ontologija#uGodini>');

      $zaradioJe = ''.$foaf->get($resource, '<http://oziz.ffos.hr/msimenic/frj-ontologija#zaradioJe>');

      $ontologija = new Ontologija();
      $ontologija->setPodaci(Flight::request()->data);

      $ontologija->setIme_redatelja($ime_redatelja);
      $ontologija->setGrad_premijere($grad_premijere);
      $ontologija->setUdrzavi($uDrzavi);
      $ontologija->setJePremijernoPrikazan($jePremijernoPrikazan);
      $ontologija->setUgodini($uGodini);
      $ontologija->setZaradioJe($zaradioJe);

      $doctrineBootstrap = Flight::entityManager();
      $em = $doctrineBootstrap->getEntityManager();

      $em->persist($ontologija);
      $em->flush();
    }

  }

  echo "Svi podaci su uspješno uneseni u bazu!";
});

$cl = new ClassLoader('Simenic', __DIR__, '/src');
$cl->register();

require_once 'bootstrap.php';
Flight::register('entityManager', 'DoctrineBootstrap');

Flight::start();