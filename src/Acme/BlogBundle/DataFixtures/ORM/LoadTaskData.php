<?php

namespace Acme\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\BlogBundle\Entity\Task;

class LoadUserData implements FixtureInterface
{
    /**
     * {@inheritDoc}
//     */
    public function load(ObjectManager $manager)
    {
        $task = new Task();
        $task->setTask('second');
        $task->setName('Stas');

        $manager->persist($task);
        $manager->flush();
    }
}
