<?php

namespace DanFinnie\SiteBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Mopa\Bundle\BootstrapBundle\Navbar\AbstractNavbarMenuBuilder;

class NavbarMenuBuilder extends AbstractNavbarMenuBuilder
{
    protected $securityContext;
    protected $isLoggedIn;

    public function __construct(FactoryInterface $factory, SecurityContextInterface $securityContext)
    {
        parent::__construct($factory);

        $this->securityContext = $securityContext;
        $this->isLoggedIn = $this->securityContext->isGranted('IS_AUTHENTICATED_FULLY');
    }

    public function createMainMenu(Request $request)
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav');

        $menu->addChild('Login', array('route' => 'login'));

        $dropdown = $this->createDropdownMenuItem($menu, "Mehr");
        $dropdown->addChild('Captain Ränge', array('route' => 'login'));
        $dropdown->addChild('Schiffs-XP', array('route' => 'login'));

        return $menu;
    }

    public function createRightSideDropdownMenu(Request $request)
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav pull-right');

        if ($this->isLoggedIn) {
            $menu->addChild('Abmelden', array('route' => 'logout'));
        } else {
            $menu->addChild('Anmelden', array('route' => 'login'));
            $menu->addChild('Registrieren', array('route' => 'login'));
        }

        $this->addDivider($menu, true);
        $menu->addChild('Impressum', array('route' => 'login'));

        return $menu;
    }
}