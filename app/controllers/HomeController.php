<?php

class HomeController extends ControllerBase
{

  public function initialize()
  {
      $this->tag->setTitle('Welcome');
      parent::initialize();
  }

    public function indexAction()
    {

    }

}

