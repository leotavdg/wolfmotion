<?php
if ( ! defined('ABSPATH')) exit;

class WolfMotion_Footer_Widget extends \Elementor\Widget_Base {

	public function get_name() { return 'wolfmotion_footer'; }
	public function get_title() { return 'WM - Footer'; }
	public function get_icon() { return 'eicon-footer'; }
	public function get_categories() { return ['wolfmotion']; }
	public function get_keywords() { return ['footer', 'bottom', 'links', 'social']; }

	protected function register_controls() {

		// --- Brand ---
		$this->start_controls_section('section_brand', [
			'label' => 'Brand',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('logo_image', [
			'label' => 'Logo',
			'type' => \Elementor\Controls_Manager::MEDIA,
			'default' => ['url' => get_stylesheet_directory_uri() . '/assets/images/wolf-logo.png'],
		]);
		$this->add_control('brand_name', [
			'label' => 'Brand Name',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Wolfmotion',
		]);
		$this->add_control('brand_description', [
			'label' => 'Description',
			'type' => \Elementor\Controls_Manager::TEXTAREA,
			'default' => 'Hand-built full-body tracking for VR — designed for dancers, performers, and creators who want their avatar to move like they do.',
		]);
		$this->end_controls_section();

		// --- Social ---
		$this->start_controls_section('section_social', [
			'label' => 'Social Links',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('discord_url', [
			'label' => 'Discord URL', 'type' => \Elementor\Controls_Manager::URL, 'default' => ['url' => '#'],
		]);
		$this->add_control('twitter_url', [
			'label' => 'Twitter/X URL', 'type' => \Elementor\Controls_Manager::URL, 'default' => ['url' => '#'],
		]);
		$this->add_control('youtube_url', [
			'label' => 'YouTube URL', 'type' => \Elementor\Controls_Manager::URL, 'default' => ['url' => '#'],
		]);
		$this->add_control('github_url', [
			'label' => 'GitHub URL', 'type' => \Elementor\Controls_Manager::URL, 'default' => ['url' => '#'],
		]);
		$this->end_controls_section();

		// --- Column 1 ---
		$this->start_controls_section('section_col1', [
			'label' => 'Column 1 - Product',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('col1_title', [
			'label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Product',
		]);
		$repeater_col1 = new \Elementor\Repeater();
		$repeater_col1->add_control('text', [
			'label' => 'Text',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Link',
		]);
		$repeater_col1->add_control('url', [
			'label' => 'URL',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => '#',
		]);
		$this->add_control('col1_links', [
			'label' => 'Links',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => $repeater_col1->get_controls(),
			'default' => [
				['text' => 'Features', 'url' => '#features'],
				['text' => 'Specifications', 'url' => '#product'],
				['text' => 'Compatibility', 'url' => '#compatibility'],
				['text' => 'Pricing', 'url' => '#product'],
			],
			'title_field' => '{{{ text }}}',
		]);
		$this->end_controls_section();

		// --- Column 2 ---
		$this->start_controls_section('section_col2', [
			'label' => 'Column 2 - Support',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('col2_title', [
			'label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Support',
		]);
		$repeater_col2 = new \Elementor\Repeater();
		$repeater_col2->add_control('text', [
			'label' => 'Text',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Link',
		]);
		$repeater_col2->add_control('url', [
			'label' => 'URL',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => '#',
		]);
		$this->add_control('col2_links', [
			'label' => 'Links',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => $repeater_col2->get_controls(),
			'default' => [
				['text' => 'Documentation', 'url' => '#'],
				['text' => 'FAQ', 'url' => '#faq'],
				['text' => 'Setup guide', 'url' => '#'],
				['text' => 'Contact', 'url' => '#'],
			],
			'title_field' => '{{{ text }}}',
		]);
		$this->end_controls_section();

		// --- Column 3 ---
		$this->start_controls_section('section_col3', [
			'label' => 'Column 3 - Community',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('col3_title', [
			'label' => 'Title', 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Community',
		]);
		$repeater_col3 = new \Elementor\Repeater();
		$repeater_col3->add_control('text', [
			'label' => 'Text',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Link',
		]);
		$repeater_col3->add_control('url', [
			'label' => 'URL',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => '#',
		]);
		$this->add_control('col3_links', [
			'label' => 'Links',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => $repeater_col3->get_controls(),
			'default' => [
				['text' => 'Discord', 'url' => '#'],
				['text' => 'Blog', 'url' => '#'],
				['text' => 'Reviews', 'url' => '#'],
				['text' => 'Creators', 'url' => '#'],
			],
			'title_field' => '{{{ text }}}',
		]);
		$this->end_controls_section();

		// --- Bottom ---
		$this->start_controls_section('section_bottom', [
			'label' => 'Bottom Bar',
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]);
		$this->add_control('copyright', [
			'label' => 'Copyright Text',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => '© 2026 Wolfmotion — hand-built for VR.',
		]);
		$repeater_bottom = new \Elementor\Repeater();
		$repeater_bottom->add_control('text', [
			'label' => 'Text',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => 'Link',
		]);
		$repeater_bottom->add_control('url', [
			'label' => 'URL',
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => '#',
		]);
		$this->add_control('bottom_links', [
			'label' => 'Bottom Links',
			'type' => \Elementor\Controls_Manager::REPEATER,
			'fields' => $repeater_bottom->get_controls(),
			'default' => [
				['text' => 'Privacy', 'url' => '#'],
				['text' => 'Terms', 'url' => '#'],
				['text' => 'Returns', 'url' => '#'],
			],
			'title_field' => '{{{ text }}}',
		]);
		$this->end_controls_section();

		// --- Style ---
		$this->start_controls_section('section_style', [
			'label' => 'Style',
			'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		]);
		$this->add_control('bg_color', [
			'label' => 'Background Color',
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => '#04071a',
			'selectors' => ['{{WRAPPER}} .wm-footer' => 'background-color: {{VALUE}};'],
		]);
		$this->add_control('text_color', [
			'label' => 'Text Color',
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => '',
			'selectors' => ['{{WRAPPER}} .wm-footer' => 'color: {{VALUE}};'],
		]);
		$this->end_controls_section();
	}

	protected function render() {
		$s = $this->get_settings_for_display();
		$discord_svg = '<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M19 5a16 16 0 00-4-1l-.2.4A12 12 0 0012 4c-1 0-1.9.1-2.8.4L9 4a16 16 0 00-4 1C2 9 2 13 3 17l.1.2a16 16 0 004.4 2l.9-1.2-1.6-.8.4-.3c3 1.4 6.4 1.4 9.4 0l.4.3-1.6.8.9 1.2a16 16 0 004.4-2l.1-.2c1-4 1-8-2-12zM9 14c-.8 0-1.5-.8-1.5-1.8S8.2 10.4 9 10.4s1.5.8 1.5 1.8S9.8 14 9 14zm6 0c-.8 0-1.5-.8-1.5-1.8s.7-1.8 1.5-1.8 1.5.8 1.5 1.8S15.8 14 15 14z"/></svg>';
		$twitter_svg = '<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M18 3h3l-7 8 8 10h-6l-5-6-6 6H2l7-8L2 3h7l4 6 5-6z"/></svg>';
		$youtube_svg = '<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M22 8a3 3 0 00-2-2c-2-.5-8-.5-8-.5s-6 0-8 .5a3 3 0 00-2 2C1.5 10 1.5 12 1.5 12s0 2 .5 4a3 3 0 002 2c2 .5 8 .5 8 .5s6 0 8-.5a3 3 0 002-2c.5-2 .5-4 .5-4s0-2-.5-4zM10 15V9l5 3-5 3z"/></svg>';
		$github_svg = '<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 00-3.2 19.5c.5.1.7-.2.7-.5v-1.7c-2.8.6-3.4-1.3-3.4-1.3-.5-1.2-1.2-1.5-1.2-1.5-.9-.6.1-.6.1-.6 1 .1 1.6 1.1 1.6 1.1.9 1.6 2.5 1.1 3.1.9.1-.7.4-1.1.7-1.4-2.2-.3-4.6-1.1-4.6-5 0-1.1.4-2 1-2.7-.1-.3-.4-1.3.1-2.7 0 0 .9-.3 2.8 1a9.7 9.7 0 015 0c1.9-1.3 2.8-1 2.8-1 .5 1.4.2 2.4.1 2.7.6.7 1 1.6 1 2.7 0 3.9-2.4 4.7-4.6 5 .4.3.7.9.7 1.9v2.8c0 .3.2.6.7.5A10 10 0 0012 2z"/></svg>';
		?>
		<footer class="wm-footer">
			<div class="wm-container">
				<div class="wm-footer__grid">
					<div>
						<div class="wm-footer__brand">
							<?php if (!empty($s['logo_image']['url'])) : ?>
							<img src="<?php echo esc_url($s['logo_image']['url']); ?>" alt="">
							<?php endif; ?>
							<?php echo esc_html($s['brand_name']); ?>
						</div>
						<p class="wm-footer__desc"><?php echo esc_html($s['brand_description']); ?></p>
						<div class="wm-footer__social">
							<?php if (!empty($s['discord_url']['url'])) : ?><a href="<?php echo esc_url($s['discord_url']['url']); ?>" aria-label="Discord"><?php echo $discord_svg; ?></a><?php endif; ?>
							<?php if (!empty($s['twitter_url']['url'])) : ?><a href="<?php echo esc_url($s['twitter_url']['url']); ?>" aria-label="Twitter"><?php echo $twitter_svg; ?></a><?php endif; ?>
							<?php if (!empty($s['youtube_url']['url'])) : ?><a href="<?php echo esc_url($s['youtube_url']['url']); ?>" aria-label="YouTube"><?php echo $youtube_svg; ?></a><?php endif; ?>
							<?php if (!empty($s['github_url']['url'])) : ?><a href="<?php echo esc_url($s['github_url']['url']); ?>" aria-label="GitHub"><?php echo $github_svg; ?></a><?php endif; ?>
						</div>
					</div>

					<?php
					$columns = [
						['title' => $s['col1_title'], 'links' => $s['col1_links']],
						['title' => $s['col2_title'], 'links' => $s['col2_links']],
						['title' => $s['col3_title'], 'links' => $s['col3_links']],
					];
					foreach ($columns as $col) : ?>
					<div>
						<h5><?php echo esc_html($col['title']); ?></h5>
						<ul>
							<?php foreach ($col['links'] as $link) : ?>
							<li><a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['text']); ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<?php endforeach; ?>
				</div>

				<div class="wm-footer__bottom">
					<div><?php echo esc_html($s['copyright']); ?></div>
					<?php if (!empty($s['bottom_links'])) : ?>
					<div class="wm-footer__bottom-links">
						<?php foreach ($s['bottom_links'] as $link) : ?>
						<a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['text']); ?></a>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</footer>
		<?php
	}
}
