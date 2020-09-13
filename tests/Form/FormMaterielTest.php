<?php

namespace App\Tests\Form;

use App\Form\MaterielType;
use Symfony\Component\Form\Test\TypeTestCase;
use App\Entity\Materiel;

class FormMaterielTest extends TypeTestCase
{
    public function testSubmitValidData()
    {
        $formData = [
            'type' => 'type',
            'number' => 'number',
            'description' => 'description',

        ];
        $model = new Materiel();
        $form = $this->factory->create(MaterielType::class, $model);
        $form->submit($formData);
        $this->assertTrue($form->isSynchronized());

    }
}
