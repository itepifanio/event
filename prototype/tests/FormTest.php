<?php declare(strict_types=1);

namespace Tests;

use Src\Form;
use Src\Input;
use Src\Label;
use PHPUnit\Framework\TestCase;

class FormTest extends TestCase
{
    /** @test */
    public function it_can_clone_form_with_fields()
    {
        $label = new Label('label_nome', 'Nome');

        $input = new Input('input_nome', 'nome', 'text', 'Digite seu nome');

        $form1 = new Form();
        $form1->addElement($label);
        $form1->addElement($input);

        $this->assertSame(
            '<form><label id="label_nome">Nome</label><input id="input_nome" name="nome" type="text" placeholder="Digite seu nome"/></form>',
            $form1->render()
        );

        // Testando o clone dos elementos em um novo form
        $labelClone = clone $label;
        $inputClone = clone $input;

        $form2 = new Form();
        $form2->addElement($labelClone);
        $form2->addElement($inputClone);

        $this->assertSame(
            '<form><label id="label_nome">Copy of Nome</label><input id="input_nome" name="nome" type="text" placeholder="Copy of Digite seu nome"/></form>',
            $form2->render()
        );

        // Testando o clone do form
        $form3 = clone $form1;
        $this->assertSame(
            '<form><label id="label_nome">Copy of Nome</label><input id="input_nome" name="nome" type="text" placeholder="Copy of Digite seu nome"/></form>',
            $form3->render()
        );
    }
}
