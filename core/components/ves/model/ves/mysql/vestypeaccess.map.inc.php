<?php
$xpdo_meta_map['vesTypeaccess']= array (
  'package' => 'ves',
  'version' => NULL,
  'table' => 'ves_typeaccess',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'name' => '',
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
  ),
  'composites' => 
  array (
    'Services' => 
    array (
      'class' => 'vesServices',
      'local' => 'id',
      'foreign' => 'typeaccess',
      'cardinality' => 'one',
      'owner' => 'local',
    ),
  ),
);
