<?php
$xpdo_meta_map['vesAccounts']= array (
  'package' => 'ves',
  'version' => NULL,
  'table' => 'ves_accounts',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'name' => '',
    'identity' => '',
    'typeaccount' => 1,
    'settings' => '',
    'rules' => '',
    'parameters' => '',
  ),
  'fieldMeta' => 
  array (
    'name' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '25',
      'phptype' => 'string',
      'null' => true,
      'default' => '',
    ),
    'identity' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '15',
      'phptype' => 'string',
      'null' => true,
      'default' => '',
    ),
    'typeaccount' => 
    array (
      'dbtype' => 'int',
      'precision' => '3',
      'phptype' => 'integer',
      'null' => false,
      'default' => 1,
    ),
    'settings' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => true,
      'default' => '',
    ),
    'rules' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => true,
      'default' => '',
    ),
    'parameters' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => true,
      'default' => '',
    ),
  ),
);
