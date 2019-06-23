<?php

/**
 * SessionController
 *
 * Allows to authenticate users
 */
class SessionController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Sign In');
        parent::initialize();
    }

    public function indexAction()
    {
        $this->session->conditions = null;
        $this->view->form = new SessionForm;
    }

    /**
     * Register an authenticated user into session data
     *
     * @param Users $user
     */
    private function _registerSession(Users $user)
    {
        $this->session->set('auth', array(
            'id' => $user->id,
            'username' => $user->username,
            'tipo' => $user->tipo,
            'tipoId' => $user->tipoId,
            'numeroId' => $user->numeroId,
            'email' => $user->email,
            'qbid' => $user->qbid,
            'name' => $user->name
        ));
    }

    /**
     * This action authenticate and logs an user into the application
     *
     */
    public function startAction()
    {
        if ($this->request->isPost()) {

            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $user = Users::findFirst(array(
                "(email = :email: OR username = :email:) AND password = :password: AND active = 'Y'",
                'bind' => array('email' => $email, 'password' => sha1($password))
            ));
            if ($user != false) {
                $this->_registerSession($user);
                $this->flash->success('Welcome ' . $user->name);
                $ticket = Aticket::findFirst(array(
                            "Estado = :estado:",
                            "bind" => array("estado" => "GRABADO")
                ));
                if ($ticket) {
                    $this->session->set('pendiente', array(
                        "estado" => "GRABADO",
                        "RefNumber" => $ticket->RefNumber
                    ));
                }
//                $caja = Cashier::findFirst(array(
//                            "Estado = :estado:",
//                            "bind" => array("estado" => "ABIERTO")
//                ));
//                if ($caja) {
//                    $this->session->set('cajaabierta', array(
//                        "estado" => "ABIERTO",
//                        "RefNumber" => $caja->getRefNumber()
//                    ));
//                }
                $this->dispatcher->forward(
                        [
                            "controller" => "contribuyente",
                            "action" => "index",
                        ]
                );
                return false;
            }

            $this->flash->error('Direccion de correo electronico o clave mal ingresadas');
        }

        return $this->dispatcher->forward(
            [
                "controller" => "home",
                "action"     => "index",
            ]
        );
    }

    /**
     * Finishes the active session redirecting to the index
     *
     * @return unknown
     */
    public function endAction()
    {
        $this->session->remove('auth');
        $this->session->remove('ruc');
        $this->session->remove('contribuyente');
        $this->flash->success('Hasta Luego!');

        return $this->dispatcher->forward(
            [
                "controller" => "index",
                "action"     => "index",
            ]
        );
    }
}
