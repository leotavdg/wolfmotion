<?php
if ( ! defined('ABSPATH')) exit;

class WolfMotion_Ticker_Widget extends \Elementor\Widget_Base {

	public function get_name() { return 'wolfmotion_ticker'; }
	public function get_title() { return 'WM - Partner Ticker'; }
	public function get_icon() { return 'eicon-slider-push'; }
	public function get_categories() { return ['wolfmotion']; }
	public function get_keywords() { return ['ticker', 'marquee', 'logos', 'partners']; }

	protected function register_controls() {
		$this->start_controls_section('section_content', [
			'label' => 'Ticker Items',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control('name', [
			'label' => 'Name',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Platform',
		]);
		$this->add_control('items', [
			'label' => 'Items',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => $repeater->get_controls(),
			'default' => [
				['name' => 'VRChat'],
				['name' => 'SteamVR'],
				['name' => 'SlimeVR'],
				['name' => 'Meta Quest'],
				['name' => 'Valve Index'],
				['name' => 'HTC Vive'],
				['name' => 'VARJO'],
				['name' => 'Pico'],
			],
			'title_field' => '{{{ name }}}',
		]);
		$this->end_controls_section();

		$this->start_controls_section('section_style', [
			'label' => 'Style',
			'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		]);
		$this->add_control('speed', [
			'label' => 'Animation Duration (s)',
			'type' => \Elementor\Controls_Manager::SLIDER,
			'range' => ['px' => ['min' => 10, 'max' => 120]],
			'default' => ['size' => 30],
			'selectors' => ['{{WRAPPER}} .wm-ticker__inner' => 'animation-duration: {{SIZE}}s;'],
		]);
		$this->add_control('text_color', [
			'label' => 'Text Color',
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => '',
			'selectors' => ['{{WRAPPER}} .wm-ticker__item' => 'color: {{VALUE}};'],
		]);
		$this->add_control('font_size', [
			'label' => 'Font Size',
			'type' => \Elementor\Controls_Manager::SLIDER,
			'range' => ['px' => ['min' => 14, 'max' => 40]],
			'default' => ['size' => 22],
			'selectors' => ['{{WRAPPER}} .wm-ticker__item' => 'font-size: {{SIZE}}px;'],
		]);
		$this->add_control('border_color', [
			'label' => 'Border Color',
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => '',
			'selectors' => ['{{WRAPPER}} .wm-ticker' => 'border-color: {{VALUE}};'],
		]);
		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		$items = $s['items'] ?? [];
		$globe_svg = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a14 14 0 010 18M12 3a14 14 0 000 18"/></svg>';
		?>
		<div class="wm-section" style="padding:0;">
			<div class="wm-container">
				<div class="wm-ticker">
					<div class="wm-ticker__inner">
						<?php
						// Double items for infinite scroll effect
						$all = array_merge($items, $items);
						foreach ($all as $item) : ?>
						<div class="wm-ticker__item">
							<?php echo $globe_svg; ?>
							<?php echo esc_html($item['name']); ?>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
