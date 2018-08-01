<?php

/* ----------------------------------------------------------

  ￼Customize

---------------------------------------------------------- */

add_theme_support('custom-background', array(
  'default-color'       => 'FFFFFF',
  'default-image'       => '',
  'wp-head-callback'    => '_cts_customize_css',
));

/* ----------------------------------------------------------

  Custom Colors

---------------------------------------------------------- */

function _cts_customize_css()
{

  $background = set_url_scheme( get_background_image() );

  $color = get_background_color();

  if ( $color === get_theme_support( 'custom-background', 'default-color' ) ) {
    $color = false;
  }

  if ( ! $background && ! $color ) {
    if ( is_customize_preview() ) {
      echo '<style type="text/css" id="custom-background-css"></style>';
    }
    return;
  }

  $style = $color ? "background-color: #$color;" : '';

  if ( $background ) {
    $image = ' background-image: url("' . esc_url_raw( $background ) . '");';

    // Background Position.
    $position_x = get_theme_mod( 'background_position_x', get_theme_support( 'custom-background', 'default-position-x' ) );
    $position_y = get_theme_mod( 'background_position_y', get_theme_support( 'custom-background', 'default-position-y' ) );

    if ( ! in_array( $position_x, array( 'left', 'center', 'right' ), true ) ) {
      $position_x = 'left';
    }

    if ( ! in_array( $position_y, array( 'top', 'center', 'bottom' ), true ) ) {
      $position_y = 'top';
    }

    $position = " background-position: $position_x $position_y;";

    // Background Size.
    $size = get_theme_mod( 'background_size', get_theme_support( 'custom-background', 'default-size' ) );

    if ( ! in_array( $size, array( 'auto', 'contain', 'cover' ), true ) ) {
      $size = 'auto';
    }

    $size = " background-size: $size;";

    // Background Repeat.
    $repeat = get_theme_mod( 'background_repeat', get_theme_support( 'custom-background', 'default-repeat' ) );

    if ( ! in_array( $repeat, array( 'repeat-x', 'repeat-y', 'repeat', 'no-repeat' ), true ) ) {
      $repeat = 'repeat';
    }

    $repeat = " background-repeat: $repeat;";

    // Background Scroll.
    $attachment = get_theme_mod( 'background_attachment', get_theme_support( 'custom-background', 'default-attachment' ) );

    if ( 'fixed' !== $attachment ) {
      $attachment = 'scroll';
    }

    $attachment = " background-attachment: $attachment;";

    $style .= $image . $position . $size . $repeat . $attachment;
  }
?>
<style type="text/css" id="custom-background-css">
body.theme-bg { <?php echo trim( $style ); ?> }
</style>
<?php
}
