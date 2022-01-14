<?php
/**
 * Plugin Name: defiant chalenge
 * Plugin URI: https://github.com/broomcms/defiant-dev
 * Description: Retreiving a remote list of sport teams and displaying it
 * Version: 1.0
 * Author: Patrick Simard
 * Author URI: https://github.com/broomcms/defiant-dev
 */

////////////////////////////////////////////////////////////////
// Backend

add_action('admin_menu', 'my_menu');

function my_menu(){
    add_menu_page('defiant chalenge', 'defiant', 'manage_options', 'defiant-slug', 'admin_defiant');
}

function admin_defiant() {
    ?>
        <h1> <?php esc_html_e( 'defiant chalenge', 'my-plugin-textdomain' ); ?> </h1>
        <form method="POST" action="options.php">
    <?php
        settings_fields( 'defiant' );
        do_settings_sections( 'defiant' );
        submit_button();
    ?>
        </form>
    <?php
}

add_action( 'admin_init', 'defiant_settings_init' );

function defiant_settings_init() {

    add_settings_section(
        'defiant_setting_section',
        __( 'API settings', 'my-textdomain' ),
        'defiant_callback',
        'defiant'
    );

		add_settings_field(
		   'chalk247_api',
		   __( 'API Key', 'my-textdomain' ),
		   'defiant_markup',
		   'defiant',
		   'defiant_setting_section'
		);

		register_setting( 'defiant', 'chalk247_api' );
}


function defiant_callback() {
    echo '<p>In order for this plugin to work, please provide your chalk247 api key.</p>';
}


function defiant_markup() {
    ?>
    <input type="text" id="chalk247_api" name="chalk247_api" value="<?php echo get_option( 'chalk247_api' ); ?>">
    <?php
}

////////////////////////////////////////////////////////////////
// FrontEnd
add_action( 'wp_enqueue_scripts', 'datatable');

// Plugin JS and CSS
function datatable() {
    wp_enqueue_style( 'datatable', plugin_dir_url(__FILE__).'css/datatable.css',true,'1.1','all');
    wp_enqueue_script('jquery', plugin_dir_url(__FILE__).'js/jquery.min.js');
    wp_enqueue_script('datatable', plugin_dir_url(__FILE__).'js/datatable.js');
    wp_enqueue_script('datatable-init', plugin_dir_url(__FILE__).'js/datatable-init.js');  
}

// Retrieving the remote team list
function api_team_list($key){
    $url = 'https://delivery.chalk247.com/team_list/NFL.JSON?api_key='.$key;
    $request = wp_remote_get($url);
    $content = wp_remote_retrieve_body( $request );
    $data = json_decode($content, false);
    return $data->results->data->team;
}

// Showing the team list wrapped in datatable
function team_list() {
    $teams = api_team_list(get_option( 'chalk247_api' ));
    $content = '   
    <table id="table_id" class="display">
        <thead>
            <tr>
                <th>Name</th>
                <th>Nickname</th>
                <th>conference</th>
                <th>division</th>
            </tr>
        </thead>
        <tbody>';

        foreach($teams as $key=>$value){
            $content .= '
            <tr>
                <td>'.$value->display_name.'</td>
                <td>'.$value->nickname.'</td>
                <td>'.$value->conference.'</td>
                <td>'.$value->division.'</td>
            </tr>
            ';
        }

        $content .= '
        </tbody>
    </table>
    ';
    return $content;
}

add_shortcode( 'teams', 'team_list' );