<?php

namespace Lrhost\Painel\Controllers;

class AdminController extends ControllerBase {

    public function initialize() {
        //Set the document title
        $this->tag->setTitle('Administraçao');
        parent::initialize();
    }

    public function indexAction() {
        
    }

    public function route404Action() {
        ?> 
        <div class="alert alert-danger" role="alert">Pagina nao encontrada!!!</div>
        <?php
    }

}
