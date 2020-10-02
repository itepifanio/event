<?php declare(strict_types=1);

namespace Tests;

use Src\Form;
use Src\Input;
use Src\Label;
use Src\Div;
use PHPUnit\Framework\TestCase;


class DivTest extends TestCase
{
    /** @test */
    public function it_can_render_form()
    {
        $div = new Div('teste');

        $form = new Form();
        $form->addElement(new Label('Test'));
        $form->addElement(new Input('text', null, 'test', ));

        $div2 = new Div();
        $div2->addElement(new Label('Test 2'));
        $div->addElement($div2);
        $div->addElement($form);

        $this->assertSame(
            '<div id="teste"><div><label>Test 2</label></div><form><label>Test</label><input type="text" name="test"/></form></div>',
            $div->render()
        );
    }
}