<?php
/**
 * Created by IntelliJ IDEA.
 * User: butskristof
 * Date: 24/05/2018
 * Time: 14:23
 */

$menu = Spatie\Menu\Menu::new()
	->addClass("navbar-nav mr-auto") // mr puts menu items on left side
	->add(Spatie\Menu\Link::to("/home", "Home")->addClass("nav-link")->addParentClass("nav-item"))
	->add(Spatie\Menu\Link::to("/contact", "Contact")->addClass("nav-link")->addParentClass("nav-item"))
	->setActive('/' . $this->e($id)); // '/' + id form the url

echo $menu->render();

?>
