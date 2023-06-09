<?php
  function get_blocks() {
    global $post;

    $fields = get_fields($post->ID);
    loop_blocks($fields);
  }

  function loop_blocks($blocks) {
    if (isset($blocks['blocks'])){
      if ($blocks['blocks']){
        foreach ($blocks['blocks'] as $key => $block) {
          switch ($block['acf_fc_layout']) {
            case 'global_block':
              if ($block['global_block']){
                $blocks = get_fields($block['global_block'][0]);
                loop_blocks($blocks);
              }
              break;
            case 'hero_section':
              include 'blocks/hero_section.php';
              break;
            case 'single_blurb':
              include 'blocks/single_blurb.php';
              break;
            case 'multi_blurbs_section':
              include 'blocks/multi_blurbs_section.php';
              break;
            case 'testimonials':
              include 'blocks/testimonials.php';
              break;
            case 'contact':
              include 'blocks/contact.php';
              break;
            
          }
        }
      }
    }
  }

?>