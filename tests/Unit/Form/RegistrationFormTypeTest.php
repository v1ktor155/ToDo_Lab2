<?php

namespace App\Tests\Form;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Symfony\Component\Form\Test\TypeTestCase;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;

class RegistrationFormTypeTest extends TypeTestCase
{
    public function testSubmitValidData()
    {
{
        $formData = [
            'email' => 'test@example.com',
            'agreeTerms' => true,
            'plainPassword' => 'testpassword',
        ];

        $user = new User();
        $form = $this->factory->create(RegistrationFormType::class, $user);

        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());
        $this->assertSame($formData['email'], $form->get('email')->getData());
        $this->assertTrue($form->get('agreeTerms')->getData());
        $this->assertSame($formData['plainPassword'], $form->get('plainPassword')->getData());
    }
}

    protected function getTypes()
    {
        return array_merge(
            parent::getTypes(),
            [
                new RegistrationFormType(),
            ]
        );
    }
}
