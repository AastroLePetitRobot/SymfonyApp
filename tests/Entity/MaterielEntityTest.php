<?php

namespace App\Tests\Entity;

use App\Entity\Materiel;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class MaterielEntityTest extends KernelTestCase
{
    public function getEntity(): Materiel
    {
        return (new Materiel())
            ->setType('Telephone')
            ->setNumber('100')
            ->setDescription('Test');
    }
    public function assertHasError(Materiel $materiel,int $numberError=0)
    {
        self::bootKernel();
        $error = self::$container->get('validator')->Validate($materiel);
        $this->assertCount($numberError,$error);
    }
    public function testValidEntity()
    {
        $this->assertHasError($this->getEntity(),0);
    }
    public function testInvalidEntityNumber()
    {
        $this->assertHasError($this->getEntity()->setNumber(''),1);
    }
    public function testInvalidEntityDescription()
    {
        $this->assertHasError($this->getEntity()->setDescription(''),1);
    }

}
