<?php
/**
 * Awesomesauce class.
 *
 * @category   Class
 * @package    ElementorAwesomesauce
 * @subpackage WordPress
 * @author     Ben Marshall <me@benmarshall.me>
 * @copyright  2020 Ben Marshall
 * @license    https://opensource.org/licenses/GPL-3.0 GPL-3.0-only
 * @link       link(https://www.benmarshall.me/build-custom-elementor-widgets/,
 *             Build Custom Elementor Widgets)
 * @since      1.0.0
 * php version 7.3.9
 */

namespace ElementorAwesomesauce\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();

/**
 * Awesomesauce widget class.
 *
 * @since 1.0.0
 */
class Awesomesauce extends Widget_Base {
	/**
	 * Class constructor.
	 *
	 * @param array $data Widget data.
	 * @param array $args Widget arguments.
	 */
	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );

		wp_register_style( 'awesomesauce', plugins_url( '/assets/css/awesomesauce.css', ELEMENTOR_AWESOMESAUCE ), array(), '1.0.0' );
	}

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'awesomesauce';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Awesomesauce', 'elementor-awesomesauce' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-pencil';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'general' );
	}
	
	/**
	 * Enqueue styles.
	 */
	public function get_style_depends() {
		return array( 'awesomesauce' );
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		
		

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Campos del Formulario', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'popover-toggle',
			[
				'label' => esc_html__( 'First Name', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
				'label_off' => esc_html__( 'Default', 'textdomain' ),
				'label_on' => esc_html__( 'Custom', 'textdomain' ),
				'return_value' => 'yes',
			]
		);


		$this->start_popover();

		$this->add_control(
			'first_name_label',
			array(
				'label'   => __( 'Label', 'elementor-awesomesauce' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'First Name', 'elementor-awesomesauce' ),
			)
		);
		$this->add_control(
			'first_name_placeholder',
			array(
				'label'   => __( 'Placeholder', 'elementor-awesomesauce' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Choose a Name', 'elementor-awesomesauce' ),
			)
		);
		$this->add_control(
			'first_name_required',
			[
				'label' => esc_html__( 'Required', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'textdomain' ),
				'label_off' => esc_html__( 'Hide', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'id',
			array(
				'label'   => __( 'Id', 'elementor-awesomesauce' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'elementor-awesomesauce' ),
			)
		);
		

		$this->end_popover();

		$this->add_control(
			'popover-toggle',
			[
				'label' => esc_html__( 'Status', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
				'label_off' => esc_html__( 'Default', 'textdomain' ),
				'label_on' => esc_html__( 'Custom', 'textdomain' ),
				'return_value' => 'yes',
			]
		);


		$this->start_popover();

		$this->add_control(
			'status',
			[
				'label' => esc_html__( 'Status', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'solid',
				
				'selectors' => [
					'{{WRAPPER}} .your-class' => 'border-style: {{VALUE}};',
				],
			]
		);
		$this->end_popover();

		$this->end_controls_section();

		
		

		$this->end_controls_section();

		$this->start_controls_section(
			'boton_section',
			[
				'label' => esc_html__( 'Boton', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'boton_text',
			array(
				'label'   => __( 'Texto del boton', 'elementor-awesomesauce' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Save', 'elementor-awesomesauce' ),
			)
		);
		

		$this->end_controls_section();


		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Estilos de formulario', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .typhography',
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .box-shadow',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .border',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'types' => [ 'classic', 'gradient' ],
				"exclude" => ["image"],
				'selector' => '{{WRAPPER}} .background',
			]
		);

		$this->end_controls_section();



		$this->start_controls_section(
			'style_boton_section',
			[
				'label' => esc_html__( 'Estilos del boton', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'boton_box_shadow',
				'selector' => '{{WRAPPER}} .button-shadow',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'boton_border',
				'selector' => '{{WRAPPER}} .button-border',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'boton_background',
				'types' => [ 'classic', 'gradient' ],
				"exclude" => ["image"],
				'selector' => '{{WRAPPER}} .button-background',
			]
		);
		

		$this->end_controls_section();

	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();


		?>
		<form action="" class="typhography box-shadow border background">
		<div>
			<label for="<?= $settings["first_name_id"];?>"><?= $settings["first_name_label"];?></label>
			<input class="typhography" type="text" name="first_name" placeholder="<?= $settings["first_name_placeholder"];?>">
		</div>
		<button class="button-background button-border button-shadow typhography" type="submit"><?= $settings["boton_text"];?></button>
		</form>
		<?php
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {
		?>
		
		<?php
	}
}


