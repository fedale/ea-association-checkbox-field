<?php

namespace App\DataFixtures;

use App\Factory\GroupFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GroupFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        GroupFactory::new()->createMany(30);
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
