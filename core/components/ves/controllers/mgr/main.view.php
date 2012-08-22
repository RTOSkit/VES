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
 * Vectors Engine Server / desktop MODx-mgr(ExtJS) view
 *
 * @package ves
 * @subpackage views
 */


//CALL PROTECT
if(!isset($ves)){
    echo 'LOST?';//BIG WHITE
    @session_write_close();
    die();
}

$modx->regClientCSS($ves->config['assetsUrl'].'mgr/ux/css/GroupTab.css');
$modx->regClientCSS($ves->config['assetsUrl'].'mgr/ux/css/Portal.css');

$modx->regClientStartupScript($ves->config['assetsUrl'].'mgr/js/blocks/ves.desktop.panel.js');
$modx->regClientStartupScript($ves->config['assetsUrl'].'mgr/js/main/ves.desktop.js');
$modx->regClientStartupScript($ves->config['assetsUrl'].'mgr/ux/GroupTab.js');
$modx->regClientStartupScript($ves->config['assetsUrl'].'mgr/ux/GroupTabPanel.js');
$modx->regClientStartupScript($ves->config['assetsUrl'].'mgr/ux/Portal.js');
$modx->regClientStartupScript($ves->config['assetsUrl'].'mgr/ux/PortalColumn.js');
$modx->regClientStartupScript($ves->config['assetsUrl'].'mgr/ux/Portlet.js');

$viewout = '<div id="ves-panel-desktop-div"></div>';
return $viewout;
?>
