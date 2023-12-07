<?php

namespace App\Controller;

use App\Entity\Rights;
use App\Entity\User;
use App\Repository\UserRightsRepository;
use http\Client\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class UserRightController extends AbstractController
{
    private $userRightsRepository;
    private $security;

    public function __construct(UserRightsRepository $userRightsRepository , Security $security)
    {
        $this->userRightsRepository = $userRightsRepository;
        $this->security=$security;

    }
    /**
     * @Route("/user_right", name="app_user_right")
     */
    public function index(): Response
    {
        if ($this->security->isGranted('ACCESS_RESOURCE')) {
        return $this->render('user_right/index.html.twig', [
            'controller_name' => 'UserRightController',
        ]);}
        else {
                // L'utilisateur n'a pas l'accès nécessaire, gestion d'erreur ou redirection
                throw $this->createAccessDeniedException('Accès refusé.');
            }
    }
    /*
    /**
     * @Route("/user-rights/{userId}", name="get_user_rights_by_id", methods={"GET"})
     */
  /*  public function getUserRightsByUserId(string $userId, UserRightsRepository $userRightsRepository): JsonResponse
    {
        $userRights = $userRightsRepository->findRightsByUserId($userId);

        if (empty($userRights)) {
            return new JsonResponse(['message' => 'Aucun droit trouvé pour cet utilisateur'], Response::HTTP_NOT_FOUND);
        }

        $rights = [];
        foreach ($userRights as $userRight) {
            $rights[] = [
                'id' => $userRight->getRights()->getId(),
                'name' => $userRight->getRights()->getName(),
                // Ajoutez d'autres données que vous souhaitez renvoyer
            ];
        }

        return $this->json($rights);
    }*/
    /**
     * @Route("/userrights/{userId}", name="get_user_rights_by_id", methods={"GET"})
     */
   public function getUUserRightByUserId(string $userId, UserRightsRepository $userRightsRepository): JsonResponse
    {
        $userRights = $this->userRightsRepository->getUserRightByUserId( $userId , $userRightsRepository );

        if (empty($userRights)) {

            return new JsonResponse(['message' => 'Aucun droit trouvé pour cet utilisateur'], Response::HTTP_NOT_FOUND);
        }

        $rights = [];
        foreach ($userRights as $userRight) {
            $rights[] = [
                'id' => $userRight->getRights()->getId(),
                'name' => $userRight->getRights()->getName(),
                'description' => $userRight->getRights()->getDescription(),
            ];
        }

        return $this->json($rights);
    }



}
