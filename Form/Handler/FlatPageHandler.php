<?php

namespace Isics\FlatPageBundle\Form\Handler;

use Isics\FlatPageBundle\Manager\FlatPageManager;
use Isics\FlatPageBundle\Entity\Subject;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

class FlatPageHandler
{
    /**
     * @var Form $form Form
     */
    protected $form;

    /**
     * @var Request $request Request
     */
    protected $request;

    /**
     * @var FlatPageManager $flatPageManager FlatPage manager
     */
    protected $flatPageManager;


    /**
     * Constructor
     */
    public function __construct(Form $form, Request $request, FlatPageManager $flatPageManager)
    {
        $this->form = $form;
        $this->request = $request;
        $this->flatPageManager = $flatPageManager;
    }

    /**
     * Process form
     *
     * @return boolean True if form is posted and valid
     */
    public function process()
    {
        if ('POST' === $this->request->getMethod()) {
            $this->form->bindRequest($this->request);
            if ($this->form->isValid()) {
                $this->flatPageManager->save($this->form->getData());

                return true;
            }
        }

        return false;
    }
}
