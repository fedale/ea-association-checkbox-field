<?php

namespace App\Factory;

use App\Entity\Group;
use App\Repository\GroupRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Symfony\Component\String\Slugger\AsciiSlugger;


/**
 * @extends ModelFactory<Group>
 *
 * @method static Group|Proxy createOne(array $attributes = [])
 * @method static Group[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Group|Proxy find(object|array|mixed $criteria)
 * @method static Group|Proxy findOrCreate(array $attributes)
 * @method static Group|Proxy first(string $sortedField = 'id')
 * @method static Group|Proxy last(string $sortedField = 'id')
 * @method static Group|Proxy random(array $attributes = [])
 * @method static Group|Proxy randomOrCreate(array $attributes = [])
 * @method static Group[]|Proxy[] all()
 * @method static Group[]|Proxy[] findBy(array $attributes)
 * @method static Group[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Group[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static GroupRepository|RepositoryProxy repository()
 * @method Group|Proxy create(array|callable $attributes = [])
 */
final class GroupFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'name' => 'Group ' . self::faker()->words(\rand(1, 3), true),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            ->afterInstantiate(function(Group $group): void {
                if (!$group->getSlug()) {
                    $slugger = new AsciiSlugger();
                    $group->setSlug($slugger->slug($group->getName()));
                }
            })
        ;
    }

    protected static function getClass(): string
    {
        return Group::class;
    }
}
