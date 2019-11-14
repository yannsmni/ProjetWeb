<?php

namespace App\Controller;

use App\Entity\Image;
use App\Repository\ImageRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\MimeType\FileinfoMimeTypeGuesser;

class DownloadController extends AbstractController { 

    /**
     * @Route("/download/{id}", name="download_images"))
     */
    public function indexAction(ObjectManager $manager, Image $image)
    {
        $filename = $image->getFileName();
            
        $file_with_path = "assets/image/photos/" . $filename;
        $response = new BinaryFileResponse ( $file_with_path );
        $response->headers->set ( 'Content-Type', 'image' );
        $response->setContentDisposition ( ResponseHeaderBag::DISPOSITION_ATTACHMENT, $filename );

        return $response;
    }
}