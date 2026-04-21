<?php
if ( ! defined('ABSPATH')) exit;

class WolfMotion_Hero_Widget extends \Elementor\Widget_Base {

	public function get_name() { return 'wolfmotion_hero'; }
	public function get_title() { return 'WM - Hero Section'; }
	public function get_icon() { return 'eicon-banner'; }
	public function get_categories() { return ['wolfmotion']; }
	public function get_keywords() { return ['hero', 'wolfmotion', 'banner', 'header']; }

	protected function register_controls() {

		// --- Content: Badge ---
		$this->start_controls_section('section_badge', [
			'label' => 'Badge / Pill',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('badge_text', [
			'label' => 'Badge Text',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'New · Batch 03 now shipping',
		]);
		$this->add_control('show_badge_dot', [
			'label' => 'Show Pulsing Dot',
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'default' => 'yes',
		]);
		$this->end_controls_section();

		// --- Content: Logo ---
		$this->start_controls_section('section_logo', [
			'label' => 'Logo',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('logo_image', [
			'label' => 'Logo Image',
			'type' => \Elementor\Controls_Manager::MEDIA,
			'default' => ['url' => get_stylesheet_directory_uri() . '/assets/images/wolf-logo.png'],
		]);
		$this->add_control('logo_size', [
			'label' => 'Logo Size (px)',
			'type' => \Elementor\Controls_Manager::SLIDER,
			'range' => ['px' => ['min' => 40, 'max' => 200]],
			'default' => ['size' => 88, 'unit' => 'px'],
			'selectors' => [
				'{{WRAPPER}} .wm-hero__logo-wrap' => 'width: {{SIZE}}px; height: {{SIZE}}px;',
			],
		]);
		$this->add_control('show_logo_glow', [
			'label' => 'Show Glow Effect',
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'default' => 'yes',
		]);
		$this->add_control('show_logo_float', [
			'label' => 'Floating Animation',
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'default' => 'yes',
		]);
		$this->end_controls_section();

		// --- Content: Headline ---
		$this->start_controls_section('section_headline', [
			'label' => 'Headline',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('title_line_1', [
			'label' => 'Title Line 1',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Bring your avatar',
		]);
		$this->add_control('title_line_2', [
			'label' => 'Title Line 2',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'fully to life.',
		]);
		$this->add_control('subtitle', [
			'label' => 'Subtitle',
			'type' => \Elementor\Controls_Manager::TEXTAREA,
			'default' => 'Wolfmotion transforms real movement into true avatar embodiment — presence, expression, and full-body motion inside VRChat, SteamVR and beyond.',
		]);
		$this->end_controls_section();

		// --- Content: CTAs ---
		$this->start_controls_section('section_ctas', [
			'label' => 'Call to Actions',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('cta_primary_text', [
			'label' => 'Primary CTA Text',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Order Wolfmotion',
		]);
		$this->add_control('cta_primary_link', [
			'label' => 'Primary CTA Link',
			'type' => \Elementor\Controls_Manager::URL,
			'default' => ['url' => '#product'],
		]);
		$this->add_control('cta_secondary_text', [
			'label' => 'Secondary CTA Text',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Watch demo',
		]);
		$this->add_control('cta_secondary_link', [
			'label' => 'Secondary CTA Link',
			'type' => \Elementor\Controls_Manager::URL,
			'default' => ['url' => '#features'],
		]);
		$this->end_controls_section();

		// --- Content: Micro Trust ---
		$this->start_controls_section('section_micro', [
			'label' => 'Micro Trust Items',
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
				['text' => 'Ships worldwide'],
				['text' => '2-year warranty'],
			],
			'title_field' => '{{{ text }}}',
		]);
		$this->end_controls_section();

		// --- Content: Video ---
		$this->start_controls_section('section_video', [
			'label' => 'Video / Image Preview',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('show_video', [
			'label' => 'Show Video Section',
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'default' => 'yes',
		]);
		$this->add_control('video_image', [
			'label' => 'Preview Image',
			'type' => \Elementor\Controls_Manager::MEDIA,
			'default' => ['url' => get_stylesheet_directory_uri() . '/assets/images/hero-vr.jpg'],
			'condition' => ['show_video' => 'yes'],
		]);
		$this->add_control('video_caption', [
			'label' => 'Caption Text',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Live demo · 01:24',
			'condition' => ['show_video' => 'yes'],
		]);
		$this->add_control('show_play_button', [
			'label' => 'Show Play Button',
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'default' => 'yes',
			'condition' => ['show_video' => 'yes'],
		]);
		$this->end_controls_section();

		// --- Style: Colors ---
		$this->start_controls_section('section_style_colors', [
			'label' => 'Colors',
			'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		]);
		$this->add_control('accent_color', [
			'label' => 'Accent Color',
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => '#2b7fff',
		]);
		$this->add_control('accent_secondary', [
			'label' => 'Secondary Accent',
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => '#00b8db',
		]);
		$this->add_control('subtitle_color', [
			'label' => 'Subtitle Color',
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => '',
			'selectors' => ['{{WRAPPER}} .wm-hero__sub' => 'color: {{VALUE}};'],
		]);
		$this->end_controls_section();

		// --- Style: Spacing ---
		$this->start_controls_section('section_style_spacing', [
			'label' => 'Spacing',
			'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		]);
		$this->add_responsive_control('section_padding_top', [
			'label' => 'Padding Top',
			'type' => \Elementor\Controls_Manager::SLIDER,
			'range' => ['px' => ['min' => 60, 'max' => 300]],
			'default' => ['size' => 140, 'unit' => 'px'],
			'selectors' => ['{{WRAPPER}} .wm-hero' => 'padding-top: {{SIZE}}px;'],
		]);
		$this->add_responsive_control('min_height', [
			'label' => 'Minimum Height',
			'type' => \Elementor\Controls_Manager::SELECT,
			'options' => ['100vh' => 'Full Screen', '80vh' => '80vh', '60vh' => '60vh', 'auto' => 'Auto'],
			'default' => '100vh',
			'selectors' => ['{{WRAPPER}} .wm-hero' => 'min-height: {{VALUE}};'],
		]);
		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		$check_svg = '<svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12l5 5L20 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
		$arrow_svg = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
		$play_svg = '<svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7L8 5z"/></svg>';
		$logo_url = !empty($s['logo_image']['url']) ? $s['logo_image']['url'] : '';
		$float_class = $s['show_logo_float'] === 'yes' ? '' : 'style="animation:none;"';
		?>
		<section class="wm-hero wm-section" id="top">

			<?php if (!empty($s['badge_text'])) : ?>
			<div class="wm-pill">
				<?php if ($s['show_badge_dot'] === 'yes') : ?><span class="wm-dot-pulse"></span><?php endif; ?>
				<?php echo esc_html($s['badge_text']); ?>
			</div>
			<?php endif; ?>

			<?php if ($logo_url) : ?>
			<div class="wm-hero__logo-wrap" <?php echo $float_class; ?>>
				<?php if ($s['show_logo_glow'] !== 'yes') echo '<style>.wm-hero__logo-wrap::before{display:none}</style>'; ?>
				<img src="<?php echo esc_url($logo_url); ?>" alt="Wolfmotion">
			</div>
			<?php endif; ?>

			<h1 class="wm-h-display wm-h1">
				<span class="wm-gradient-text"><?php echo esc_html($s['title_line_1']); ?></span><br>
				<span class="wm-accent-text"><?php echo esc_html($s['title_line_2']); ?></span>
			</h1>

			<p class="wm-hero__sub"><?php echo esc_html($s['subtitle']); ?></p>

			<div class="wm-hero__cta-row">
				<?php if (!empty($s['cta_primary_text'])) : ?>
				<a href="<?php echo esc_url($s['cta_primary_link']['url'] ?? '#'); ?>" class="wm-btn wm-btn--primary wm-btn--lg">
					<?php echo esc_html($s['cta_primary_text']); ?> <?php echo $arrow_svg; ?>
				</a>
				<?php endif; ?>
				<?php if (!empty($s['cta_secondary_text'])) : ?>
				<a href="<?php echo esc_url($s['cta_secondary_link']['url'] ?? '#'); ?>" class="wm-btn wm-btn--ghost wm-btn--lg">
					<?php echo $play_svg; ?> <?php echo esc_html($s['cta_secondary_text']); ?>
				</a>
				<?php endif; ?>
			</div>

			<?php if (!empty($s['micro_items'])) : ?>
			<div class="wm-hero__micro">
				<?php foreach ($s['micro_items'] as $item) : ?>
				<span><?php echo $check_svg; ?> <?php echo esc_html($item['text']); ?></span>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>

			<?php if ($s['show_video'] === 'yes') : ?>
			<div class="wm-hero__video">
				<?php if (!empty($s['video_image']['url'])) : ?>
				<img src="<?php echo esc_url($s['video_image']['url']); ?>" alt="VR demonstration">
				<?php endif; ?>
				<?php if ($s['show_play_button'] === 'yes') : ?>
				<div class="wm-hero__play">
					<button class="wm-hero__play-btn" aria-label="Play video">
						<svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor" style="margin-left:4px"><path d="M8 5v14l11-7L8 5z"/></svg>
					</button>
				</div>
				<?php endif; ?>
				<?php if (!empty($s['video_caption'])) : ?>
				<div class="wm-hero__video-caption">
					<span class="wm-dot-rec"></span> <?php echo esc_html($s['video_caption']); ?>
				</div>
				<?php endif; ?>
			</div>
			<?php endif; ?>

		</section>
		<?php
	}
}
