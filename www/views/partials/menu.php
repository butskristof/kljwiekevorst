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
		->add(
			Link::to('/+20', '+20')
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
		Link::to('/info/werking', 'Werking')
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
	->add(
		Link::to('/info/kljinklj', 'KLJ in KLJ')
			->addClass('dropdown-item')
	)
	->add(
		Link::to('/info/reglement', 'Reglement')
			->addClass('dropdown-item')
	)
	->add(
		Link::to('/info/kamp', 'Kamp')
			->addClass('dropdown-item')
	)
	->add(
		Link::to('/info/sportfeesten', 'Sportfeesten')
			->addClass('dropdown-item')
	)
	->add(
		Link::to('/info/privacy', 'Privacy')
			->addClass('dropdown-item')
	)
	;
	
	$Verhuur = Menu::new()
		->setWrapperTag('div')
		->withoutParentTag()
		->addClass('dropdown-menu')
		->setActiveClassOnLink(true)
		->add(
			Link::to('/verhuur/kampverhuur', 'Kampverhuur')
				->addClass('dropdown-item')
		)
		->add(
			Link::to('/verhuur/huur', 'Weekend- en feest verhuur')
				->addClass('dropdown-item')
		);

	

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
	->submenu(
		Link::to('#', 'Verhuur')
			->addClass('nav-link dropdown-toggle')
			->setAttribute('data-toggle', 'dropdown'),
		$Verhuur->addParentClass('nav-item dropdown')
	)
	
	->add(
		Link::to('/contact', 'Contact')
			->addClass('nav-link')
			->addParentClass('nav-item')
	)
	->add(
		Link::to('/covid', 'Covid-19 Maatregelen')
			->addClass('nav-link')
			->addParentClass('nav-item')
	)
	->add(
		Link::to('/bier', 'BIER: Wikkedeusje')
			->addClass('nav-link')
			->addParentClass('nav-item')
	)
	->setActive('/' . $this->e($id)); // '/' + id form the url


echo $menu->render();

?>
