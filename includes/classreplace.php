<?php
if(!is_admin()){
add_action('wp_head','avatarshaper_styles');
add_filter('get_avatar', 'ashaper_class', 1, 5);
$shapeoptionholder  = get_option('shapeid', 1);
$shadowoptionholder = get_option('shadowenable', 1);
$glossoptionholder  = get_option('gloss', 1);
}
if (strlen(strstr($agent, "Firefox")) == null) {
    $browserfirefox = false;
}
function ashaper_class($avatar, $id_or_email, $size, $default, $alt) {
    if (get_option('custommeathod', 0) == 0) {
        global $shapeoptionholder, $shadowoptionholder, $glossoptionholder, $browserfirefox;
        if ($size > 16) {
            $avatar = str_replace("class='", "class='image-preview ", $avatar);
            if ($browserfirefox == false) {
                if ($shadowoptionholder == 1) {
                    $shadowcode = '<div class="shadow-holder"></div>';
                }
                if ($glossoptionholder == 1) {
                    $glosscode = '<div class="cut-gloss"><div class="add-gloss"></div></div>';
                }
            }
            $avatar = '<div class="avatar" style="height: ' . $size . 'px; width: ' . $size . 'px;">' . $avatar . $glosscode . $shadowcode . '</div>';
        }
    }
    return $avatar;
}
function avatar_shaper($id_or_email, $size = 96, $default = NULL, $alt = false) {
    $temphtml = get_avatar($id_or_email, $size, $default, $alt);
    if (get_option('custommeathod', 0) != 0) {
        global $shapeoptionholder, $shadowoptionholder, $glossoptionholder, $browserfirefox;
        if ($size > 16) {
            $temphtml = str_replace("class='", "class='image-preview ", $temphtml);
            if ($browserfirefox == false) {
                if ($shadowoptionholder == 1) {
                    $shadowcode = '<div class="shadow-holder"></div>';
                }
                if ($glossoptionholder == 1) {
                    $glosscode = '<div class="cut-gloss"><div class="add-gloss"></div></div>';
                }
            }
            $temphtml = '<div class="avatar" style="height: ' . $size . 'px; width: ' . $size . 'px;">' . $temphtml . $glosscode . $shadowcode . '</div>';
        }
    }
    return $temphtml;
}
?>