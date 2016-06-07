<?php
add_action('admin_menu', 'ashaper_admin_adder');
add_action('admin_enqueue_scripts', 'avataroptions_enqueue_color_picker');
wp_register_style('registeravatarcss', plugins_url('stylesheet.css', __FILE__));
wp_register_style('registerjquerystyleavatar', plugins_url('jquery-ui.css', __FILE__));
add_action('admin_init', 'ashaper_register_options');
// adds the color picker code to determine which version of the color picker to display
function avataroptions_enqueue_color_picker($hook_suffix) {
    global $wp_version;
    if (wp_style_is('wp-color-picker', 'registered')) {
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');
    } else {
        wp_enqueue_style('farbtastic');
        wp_enqueue_script('farbtastic');
    }
    wp_enqueue_script('avataroptions-color-picker', plugins_url('scripts.js', __FILE__));
}
// adds the menu callback to display the content
function ashaper_admin_adder() {
    $page = 'avatar-shaper';
    add_options_page('Avatar Shaper', 'Avatar Shaper', 'administrator', $page, 'avatar_shaper_interface');
}
// displays the content for the settings menu
function avatar_shaper_interface() {
    wp_enqueue_script('slider-script', plugins_url('slider-script.js', __FILE__));
    wp_enqueue_style('registeravatarcss');
    $page = 'avatar-shaper';
    wp_enqueue_script('jquery');
    wp_enqueue_style('registerjquerystyleavatar');
?>
	<div class="wrap">
<?php
    screen_icon();
?>
<h2>Avatar Shaper</h2>
<div class="settings-wrapper">
	<form method="post" action="options.php">
<?php
    settings_fields($page);
    do_settings_sections($page);
    submit_button();
?> </form>
	</form>
</div>
<div class="example-view"><div class="avatar-padding" id="<?php
    $shapenames = array(
        '',
        '',
        '',
        'pentagon-mask',
        'hexagon-mask',
        'heptagon-mask',
        'octagon-mask',
        'nonagon-mask',
        'diamond-mask',
        'heart-mask',
        'burst-mask'
    );
    print $shapenames[get_option('shapeid', 1) - 1];
?>"><div class="cut-gloss" id="<?php
    $maskshapename = array(
        '',
        '',
        'halfgloss',
        'pentagonshape',
        'hexagonshape',
        'heptagonshape',
        'octagonshape',
        'nonagonshape',
        'diamondshape',
        'heartshape',
        'burstshape'
    );
    print $maskshapename[get_option('shapeid', 1) - 1];
?>"><div class="add-gloss"></div></div>
<img class="image-preview" src="<?php
    print plugins_url('avatar-resized.png', __FILE__);
?>" id="<?php
    $maskshapename = array(
        '',
        '',
        '',
        'pentagonshape',
        'hexagonshape',
        'heptagonshape',
        'octagonshape',
        'nonagonshape',
        'diamondshape',
        'heartshape',
        'burstshape'
    );
    print $maskshapename[get_option('shapeid', 1) - 1];
?>">
</div> 
</div>
</div>
<?php
}
function ashaper_register_options() {
    $page    = 'avatar-shaper';
    $section = 'ashaper_section';
    add_settings_section($section, '', 'ashaper_setting_title', $page);
    // option IDs
    $idholder   = array(
        'shapeid',
        'customslider',
        'shadowenable',
        'shadowcolor',
        'gloss',
        'custommeathod'
    );
    // display name IDs
    $nameholder = array(
        'Select Shape',
        'Custom Radius',
        'Enable Shadow',
        'Shadow Color',
        'Gloss',
        'Custom Meathod'
    );
    for ($i = 0; $i < count($idholder); $i++) {
        add_settings_field($idholder[$i], $nameholder[$i], $idholder[$i] . '_callback', $page, $section);
    }
    for ($i = 0; $i < count($idholder); $i++) {
        register_setting($page, $idholder[$i], $idholder[$i] . '_sanatize');
    }
}
// displays the three shape options ( square, circle and custom )
function shapeid_callback() {
    $html = '<input type="radio" id="square" class="radiobuttons"  name="shapeid" value="1" ' . checked(1, get_option('shapeid', 1), false) . '/>';
    $html .= '<label for="square">Curved Square</label>';
    $html .= '<input type="radio" id="circle" class="radiobuttons"  name="shapeid" value="2" ' . checked(2, get_option('shapeid', 1), false) . '/>';
    $html .= '<label for="circle">Circle</label>';
    $html .= '<input type="radio" id="custom" class="radiobuttons"  name="shapeid" value="3" ' . checked(3, get_option('shapeid', 1), false) . '/>';
    $html .= '<label for="custom">Custom</label>';
    $html .= '<input type="radio" id="pentagon" class="radiobuttons"  name="shapeid" value="4" ' . checked(4, get_option('shapeid', 1), false) . '/>';
    $html .= '<label for="pentagon">Pentagon</label>';
    $html .= '<input type="radio" id="hexagon"  class="radiobuttons"  name="shapeid" value="5" ' . checked(5, get_option('shapeid', 1), false) . '/>';
    $html .= '<label for="hexagon">Hexagon</label>';
    $html .= '<input type="radio" id="heptagon" class="radiobuttons"  name="shapeid" value="6" ' . checked(6, get_option('shapeid', 1), false) . '/>';
    $html .= '<label for="heptagon">Heptagon</label>';
    $html .= '<input type="radio" id="octagon"  class="radiobuttons"  name="shapeid" value="7" ' . checked(7, get_option('shapeid', 1), false) . '/>';
    $html .= '<label for="octagon">Octagon</label>';
    $html .= '<input type="radio" id="nonagon"  class="radiobuttons" name="shapeid" value="8" ' . checked(8, get_option('shapeid', 1), false) . '/>';
    $html .= '<label for="nonagon">Nonagon</label>';
    $html .= '<input type="radio" id="diamond"  class="radiobuttons" name="shapeid" value="9" ' . checked(9, get_option('shapeid', 1), false) . '/>';
    $html .= '<label for="diamond">Diamond</label>';
    $html .= '<input type="radio" id="heart" class="radiobuttons"  name="shapeid" value="10" ' . checked(10, get_option('shapeid', 1), false) . '/>';
    $html .= '<label for="heart">Heart</label>';
    $html .= '<input type="radio" id="burst"  class="radiobuttons" name="shapeid" value="11" ' . checked(11, get_option('shapeid', 1), false) . '/>';
    $html .= '<label for="burst">Burst</label>';
    print $html;
}
// displays the custom slider
function customslider_callback() {
    $html .= '<div id="slider"></div>';
    $html .= '<input type="hidden" id="customslider" name="customslider" value="' . get_option('customslider', 50) . '" />';
    print $html;
}
// displayed check box to enable/disable shadow
function shadowenable_callback() {
    $html .= '<input type="checkbox" id="shadowenable" name="shadowenable" value="1" ' . checked(1, get_option('shadowenable', 1), false) . '/>';
    print $html;
}
function shadowcolor_callback() {
    $html = '<input id="shadowcolor" name="shadowcolor" class="select_color" type="text" value="' . get_option('shadowcolor', '#ed8e00') . '" />
<div id="colorpicker"></div>';
    print $html;
}
function gloss_callback() {
    $html .= '<input type="checkbox" id="gloss" name="gloss" value="1" ' . checked(1, get_option('gloss', 1), false) . '/>';
    print $html;
}
function custommeathod_callback() {
    $html .= '<input type="checkbox" id="custommeathod" name="custommeathod" value="1" ' . checked(1, get_option('custommeathod', 0), false) . '/><i>This tells the plugin only to replace the avatars when you use the function avatar_shaper() instead of get_avatar() in your theme. (Recommended if you only want to change certain avatars)';
    print $html;
}
//Sanitization
function shapeid_sanatize($input) {
    return $input;
}
function customslider_sanatize($input) {
    if (!($input >= 0 && $input <= 50)) {
        $input = 0;
    }
    return $input;
}
function shadowenable_sanatize($input) {
    return $input;
}
function shadowcolor_sanatize($input) {
    if (!(preg_match('/^#[a-f0-9]{6}$/i', $input))) {
        $input = get_option('shadowcolor', '#ed8e00');
    }
    return $input;
}
function gloss_sanatize($input) {
    return $input;
}

function ashaper_setting_title() {
    echo 'Select Avatar Shaper Options';
}
function custommeathod_sanatize($input) {
    return $input;
}
?>