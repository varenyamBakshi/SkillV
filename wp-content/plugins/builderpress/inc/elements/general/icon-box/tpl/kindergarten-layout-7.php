<?php
/**
 * Template for displaying default template Icon Box element kindergarten-layout-7.
 *
 * This template can be overridden by copying it to yourtheme/builderpress/icon-box/kindergarten-layout-7.php.
 *
 * @author      ThimPress
 * @package     BuilderPress/Templates
 * @version     1.0.0
 * @author      Thimpress, leehld
 */

/**
 * Prevent loading this file directly
 */
defined('ABSPATH') || exit;

/**
 * @var $params array - shortcode params
 */
?>
<div class="icon-box<?php echo ( $icon_type == 'icon_ionicon' || $icon_type == 'icon_fontawesome' ) ? ' type-icon' : ''; ?>">
    <?php if ( isset($link['url']) ){ ?>
        <a href="<?php echo esc_url( $link['url'] ); ?>" class="icon-image"  <?php echo ent2ncr( $icon_css ); ?>>
            <span class="crop-image">
                <?php if ( $icon_type == 'icon_fontawesome' && $params['icon_fontawesome'] ) { ?>
                    <i class="<?php echo esc_attr( $params['icon_fontawesome'] ); ?>"></i>
                <?php } else if ( $icon_type == 'icon_ionicon' && $params['icon_ionicon'] ) { ?>
                    <i class="ionicons <?php echo esc_attr( $params['icon_ionicon'] ); ?>"></i>
                <?php } else if ( $icon_type == 'icon_upload' && $params['icon_upload'] ) {
                    echo wp_get_attachment_image( $params['icon_upload'], 'full' );
                } ?>
            </span>
        </a>
    <?php }else{?>
        <div class="icon-image" <?php echo ent2ncr( $icon_css ); ?>>
            <span class="crop-image">
                <?php if ( $icon_type == 'icon_fontawesome' && $params['icon_fontawesome'] ) { ?>
                    <i class="<?php echo esc_attr( $params['icon_fontawesome'] ); ?>"></i>
                <?php } else if ( $icon_type == 'icon_ionicon' && $params['icon_ionicon'] ) { ?>
                    <i class="ionicons <?php echo esc_attr( $params['icon_ionicon'] ); ?>"></i>
                <?php } else if ( $icon_type == 'icon_upload' && $params['icon_upload'] ) {
                    echo wp_get_attachment_image( $params['icon_upload'], 'full' );
                } ?>
            </span>
        </div>
    <?php } ?>
    <div class="content">
        <?php if ( $title ) { ?>
            <h3 class="title">
                <?php if(isset($link['url'])){ ?>
                    <a href="<?php echo esc_url( $link['url'] ); ?>" <?php echo ent2ncr( $title_css ); ?>><?php echo esc_html( $title ); ?></a>
                <?php }else{?>
                    <?php echo esc_html( $title ); ?>
                <?php } ?>
            </h3>
        <?php } ?>

        <?php if($description){ ?>
            <div class="description" <?php echo ent2ncr( $des_css ) ?>>
                <?php echo ent2ncr( $description ); ?>
            </div>
        <?php } ?>
    </div>
</div>
