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
        $form = new Form();
        $form->addElement(new Label('Test'));
        $form->addElement(new Input('test', 'text'));


        $this->assertSame(
            '<form><label>Test</label><input type="text" name="test" /></form>',
            $form->render()
        );
    }
}