<?php
if ( ! defined('ABSPATH')) exit;

class WolfMotion_FAQ_Widget extends \Elementor\Widget_Base {

	public function get_name() { return 'wolfmotion_faq'; }
	public function get_title() { return 'WM - FAQ'; }
	public function get_icon() { return 'eicon-help-o'; }
	public function get_categories() { return ['wolfmotion']; }
	public function get_keywords() { return ['faq', 'questions', 'accordion', 'help']; }

	protected function register_controls() {

		// --- Header ---
		$this->start_controls_section('section_header', [
			'label' => 'Section Header',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('eyebrow', [
			'label' => 'Eyebrow',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'FAQ',
		]);
		$this->add_control('heading', [
			'label' => 'Heading',
			'type' => \Elementor\Controls_Manager::TEXTAREA,
			'default' => 'Frequently asked questions.',
		]);
		$this->add_control('description', [
			'label' => 'Description',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Everything you need to know about Wolfmotion.',
		]);
		$this->end_controls_section();

		// --- FAQ Items ---
		$this->start_controls_section('section_items', [
			'label' => 'FAQ Items',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('items', [
			'label' => 'Questions',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => [
				['name' => 'question', 'label' => 'Question', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Question?'],
				['name' => 'answer', 'label' => 'Answer', 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Answer.'],
			],
			'default' => [
				['question' => 'How many trackers do I need?', 'answer' => 'For full-body tracking, we recommend 8–10 trackers (head, chest, hip, 2× upper arms, 2× thighs, 2× ankles). You can start with 6 for basic lower-body tracking and add more later — all Wolfmotion units are cross-compatible.'],
				['question' => 'Is setup difficult?', 'answer' => 'No. Pair with SlimeVR, T-pose for three seconds, and you\'re tracking. Most users are in-game within five minutes of unboxing.'],
				['question' => 'Does it support SteamVR?', 'answer' => 'Yes. Wolfmotion works with SteamVR via SlimeVR\'s OpenVR driver, as well as OSC-based apps like VRChat and Resonite.'],
				['question' => 'What\'s the battery life?', 'answer' => 'Each tracker lasts 10–12 hours of continuous use. A full recharge takes about 90 minutes via the included USB-C dock.'],
				['question' => 'Can I use it for dancing and active movement?', 'answer' => 'Absolutely. The 200 Hz sample rate and 0.4° drift keep up with fast motion, and the elastic straps are tested to stay put through sustained sessions.'],
				['question' => 'What platforms does it work with?', 'answer' => 'VRChat, Resonite, ChilloutVR, NeosVR, Blender (mocap), and any OSC / OpenVR-compatible application.'],
				['question' => 'Do I need base stations?', 'answer' => 'No. Wolfmotion uses IMU-based tracking over 2.4 GHz — no lighthouses, no cameras, no line-of-sight required.'],
			],
			'title_field' => '{{{ question }}}',
		]);
		$this->add_control('default_open', [
			'label' => 'Default Open Item',
			'type' => \Elementor\Controls_Manager::NUMBER,
			'default' => 0,
			'description' => 'Index of the item to open by default (0 = first, -1 = none)',
		]);
		$this->end_controls_section();

		// --- Contact Box ---
		$this->start_controls_section('section_contact', [
			'label' => 'Contact Box',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('show_contact', [
			'label' => 'Show Contact Box',
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'default' => 'yes',
		]);
		$this->add_control('contact_title', [
			'label' => 'Title',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Still have questions?',
			'condition' => ['show_contact' => 'yes'],
		]);
		$this->add_control('contact_desc', [
			'label' => 'Description',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Our team replies within a few hours — usually faster.',
			'condition' => ['show_contact' => 'yes'],
		]);
		$this->add_control('contact_btn_text', [
			'label' => 'Button Text',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Contact support',
			'condition' => ['show_contact' => 'yes'],
		]);
		$this->add_control('contact_btn_link', [
			'label' => 'Button Link',
			'type' => \Elementor\Controls_Manager::URL,
			'default' => ['url' => '#'],
			'condition' => ['show_contact' => 'yes'],
		]);
		$this->end_controls_section();

		// --- Style ---
		$this->start_controls_section('section_style', [
			'label' => 'Style',
			'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		]);
		$this->add_responsive_control('section_padding', [
			'label' => 'Section Padding',
			'type' => \Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => ['px'],
			'default' => ['top' => '140', 'right' => '0', 'bottom' => '140', 'left' => '0', 'unit' => 'px'],
			'selectors' => ['{{WRAPPER}} .wm-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],
		]);
		$this->add_control('active_border_color', [
			'label' => 'Active Item Border',
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => '',
			'selectors' => ['{{WRAPPER}} .wm-faq.wm-open' => 'border-color: {{VALUE}};'],
		]);
		$this->add_control('icon_color', [
			'label' => 'Icon Color',
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => '',
			'selectors' => ['{{WRAPPER}} .wm-faq__icon' => 'color: {{VALUE}};'],
		]);
		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		$plus_svg = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>';
		$arrow_svg = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
		$default_open = intval($s['default_open']);
		?>
		<section class="wm-section" id="faq">
			<div class="wm-container">
				<div class="wm-sect-head wm-reveal">
					<span class="wm-eyebrow"><?php echo esc_html($s['eyebrow']); ?></span>
					<h2 class="wm-h-display wm-h2 wm-gradient-text"><?php echo nl2br(esc_html($s['heading'])); ?></h2>
					<p><?php echo esc_html($s['description']); ?></p>
				</div>

				<div class="wm-faq-list wm-reveal">
					<?php foreach ($s['items'] as $i => $item) : ?>
					<div class="wm-faq<?php echo $i === $default_open ? ' wm-open' : ''; ?>">
						<button class="wm-faq__q">
							<span><?php echo esc_html($item['question']); ?></span>
							<span class="wm-faq__icon"><?php echo $plus_svg; ?></span>
						</button>
						<div class="wm-faq__a">
							<div class="wm-faq__a-inner"><?php echo esc_html($item['answer']); ?></div>
						</div>
					</div>
					<?php endforeach; ?>

					<?php if ($s['show_contact'] === 'yes') : ?>
					<div class="wm-faq-contact">
						<h4><?php echo esc_html($s['contact_title']); ?></h4>
						<p><?php echo esc_html($s['contact_desc']); ?></p>
						<a class="wm-btn wm-btn--ghost" href="<?php echo esc_url($s['contact_btn_link']['url'] ?? '#'); ?>">
							<?php echo esc_html($s['contact_btn_text']); ?> <?php echo $arrow_svg; ?>
						</a>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
		<?php
	}
}
