<?php

namespace App\DataFixtures;

use App\Factory\AdminFactory;
use App\Factory\TicketsFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        TicketsFactory::createMany(20);
        AdminFactory::createMany(10);

        $manager->flush();
    }
}
