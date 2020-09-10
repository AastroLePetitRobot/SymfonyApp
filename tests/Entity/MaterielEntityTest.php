<?php

namespace App\Tests\Entity;

use App\Entity\Materiel;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class MaterielEntityTest extends KernelTestCase
{
    public function testValideEntity()
    {
        $materiel = (new Materiel())
            ->setType('Telephone')
            ->setNumber('100')
            ->setDescription('Test');
        self::bootKernel();
        $error = self::$container->get('validator')->Validate($materiel);
        $this->assertCount(0,$error);
    }
}
