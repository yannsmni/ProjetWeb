<?php

namespace App\Controller;

use ZipArchive;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ZipController extends AbstractController
{

public function zipDownloadDocumentsAction(ObjectManager $manager) {
 

    $connection = $manager->getConnection();
    $statement = $connection->prepare("SELECT filename FROM image");
    $statement->execute();
    $images = $statement->fetchAll();

    $files = [];
    $em = $this->getDoctrine()->getManager();

    for($i=0; $i<count($images); $i++) {
        $files[$i] = 'assets/image/photos/' . $images[$i]["filename"];
    }

    $zip = new \ZipArchive();

    $zipName = 'Photos.zip';

    $zip->open($zipName,  \ZipArchive::CREATE);

    for ($i=0 ; $i<count($files); $i++){
        $zip->addFile($files[$i],$files[$i]);
    }

    $zip->close();

    $response = new Response(file_get_contents($zipName));
    $response->headers->set('Content-Type', 'application/zip');
    $response->headers->set('Content-Disposition', 'attachment;filename="' . $zipName . '"');
    $response->headers->set('Content-length', filesize($zipName));

    @unlink($zipName);

    return $response;
    }
}
