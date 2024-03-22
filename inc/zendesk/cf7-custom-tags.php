<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function register_custom_select_tag() {
	wpcf7_add_form_tag( array('select_and_icon', 'select_and_icon*'), 'custom_select_tag_handler', array('name-attr' => true) );
	wpcf7_add_form_tag( array('select_countries', 'select_countries*') , 'country_select_tag_handler', array('name-attr' => true) );
}
add_action( 'wpcf7_init', 'register_custom_select_tag' , 10, 0 );


function custom_select_tag_handler( $tag ) {
	$select_html = '<select name="' . esc_attr( $tag['name'] ) . '" data-index="select-' . esc_attr( $tag['name'] ) . '-1" class="converted-select">';
	
	$options = explode( ',', $tag['raw_values'][0] );
	// print_r( $options );
	foreach ( $options as $option ) {
		
			$option_parts = explode( '|', $option );
			$value = esc_attr( trim( $option_parts[0] ) );
			$label = esc_html( trim( $option_parts[0] ) ); 
			$attributes = isset( $option_parts[1] ) ? trim( $option_parts[1] ) : ''; 
			$select_html .= '<option value="' . $value . '" data-img="' . $attributes . '">' . $label . '</option>';
	}
	$select_html .= '</select>';

	return $select_html;
}


add_action('wpcf7_admin_init','csfcf7_select_and_icon_tag_generator');
function csfcf7_select_and_icon_tag_generator($post){
    if (!class_exists('WPCF7_TagGenerator')) {
        return;
    }
    $tag_generator = WPCF7_TagGenerator::get_instance();
    $tag_generator->add( 'select_and_icon', __( 'select_and_icon', 'select_and_icon-select-field-with-contact-form-7' ) , 'csfcf7_tag_generator_select_and_icon' );
}

function csfcf7_tag_generator_select_and_icon($contact_form, $args = '' ){

	$args = wp_parse_args( $args, array() );
	
	$wpcf7_contact_form = WPCF7_ContactForm::get_current();
	$contact_form_tags = $wpcf7_contact_form->scan_form_tags();
	$type = 'select_and_icon';
	$description = __( "Generate a form-tag for a select_and_icon select.", 'select_and_icon-select-field-with-contact-form-7' );
	?>
<div class="control-box">
  <fieldset>
    <legend><?php echo esc_attr($description); ?></legend>
    <table class="form-table">
      <tr>
        <th>
          <label
            for="<?php echo esc_attr( $args['content'] . '-filed_type' ); ?>"><?php echo esc_html( __( 'Field type', 'select_and_icon-select-field-with-contact-form-7' ) ); ?></label>
        </th>
        <td>
          <input type="checkbox" name="required" class=" required_files" required>
          <label><?php echo esc_html( __( 'Required Field', 'select_and_icon-select-field-with-contact-form-7' ) ); ?></label>
        </td>
      </tr>
      <tr>
        <th><?php echo esc_html( __( 'Name', 'select_and_icon-select-field-with-contact-form-7' ) ); ?></th>
        <td>
          <input type="text" name="name">
        </td>
      </tr>
      <tr>
        <th scope="row"><label
            for="<?php echo esc_attr( $args['content'] . '-id' ); ?>"><?php echo esc_html( __( 'Id Attribute', 'select_and_icon-select-field-with-contact-form-7' ) ); ?></label>
        </th>
        <td><input type="text" name="id" class="select_and_icon_id oneline option"
            id="<?php echo esc_attr( $args['content'] . '-id' ); ?>" /></td>
      </tr>
      <tr>
        <th scope="row"><label
            for="<?php echo esc_attr( $args['content'] . '-class' ); ?>"><?php echo esc_html( __( 'Class Attribute', 'select_and_icon-select-field-with-contact-form-7' ) ); ?></label>
        </th>
        <td><input type="text" name="class" class="select_and_icon_value oneline option"
            id="<?php echo esc_attr( $args['content'] . '-class' ); ?>" /></td>
      </tr>
      <tr>
        <th scope="row"><label
            for="<?php echo esc_attr( $args['content'] . '-select_custom_def' ); ?>"><?php echo esc_html( __( 'Default select_and_icon Attribute', 'select_and_icon-select-field-with-contact-form-7' ) ); ?></label>
        </th>
        <td><input type="text" name="select_custom_def" class="select_and_icon_select_custom_def oneline option"
            id="<?php echo esc_attr( $args['content'] . '-select_custom_def' ); ?>" /></td>
      </tr>

    </table>
  </fieldset>
</div>
<div class="insert-box">
  <input type="text" name="<?php echo esc_attr($type); ?>" class="tag code" readonly="readonly"
    onfocus="this.select()" />
  <div class="submitbox">
    <input type="button" class="button button-primary insert-tag"
      value="<?php echo esc_attr( __( 'Insert Tag', 'signature-field-with-contact-form-7' ) ); ?>" />
  </div>
  <br class="clear" />
  <p class="description mail-tag">
    <label
      for="<?php echo esc_attr( $args['content'] . '-mailtag' ); ?>"><?php echo sprintf( esc_html( __( "To use the value input through this field in a mail field, you need to insert the corresponding mail-tag (%s) into the field on the Mail tab.", 'select_and_icon-select-field-with-contact-form-7' ) ), '<strong><span class="mail-tag"></span></strong>' ); ?>
      <input type="text" class="mail-tag code hidden" readonly="readonly"
        id="<?php echo esc_attr( $args['content'] . '-mailtag' ); ?>" />
    </label>
  </p>
</div>
<?php
	}


function country_select_tag_handler( $tag ) {
	
	$select_html = '<select name="' . esc_attr( $tag['name'] ) . '" data-index="select-' . esc_attr( $tag['name'] ) . '-1" class="converted-select converted-select-countries select-search">';
	
	$countries = array(
  "*Country",
	"Albania",
	"Andorra",
	"Argentina",
	"Armenia",
	"Australia",
	"Austria",
	"Azerbaijan",
	"Bahrain",
	"Bangladesh",
	"Belarus",
	"Belgium",
	"Bosnia and Herzegovina",
	"Brazil",
	"Bulgaria",
	"Canada",
	"Chile",
	"Colombia",
	"Costa Rica",
	"Croatia",
	"Cyprus",
	"Czech Republic",
	"Denmark",
	"Dominican Republic",
	"Ecuador",
	"Egypt",
	"Estonia",
	"Finland",
	"France",
	"Georgia",
	"Germany",
	"Ghana",
	"Greece",
	"Hungary",
	"Iceland",
	"India",
	"Indonesia",
	"Iran",
	"Iraq",
	"Ireland",
	"Israel",
	"Italy",
	"Ivory Coast",
	"Japan",
	"Jordan",
	"Kazakhstan",
	"Kuwait",
	"Kyrgyzstan",
	"Latvia",
	"Lebanon",
	"Liechtenstein",
	"Lithuania",
	"Luxembourg",
	"Malaysia",
	"Malta",
	"Macedonia",
	"Mexico",
	"Moldova",
	"Monaco",
	"Mongolia",
	"Montenegro",
	"Morocco",
	"Netherlands",
	"New Zealand",
	"Nigeria",
	"Norway",
	"Pakistan",
	"Panama",
	"Paraguay",
	"Peru",
	"Philippines",
	"Poland",
	"Portugal",
	"Qatar",
	"Romania",
	"San Marino",
	"Saudi Arabia",
	"Serbia",
	"Singapore",
	"Slovakia",
	"Slovenia",
	"South Africa",
	"South Korea",
	"Spain",
	"Sri Lanka",
	"Sweden",
	"Switzerland",
	"Syria",
	"Tajikistan",
	"Thailand",
	"Tunisia",
	"Turkey",
	"Turkmenistan",
	"Ukraine",
	"United Arab Emirates",
	"United Kingdom",
	"United States of America",
	"Uruguay",
	"Uzbekistan",
	"Vatican City",
	"Vietnam"
	);
	// $options = explode( ',', $tag['raw_values'] );
	foreach ( $countries as $option ) {
		
			// $attributes = isset( $option_parts[1] ) ? trim( $option_parts[1] ) : ''; 
			$select_html .= '<option value="' . $option . '">' . $option . '</option>';
	}
	$select_html .= '</select>';

	return $select_html;
}


add_action('wpcf7_admin_init','csfcf7_select_countries_tag_generator');
function csfcf7_select_countries_tag_generator($post){
    if (!class_exists('WPCF7_TagGenerator')) {
        return;
    }
    $tag_generator = WPCF7_TagGenerator::get_instance();
    $tag_generator->add( 'select_countries', __( 'select_countries', 'select_countries-select-field-with-contact-form-7' ) , 'csfcf7_tag_generator_countries' );
}

function csfcf7_tag_generator_countries($contact_form, $args = '' ){

	$args = wp_parse_args( $args, array() );
	
	$wpcf7_contact_form = WPCF7_ContactForm::get_current();
	$contact_form_tags = $wpcf7_contact_form->scan_form_tags();
	$type = 'select_countries';
	$description = __( "Generate a form-tag for a select_countries select.", 'select_countries-select-field-with-contact-form-7' );
	?>
<div class="control-box">
  <fieldset>
    <legend><?php echo esc_attr($description); ?></legend>
    <table class="form-table">
      <tr>
        <th>
          <label
            for="<?php echo esc_attr( $args['content'] . '-filed_type' ); ?>"><?php echo esc_html( __( 'Field type', 'select_countries-select-field-with-contact-form-7' ) ); ?></label>
        </th>
        <td>
          <input type="checkbox" name="required" class=" required_files" required>
          <label><?php echo esc_html( __( 'Required Field', 'select_countries-select-field-with-contact-form-7' ) ); ?></label>
        </td>
      </tr>
      <tr>
        <th><?php echo esc_html( __( 'Name', 'select_countries-select-field-with-contact-form-7' ) ); ?></th>
        <td>
          <input type="text" name="name">
        </td>
      </tr>
      <tr>
        <th scope="row"><label
            for="<?php echo esc_attr( $args['content'] . '-id' ); ?>"><?php echo esc_html( __( 'Id Attribute', 'select_countries-select-field-with-contact-form-7' ) ); ?></label>
        </th>
        <td><input type="text" name="id" class="select_countries_id oneline option"
            id="<?php echo esc_attr( $args['content'] . '-id' ); ?>" /></td>
      </tr>
      <tr>
        <th scope="row"><label
            for="<?php echo esc_attr( $args['content'] . '-class' ); ?>"><?php echo esc_html( __( 'Class Attribute', 'select_countries-select-field-with-contact-form-7' ) ); ?></label>
        </th>
        <td><input type="text" name="class" class="select_countries_value oneline option"
            id="<?php echo esc_attr( $args['content'] . '-class' ); ?>" /></td>
      </tr>
      <tr>
        <th scope="row"><label
            for="<?php echo esc_attr( $args['content'] . '-select_custom_def' ); ?>"><?php echo esc_html( __( 'Default select_countries Attribute', 'select_countries-select-field-with-contact-form-7' ) ); ?></label>
        </th>
        <td><input type="text" name="select_custom_def" class="select_countries_select_custom_def oneline option"
            id="<?php echo esc_attr( $args['content'] . '-select_custom_def' ); ?>" /></td>
      </tr>

    </table>
  </fieldset>
</div>
<div class="insert-box">
  <input type="text" name="<?php echo esc_attr($type); ?>" class="tag code" readonly="readonly"
    onfocus="this.select()" />
  <div class="submitbox">
    <input type="button" class="button button-primary insert-tag"
      value="<?php echo esc_attr( __( 'Insert Tag', 'signature-field-with-contact-form-7' ) ); ?>" />
  </div>
  <br class="clear" />
  <p class="description mail-tag">
    <label
      for="<?php echo esc_attr( $args['content'] . '-mailtag' ); ?>"><?php echo sprintf( esc_html( __( "To use the value input through this field in a mail field, you need to insert the corresponding mail-tag (%s) into the field on the Mail tab.", 'select_countries-select-field-with-contact-form-7' ) ), '<strong><span class="mail-tag"></span></strong>' ); ?>
      <input type="text" class="mail-tag code hidden" readonly="readonly"
        id="<?php echo esc_attr( $args['content'] . '-mailtag' ); ?>" />
    </label>
  </p>
</div>
<?php
	}


  add_filter( 'wpcf7_form_tag', function ( $tag ) {
    $datas = [];
    foreach ( (array)$tag['options'] as $option ) {
        if ( strpos( $option, 'data-' ) === 0 ) {
            $option = explode( ':', $option, 2 );
            $datas[$option[0]] = apply_filters('wpcf7_option_value', $option[1], $option[0]);
        }
    }
    if ( ! empty( $datas ) ) {
        $id = uniqid('tmp-wpcf');
        $tag['options'][] = "class:$id";
        add_filter( 'wpcf7_form_elements', function ($content) use ($id, $datas) {
            return str_replace($id, $name, str_replace($id.'"', '"'. wpcf7_format_atts($datas), $content));
        });
    }
    return $tag;
} );