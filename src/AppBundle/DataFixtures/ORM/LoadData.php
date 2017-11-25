<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Console;
use AppBundle\Entity\Category;
use AppBundle\Entity\Game;

class LoadData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $consoles = array(
            (new Console())->setName('PS4')->setImage('c4ca4238a0b923820dcc509a6f75849b.png'),
            (new Console())->setName('Xbox One')->setImage('c81e728d9d4c2f636f067f89cc14862c.png'),
            (new Console())->setName('Wii U')->setImage('eccbc87e4b5ce2fe28308fd9f2a7baf3.png')
        );
        $categories = array(
            (new Category())->setName('Horror'),
            (new Category())->setName('Board'),
            (new Category())->setName('Fighting')
        );
        $games = array(
            (new Game())->setName('Dead Island 2')
                        ->setImage('c4ca4238a0b923820dcc509a6f75849b.jpg')
                        ->setDescription('A couple of months after the events of Dead Island, the United States Armed Forces has put California under a full quarantine restricted zone due to a new zombie outbreak')
                        ->setPrice(69.60)
                        ->addCategory($categories[0])
                        ->addCategory($categories[1])
                        ->setConsole($consoles[0]),

            (new Game())->setName('EA Sports UFC')
                        ->setDescription('The roster was gradually revealed by EA Sports in batches. The final roster consists of 97 UFC fighters (not including DLC additions). UFC legend Royce Gracie and late martial arts icon Bruce Lee are both featured in the game as bonus unlockable fighters. Gracie is playable in the middleweight division, and Lee is playable in bantamweight, featherweight, lightweight and welterweight. A free content update was released for download on July 22, 2014, adding T.J. Dillashaw, Tyron Woodley and Takeya Mizugaki to the roster. On August 26, 2014, EA released another patch that included heavyweight Stipe Miocic as well as welterweights Matt Brown and Mike Pyle. On October 2, EA released their third patch including Tim Kennedy and Gunnar Nelson, and also making Nick Diaz able to switch to the middleweight division. On October 29, EA released their fourth patch including Hector Lombard, Diego Sanchez and Michael Chiesa, and also making Gegard Mousasi able to switch to the middleweight division. On November 19, EA released a fifth patch, this one including Myles Jury, Andrei Arlovski, and Yoel Romero. On December 10, EA released a legends pack, which included Mark Coleman, Matt Hughes, Quinton Jackson and Brock Lesnar. On January 21, EA released a seventh patch, this one including Eddie Alvarez, Holly Holm, Rafael dos Anjos and Anthony Johnson. This was said to be the last major update as they began focusing on the sequel, which was released in spring 2016.')
                        ->setImage('c81e728d9d4c2f636f067f89cc14862c.jpg')
                        ->setPrice(37.38)
                        ->addCategory($categories[1])
                        ->setConsole($consoles[1]),
        );

        //Reseting the auto_increment id fields

        $connection = $manager->getConnection();
        $connection->exec("ALTER TABLE game AUTO_INCREMENT = 1;");
        $connection->exec("ALTER TABLE console AUTO_INCREMENT = 1;");
        $connection->exec("ALTER TABLE category AUTO_INCREMENT = 1;");

        // Persisting our objects to load data fixtures

        foreach($consoles as $console)
            $manager->persist($console);

        foreach($categories as $category)
            $manager->persist($category);

        foreach($games as $game)
            $manager->persist($game);

        $manager->flush();
    }
}