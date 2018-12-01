<?php

$label = null;
$label_en = null;

if (is_post_type_archive() || is_single())
{

  $post_type = is_single() ? get_post_type_object( get_post_type() ) : get_queried_object();
  
  if ($post_type)
  {
    $label = $post_type->label;
    $label_en = strtoupper($post_type->name);
  }

}
elseif(is_tag())
{

  $term = get_queried_object();
  if ($term)
  {
    $label = '#' . $term->name;
  }

}

if( $label ):

?><div class="l-header_sub">
  <div class="header_sub-inner">
    <h2 class="header_sub-heading">
      <?php echo $label?>
      <?php if($label_en):?><span><?php echo $label_en?></span><?php endif?>
    </h2>
  </div>
</div>

<?php endif?>