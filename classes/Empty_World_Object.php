<?php

class Empty_World_Object extends World_Object {
	// Fields taken directly from the database:
	public $id, $type=5, $x_coord, $y_coord, $owner;
	protected $mass = -1; // -1 for inexhaustible, immobile resources. May be changed in child classes

	// Extra fields:
	// TODO: Add any extra fields you need, but make sure to add the field
	//		name to the $extra_fields array too.
	public $name = 'The Void';
	public $long_descript = "The empty vastness of space. Nothing to see here. Move along.";
	protected $db_table_name = 'world_objects';
	protected $extra_fields = array('db_table_name', 'extra_fields', 'name', 'long_descript');

}


?>