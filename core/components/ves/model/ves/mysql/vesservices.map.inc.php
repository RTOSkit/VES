<?php
$xpdo_meta_map['vesServices']= array (
  'package' => 'ves',
  'version' => NULL,
  'table' => 'ves_services',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'name' => '',
    'agenerator' => 0,
    'atransport' => 0,
    'aconnection' => 0,
    'typeaccess' => 1,
    'usersaccess' => '',
    'clientdomains' => '',
    'forceresolvip' => 0,
    'status' => 1,
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
    'agenerator' => 
    array (
      'dbtype' => 'int',
      'precision' => '8',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'atransport' => 
    array (
      'dbtype' => 'int',
      'precision' => '8',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'aconnection' => 
    array (
      'dbtype' => 'int',
      'precision' => '8',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'typeaccess' => 
    array (
      'dbtype' => 'int',
      'precision' => '3',
      'phptype' => 'integer',
      'null' => false,
      'default' => 1,
    ),
    'usersaccess' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => true,
      'default' => '',
    ),
    'clientdomains' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => true,
      'default' => '',
    ),
    'forceresolvip' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '1',
      'phptype' => 'boolean',
      'null' => false,
      'default' => 0,
      'attributes' => 'unsigned',
    ),
    'status' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '1',
      'phptype' => 'boolean',
      'null' => false,
      'default' => 1,
      'attributes' => 'unsigned',
    ),
  ),
  'aggregates' => 
  array (
    'Generators' => 
    array (
      'class' => 'vesGenerators',
      'local' => 'agenerator',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
    'Transports' => 
    array (
      'class' => 'vesTransports',
      'local' => 'atransport',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
    'Connections' => 
    array (
      'class' => 'vesConnections',
      'local' => 'aconnection',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
    'Typeaccess' => 
    array (
      'class' => 'vesTypeaccess',
      'local' => 'typeaccess',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
  ),
);
