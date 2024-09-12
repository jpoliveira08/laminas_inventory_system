<?php

namespace Album\Controller;

use Album\Model\AlbumTable;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class AlbumController extends AbstractActionController
{
    /**
     * Our controller now depends on AlbumTable,
     *
     * @param AlbumTable $albumTable
     */
    public function __construct(private AlbumTable $albumTable)
    {
    }

    public function indexAction()
    {
        /**
         * With Laminas, in order to set variables in the view, we return a ViewModel instance
         * where the first parameter of the constructor is an array containing data we wish to represent.
         */
        return new ViewModel([
            'albums' => $this->albumTable->fetchAll(),
        ]);
    }

    public function addAction()
    {
        
    }

    public function editAction()
    {
        
    }

    public function deleteAction()
    {
        
    }
}