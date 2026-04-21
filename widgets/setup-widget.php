<?php
if ( ! defined('ABSPATH')) exit;

class WolfMotion_Setup_Widget extends \Elementor\Widget_Base {

	public function get_name() { return 'wolfmotion_setup'; }
	public function get_title() { return 'WM - Setup Steps'; }
	public function get_icon() { return 'eicon-number-field'; }
	public function get_categories() { return ['wolfmotion']; }
	public function get_keywords() { return ['setup', 'steps', 'how', 'guide']; }

	protected function register_controls() {

		// --- Header ---
		$this->start_controls_section('section_header', [
			'label' => 'Section Header',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('eyebrow', [
			'label' => 'Eyebrow',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Setup',
		]);
		$this->add_control('heading', [
			'label' => 'Heading',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Tracking in minutes, not hours.',
		]);
		$this->add_control('description', [
			'label' => 'Description',
			'type' => \Elementor\Controls_Manager::TEXTAREA,
			'default' => 'No lighthouses. No base stations. Four steps, one profile — then it just works.',
		]);
		$this->end_controls_section();

		// --- Steps ---
		$this->start_controls_section('section_steps', [
			'label' => 'Steps',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control('icon', [
			'label' => 'Icon/Emoji',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => '🎮',
		]);
		$repeater->add_control('title', [
			'label' => 'Title',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Step',
		]);
		$repeater->add_control('desc', [
			'label' => 'Description',
			'type' => \Elementor\Controls_Manager::TEXTAREA,
			'default' => 'Step description.',
		]);
		$this->add_control('steps', [
			'label' => 'Steps',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'default' => [
				['icon' => '👕', 'title' => 'Put on trackers', 'desc' => 'Wrap the adjustable straps on chest, hips, thighs, and ankles. Takes under a minute — no tools needed.'],
				['icon' => '🖥️', 'title' => 'Launch SlimeVR', 'desc' => 'Open SlimeVR and power on the dock. Trackers pair automatically over 2.4 GHz and appear in your dashboard.'],
				['icon' => '⚙️', 'title' => 'Calibrate once', 'desc' => 'Stand in T-pose for 3 seconds. That\'s it — your body map is saved to your profile forever.'],
				['icon' => '🎮', 'title' => 'Move freely', 'desc' => 'Jump into VRChat, SteamVR, or any OSC-compatible app. Dance, game, and perform with your whole body.'],
			],
			'title_field' => '{{{ title }}}',
		]);
		$this->add_control('auto_advance', [
			'label' => 'Auto-advance Steps',
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'default' => 'yes',
		]);
		$this->end_controls_section();

		// --- Bottom Bar ---
		$this->start_controls_section('section_bar', [
			'label' => 'Info Bar',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('show_bar', [
			'label' => 'Show Info Bar',
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'default' => 'yes',
		]);
		$this->add_control('bar_title', [
			'label' => 'Bar Title',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Everything in one box.',
			'condition' => ['show_bar' => 'yes'],
		]);
		$this->add_control('bar_subtitle', [
			'label' => 'Bar Subtitle',
			'type' => \Elementor\Controls_Manager::TEXTAREA,
			'default' => 'No base stations. No hidden accessories. Unbox, charge, and track — shipped hand-built from our workshop.',
			'condition' => ['show_bar' => 'yes'],
		]);
		$this->end_controls_section();

		// --- Style ---
		$this->start_controls_section('section_style', [
			'label' => 'Section Style',
			'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		]);
		$this->add_control('show_bg_gradient', [
			'label' => 'Background Gradient',
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'default' => 'yes',
		]);
		$this->add_responsive_control('section_padding', [
			'label' => 'Section Padding',
			'type' => \Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => ['px'],
			'default' => ['top' => '140', 'right' => '0', 'bottom' => '140', 'left' => '0', 'unit' => 'px'],
			'selectors' => ['{{WRAPPER}} .wm-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],
		]);
		$this->add_control('step_circle_bg', [
			'label' => 'Step Circle Background',
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => '',
			'selectors' => ['{{WRAPPER}} .wm-step__num' => 'background: {{VALUE}};'],
		]);
		$this->add_control('timeline_color', [
			'label' => 'Timeline Line Color',
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => '',
		]);
		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		$bg_style = $s['show_bg_gradient'] === 'yes' ? 'background: linear-gradient(180deg, transparent, rgba(26,31,77,0.4) 50%, transparent);' : '';
		?>
		<section class="wm-section" id="setup" style="<?php echo $bg_style; ?>">
			<div class="wm-container">
				<div class="wm-sect-head wm-reveal">
					<span class="wm-eyebrow"><?php echo esc_html($s['eyebrow']); ?></span>
					<h2 class="wm-h-display wm-h2 wm-gradient-text"><?php echo esc_html($s['heading']); ?></h2>
					<p><?php echo esc_html($s['description']); ?></p>
				</div>

				<?php if (!empty($s['steps'])) : ?>
				<div class="wm-steps wm-reveal">
					<?php foreach ($s['steps'] as $i => $step) : ?>
					<div class="wm-step<?php echo $i === 0 ? ' wm-active' : ''; ?>">
						<div class="wm-step__num">
							<span style="font-size:34px"><?php echo esc_html($step['icon']); ?></span>
							<div class="wm-step__num-badge"><?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?></div>
						</div>
						<div class="wm-step__card">
							<h3 class="wm-step__title"><?php echo esc_html($step['title']); ?></h3>
							<p class="wm-step__desc"><?php echo esc_html($step['desc']); ?></p>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>

				<?php if ($s['show_bar'] === 'yes') : ?>
				<div class="wm-aio-bar wm-reveal">
					<div class="wm-aio-bar__title"><?php echo esc_html($s['bar_title']); ?></div>
					<p class="wm-aio-bar__sub"><?php echo esc_html($s['bar_subtitle']); ?></p>
				</div>
				<?php endif; ?>
			</div>
		</section>
		<?php
	}
}
