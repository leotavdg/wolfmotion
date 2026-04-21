<?php
if ( ! defined('ABSPATH')) exit;

class WolfMotion_Test_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'wolfmotion_test';
	}

	public function get_title() {
		return 'WolfMotion Test';
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return ['general'];
	}

	protected function register_controls() {
		$this->start_controls_section('content_section', [
			'label' => 'Content',
			'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		]);

		$this->add_control('title', [
			'label'   => 'Title',
			'type'    => \Elementor\Controls_Manager::TEXT,
			'default' => 'Hello from WolfMotion!',
		]);

		$this->add_control('description', [
			'label'   => 'Description',
			'type'    => \Elementor\Controls_Manager::TEXTAREA,
			'default' => 'This is a test widget. If you can see this, the custom widget is working.',
		]);

		$this->add_control('text_color', [
			'label'   => 'Text Color',
			'type'    => \Elementor\Controls_Manager::COLOR,
			'default' => '#333333',
			'selectors' => [
				'{{WRAPPER}} .wolfmotion-test' => 'color: {{VALUE}};',
			],
		]);

		$this->add_control('bg_color', [
			'label'   => 'Background Color',
			'type'    => \Elementor\Controls_Manager::COLOR,
			'default' => '#f0f4ff',
			'selectors' => [
				'{{WRAPPER}} .wolfmotion-test' => 'background-color: {{VALUE}};',
			],
		]);

		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		?>
		<div class="wolfmotion-test" style="padding:30px;border-radius:8px;border:1px solid #d0d5dd;">
			<h3 style="margin:0 0 10px;"><?php echo esc_html($s['title']); ?></h3>
			<p style="margin:0;"><?php echo esc_html($s['description']); ?></p>
		</div>
		<?php
	}
}
