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
        $label = new Label();
        $label->id = 'label_nome';
        $label->text = 'Nome';

        $input = new Input();
        $input->id = 'input_nome';
        $input->type = 'text';
        $input->name = 'nome';
        $input->placeholder = 'Digite seu nome';


        $form1 = new Form();
        $form1->addElement($label);
        $form1->addElement($input);

        $this->assertSame(
            '<form><label id="label_nome">Nome</label><input id="input_nome" name="nome" type="text" placeholder="Digite seu nome"/></form>',
            $form1->render()
        );

        // Testando o clone dos elementos em um novo form
        $label_clone = $label->clone();
        $input_clone = $input->clone();

        $form2 = new Form();
        $form2->addElement($label_clone);
        $form2->addElement($input_clone);

        $this->assertSame(
            '<form><label id="label_nome">Nome</label><input id="input_nome" name="nome" type="text" placeholder="Digite seu nome"/></form>',
            $form2->render()
        );
    }
}
