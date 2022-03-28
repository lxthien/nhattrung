<?php

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class Builder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root', array(
            'childrenAttributes' => array (
                'class' => 'nav navbar-nav',
            ),
        ));

        $menu->addChild('<i class="fa fa-home"></i>', [
            'route' => 'homepage',
            'extras' => ['safe_label' => true]
        ])
        ->setLinkAttribute('class', 'home');

        $menu->addChild('Giới thiệu', [
            'route' => 'news_show',
            'routeParameters' => ['slug' => 'gioi-thieu-xay-dung-nhat-trung']
        ]);

        $menu->addChild('Bảng giá', [
            'route' => 'news_category',
            'routeParameters' => ['level1' => 'bang-gia']
        ]);

        $menu->addChild('Thiết kế nhà', [
            'route' => 'news_category',
            'routeParameters' => ['level1' => 'thiet-ke-nha-pho']
        ]);

        $menu->addChild('Xây nhà', [
            'route' => 'news_category',
            'routeParameters' => ['level1' => 'xay-nha']
        ]);

        $menu->addChild('Sửa chữa nhà', [
            'route' => 'news_category',
            'routeParameters' => ['level1' => 'sua-chua-nha']
        ]);

        $menu->addChild('Dự toán chi phí', [
            'route' => 'news_category',
            'routeParameters' => ['level1' => 'chi-phi-xay-dung']
        ]);

        $menu->addChild('Tư vấn', [
            'route' => 'news_category',
            'routeParameters' => ['level1' => 'tu-van']
        ]);

        $menu->addChild('Dự án', [
            'route' => 'news_category',
            'routeParameters' => ['level1' => 'du-an']
        ])
        ->setAttribute('class', 'dropdown')
        ->setLinkAttribute('class', 'dropdown-toggle')
        ->setLinkAttribute('data-toggle', 'dropdown')
        ->setChildrenAttribute('class', 'dropdown-menu');

        $menu['Dự án']->addChild('Dự án xây nhà', [
            'route' => 'list_category',
            'routeParameters' => ['level1' => 'du-an', 'level2' => 'du-an-xay-nha']
        ]);

        $menu['Dự án']->addChild('Dự án sửa nhà', [
            'route' => 'list_category',
            'routeParameters' => ['level1' => 'du-an', 'level2' => 'du-an-sua-chua-nha']
        ]);

        $menu->addChild('Liên hệ', [
            'route' => 'contact'
        ])
        ->setLinkAttribute('class', 'menu-contact');

        return $menu;
    }

    public function footerMenu(FactoryInterface $factory, array $options)
    {
        $footerMenu = $factory->createItem('root');

        return $footerMenu;
    }
}