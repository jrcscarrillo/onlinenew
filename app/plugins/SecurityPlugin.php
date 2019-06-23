<?php

use Phalcon\Acl;
use Phalcon\Acl\Role;
use Phalcon\Acl\Resource;
use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin as Pegado;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Acl\Adapter\Memory as AclList;

/**
 * SecurityPlugin
 *
 * This is the security plugin which controls that users only have access to the modules they're assigned to
 */
class SecurityPlugin extends Pegado {

    public function getAcl() {

        $acl = new AclList();

        $acl->setDefaultAction(Acl::DENY);

        // Register roles
        $roles = array(
           'users' => new Role(
              'Users', 'Member privileges, granted after sign in.'
           ),
           'guests' => new Role(
              'Guests', 'Anyone browsing the site who is not signed in is considered to be a "Guest".'
           )
        );

        foreach ($roles as $role) {
            $acl->addRole($role);
        }

        //Private area resources
        $privateResources = array(
           'syncronizain' => array('index', 'seguir', 'procesar'),
           'syncronizaout' => array('index', 'seguir', 'procesar'),
           'appliedtosync' => array('index', 'new', 'create', 'edit', 'save', 'delete', 'search'),
           'codetype' => array('index', 'new', 'create', 'edit', 'save', 'delete', 'search'),
           'ventas' => array('index', 'cabecera',  'factura' . 'search', 'productos', 'masproductos', 'delproducto', 'aprobar', 'new', 'edit', 'save', 'create', 'delete', 'final', 'pagar', 'seguir', 'impresion', 'cliente', 'inout', 'close', 'aprobarcaja', 'cerrarcaja', 'cerrar', 'imprimecaja'),
           'contribuyente' => array('index', 'search', 'new', 'create', 'delete', 'setup', 'seleccion', 'save'),
           'invoice' => array('indexventas', 'searchventas'),
           'pedidostmp' => array('indexventas', 'searchventas', 'pasaventas', 'newventas', 'editventas', 'saveventas', 'aprobarventas', 'deleteventas', 'corregir', 'eliminar'),
           'bonificadetalle' => array('index', 'imprimir', 'facturar'),
           'reporteinventarios' => array('index', 'imprimir', 'movbodega', 'movproducto', 'movtrx', 'movinicial', 'movtransferencia'),
           'reportepedidos' => array('index', 'imprimir', 'totalmensual', 'totalrep', 'totalitem', 'repmensual', 'itemmensual'),
           'reporteproduccion' => array('index', 'imprimir', 'acumuladomensual', 'listaproducto', 'listaordenes', 'lista', 'itemmensual'),
           'creditmemo' => array('indexventas', 'searchventas'),
           'inventario' => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
           'vendorcredit' => array('indexventas', 'searchventas'),
           'users' => array('index', 'search', 'edit', 'delete'),
           'products' => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
           'modelos' => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
           'pedidos' => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
           'customer' => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
           'driver' => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
           'lotestrxcab' => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete', 'disponible', 'calcular', 'imprimir'),
           'lotestrx' => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
           'lotesdetalle' => array('index', 'search', 'procesar', 'cerrar', 'saveproduccion', 'imprimir'),
           'bodegas' => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
           'vehicle' => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
           'route' => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
           'ruta' => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
           'licencia' => array('index', 'search', 'setup', 'seleccion', 'new', 'create', 'delete', 'edit', 'save'),
           'items' => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete'),
           'itemsislas' => array('index', 'search', 'seleccion', 'noseleccion', 'nuevo', 'antiguo'),
           'vendor' => array('index', 'search', 'new', 'edit', 'save', 'create', 'delete')
        );
        foreach ($privateResources as $resource => $actions) {
            $acl->addResource(new Resource($resource), $actions);
        }

        //Public area resources
        $publicResources = array(
           'index' => array('index'),
           'home' => array('index'),
           'about' => array('index'),
           'register' => array('index'),
           'registrar' => array('index'),
           'errors' => array('show401', 'show404', 'show500', 'shownolicencia', 'shownoruc', 'showexpirada'),
           'session' => array('index', 'register', 'start', 'end'),
           'contact' => array('index', 'send')
        );
        foreach ($publicResources as $resource => $actions) {
            $acl->addResource(new Resource($resource), $actions);
        }

        //Grant access to public areas to both users and guests
        foreach ($roles as $role) {
            foreach ($publicResources as $resource => $actions) {
                foreach ($actions as $action) {
                    $acl->allow($role->getName(), $resource, $action);
                }
            }
        }

        //Grant access to private area to role Users
        foreach ($privateResources as $resource => $actions) {
            foreach ($actions as $action) {
                $acl->allow('Users', $resource, $action);
            }
        }

        //The acl is stored in session, APC would be useful here too
        $this->persistent->acl = $acl;

        return $this->persistent->acl;
    }

    public function beforeDispatch(Event $event, Dispatcher $dispatcher) {

        $auth = $this->session->get('auth');
        if (!$auth) {
            $role = 'Guests';
        } else {
            $role = 'Users';
        }

        $controller = $dispatcher->getControllerName();
        $action = $dispatcher->getActionName();

        $acl = $this->getAcl();

        if (!$acl->isResource($controller)) {
            $dispatcher->forward([
               'controller' => 'errors',
               'action' => 'show404'
            ]);

            return false;
        }

        $allowed = $acl->isAllowed($role, $controller, $action);
        if (!$allowed) {
            $dispatcher->forward(array(
               'controller' => 'errors',
               'action' => 'show401'
            ));
            $this->session->destroy();
            return false;
        }
    }

}
