<?php
/**
 *
 * @package ves
 */
require_once MODX_CORE_PATH . 'model/modx/modrequest.class.php';
/**
 * Encapsulates the interaction of MODx manager with an HTTP request.
 *
 * {@inheritdoc}
 *
 * @package ves
 * @extends modRequest
 */
class VESControllerRequest extends modRequest {
    public $ves = null;
    public $actionVar = 'action';
    public $defaultAction = 'main';

    function __construct(VES &$ves) {
        parent :: __construct($ves->modx);
        $this->ves =& $ves;
    }

    /**
     * Extends modRequest::handleRequest and loads the proper error handler and
     * actionVar value.
     *
     * {@inheritdoc}
     */
    public function handleRequest() {
        $this->loadErrorHandler();

        /* save page to manager object. allow custom actionVar choice for extending classes. */
        $this->action = isset($_REQUEST[$this->actionVar]) ? $_REQUEST[$this->actionVar] : $this->defaultAction;

        return $this->_respond();
    }

    /**
     * Prepares the MODx response to a mgr request that is being handled.
     *
     * @access public
     * @return boolean True if the response is properly prepared.
     */
    private function _respond() {
        $modx =& $this->modx;
        $ves =& $this->ves;        
        $viewHeader = include $this->ves->config['corePath'].'controllers/mgr/header.view.php';

        $f = $this->ves->config['corePath'].'controllers/mgr/'.$this->action.'.view.php';        
        if (file_exists($f)) {
            $viewOutput = include $f;
        } else {
            $viewOutput = 'Action not found: '.$f;
        }

        return $viewHeader.$viewOutput;
    }
}