<?php
if ( ! function_exists( 'trending_news_setup' ) ) :
	function trending_news_setup() {
		add_theme_support( "title-tag");
		add_theme_support( 'automatic-feed-links' );
		add_theme_support(
			'custom-background',
			apply_filters(
				'newspress_custom_background_args',
				array(
					'default-color' => '#f3f3f3',
					'default-image' => '',
				)
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'trending_news_setup' );


function trending_news_customizer_default_settings() {
	set_theme_mod( 'walkerpress_primary_color', '#03c361' );
	set_theme_mod('walkerpress_topbarbg_color', '#03c361' );
	set_theme_mod('walkerpress_secondary_color', '#a1f996' );
	set_theme_mod('walkerpress_container_width', '1920' );
	set_theme_mod('walkerpress_heading_five_size','20');
	set_theme_mod('walkerpress_heading_five_size','16');
	set_theme_mod('walkerpress_site_title_size','75');
	set_theme_mod('walkerpress_footer_background_color','#232323');
	set_theme_mod('walkerpress_heaer_bg_color','#000000');
	set_theme_mod('walkerpress_navigation_primary_color','#03c361');
	set_theme_mod('walkerpress_navigation_color','#ffffff');
	set_theme_mod('walkerpress_header_section_padding_top','60');
	set_theme_mod('walkerpress_header_section_padding_bottom','60');
	set_theme_mod('walkerpress_footer_section_padding_bottom','20');
	set_theme_mod('header_bg_opacity','0.40');
	set_theme_mod('walkerpress_heading_fonts','Poppins');
	set_theme_mod('walkerpress_site_title_fonts','Poppins');
	set_theme_mod('walkerpress_site_title_size','50');
	set_theme_mod('walkerpress_subheader_background_color','##e3e3e3');
	set_theme_mod('walkerpress_subheader_text_color','#676767');
	set_theme_mod('walkerpress_header_site_name_color','#03c361');
	set_theme_mod('walkerpress_header_text_color','#ffffff');
	set_theme_mod('walkerpress_home_boxes_padding','20');
	set_theme_mod('walkerpress_copyright_section_padding_bottom','35');
}
add_action( 'after_switch_theme', 'trending_news_customizer_default_settings' );

function trending_news_enqueue_scripts() {
    wp_enqueue_style( 'walkerpress-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'trending-news-style',get_stylesheet_directory_uri() . '/style.css',array('walkerpress-style'));
	wp_enqueue_script( 'trending-news-scripts', get_stylesheet_directory_uri() . '/js/trending-news-scripts.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'trending_news_enqueue_scripts' );

/*
* Unregister unused customizer section for theme
*/
function draftnews_unregister_extra_section( $wp_customize ) {
    $wp_customize->remove_section('walkerpress_trendingtags_options');
    $wp_customize->remove_control('latest_post_heading');
    $wp_customize->remove_control('popular_post_heading');
    $wp_customize->remove_control('focus_news_ticker_heading');
}
add_action( 'customize_register', 'draftnews_unregister_extra_section', 11 );

if(!function_exists('trending_news_footer_copyright')){
	function trending_news_footer_copyright(){?>
	<div class="walkerwp-wraper footer-copyright-wraper">
		<?php
		if(get_theme_mod('copyright_text_alignment') =='copyright-text-align-center'){
			$copyright_text_align_class ="text-center";
		}else{
			$copyright_text_align_class ="text-left";
		}
		$walkerpress_copyright = get_theme_mod('footer_copiright_text');
		?>

		<div class="walkerwp-container credit-container <?php echo esc_attr($copyright_text_align_class);?>">
			<?php
			$current_footer_layout = get_theme_mod('walkerpress_footer_layout','footer-layout-one');
			if($current_footer_layout=='footer-layout-three'){
				 
				if($walkerpress_copyright && walkerpress_set_to_premium() ){?>
				<div class="site-info <?php echo esc_attr($copyright_text_align_class);?>"><?php echo wp_kses_post($walkerpress_copyright);?></div>
			<?php } else{ ?>
				<div class="site-info">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'trending-news' ) ); ?>">
						<?php
						/* translators: %s: CMS name, i.e. WordPress. */
						printf( esc_html__( 'Proudly powered by %s', 'trending-news' ), 'WordPress' );
						?>
					</a>
					<span class="sep"> | </span>
						<?php
						/* translators: 1: Theme name, 2: Theme author. */
						printf( esc_html__( 'Theme: %1$s by %2$s.', 'trending-news' ), 'trending-news', '<a href="http://walkerwp.com/">WalkerWP</a>' );
						?>

				</div><!-- .site-info -->
			<?php } 
			if( get_theme_mod('footer_copyright_social_status','true')){?>
					<div class="footer-social-media"><?php walkerpress_header_social_media();?></div>
				<?php }
			}else{?>
				<div class="footer-social-media walkerwp-grid-12">
				<?php	
				if( get_theme_mod('footer_copyright_social_status','true')){
					walkerpress_header_social_media();
				}
				?>
				</div>
			<?php
				
			if($walkerpress_copyright && walkerpress_set_to_premium() ){?>
				<div class="site-info walkerwp-grid-12 <?php echo esc_attr($copyright_text_align_class);?>"><?php echo wp_kses_post($walkerpress_copyright);?></div>
			<?php } else{ ?>
				<div class="site-info walkerwp-grid-12">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'trending-news' ) ); ?>">
						<?php
						/* translators: %s: CMS name, i.e. WordPress. */
						printf( esc_html__( 'Proudly powered by %s', 'trending-news' ), 'WordPress' );
						?>
					</a>
					<span class="sep"> | </span>
						<?php
						/* translators: 1: Theme name, 2: Theme author. */
						printf( esc_html__( 'Theme: %1$s by %2$s.', 'trending-news' ), 'Trending News', '<a href="http://walkerwp.com/">WalkerWP</a>' );
						?>

				</div><!-- .site-info -->
			<?php } 
			}
			?>
			</div>
		</div>
<?php }
}