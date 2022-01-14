![image](https://user-images.githubusercontent.com/63425041/149531644-1a917a04-e181-41e0-b2a4-06f680bb74b0.png)

### Onboarding Challenge
#By Patrick Simard

### A little about this project
Hey guys! So I received a challenge from defiant. In order to get this challenge going I created a docker box. Been using it for a while and really like it's simplicity. For this challenge, I decided to retrieve a remote json code provided by an API and print it out on a page. It's simple when you think about it ... You can retrieve it with a file_get_content() or a cURL request and foreach it to show the data. But I thought it would be interesting to introduce datatables. It comes with a pagination system, a search and column filters. Also I saved the key to the database and created a very basic backend to change the key.

### The big lines of the challenge
Please write a WordPress plugin that demonstrates interacting with the WordPress plugin API, object oriented programming and has some basic interaction with the WordPress database. The plugin can do anything you would like. 

### Challenge backstory
Our fake client, ACME Sports, wants to display a dynamic list of NFL teams on a page on its website. It’s dynamic because the site will pull the NFL team data from a remote API that is frequently updated. 

- The API endpoint URL with the NFL team data is below. 
http://delivery.chalk247.com/team_list/NFL.JSON?api_key=74db8efa2a6db279393b433
d97c2bc843f8e32b0
- You can assume the API will always return the teams in the exact same format, with the
exact same field names and data types.
- List the teams on a page and save the key to the database

### Docker information

I created a very nice docker setup for this challenge. It's composed of 5 containers.

 - Container 1: mailhog
   MailHog is a local email server and catches all outgoing mails. I use thfor local developpement to avoid sending out emails to clients when working. What ever email you send at will be captured and dispyed in the mailhug inbox.
   This container is setup at : http://localhost:1112

 - Container 2: mysql
   This container is used to host the database for wordpress. Instead of using localhost for the database server we use the container name. In this case it's mysql_defiantdev

 - Container 3: webserver
   I will be using nginx for my webserver. This container will host the website configurations and will forward port 80 to 1111 we can than use that port to access the website
   This container is setup at : http://localhost:1111

 - Container 4: php-fpm
   This container is used to host the php envirement and server setup. I will be using PHP8. Theres no direct access required but if you ever need to do a server comand you can use this container to do it.

 - Container 5: PHPMyAdmin
   In order to have a fast access to database data, I added a PHPMyAdmin container.
   This container is setup at : http://localhost:2222

I created a network called defiantdev. All containers withing that network can talk to each others using there container names. 

### Environment setup instructions

Repository and Docker setup

    mkdir defiantdev
    cd defiantdev
    git clone git@github.com:broomcms/defiant-dev.git ./
    docker-compose up -d --build

Database setup

 - Go to the PHPMyAdmin URL (localhost:2222)
 - On the left side menu, open the defiantdevdb database
 - Importe the wordpress.sql file at the repository root level

Wordpress Login

    Go to http://localhost:1111/wp-admin/index.php
    User: Admin
    Password: admin

# The wordpress challenge

This challenge was interesting. I noticed there was an API key in the API URL. So I thought it could be nice to have a way for the admin to change/provide its own API key. So the first part of my plugin was for the backend side of things.

This adds a link to the left side panel on the admin page

    add_action('admin_menu', 'my_menu');
    function my_menu(){
        add_menu_page('defiant chalenge', 'defiant', 'manage_options', 'defiant-slug',     'admin_defiant');
    }

This part creates the form that will save the API key

    function defiant_callback() {
        echo '<p>In order for this plugin to work, please provide your chalk247 api key.</p>';
    }
    function defiant_markup() {
        ?>
        <input type="text" id="chalk247_api" name="chalk247_api" value="<?php echo get_option( 'chalk247_api' ); ?>">
        <?php
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

This part takes care of saving the data and registers it

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

Retrieving the API key is now as easy as `get_option( 'chalk247_api' )`

The rest of the plugin is frontend related and can be broken down into 2 main objective. Retrieve and display!

Retrieving the remote API data

    function api_team_list($key){
        $url = 'https://delivery.chalk247.com/team_list/NFL.JSON?api_key='.$key;
        $request = wp_remote_get($url);
        $content = wp_remote_retrieve_body( $request );
        $data = json_decode($content, false);
        return $data->results->data->team;
    }


We could have used cURL or other PHP native functions for this but wp_remote_get() and wp_remote_retrieve_body is interesting because it will output everything to an object. I always prefer using objects when possible. It also seemed right considering this is a wordpress challenge might as well use wordpress functions whenever possible.

Showing the data

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
    
For this part we are using the datatable library. It will transform the list into a dynamic table using jQuery. It's the fastest and easiest way to turn the data into something fun to browse. In order for the plugin to work, we need to register the CSS and Javascript files. So to do that, I did the following

    add_action( 'wp_enqueue_scripts', 'datatable');

    function datatable() {
        wp_enqueue_style( 'datatable', plugin_dir_url(__FILE__).'css/datatable.css',true,'1.1','all');
        wp_enqueue_script('jquery', plugin_dir_url(__FILE__).'js/jquery.min.js');
        wp_enqueue_script('datatable', plugin_dir_url(__FILE__).'js/datatable.js');
        wp_enqueue_script('datatable-init', plugin_dir_url(__FILE__).'js/datatable-init.js');  
    }
    
