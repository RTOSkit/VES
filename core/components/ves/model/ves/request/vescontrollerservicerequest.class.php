<?php
/**
 *
 * @package ves
 */
require_once MODX_CORE_PATH . 'model/modx/modrequest.class.php';
/**
 * Encapsulates the interaction of MODx manager with an HTTP request.
 *
 *
 * @package ves
 * @extends modRequest
 */
class VESControllerServiceRequest extends modRequest {
    public $ves = null;
    public $serviceVar = 'sid';
    public $datalayerVar = 'dl';
    public $servicesearch = 'servicesearch';
    public $serviceID = '';
    public $dataLayer = '';

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
        $this->serviceID = $_REQUEST[$this->$serviceVar];
        $this->dataLayer = $_REQUEST[$this->$datalayerVar];
        return $this->runService($this->serviceID,$this->dataLayer); 
    }


     /**
     * @param string $service
     * @param string $datalayer
     * @return mixed|string
     */
    public function runService($service,$datalayer) {
        $output = '';
        
        $processorFile = $this->config['processorsPath'].$servicesearch.'.php';
        if (!file_exists($processorFile)) {
            return $output;
        }
        $modx =& $this->modx;        
        try {
            $output = include $processorFile;
        } catch (Exception $e) {
            $this->modx->log(modX::LOG_LEVEL_ERROR,'[VES] '.$e->getMessage());
        }
       
        
        if(empty($output))
          $this->ves->closeServiceSession();
        else
          return $output;
    }
    
     /**
     * @param string $processor
     * @param array $fields
     * @return mixed|string
     */
    public function runProcessor($processor,array $fields = array()) {
        $output = '';
        $processorFile = $this->config['processorsPath'].$processor.'.php';
        if (!file_exists($processorFile)) {
            return $output;
        }
        $modx =&$this->modx;        
        try {
            $output = include $processorFile;
        } catch (Exception $e) {
            $this->modx->log(modX::LOG_LEVEL_ERROR,'[VES] '.$e->getMessage());
        }
        return $output;
    }
}




?>
