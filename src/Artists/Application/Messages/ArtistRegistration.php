<?php

declare(strict_types=1);

namespace App\Artists\Application\Messages;

use App\Customers\Domain\Entity\User;
use Symfony\Component\Form\FormInterface;

class ArtistRegistration
{
    public function __construct(
        public readonly FormInterface $form,
        public User $user
    ){}
}