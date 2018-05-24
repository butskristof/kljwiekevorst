<?php
/**
 * Created by IntelliJ IDEA.
 * User: butskristof
 * Date: 24/05/2018
 * Time: 14:23
 */

namespace Spatie\Menu;

	$submenu = Menu::new()
	->setWrapperTag('div')
	->withoutParentTag()
	->addClass('dropdown-menu')
	->setActiveClassOnLink(true)
	->add(
		Link::to('/huur', 'Huur')
			->addClass('dropdown-item')
	);

$menu = Menu::new()
	->addClass('navbar-nav mr-auto')
	->add(
		Link::to('/', 'Home')
		->addClass('nav-link')
		->addParentClass('nav-item')
	)
	->add(
		Link::to('/contact', 'Contact')
			->addClass('nav-link')
			->addParentClass('nav-item')
	)
	->submenu(
		Link::to('#', 'Info')
			->addClass('nav-link dropdown-toggle')
			->setAttribute('data-toggle', 'dropdown'),
		$submenu->addParentClass('nav-item dropdown')
	)
	->setActive('/' . $this->e($id)); // '/' + id form the url


echo $menu->render();

?>
