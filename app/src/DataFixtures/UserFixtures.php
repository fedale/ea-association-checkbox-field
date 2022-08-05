<?php

namespace App\DataFixtures;

use App\Factory\GroupFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        UserFactory::new()->createMany(100, function() {
            return [
                'groups' => GroupFactory::randomRange(1, 10)
            ];
        });

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            GroupFixtures::class,
        ];
    }
}
