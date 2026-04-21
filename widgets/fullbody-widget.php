<?php
if ( ! defined('ABSPATH')) exit;

class WolfMotion_FullBody_Widget extends \Elementor\Widget_Base {

	public function get_name() { return 'wolfmotion_fullbody'; }
	public function get_title() { return 'WM - Full-Body Tracking'; }
	public function get_icon() { return 'eicon-person'; }
	public function get_categories() { return ['wolfmotion']; }
	public function get_keywords() { return ['features', 'tracking', 'body', 'stats']; }

	protected function register_controls() {

		// --- Header ---
		$this->start_controls_section('section_header', [
			'label' => 'Section Header',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('eyebrow', [
			'label' => 'Eyebrow',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Feature 01 · Full-body capture',
		]);
		$this->add_control('heading', [
			'label' => 'Heading',
			'type' => \Elementor\Controls_Manager::TEXTAREA,
			'default' => 'True-to-life motion, captured in 10 points.',
		]);
		$this->add_control('description', [
			'label' => 'Description',
			'type' => \Elementor\Controls_Manager::TEXTAREA,
			'default' => 'Lightweight trackers read every nuance of your movement — hips, limbs, chest — so your avatar moves like you do, in VR and beyond.',
		]);
		$this->end_controls_section();

		// --- Stats ---
		$this->start_controls_section('section_stats', [
			'label' => 'Stats Grid',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('stats', [
			'label' => 'Stats',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => [
				['name' => 'value', 'label' => 'Value', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '0'],
				['name' => 'unit', 'label' => 'Unit', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => ''],
				['name' => 'label', 'label' => 'Label', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Stat'],
			],
			'default' => [
				['value' => '0.4°', 'unit' => '', 'label' => 'Drift / hr'],
				['value' => '200', 'unit' => 'Hz', 'label' => 'Sample rate'],
				['value' => '10', 'unit' => 'h', 'label' => 'Battery'],
				['value' => '30', 'unit' => 'g', 'label' => 'Per tracker'],
				['value' => '2.4', 'unit' => 'GHz', 'label' => 'Wireless'],
				['value' => 'BMI', 'unit' => ' 160', 'label' => 'Sensor'],
			],
			'title_field' => '{{{ label }}}',
		]);
		$this->end_controls_section();

		// --- Features ---
		$this->start_controls_section('section_features', [
			'label' => 'Feature List',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('features', [
			'label' => 'Features',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => [
				['name' => 'text', 'label' => 'Text', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Feature'],
				['name' => 'icon', 'label' => 'Icon', 'type' => \Elementor\Controls_Manager::SELECT, 'default' => 'wifi',
					'options' => ['wifi' => 'Wifi', 'battery' => 'Battery', 'weight' => 'Weight', 'zap' => 'Zap']],
			],
			'default' => [
				['text' => 'Wireless 2.4 GHz', 'icon' => 'wifi'],
				['text' => '10–12h battery life', 'icon' => 'battery'],
				['text' => 'Durable elastic straps', 'icon' => 'weight'],
				['text' => 'Hand-built in-house', 'icon' => 'zap'],
			],
			'title_field' => '{{{ text }}}',
		]);
		$this->end_controls_section();

		// --- Image ---
		$this->start_controls_section('section_image', [
			'label' => 'Body Image',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('body_image', [
			'label' => 'Image',
			'type' => \Elementor\Controls_Manager::MEDIA,
			'default' => ['url' => get_stylesheet_directory_uri() . '/assets/images/body-tracking.jpg'],
		]);
		$this->add_control('show_trackers', [
			'label' => 'Show Tracker Dots',
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'default' => 'yes',
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
		$this->add_control('card_bg_color', [
			'label' => 'Card Background',
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => '',
			'selectors' => ['{{WRAPPER}} .wm-fb-wrap' => 'background: {{VALUE}};'],
		]);
		$this->end_controls_section();
	}

	private function get_icon_svg($icon) {
		switch ($icon) {
			case 'wifi': return '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M5 12.5a10 10 0 0114 0M8.5 16a5 5 0 017 0M12 19.5h0"/></svg>';
			case 'battery': return '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="8" width="18" height="8" rx="1.5"/><path d="M22 11v2M5 11h6" stroke-width="2.5"/></svg>';
			case 'weight': return '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M6 7h12l-1.5 13h-9L6 7z"/><path d="M9 7a3 3 0 016 0"/></svg>';
			case 'zap': return '<svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M13 2L3 14h7l-1 8 10-12h-7l1-8z"/></svg>';
			default: return '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9"/></svg>';
		}
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		$trackers = [
			['top' => '8%', 'left' => '50%'], ['top' => '24%', 'left' => '50%'], ['top' => '38%', 'left' => '50%'],
			['top' => '22%', 'left' => '32%'], ['top' => '22%', 'left' => '68%'], ['top' => '34%', 'left' => '22%'],
			['top' => '34%', 'left' => '78%'], ['top' => '70%', 'left' => '42%'], ['top' => '70%', 'left' => '58%'],
			['top' => '92%', 'left' => '40%'], ['top' => '92%', 'left' => '60%'],
		];
		?>
		<section class="wm-section" id="features">
			<div class="wm-container">
				<div class="wm-sect-head wm-reveal">
					<span class="wm-eyebrow"><?php echo esc_html($s['eyebrow']); ?></span>
					<h2 class="wm-h-display wm-h2 wm-gradient-text"><?php echo esc_html($s['heading']); ?></h2>
					<p><?php echo esc_html($s['description']); ?></p>
				</div>

				<div class="wm-fb-wrap wm-reveal">
					<div>
						<?php if (!empty($s['stats'])) : ?>
						<div class="wm-fb-stats">
							<?php foreach ($s['stats'] as $stat) : ?>
							<div class="wm-fb-stat">
								<div class="wm-fb-stat__val"><?php echo esc_html($stat['value']); ?><?php if (!empty($stat['unit'])) : ?><span><?php echo esc_html($stat['unit']); ?></span><?php endif; ?></div>
								<div class="wm-fb-stat__label"><?php echo esc_html($stat['label']); ?></div>
							</div>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>

						<?php if (!empty($s['features'])) : ?>
						<div class="wm-fb-features">
							<?php foreach ($s['features'] as $feat) : ?>
							<div class="wm-fb-feature">
								<span class="wm-fb-feature__icon"><?php echo $this->get_icon_svg($feat['icon']); ?></span>
								<?php echo esc_html($feat['text']); ?>
							</div>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>
					</div>

					<div class="wm-fb-figure">
						<?php if (!empty($s['body_image']['url'])) : ?>
						<img src="<?php echo esc_url($s['body_image']['url']); ?>" alt="Full-body tracking">
						<?php endif; ?>
						<?php if ($s['show_trackers'] === 'yes') : ?>
							<?php foreach ($trackers as $i => $t) : ?>
							<div class="wm-fb-tracker" style="top:<?php echo $t['top']; ?>;left:<?php echo $t['left']; ?>;animation-delay:<?php echo $i * 0.15; ?>s"></div>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}
