<?php
if ( ! defined('ABSPATH')) exit;

class WolfMotion_FinalCTA_Widget extends \Elementor\Widget_Base {

	public function get_name() { return 'wolfmotion_final_cta'; }
	public function get_title() { return 'WM - Final CTA'; }
	public function get_icon() { return 'eicon-call-to-action'; }
	public function get_categories() { return ['wolfmotion']; }
	public function get_keywords() { return ['cta', 'action', 'final', 'convert']; }

	protected function register_controls() {

		// --- Content ---
		$this->start_controls_section('section_content', [
			'label' => 'Content',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('logo_image', [
			'label' => 'Logo',
			'type' => \Elementor\Controls_Manager::MEDIA,
			'default' => ['url' => get_stylesheet_directory_uri() . '/assets/images/wolf-logo.png'],
		]);
		$this->add_control('heading', [
			'label' => 'Heading',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Step fully into VR.',
		]);
		$this->add_control('description', [
			'label' => 'Description',
			'type' => \Elementor\Controls_Manager::TEXTAREA,
			'default' => 'Move naturally. Express yourself freely. Wolfmotion brings your entire body into the virtual world.',
		]);
		$this->end_controls_section();

		// --- CTAs ---
		$this->start_controls_section('section_ctas', [
			'label' => 'Buttons',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('cta_primary_text', [
			'label' => 'Primary Button',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Order Wolfmotion',
		]);
		$this->add_control('cta_primary_link', [
			'label' => 'Primary Link',
			'type' => \Elementor\Controls_Manager::URL,
			'default' => ['url' => '#product'],
		]);
		$this->add_control('cta_secondary_text', [
			'label' => 'Secondary Button',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Watch demo',
		]);
		$this->add_control('cta_secondary_link', [
			'label' => 'Secondary Link',
			'type' => \Elementor\Controls_Manager::URL,
			'default' => ['url' => '#features'],
		]);
		$this->end_controls_section();

		// --- Micro Trust ---
		$this->start_controls_section('section_micro', [
			'label' => 'Trust Items',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control('text', [
			'label' => 'Text',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Feature',
		]);
		$this->add_control('micro_items', [
			'label' => 'Trust Items',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'default' => [
				['text' => 'SlimeVR compatible'],
				['text' => '8–12h battery'],
				['text' => 'Hand-built quality'],
				['text' => '2-year warranty'],
			],
			'title_field' => '{{{ text }}}',
		]);
		$this->end_controls_section();

		// --- Style ---
		$this->start_controls_section('section_style', [
			'label' => 'Style',
			'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		]);
		$this->add_responsive_control('padding_top', [
			'label' => 'Padding Top',
			'type' => \Elementor\Controls_Manager::SLIDER,
			'range' => ['px' => ['min' => 60, 'max' => 300]],
			'default' => ['size' => 160, 'unit' => 'px'],
			'selectors' => ['{{WRAPPER}} .wm-final-cta' => 'padding-top: {{SIZE}}px;'],
		]);
		$this->add_responsive_control('padding_bottom', [
			'label' => 'Padding Bottom',
			'type' => \Elementor\Controls_Manager::SLIDER,
			'range' => ['px' => ['min' => 60, 'max' => 300]],
			'default' => ['size' => 180, 'unit' => 'px'],
			'selectors' => ['{{WRAPPER}} .wm-final-cta' => 'padding-bottom: {{SIZE}}px;'],
		]);
		$this->add_control('glow_color', [
			'label' => 'Glow Color',
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => '',
		]);
		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		$check_svg = '<svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12l5 5L20 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
		$arrow_svg = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
		?>
		<section class="wm-final-cta wm-section">
			<div class="wm-container wm-reveal">

				<?php if (!empty($s['logo_image']['url'])) : ?>
				<div class="wm-final-cta__logo">
					<img src="<?php echo esc_url($s['logo_image']['url']); ?>" alt="">
				</div>
				<?php endif; ?>

				<h2 class="wm-h-display wm-h2 wm-gradient-text"><?php echo esc_html($s['heading']); ?></h2>
				<p><?php echo esc_html($s['description']); ?></p>

				<div class="wm-final-cta__row">
					<?php if (!empty($s['cta_primary_text'])) : ?>
					<a href="<?php echo esc_url($s['cta_primary_link']['url'] ?? '#'); ?>" class="wm-btn wm-btn--glow wm-btn--lg">
						<?php echo esc_html($s['cta_primary_text']); ?> <?php echo $arrow_svg; ?>
					</a>
					<?php endif; ?>
					<?php if (!empty($s['cta_secondary_text'])) : ?>
					<a href="<?php echo esc_url($s['cta_secondary_link']['url'] ?? '#'); ?>" class="wm-btn wm-btn--ghost wm-btn--lg">
						<?php echo esc_html($s['cta_secondary_text']); ?>
					</a>
					<?php endif; ?>
				</div>

				<?php if (!empty($s['micro_items'])) : ?>
				<div class="wm-final-cta__micro">
					<?php foreach ($s['micro_items'] as $item) : ?>
					<span><?php echo $check_svg; ?> <?php echo esc_html($item['text']); ?></span>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
		</section>
		<?php
	}
}
