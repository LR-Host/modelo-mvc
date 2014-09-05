<?php

namespace Lrhost\Frontend\Controllers;

class IndexController extends ControllerBase {

    public function initialize() {
        //Set the document title
        $this->tag->setTitle('Desenvolvendo novas Tecnologias para você');
        parent::initialize();
    }

    public function indexAction() {
        
    }
 public function route404Action() {
        ?> 
        <div class="alert alert-danger" role="alert">Pagina nao encontrada!!!</div>
        <?php
        $classes = 'ControllerBase';
        $c = new $classes;
    }
}
