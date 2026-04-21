<?php
if ( ! defined('ABSPATH')) exit;

class WolfMotion_Compatibility_Widget extends \Elementor\Widget_Base {

	public function get_name() { return 'wolfmotion_compatibility'; }
	public function get_title() { return 'WM - Compatibility'; }
	public function get_icon() { return 'eicon-check-circle'; }
	public function get_categories() { return ['wolfmotion']; }
	public function get_keywords() { return ['compatibility', 'headset', 'platform', 'vr']; }

	protected function register_controls() {

		// --- Header ---
		$this->start_controls_section('section_header', [
			'label' => 'Section Header',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('eyebrow', [
			'label' => 'Eyebrow',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Compatibility',
		]);
		$this->add_control('heading', [
			'label' => 'Heading',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Works with your VR setup.',
		]);
		$this->add_control('description', [
			'label' => 'Description',
			'type' => \Elementor\Controls_Manager::TEXTAREA,
			'default' => 'Plug into the platforms you already own. If SlimeVR supports it, Wolfmotion supports it.',
		]);
		$this->end_controls_section();

		// --- Headsets ---
		$this->start_controls_section('section_headsets', [
			'label' => 'Supported Headsets',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('headsets_title', [
			'label' => 'Group Title',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Supported headsets',
		]);
		$this->add_control('headsets', [
			'label' => 'Headsets',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => [
				['name' => 'name', 'label' => 'Name', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Headset'],
				['name' => 'meta', 'label' => 'Type', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'PCVR'],
			],
			'default' => [
				['name' => 'Meta Quest 3', 'meta' => 'Standalone'],
				['name' => 'Meta Quest Pro', 'meta' => 'Standalone'],
				['name' => 'Valve Index', 'meta' => 'PCVR'],
				['name' => 'HTC Vive', 'meta' => 'PCVR'],
				['name' => 'Vive Pro', 'meta' => 'PCVR'],
				['name' => 'Pico 4 / Neo', 'meta' => 'PCVR'],
			],
			'title_field' => '{{{ name }}}',
		]);
		$this->end_controls_section();

		// --- Platforms ---
		$this->start_controls_section('section_platforms', [
			'label' => 'Platform Support',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('platforms_title', [
			'label' => 'Group Title',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Platform support',
		]);
		$this->add_control('platform_1_name', [
			'label' => 'Platform 1 Name',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'SteamVR',
		]);
		$this->add_control('platform_1_desc', [
			'label' => 'Platform 1 Description',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Universal VR support — works anywhere OpenVR runs.',
		]);
		$this->add_control('platform_2_name', [
			'label' => 'Platform 2 Name',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'SlimeVR',
		]);
		$this->add_control('platform_2_desc', [
			'label' => 'Platform 2 Description',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Native ecosystem — first-class integration on day one.',
		]);
		$this->end_controls_section();

		// --- Style ---
		$this->start_controls_section('section_style', [
			'label' => 'Section Style',
			'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		]);
		$this->add_responsive_control('section_padding', [
			'label' => 'Section Padding',
			'type' => \Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => ['px'],
			'default' => ['top' => '140', 'right' => '0', 'bottom' => '140', 'left' => '0', 'unit' => 'px'],
			'selectors' => ['{{WRAPPER}} .wm-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],
		]);
		$this->add_control('card_hover_color', [
			'label' => 'Card Hover Border Color',
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => '',
			'selectors' => ['{{WRAPPER}} .wm-compat-card:hover' => 'border-color: {{VALUE}};'],
		]);
		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		$headset_svg = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M4 14a8 8 0 0116 0v3a2 2 0 01-2 2h-2v-6h4"/><path d="M4 14v3a2 2 0 002 2h2v-6H4"/></svg>';
		$steamvr_svg = '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" style="color:#8ec5ff"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M7 19v-4M17 19v-4M12 9v6M9 12h6"/></svg>';
		$slimevr_svg = '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" style="color:#00d3f2"><path d="M12 3l8 4v10l-8 4-8-4V7l8-4zM4 7l8 4 8-4M12 11v10"/></svg>';
		?>
		<section class="wm-section" id="compatibility">
			<div class="wm-container">
				<div class="wm-sect-head wm-reveal">
					<span class="wm-eyebrow"><?php echo esc_html($s['eyebrow']); ?></span>
					<h2 class="wm-h-display wm-h2 wm-gradient-text"><?php echo esc_html($s['heading']); ?></h2>
					<p><?php echo esc_html($s['description']); ?></p>
				</div>

				<div class="wm-compat-groups">
					<!-- Headsets -->
					<div class="wm-compat-group wm-reveal">
						<h3><?php echo esc_html($s['headsets_title']); ?></h3>
						<div class="wm-compat-grid">
							<?php foreach ($s['headsets'] as $h) : ?>
							<div class="wm-compat-card">
								<span class="wm-compat-card__dot"></span>
								<span class="wm-compat-card__icon"><?php echo $headset_svg; ?></span>
								<div class="wm-compat-card__name"><?php echo esc_html($h['name']); ?></div>
								<div class="wm-compat-card__meta"><?php echo esc_html($h['meta']); ?></div>
							</div>
							<?php endforeach; ?>
						</div>
					</div>

					<!-- Platforms -->
					<div class="wm-compat-group wm-reveal">
						<h3><?php echo esc_html($s['platforms_title']); ?></h3>
						<div class="wm-platform-pair">
							<div class="wm-platform-card">
								<div class="wm-platform-card__icon"><?php echo $steamvr_svg; ?></div>
								<div>
									<div class="wm-platform-card__name"><?php echo esc_html($s['platform_1_name']); ?></div>
									<p class="wm-platform-card__sub"><?php echo esc_html($s['platform_1_desc']); ?></p>
								</div>
							</div>
							<div class="wm-platform-card">
								<div class="wm-platform-card__icon"><?php echo $slimevr_svg; ?></div>
								<div>
									<div class="wm-platform-card__name"><?php echo esc_html($s['platform_2_name']); ?></div>
									<p class="wm-platform-card__sub"><?php echo esc_html($s['platform_2_desc']); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}
