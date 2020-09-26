<?php declare(strict_types=1);

namespace Tests;

use Src\Form;
use Src\Input;
use Src\Label;
use PHPUnit\Framework\TestCase;


class FormTest extends TestCase
{
    /** @test */
    public function it_can_render_form()
    {
        $form = new Form();   //id, name
        $form->addElement(new Label('Test')); //text, id, name
        $form->addElement(new Input('text', null, 'test')); //type, id, name 


        $this->assertSame(
            '<form><label>Test</label><input type="text" name="test"/></form>',
            $form->render()
        );
    }
}