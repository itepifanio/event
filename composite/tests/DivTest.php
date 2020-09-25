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
        $div = new Div();
        $div->setId('teste');

        $form = new Form();
        $form->addElement(new Label('Test'));
        $form->addElement(new Input('test', 'text'));


        $div->addElement($form);
        
        $this->assertSame(
            '<div id=teste ><form><label>Test</label><input type="text" name="test" /></form></div>',
            $div->render()
        );
    }
}