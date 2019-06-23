<?php

use Phalcon\Mvc\User\Component;
use Phalcon\Db\Adapter\Pdo\Mysql;

/**
 * Elements
 *
 * Helps to build UI elements for the application
 */
class Elements extends Component {

    private $_headerMenu = array(
        'navbar-left' => array(
            'home' => array(
                'caption' => 'Home',
                'action' => 'index'
            ),
            'contact' => array(
                'caption' => 'Contacto',
                'action' => 'index'
            ),
        )
    );

    public function getMenu() {

        $auth = $this->session->get('auth');
        if ($auth) {
            $this->_headerMenu['navbar-right']['session'] = array(
                'caption' => 'Salir',
                'action' => 'end'
            );
        } else {
            $this->_headerMenu['navbar-right']['session'] = array(
                'caption' => 'Login',
                'action' => 'index'
            );
        }
        $primeravez = true;
        $controllerName = $this->view->getControllerName();
        foreach ($this->_headerMenu as $position => $menu) {
            echo '<div class="navbar-collapse collapse w-100" id="collapsingNavbar3">';
            echo '<ul class="navbar-nav w-100 justify-content-center">';
            foreach ($menu as $controller => $option) {
                if ($controllerName == $controller) {
                    echo '<li class="nav-item active">';
                } else {
                    echo '<li class="nav-item">';
                }
                echo Phalcon\Tag::linkTo(
                        [
                            $controller . '/' . $option['action'],
                            $option['caption'],
                            "class" => "nav-link",
                        ]
                );
                echo '</li>';
            }
            if ($primeravez) {
                $primeravez = false;
                if ($auth) {
                    $controllerName = $this->view->getControllerName();
                    $actionName = $this->view->getActionName();
                    $tipo = $auth['tipo'];
                    $args = array('conditions' => 'modelType = ?1 AND modelDes = ?2',
                        'bind' => array(
                            1 => 6,
                            2 => $tipo),
                        'order' => 'menuGroup, menuOrder'
                    );
                    $registros = Modelos::find($args);
                    $ctrl = 'inicio';
                    foreach ($registros as $pestania) {
                        if ($ctrl === 'inicio') {
                                  $it1 = '<li class="nav-item dropdown">';
                                   $it1 .= '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                            $it1 .= $pestania->menuGroup . '<span class="caret"></span></a><div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">';
                            echo $it1;
                            $ctrl = $pestania->menuGroup;
                        }
                        if ($ctrl != $pestania->menuGroup) {
                                  $it1 = '<li class="nav-item dropdown">';
                                   $it1 .= '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                            $it1 .= $pestania->menuGroup . '<span class="caret"></span></a><div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">';
                            echo $it1;
                            $ctrl = $pestania->menuGroup;
                        }
                        echo '</a>';
                                        echo Phalcon\Tag::linkTo(
                        [
                            $pestania->modelName . '/' . $pestania->actionName,
                            $pestania->menuName,
                            "class" => "dropdown-item",
                        ]
                );
                    }
                    echo '</li>';
                }
            }
            echo '</ul>';
            echo '</div>';
        }
    }

    public function poneMenu($tipo) {
        if ($tipo == 'ADMINISTRADOR') {
            $_tabs = array(
                'Clientes' => array(
                    'controller' => 'customer',
                    'action' => 'index',
                    'any' => true
                ),
                'Pedidos' => array(
                    'controller' => 'pedidos',
                    'action' => 'index',
                    'any' => true
                ),
                'Pagos' => array(
                    'controller' => 'creditmemo',
                    'caption' => 'PagosQB',
                    'action' => 'indexpagos',
                    'any' => true
                ),
                'Bodegas' => array(
                    'controller' => 'bodegas',
                    'action' => 'index',
                    'any' => true
                ),
                'Produccion' => array(
                    'controller' => 'lotesdetalle',
                    'action' => 'index',
                    'any' => true
                ),
                'Transferencias' => array(
                    'controller' => 'lotestrxcab',
                    'action' => 'index',
                    'any' => true
                ),
                'Inventarios' => array(
                    'controller' => 'inventario',
                    'caption' => 'Inventarios',
                    'action' => 'index',
                    'any' => true
                ),
                'R.Pedido' => array(
                    'controller' => 'reportepedidos',
                    'action' => 'index',
                    'any' => true
                ),
                'R.Prod' => array(
                    'controller' => 'reporteproduccion',
                    'action' => 'index',
                    'any' => true
                ),
                'R.Invent' => array(
                    'controller' => 'reporteinventarios',
                    'action' => 'index',
                    'any' => true
                ),
            );
        } elseif ($tipo == 'EMPLEADO') {
            $_tabs = array(
                'Clientes' => array(
                    'controller' => 'customer',
                    'action' => 'index',
                    'any' => true
                ),
                'Pedidos' => array(
                    'controller' => 'pedidos',
                    'action' => 'index',
                    'any' => true
                ),
                'Pagos' => array(
                    'controller' => 'creditmemo',
                    'caption' => 'PagosQB',
                    'action' => 'indexpagos',
                    'any' => true
                ),
                'Bodegas' => array(
                    'controller' => 'bodegas',
                    'action' => 'index',
                    'any' => true
                ),
                'Produccion' => array(
                    'controller' => 'lotesdetalle',
                    'action' => 'index',
                    'any' => true
                ),
                'Transferencias' => array(
                    'controller' => 'lotestrxcab',
                    'action' => 'index',
                    'any' => true
                ),
                'Inventarios' => array(
                    'controller' => 'inventario',
                    'caption' => 'Inventarios',
                    'action' => 'index',
                    'any' => true
                ),
                'R.Pedido' => array(
                    'controller' => 'reportepedidos',
                    'action' => 'index',
                    'any' => true
                ),
                'R.Prod' => array(
                    'controller' => 'reporteproduccion',
                    'action' => 'index',
                    'any' => true
                ),
                'R.Invent' => array(
                    'controller' => 'reporteinventarios',
                    'action' => 'index',
                    'any' => true
                ),
            );
        }
        return $_tabs;
    }

    public function poneMenuModelo($tipo) {
        $args = array('conditions' => 'modelType = ?1 AND modelDes = ?2',
            'bind' => array(
                1 => 6,
                2 => $tipo),
            'order' => '[menuOrder]'
        );
        $registros = Modelos::find($args);
        $loscontroladores = array();
        foreach ($registros as $pestania) {
            $loscontroladores[$pestania->menuName] = array('controller' => $pestania->modelName, 'action' => $pestania->actionName, 'any' => true);
        }
        return $loscontroladores;
    }

    public function getTabs() {
        
    }

    public function getModelosAdicional() {
        $conn = new Mysql([
            'host' => $this->config->database->host,
            'username' => $this->config->database->username,
            'password' => $this->config->database->password,
            'dbname' => $this->config->database->dbname,
        ]);
        $control = $this->dispatcher->getControllerName();
        $accion = $this->dispatcher->getActionName();
        $sql = 'SELECT * FROM modelos WHERE modelName = ? AND actionName = ?;';
        $registros = $conn->query($sql, [$control, $accion]);
        $valido = array();
        $valido['cabecera'] = 'Sin Cabeceras';
        $valido['titulo'] = 'Sin Titulo';
        $valido['subtitulo'] = 'Sin Sub-Titulos';
        $valido['lineas'][0] = 'Sin mensajes';
        $i = 0;
        if ($registros->numRows() == 0) {
            
        } else {
            while ($modelo = $registros->fetch()) {
                switch ($modelo['modelType']) {
                    case 1:
                        $valido['cabecera'] = $modelo['modelDes'];
                    case 2:
                        $valido['titulo'] = $modelo['modelDes'];
                        break;
                    case 3:
                        $valido['subtitulo'] = $modelo['modelDes'];
                        break;
                    case 4:
                        $valido['lineas'][$i] = $modelo['modelDes'];
                        $i++;
                        break;

                    default:
                        break;
                }
            }
        }
        $this->view->descriptivo = $valido;
    }

}
