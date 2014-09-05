<?php

namespace Lrhost\Painel\Controllers;

class LoginController extends ControllerBase {

    public function initialize() {
        //Set the document title
        $this->tag->setTitle('Gerenciamento de Usuarios');
        parent::initialize();
    }

    public function indexAction() {
        ?> 
        <div class="alert alert-danger" role="alert">Usuario e/ou senha invalido(s)!!!</div>
        <?php
    }

}
