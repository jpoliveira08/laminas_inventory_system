<?php

namespace Album\Form;

use Laminas\Form\Element\{Hidden, Submit, Text};
use Laminas\Form\Form;

class AlbumForm extends Form
{
    public function __construct($name = null)
    {
        // we set the name of the form as we call the parent's constructor
        parent::__construct($name);

        // create four form elements: the id, title, artist, and submit button
        $this->add([
            'name' => 'id',
            'type' => Hidden::class,
        ]);
        $this->add([
            'name' => 'title',
            'type' => Text::class,
            'options' => [
                'label' => 'Title',
            ]
        ]);
        $this->add([
            'name' => 'artist',
            'type' => Text::class,
            'options' => [
                'label' => 'Artist',
            ]
        ]);
        $this->add([
            'name' => 'submit',
            'type' => Submit::class,
            'attributes' => [
                'value' => 'Go',
                'id' => 'submitbutton',
            ]
        ]);
    }
}