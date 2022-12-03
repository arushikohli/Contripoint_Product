<?php
/**
 * Simply Schedule Appointments Appointment Type Label Model.
 *
 * @since   6.0.2
 * @package Simply_Schedule_Appointments
 */

/**
 * Simply Schedule Appointments Appointment Type Label Model.
 *
 * @since   6.0.2
 */
class SSA_Appointment_Type_Label_Model extends SSA_Db_Model {
	protected $slug = 'appointment_type_label';
	protected $version = '1.1.0';

	/**
	 * Parent plugin class.
	 *
	 * @since 0.0.2
	 *
	 * @var   Simply_Schedule_Appointments
	 */
	protected $plugin = null;
	/**
	 * Constructor.
	 *
	 * @since  0.0.2
	 *
	 * @param  Simply_Schedule_Appointments $plugin Main plugin object.
	 */
	public function __construct( $plugin ) {
		parent::__construct( $plugin );

		$this->hooks();
	}

	/**
	 * Initiate our hooks.
	 *
	 * @since  0.0.2
	 */
	public function hooks() {

	}

  //TODO
	// public function has_many() {
	// 	return array(
	// 		'AppointmentType' => array(
	// 			'model' => $this->plugin->appointment_type_model,
	// 			'foreign_key' => 'label_id', // TO BE ADDED
	// 		),
	// 	);
	// }

	protected $schema = array(
		'color' => array(
			'field' => 'color',
			'label' => 'Color',
			'default_value' => '', // this would get the default color light-green?
			'format' => '%s',
			'mysql_type' => 'VARCHAR',
			'mysql_length' => '20',
			'mysql_unsigned' => false,
			'mysql_allow_null' => false,
			'mysql_extra' => '',
			'cache_key' => false,
    ),
		'name' => array(
			'field' => 'name',
			'label' => 'Name',
			'default_value' => false, // this would have a name by default? label General
			'format' => '%s',
			'mysql_type' => 'VARCHAR',
			'mysql_length' => '120',
			'mysql_unsigned' => false,
			'mysql_allow_null' => false,
			'mysql_extra' => '',
			'cache_key' => false,
      )
    );

	public $indexes = array();
}