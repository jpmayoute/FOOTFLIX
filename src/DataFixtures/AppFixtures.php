<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Country;
use App\Entity\Position;
use App\Entity\Club;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $countryObjectList = $this->loadCountries($manager); 
        $positionObjectList = $this->loadPositions($manager); 
        $clubObjectList = $this->loadClubs($manager); 

}

/***** COUNTRY ******/
private function loadCountries(ObjectManager $manager)
{
    $countries = [
        'France',
        'Allemagne',
        'Italie',
        'Espagne',
        'Portugal',
        'Argentine',
    ];

    $createdCountries = [];
    foreach($countries as $currentCountry)
    {
        $newCountry = new Country();
        $newCountry->setName($currentCountry);


        $createdCountries[] = $newCountry;
        $manager->persist($newCountry);
    }

    $manager->flush();

    return $createdCountries;
}

/***** POSITION ******/
private function loadPositions(ObjectManager $manager)
{
    $positions = [
        'Gardien de but',
        'Défenseur central',
        'Défenseur latéral',
        'Milieu défensif',
        'Milieu offensif',
        'Attaquant',
        'Buteur',
    ];

    $createdPositions = [];
    foreach($positions as $currentPosition)
    {
        $newPosition = new Position();
        $newPosition->setPositionName($currentPosition);


        $createdPositions[] = $newPosition;
        $manager->persist($newPosition);
    }

    $manager->flush();

    return $createdPositions;
}


/***** CLUB******/
private function loadClubs(ObjectManager $manager)
{
    $clubs = [
        'Paris Saint-Germain',
        'Barcelone',
        'Juventus Turin',
        'Monaco',
        'Manchester United',
        'Sporting Lisbonne',
        'Réal Madrid',
        'Al-Nassr',
        'Inter Miami',
    ];

    $createdClubs = [];
    foreach($clubs as $currentClub)
    {
        $newClub = new Club();
        $newClub->setName($currentClub);


        $createdClubs[] = $newClub;
        $manager->persist($newClub);
    }

    $manager->flush();

    return $createdClubs;
}




}