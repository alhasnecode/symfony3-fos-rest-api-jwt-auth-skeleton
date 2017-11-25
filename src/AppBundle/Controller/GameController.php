<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use FOS\RestBundle\Controller\Annotations as Rest; // Alias for all annotations
use AppBundle\Entity\Place;

class GameController extends Controller
{

    /**
    * @Rest\View(serializerGroups={"game"}, statusCode=Response::HTTP_OK)
	* @Rest\Get("/games")
	*
	* Retrieve all the games
	*/
	public function getGamesAction(Request $request){
		return $this->getDoctrine()->getManager()->getRepository('AppBundle:Game')->findAll();
	}

	/**
	* @Rest\View(serializerGroups={"game"}, statusCode=Response::HTTP_OK)
	* @Rest\Get("/games/{id}", requirements={"id" = "\d+"})
	*
	* Retrieve a specific game resource
	*/
	public function getGameAction(Request $request){
		$game = $this->getDoctrine()->getManager()->getRepository('AppBundle:Game')->find($request->get('id'));
		if(empty($game)){
			return new JsonResponse(['message' => 'The requested ressource was not found'], Response::HTTP_NOT_FOUND);
		}
		return $game;
	}
}
