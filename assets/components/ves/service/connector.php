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
 * Vectors Engine Server / Service Connector
 *
 * @package ves
 * @subpackage connectors
 */
require_once dirname(dirname(dirname(dirname(__FILE__)))).'/config.core.php';
require_once MODX_CORE_PATH.'config/'.MODX_CONFIG_KEY.'.inc.php';
if (!include_once(MODX_CORE_PATH . 'model/modx/modx.class.php')) die();

$modx= new modX('', array(xPDO::OPT_CONN_INIT => array(xPDO::OPT_CONN_MUTABLE => true)));
$ctx = isset($_REQUEST['ctx']) && !empty($_REQUEST['ctx']) ? $_REQUEST['ctx'] : 'web';
$modx->initialize($ctx);

if (defined('MODX_REQP') && MODX_REQP === false) {
} else if ((!$modx->context->checkPolicy('load'))||
          (!isset($_REQUEST['srv'])) ||
          (empty($_REQUEST['srv']))  ||
          (!isset($_REQUEST['dl']))  ||
          (empty($_REQUEST['dl']))) {
    header("Content-Type: text/plain; charset=UTF-8");
    header('HTTP/1.1 401 Not Authorized');
    echo 'Service access has been denied';
    @session_write_close();
    die();
}

$vesCorePath = $modx->getOption('ves.core_path',null,$modx->getOption('core_path').'components/ves/');
require_once $vesCorePath.'model/ves/ves.class.php';
$modx->ves = new VES($modx);
$modx->ves->initialize($ctx);
?>
