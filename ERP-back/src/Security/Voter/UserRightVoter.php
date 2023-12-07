<?php

namespace App\Security\Voter;

use App\Entity\User;
use App\Entity\Rights;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use App\Repository\UserRightsRepository;


class UserRightVoter extends Voter
{
    private $UserRightsRepository;

    public function __construct(UserRightsRepository $userRightsRepository)
    {
        $this->UserRightsRepository = $userRightsRepository;
    }


    protected function supports(string $attribute, $subject): bool
    {
        // Vérifie si l'attribut est celui que ce Voter gère
        return $attribute === 'ACCESS_RESOURCE';
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {

        $user = $token->getUser();
        if (!$user instanceof User) {
            // the user must be logged in; if not, deny access
            return false;
        }

        if ($this->supports($attribute, $subject)) {

           /* $userId = $user->getId();
            $userRights = $this->UserRightsRepository->getUserRightByUserId($userId ,$this->UserRightsRepository);


            foreach ($userRights as $userRight) {

                if ($userRight->getRights()->getName()=== 'DELETE'){
                    return true;
                }
            }*/
            return true;
        }

        return false;
    }

}