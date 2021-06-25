<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $hash;
    public function __construct(UserPasswordHasherInterface $hash)
    {
        $this->hash = $hash;
    }
    
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user
            ->setUsername('admin')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($this->hash->hashPassword($user, 'admin'));
        
        $manager->persist($user);

        $user2 = new User();
        $user2
            ->setUsername('user')
            ->setRoles(['ROLE_USER'])
            ->setPassword($this->hash->hashPassword($user2, 'user'));
        
        $manager->persist($user2);

        $manager->flush();
    }
}
