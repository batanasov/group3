<?php
namespace Application\Fixture;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Application\Entity\Titles;

class LoadTitles implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $atty = new Titles();
        $atty->setTitle('Atty');
        //$manager->persist($atty);
        
        $coach = new Titles();
        $coach->setTitle('Coach');
        $manager->persist($coach);
        
        $dr = new Titles();
        $dr->setTitle('Dr');
        //$manager->persist($dr);
        
        $fr = new Titles();
        $fr->setTitle('Fr');
        //$manager->persist($fr);
        
        $gov = new Titles();
        $gov->setTitle('Gov');
        //$manager->persist($gov);
        
        $hon = new Titles();
        $hon->setTitle('Hon');
        //$manager->persist($hon);
        
        $master = new Titles();
        $master->setTitle('Master');
        //$manager->persist($master);
        
        $miss = new Titles();
        $miss->setTitle('Miss');
        //$manager->persist($miss);
        
        $mr = new Titles();
        $mr->setTitle('Mr');
        //$manager->persist($mr);
        
        $mrs = new Titles();
        $mrs->setTitle('Mrs');
        //$manager->persist($mrs);
        
        $ms = new Titles();
        $ms->setTitle('Ms');
        //$manager->persist($ms);
        
        $ofc = new Titles();
        $ofc->setTitle('Ofc');
        //$manager->persist($ofc);
        
        $pres = new Titles();
        $pres->setTitle('Pres');
        //$manager->persist($pres);
        
        $prof = new Titles();
        $prof->setTitle('Prof');
        //$manager->persist($prof);
        
        $rev = new Titles();
        $rev->setTitle('Rev');
        //$manager->persist($rev);

        $manager->flush();
    }
}