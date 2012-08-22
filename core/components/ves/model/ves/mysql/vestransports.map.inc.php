<?php
$xpdo_meta_map['vesTransports']= array (
  'package' => 'ves',
  'version' => NULL,
  'table' => 'ves_transports',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'name' => '',
    'snippetref' => '',
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
    'snippetref' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '25',
      'phptype' => 'string',
      'null' => true,
      'default' => '',
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
  'indexes' => 
  array (
    'name' => 
    array (
      'alias' => 'name',
      'primary' => false,
      'unique' => true,
      'type' => 'BTREE',
      'columns' => 
      array (
        'name' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
  ),
  'composites' => 
  array (
    'Services' => 
    array (
      'class' => 'vesServices',
      'local' => 'id',
      'foreign' => 'atransport',
      'cardinality' => 'one',
      'owner' => 'local',
    ),
  ),
);
