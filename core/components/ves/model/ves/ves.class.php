<?php
/**
 * VES - Vectors Engine Server 
 * 
 * THIS SOFTWARE IS DESIGNED AS A NATIVE ADD-ON FOR MODx CMS
 * THEREFORE MAY CONTAIN SOURCE CODE IMPLEMENTATIONS 
 * STANDARDIZED BY MODX, LLC. AND PROTECTED BY THE GPLv3 LICENSE.
 * 
 * **
 * Copyright (c) 2012 Emmodded Project 
 * All rights reserved.
 *
 * This code is derived from software contributed to Emmodded Project 
 * by Maurizio Spoto <mspoto@emmodded.org>
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 * 1. Redistributions of source code must retain the above copyright
 *    notice, this list of conditions and the following disclaimer.
 * 2. Redistributions in binary form must reproduce the above copyright
 *    notice, this list of conditions and the following disclaimer in the
 *    documentation and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY EMMODDED PROJECT AND CONTRIBUTORS
 * ``AS IS'' AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED
 * TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR
 * PURPOSE ARE DISCLAIMED.  IN NO EVENT SHALL THE FOUNDATION OR CONTRIBUTORS
 * BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package ves
 */
/**
 * Vectors Engine Server / main class
 *
 * @package ves
 */


class VES {
    
    public $modx = null;
    public $request;
     
    function __construct(modX &$modx,array $config = array()) {
        $this->modx =& $modx;
        $corePath = $modx->getOption('ves.core_path',null,$modx->getOption('core_path').'components/ves/');
        $assetsPath = $modx->getOption('ves.assets_path',null,$modx->getOption('assets_path').'components/ves/');
        $assetsUrl = $modx->getOption('ves.assets_url',null,$modx->getOption('assets_url').'components/ves/');
      
        $this->config = array_merge(array(
            'corePath' => $corePath,
            'modelPath' => $corePath.'model/',
            'viewPath' => $corePath.'views/',
            'processorsPath' => $corePath.'processors/',
            'controllersPath' => $corePath.'controllers/',
            'chunksPath' => $corePath.'elements/chunks/',
            'snippetsPath' => $corePath.'elements/snippets/',
            'assetsUrl' => $assetsUrl,
            'connectorUrl' => $assetsUrl.'connector.php',
            'cssUrl' => $assetsUrl,
            'jsUrl' => $assetsUrl.'js/',
        ),$config);

        $this->modx->addPackage('ves',$this->config['modelPath']);        
        if ($this->modx->lexicon) {
            $this->modx->lexicon->load('ves:default');
        }
       
       
    }

    /**
     * Initializes ves based on a specific context.
     *
     * @access public
     * @param string $ctx The context to initialize in.
     * @return string The processed content.
     */
    public function initialize($ctx = 'mgr') {
        $output = '';
        switch ($ctx) {
            case 'mgr': //MANAGER
                if (!$this->modx->loadClass('ves.request.VESControllerRequest',$this->config['modelPath'],true,true)) {
                    return 'Could not load controller request handler.';
                }
                $this->request = new VESControllerRequest($this);
                $output = $this->request->handleRequest();                
                break;
            default: //SERVICE MODE
                if (!$this->modx->loadClass('ves.request.VESControllerServiceRequest',$this->config['modelPath'],true,true)) {
                    return 'Could not load controller request handler.';
                }
                $this->request = new VESControllerServiceRequest($this);
                $output = $this->request->handleRequest();                
                break;                
        }
        return $output;
    }
    
    

    
    
    /**
     * Gets a Chunk and caches it; also falls back to file-based templates
     * for easier debugging.
     *
     * @access public
     * @param string $name The name of the Chunk
     * @param array $properties The properties for the Chunk
     * @return string The processed content of the Chunk
     */
    public function getChunk($name,$properties = array()) {
        $chunk = null;
        if (!isset($this->chunks[$name])) {
            $chunk = $this->_getTplChunk($name);
            if (empty($chunk)) {
                $chunk = $this->modx->getObject('modChunk',array('name' => $name),true);
                if ($chunk == false) return false;
            }
            $this->chunks[$name] = $chunk->getContent();
        } else {
            $o = $this->chunks[$name];
            $chunk = $this->modx->newObject('modChunk');
            $chunk->setContent($o);
        }
        $chunk->setCacheable(false);
        return $chunk->process($properties);
    }

    /**
     * Returns a modChunk object from a template file.
     *
     * @access private
     * @param string $name The name of the Chunk. Will parse to name.chunk.tpl
     * @return modChunk/boolean Returns the modChunk object if found, otherwise
     * false.
     */
    private function _getTplChunk($name) {
        $chunk = false;
        $f = $this->config['chunksPath'].strtolower($name).'.chunk.tpl';
        if (file_exists($f)) {
            $o = file_get_contents($f);
            $chunk = $this->modx->newObject('modChunk');
            $chunk->set('name',$name);
            $chunk->setContent($o);
        }
        return $chunk;
    }
    
    
    
    public function closeServiceSession(array $outdata = array()){
        if(empty($outdata)){
            header("Content-Type: text/html; charset=UTF-8");
            header('HTTP/1.1 503 Service Unavailable');
            echo '<h1>503 Service Unavailable</h1>';
        }else{
            header("Content-Type: {$outdata['minetype']}; charset=UTF-8");
            header('HTTP/1.1 '.$outdata['response']);
            echo "<h1>{$outdata['message']}</h1>";
        }    
        @session_write_close();
        die();
    }
}
?>
