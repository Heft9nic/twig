<?php

namespace Acme\HelloBundle\Menu;

use Symfony\Component\DependencyInjection\ContainerAware;
use Knp\Menu\FactoryInterface;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav');

        $menu->addChild('Projects', array('route' => 'Blog_homepage'))
            ->setAttribute('icon', 'icon-list');

        $menu->addChild('Employees', array('route' => 'fos_user_resetting_request'))
            ->setAttribute('icon', 'icon-group');

        return $menu;
    }
}
