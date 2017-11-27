<?php

namespace Spatie\Menu\Test;

use Spatie\Menu\Link;
use Spatie\Menu\Menu;
use Spatie\Menu\Activatable;

class MenuSubmenuTest extends MenuTestCase
{
    /** @test */
    public function it_can_add_a_submenu_with_a_menu()
    {
        $this->menu = Menu::newMenu()->submenu(Menu::newMenu());

        $this->assertRenders('<ul><li><ul></ul></li></ul>');
    }

    /** @test */
    public function it_can_add_a_submenu_with_a_callable_menu()
    {
        $this->menu = Menu::newMenu()->submenu(function (Menu $menu) {
            return $menu;
        });

        $this->assertRenders('
            <ul>
                <li>
                    <ul></ul>
                </li>
            </ul>
        ');
    }

    /** @test */
    public function it_preserves_filters_with_callable_menus()
    {
        $this->menu = Menu::newMenu()
            ->registerFilter(function (Activatable $item) {
                $item->setUrl('/bar'.$item->url());
            })
            ->submenu(function (Menu $menu) {
                return $menu->link('/baz', 'Baz');
            });

        $this->assertRenders('
            <ul>
                <li>
                    <ul>
                        <li><a href="/bar/baz">Baz</a></li>
                    </ul>
                </li>
            </ul>
        ');
    }

    /** @test */
    public function it_can_add_a_submenu_with_a_string_header()
    {
        $this->menu = Menu::newMenu()->submenu('Hi', Menu::newMenu());

        $this->assertRenders('
            <ul>
                <li>Hi<ul></ul></li>
            </ul>
        ');
    }

    /** @test */
    public function it_can_add_a_submenu_with_an_item_header()
    {
        $this->menu = Menu::newMenu()->submenu(Link::to('#', 'Hi'), Menu::newMenu());

        $this->assertRenders('
            <ul>
                <li>
                    <a href="#">Hi</a>
                    <ul></ul>
                </li>
            </ul>
        ');
    }

    /** @test */
    public function it_can_conditionally_add_a_submenu()
    {
        $this->menu = Menu::newMenu()->submenuIf(false, Menu::newMenu());

        $this->assertRenders('<ul></ul>');
    }
}
