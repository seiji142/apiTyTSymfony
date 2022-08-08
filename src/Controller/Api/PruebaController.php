<?php

namespace App\Controller\Api;

use App\Repository\PruebaRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Patch;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Put;
use FOS\RestBundle\Controller\Annotations\View as ViewAttribute;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PruebaController extends AbstractFOSRestController
{
    #[Get(path: "/pruebas")]
    #[ViewAttribute(serializerGroups: ['prueba'], serializerEnableMaxDepthChecks: true)]
    public function getAction(
        PruebaRepository $pruebaRepository,
        Request $request,
        Security $security
    ) {
        $id = $request->query->get('id');
        $categoryId = $request->query->get('nombre');
        $page = $request->query->get('page');
        $itemsPerPage = $request->query->get('itemsPerPage');
        $criteria = new BookRepositoryCriteria(
            $id,
            $categoryId,
            $itemsPerPage !== null ? \intval($itemsPerPage) : 10,
            $page !== null ? \intval($page) : 1,
            $security->getCurrentUser()->getId()
        );
        return $pruebaRepository->findByCriteria($criteria);
    }

    #[Get(path: "/books/{id}")]
    #[ViewAttribute(serializerGroups: ['book'], serializerEnableMaxDepthChecks: true)]
    public function getSingleAction(string $id, GetBook $getBook)
    {
        try {
            $book = ($getBook)($id);
        } catch (Exception) {
            return View::create('Book not found', Response::HTTP_BAD_REQUEST);
        }
        return $book;
    }

    #[Post(path: "/pruebas")]
    #[ViewAttribute(serializerGroups: ['book'], serializerEnableMaxDepthChecks: true)]
    public function postAction(
        BookFormProcessor $bookFormProcessor,
        Request $request
    ) {
        [$book, $error] = ($bookFormProcessor)($request);
        $statusCode = $book ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST;
        $data = $book ?? $error;
        return View::create($data, $statusCode);
    }

    #[Put(path: "/books/{id}")]
    #[ViewAttribute(serializerGroups: ['book'], serializerEnableMaxDepthChecks: true)]
    public function editAction(
        string $id,
        BookFormProcessor $bookFormProcessor,
        Request $request
    ) {
        try {
            [$book, $error] = ($bookFormProcessor)($request, $id);
            $statusCode = $book ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST;
            $data = $book ?? $error;
            return View::create($data, $statusCode);
        } catch (Throwable $e) {
            return View::create('Book not found', Response::HTTP_BAD_REQUEST);
        }
    }

    #[Patch(path: "/books/{id}")]
    #[ViewAttribute(serializerGroups: ['book'], serializerEnableMaxDepthChecks: true)]
    public function patchAction(
        string $id,
        GetBook $getBook,
        Request $request
    ) {
        $book = ($getBook)($id);
        $data = json_decode($request->getContent(), true);
        $book->patch($data);
        return View::create($book, Response::HTTP_OK);
    }

    #[Delete(path: "/books/{id}")]
    #[ViewAttribute(serializerGroups: ['book'], serializerEnableMaxDepthChecks: true)]
    public function deleteAction(string $id, DeleteBook $deleteBook)
    {
        try {
            ($deleteBook)($id);
        } catch (Throwable) {
            return View::create('Book not found', Response::HTTP_BAD_REQUEST);
        }
        return View::create(null, Response::HTTP_NO_CONTENT);
    }



}
