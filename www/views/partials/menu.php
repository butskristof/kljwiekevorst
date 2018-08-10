<?php
/**
 * Created by IntelliJ IDEA.
 * User: butskristof
 * Date: 24/05/2018
 * Time: 14:23
 */

namespace Spatie\Menu;

	$acts = Menu::new()
		->setWrapperTag('div')
		->withoutParentTag()
		->addClass('dropdown-menu')
		->setActiveClassOnLink(true)
		->add(
			Link::to('/-9', '-9')
				->addClass('dropdown-item')
		)
		->add(
			Link::to('/-12', '-12')
				->addClass('dropdown-item')
		)
		->add(
			Link::to('/-14', '-14')
				->addClass('dropdown-item')
		)
		->add(
			Link::to('/+14', '+14')
				->addClass('dropdown-item')
		)
		->add(
			Link::to('/+16', '+16')
				->addClass('dropdown-item')
		)
	;

	$info = Menu::new()
	->setWrapperTag('div')
	->withoutParentTag()
	->addClass('dropdown-menu')
	->setActiveClassOnLink(true)
	->add(
		Link::to('/info/wiezijnwij', 'Wie zijn wij')
			->addClass('dropdown-item')
	)
	->add(
		Link::to('/info/bestuur', 'Bestuur')
			->addClass('dropdown-item')
	)
	->add(
		Link::to('/info/geschiedenis', 'Geschiedenis')
			->addClass('dropdown-item')
	)
	->add(
		Link::to('/info/uniform', 'Uniform')
			->addClass('dropdown-item')
	)
	;

$menu = Menu::new()
	->addClass('navbar-nav mr-auto')
	->add(
		Link::to('/', 'Home')
		->addClass('nav-link')
		->addParentClass('nav-item')
	)
	->submenu(
		Link::to('#', 'Activiteiten')
			->addClass('nav-link dropdown-toggle')
			->setAttribute('data-toggle', 'dropdown'),
		$acts->addParentClass('nav-item dropdown')
	)
	->submenu(
		Link::to('#', 'Info')
			->addClass('nav-link dropdown-toggle')
			->setAttribute('data-toggle', 'dropdown'),
		$info->addParentClass('nav-item dropdown')
	)
	->add(
		Link::to('/leiding', 'Leiding')
			->addClass('nav-link')
			->addParentClass('nav-item')
	)
	->add(
		Link::to('/huur', 'Huur')
			->addClass('nav-link')
			->addParentClass('nav-item')
	)
	->add(
		Link::to('/fotos', "Foto's")
			->addClass('nav-link')
			->addParentClass('nav-item')
	)
	->add(
		Link::to('/contact', 'Contact')
			->addClass('nav-link')
			->addParentClass('nav-item')
	)
	->setActive('/' . $this->e($id)); // '/' + id form the url


echo $menu->render();

?>
