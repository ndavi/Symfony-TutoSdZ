<?php

// src/OC/PlatformBundle/DataFixtures/ORM/LoadCategory.php

namespace OC\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use OC\PlatformBundle\Entity\Category;

class LoadCategory implements FixtureInterface {

    // Dans l'argument de la m�thode load, l'objet $manager est l'EntityManager
    public function load(ObjectManager $manager) {
        // Liste des noms de cat�gorie � ajouter
        $names = array(
            'Développement web',
            'Développement mobile',
            'Graphisme',
            'Intégration',
            'Réseau'
        );

        foreach ($names as $name) {
            // On cr�e la cat�gorie
            $category = new Category();
            $category->setName($name);

            // On la persiste
            $manager->persist($category);
        }

        // On d�clenche l'enregistrement de toutes les cat�gories
        $manager->flush();
    }

}
