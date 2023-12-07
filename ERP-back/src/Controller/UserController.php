<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Repository\UserRightsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="app_user")
     * @param $user
     * @return Response
     */
    public function index($user): Response
    {
        $this->denyAccessUnlessGranted('USER_VIEW');
        return $this->render('usercontrolleur/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
    /**
     * @Route("/users-rights", name="users_rights")
     */
    public function usersRights(UserRepository $userRepository): Response
    {
        $userRights = $userRepository->getAllUserRights();
        return $this->json($userRights);
    }

    // /**
    //  * @Route("/userrights/{userId}", name="get_user_rights_by_id", methods={"GET"})
    // */
 //  public function getUserRightsByUserId(string $userId, UserRightsRepository $userRightsRepository): JsonResponse
    //   {
    //  $userRights = $userRightsRepository->findBy(['user' => $userId]);

    //  if (empty($userRights)) {
//
    //       return new JsonResponse(['message' => 'Aucun droit trouvé pour cet utilisateur'], Response::HTTP_NOT_FOUND);
    //   }

    //  $rights = [];
    //  foreach ($userRights as $userRight) {
    //     $rights[] = [
    //             'id' => $userRight->getRights()->getId(),
    //         'name' => $userRight->getRights()->getName(),
    //     ];
    //  }

    //     return $this->json($rights);
    //  }
}
