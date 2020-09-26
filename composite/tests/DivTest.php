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
        $div = new Div('teste'); //id, name

        $form = new Form();   //id, name
        $form->addElement(new Label('Test')); //text, id, name
        $form->addElement(new Input('text', null, 'test', )); //type, id, name

        $div->addElement($form);

        $this->assertSame(
            '<div id="teste"><form><label>Test</label><input type="text" name="test"/></form></div>',
            $div->render()
        );
    }
}