<?php
if ( ! defined('ABSPATH')) exit;

class WolfMotion_Product_Widget extends \Elementor\Widget_Base {

	public function get_name() { return 'wolfmotion_product'; }
	public function get_title() { return 'WM - Product Picker'; }
	public function get_icon() { return 'eicon-products'; }
	public function get_categories() { return ['wolfmotion']; }
	public function get_keywords() { return ['product', 'shop', 'pricing', 'tracker']; }

	protected function register_controls() {

		// --- Product Info ---
		$this->start_controls_section('section_info', [
			'label' => 'Product Info',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('eyebrow', [
			'label' => 'Eyebrow',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'The Kit',
		]);
		$this->add_control('product_title', [
			'label' => 'Product Title',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Wolfmotion',
		]);
		$this->add_control('product_title_accent', [
			'label' => 'Title Accent Part',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'FBT Kit',
		]);
		$this->add_control('review_score', [
			'label' => 'Review Score',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => '4.9',
		]);
		$this->add_control('review_count', [
			'label' => 'Review Count',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => '1,270 verified reviews',
		]);
		$this->add_control('tagline', [
			'label' => 'Tagline',
			'type' => \Elementor\Controls_Manager::TEXTAREA,
			'default' => 'Trackers designed for full-body VR immersion. Hand-built, SlimeVR-native, and ready out of the box.',
		]);
		$this->end_controls_section();

		// --- Product Image ---
		$this->start_controls_section('section_visual', [
			'label' => 'Product Visual',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('product_image', [
			'label' => 'Product Image',
			'type' => \Elementor\Controls_Manager::MEDIA,
			'default' => ['url' => get_stylesheet_directory_uri() . '/assets/images/tracker.png'],
		]);
		$this->add_control('badge_stock', [
			'label' => 'Stock Badge Text',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Limited stock · 214 units',
		]);
		$this->add_control('show_new_badge', [
			'label' => 'Show New Badge',
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'default' => 'yes',
		]);
		$this->end_controls_section();

		// --- Packs ---
		$this->start_controls_section('section_packs', [
			'label' => 'Pack Options',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('packs', [
			'label' => 'Packs',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => [
				['name' => 'name', 'label' => 'Name', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Pack'],
				['name' => 'desc', 'label' => 'Description', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Pack description.'],
				['name' => 'price', 'label' => 'Price', 'type' => \Elementor\Controls_Manager::NUMBER, 'default' => 199],
				['name' => 'old_price', 'label' => 'Old Price', 'type' => \Elementor\Controls_Manager::NUMBER, 'default' => 249],
				['name' => 'popular', 'label' => 'Most Popular', 'type' => \Elementor\Controls_Manager::SWITCHER, 'default' => ''],
				['name' => 'selected', 'label' => 'Default Selected', 'type' => \Elementor\Controls_Manager::SWITCHER, 'default' => ''],
			],
			'default' => [
				['name' => 'Starter · 6 trackers', 'desc' => 'Basic body points — legs, hips, chest.', 'price' => 199, 'old_price' => 249, 'popular' => '', 'selected' => ''],
				['name' => 'Advanced · 8 trackers', 'desc' => 'Enhanced tracking with elbows for precision.', 'price' => 299, 'old_price' => 349, 'popular' => '', 'selected' => ''],
				['name' => 'Full-body · 10 trackers', 'desc' => 'Complete immersion — shoulders, hands, feet.', 'price' => 399, 'old_price' => 449, 'popular' => 'yes', 'selected' => 'yes'],
			],
			'title_field' => '{{{ name }}}',
		]);
		$this->end_controls_section();

		// --- Colors ---
		$this->start_controls_section('section_colors', [
			'label' => 'Color Swatches',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('show_swatches', [
			'label' => 'Show Color Swatches',
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'default' => 'yes',
		]);
		$this->add_control('default_color', [
			'label' => 'Default Color',
			'type' => \Elementor\Controls_Manager::SELECT,
			'options' => ['black' => 'Cosmic Black', 'white' => 'Arctic White', 'blue' => 'Aurora Blue'],
			'default' => 'black',
		]);
		$this->end_controls_section();

		// --- CTA ---
		$this->start_controls_section('section_cta', [
			'label' => 'CTA Button',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('cta_text', [
			'label' => 'CTA Text',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Add to cart',
		]);
		$this->add_control('show_quantity', [
			'label' => 'Show Quantity Stepper',
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'default' => 'yes',
		]);
		$this->add_control('shipping_note', [
			'label' => 'Shipping Note',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Ships in 3–5 days',
		]);
		$this->end_controls_section();

		// --- Trust ---
		$this->start_controls_section('section_trust', [
			'label' => 'Trust Items',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('trust_items', [
			'label' => 'Trust Items',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => [
				['name' => 'label', 'label' => 'Label', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Trust'],
				['name' => 'icon', 'label' => 'Icon', 'type' => \Elementor\Controls_Manager::SELECT, 'default' => 'shield',
					'options' => ['shield' => 'Shield', 'truck' => 'Truck', 'package' => 'Package']],
			],
			'default' => [
				['label' => 'Quality tested', 'icon' => 'shield'],
				['label' => 'Free shipping', 'icon' => 'truck'],
				['label' => 'Complete kit', 'icon' => 'package'],
			],
			'title_field' => '{{{ label }}}',
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
		$this->end_controls_section();
	}

	private function get_trust_icon($icon) {
		switch ($icon) {
			case 'shield': return '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 3l8 3v6c0 5-3.5 8.5-8 9-4.5-.5-8-4-8-9V6l8-3z"/><path d="M9 12l2 2 4-4"/></svg>';
			case 'truck': return '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 7h11v10H3zM14 10h4l3 3v4h-7"/><circle cx="7" cy="17" r="2"/><circle cx="17" cy="17" r="2"/></svg>';
			case 'package': return '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 7l9-4 9 4v10l-9 4-9-4V7z"/><path d="M3 7l9 4 9-4M12 11v10"/></svg>';
			default: return '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9"/></svg>';
		}
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		$arrow_svg = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
		$star_svg = '<svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.1 6.3 7 1-5 4.9 1.2 6.9L12 17.8l-6.3 3.3L7 14.2l-5-4.9 7-1L12 2z"/></svg>';
		$check_svg = '<svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 12l5 5L20 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';

		// Find default selected pack
		$default_pack = null;
		foreach ($s['packs'] as $p) {
			if ($p['selected'] === 'yes') { $default_pack = $p; break; }
		}
		if (!$default_pack && !empty($s['packs'])) $default_pack = end($s['packs']);
		$def_color = $s['default_color'];
		$color_labels = ['black' => 'Cosmic Black', 'white' => 'Arctic White', 'blue' => 'Aurora Blue'];
		?>
		<section class="wm-section" id="product">
			<div class="wm-container">
				<div class="wm-product wm-reveal">

					<!-- Visual -->
					<div class="wm-product__visual">
						<div class="wm-product__badges">
							<?php if (!empty($s['badge_stock'])) : ?>
							<span class="wm-badge-mini wm-badge-mini--stock"><?php echo esc_html($s['badge_stock']); ?></span>
							<?php endif; ?>
							<?php if ($s['show_new_badge'] === 'yes') : ?>
							<span class="wm-badge-mini wm-badge-mini--new">New</span>
							<?php endif; ?>
						</div>
						<div class="wm-product__img-holder">
							<?php if (!empty($s['product_image']['url'])) : ?>
							<img src="<?php echo esc_url($s['product_image']['url']); ?>" alt="Wolfmotion trackers">
							<?php endif; ?>
						</div>
						<div class="wm-product__nav-dots">
							<?php for ($i = 0; $i < 4; $i++) : ?>
							<button class="wm-dot-btn<?php echo $i === 0 ? ' wm-active' : ''; ?>" aria-label="view <?php echo $i + 1; ?>"></button>
							<?php endfor; ?>
						</div>
					</div>

					<!-- Info -->
					<div class="wm-product__info">
						<span class="wm-eyebrow"><?php echo esc_html($s['eyebrow']); ?></span>
						<h1 class="wm-h-display wm-product-title" style="font-size:clamp(36px,4.5vw,56px);letter-spacing:-0.035em;">
							<?php echo esc_html($s['product_title']); ?> <span class="wm-accent-text"><?php echo esc_html($s['product_title_accent']); ?></span>
						</h1>

						<div class="wm-product__reviews">
							<span class="wm-stars"><?php for ($i = 0; $i < 5; $i++) echo $star_svg; ?></span>
							<span style="font-weight:600;color:#fff"><?php echo esc_html($s['review_score']); ?></span>
							<span>·</span>
							<span><?php echo esc_html($s['review_count']); ?></span>
						</div>

						<?php if ($default_pack) : ?>
						<div class="wm-product__price">
							<span class="wm-big">$<?php echo esc_html($default_pack['price']); ?></span>
							<span class="wm-old">$<?php echo esc_html($default_pack['old_price']); ?></span>
							<span class="wm-save">Save $<?php echo intval($default_pack['old_price']) - intval($default_pack['price']); ?></span>
						</div>
						<?php endif; ?>

						<p class="wm-product__tagline"><?php echo esc_html($s['tagline']); ?></p>

						<span class="wm-product__label">Choose your pack</span>
						<div class="wm-packs">
							<?php foreach ($s['packs'] as $pack) : ?>
							<div class="wm-pack<?php echo $pack['selected'] === 'yes' ? ' wm-selected' : ''; ?>" data-price="<?php echo esc_attr($pack['price']); ?>" data-old-price="<?php echo esc_attr($pack['old_price']); ?>">
								<?php if ($pack['popular'] === 'yes') : ?>
								<span class="wm-pack__tag">Most popular</span>
								<?php endif; ?>
								<div class="wm-pack__radio"></div>
								<div class="wm-pack__info">
									<h4><?php echo esc_html($pack['name']); ?></h4>
									<p><?php echo esc_html($pack['desc']); ?></p>
								</div>
								<div class="wm-pack__price">$<?php echo esc_html($pack['price']); ?></div>
							</div>
							<?php endforeach; ?>
						</div>

						<?php if ($s['show_swatches'] === 'yes') : ?>
						<span class="wm-product__label">Color — <span class="wm-color-label-text"><?php echo esc_html($color_labels[$def_color] ?? 'Cosmic Black'); ?></span></span>
						<div class="wm-swatches">
							<?php foreach (['black' => 'Cosmic Black', 'white' => 'Arctic White', 'blue' => 'Aurora Blue'] as $key => $label) : ?>
							<div class="wm-swatch wm-swatch--<?php echo $key; ?><?php echo $key === $def_color ? ' wm-selected' : ''; ?>" data-label="<?php echo esc_attr($label); ?>">
								<div class="wm-swatch__inner"></div>
								<div class="wm-swatch__check"><?php echo $check_svg; ?></div>
							</div>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>

						<?php if ($s['show_quantity'] === 'yes') : ?>
						<div class="wm-quantity-row">
							<span class="wm-product__label" style="margin-bottom:0">Quantity</span>
							<div class="wm-qty">
								<button data-action="dec" aria-label="decrease">−</button>
								<span>1</span>
								<button data-action="inc" aria-label="increase">+</button>
							</div>
							<?php if (!empty($s['shipping_note'])) : ?>
							<span style="font-size:13px;color:var(--wm-fg-3)"><?php echo esc_html($s['shipping_note']); ?></span>
							<?php endif; ?>
						</div>
						<?php endif; ?>

						<button class="wm-btn wm-btn--glow wm-btn--lg wm-product__cta">
							<?php echo esc_html($s['cta_text']); ?> — $<?php echo esc_html($default_pack['price'] ?? '399'); ?> <?php echo $arrow_svg; ?>
						</button>

						<?php if (!empty($s['trust_items'])) : ?>
						<div class="wm-product__trust">
							<?php foreach ($s['trust_items'] as $trust) : ?>
							<div class="wm-trust-item">
								<span class="wm-trust-item__icon"><?php echo $this->get_trust_icon($trust['icon']); ?></span>
								<span class="wm-trust-item__label"><?php echo esc_html($trust['label']); ?></span>
							</div>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
		<?php
	}
}
