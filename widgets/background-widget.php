<?php
if ( ! defined('ABSPATH')) exit;

class WolfMotion_Background_Widget extends \Elementor\Widget_Base {

	public function get_name() { return 'wolfmotion_background'; }
	public function get_title() { return 'WM - Animated Background'; }
	public function get_icon() { return 'eicon-background'; }
	public function get_categories() { return ['wolfmotion']; }
	public function get_keywords() { return ['background', 'grid', 'noise', 'ambient']; }

	protected function register_controls() {
		$this->start_controls_section('section_content', [
			'label' => 'Background Settings',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('show_grid', [
			'label' => 'Show Grid Pattern',
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'default' => 'yes',
		]);
		$this->add_control('show_noise', [
			'label' => 'Show Noise Texture',
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'default' => 'yes',
		]);
		$this->add_control('grid_size', [
			'label' => 'Grid Size (px)',
			'type' => \Elementor\Controls_Manager::SLIDER,
			'range' => ['px' => ['min' => 32, 'max' => 128]],
			'default' => ['size' => 64],
			'selectors' => ['{{WRAPPER}} .wm-bg-grid' => 'background-size: {{SIZE}}px {{SIZE}}px;'],
		]);
		$this->add_control('primary_glow_color', [
			'label' => 'Primary Glow Color',
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => 'rgba(43,127,255,0.18)',
		]);
		$this->add_control('secondary_glow_color', [
			'label' => 'Secondary Glow Color',
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => 'rgba(0,184,219,0.10)',
		]);
		$this->add_control('bg_color_top', [
			'label' => 'Background Top',
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => '#04071a',
		]);
		$this->add_control('bg_color_bottom', [
			'label' => 'Background Bottom',
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => '#0b1144',
		]);
		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		$bg_style = sprintf(
			'background: radial-gradient(1200px 700px at 80%% -10%%, %s, transparent 60%%), radial-gradient(900px 900px at -10%% 20%%, %s, transparent 55%%), radial-gradient(1100px 800px at 50%% 90%%, rgba(124,92,255,0.12), transparent 65%%), linear-gradient(180deg, %s 0%%, #0a0e27 40%%, %s 100%%);',
			esc_attr($s['primary_glow_color']),
			esc_attr($s['secondary_glow_color']),
			esc_attr($s['bg_color_top']),
			esc_attr($s['bg_color_bottom'])
		);
		?>
		<div class="wm-bg-shell" style="<?php echo $bg_style; ?>">
			<?php if ($s['show_grid'] === 'yes') : ?>
			<div class="wm-bg-grid"></div>
			<?php endif; ?>
			<?php if ($s['show_noise'] === 'yes') : ?>
			<div class="wm-bg-noise"></div>
			<?php endif; ?>
		</div>
		<?php
	}
}
