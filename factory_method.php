<?php

// FACTORY FUNCTION
abstract class Dialog{
    abstract public function createButton(): Button;

    function render() : string{
        $instance = $this->createButton();
        return $instance->render();   
    }

}

interface Button{
    function render(): string;
    function onClick(string $msg): string;
}

// BUTTONS
class WindowsButton implements Button{
    function render() : string{
        return "Windows Render";
    }
    function onClick(string $msg) : string{
        return "Windows Alert: ${msg}";
    }
}
class WebButton implements Button
{
    function render(): string
    {
        return "Web Render";
    }
    function onClick(string $msg): string
    {
        return "Web Alert: ${msg}";
    }
}


// DIALOGS
class WindowsDialog extends Dialog{
    function createButton() : button{
        return new WindowsButton();
    }
}

class WebDialog extends Dialog{
    function createButton(): Button
    {
        return new WebButton;
    }
}

// CLIENT
function client(Dialog $dialog) : void{
    $btn = $dialog->createButton();
    echo $btn->render() ."\n";
    echo $btn->onClick("clicked button!") . "\n\n";
}

// CALLS
client(new WindowsDialog);
client(new WebDialog);
