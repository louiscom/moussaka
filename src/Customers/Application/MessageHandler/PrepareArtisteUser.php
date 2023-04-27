<?php

namespace App\Customers\Application\MessageHandler;

use App\Customers\Application\Message\UserRegistration;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsMessageHandler(priority: 64)]
final class PrepareArtisteUser
{

    public function __invoke(UserRegistration $userRegistration)
    {
        if($userRegistration->form->get('artist')->getData()){
            $userRegistration->user->setRoles(['ROLE_ARTIST']);
        }
    }

}
