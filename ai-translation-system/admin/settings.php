<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function aits_add_admin_menu() {
    add_menu_page(
        'AI Translation Settings',
        'AI Translation',
        'manage_options',
        'aits-settings',
        'aits_settings_page',
        'dashicons-translation',
        100
    );
}
add_action( 'admin_menu', 'aits_add_admin_menu' );

function aits_settings_init() {
    register_setting( 'aits_plugin_options', 'aits_api_provider' );
    // Deprecated: register_setting( 'aits_plugin_options', 'aits_api_key' );
    register_setting( 'aits_plugin_options', 'aits_openai_key' );
    register_setting( 'aits_plugin_options', 'aits_google_key' );
}
add_action( 'admin_init', 'aits_settings_init' );

function aits_settings_page() {
    ?>
    <div class="wrap">
        <h1>AI Translation System Settings</h1>
        <form action="options.php" method="post">
            <?php
            settings_fields( 'aits_plugin_options' );
            do_settings_sections( 'aits_plugin_options' );
            ?>
            <table class="form-table">
                <tr>
                    <th scope="row">API Provider</th>
                    <td>
                        <select name="aits_api_provider">
                            <option value="openai" <?php selected(get_option('aits_api_provider'), 'openai'); ?>>OpenAI</option>
                            <option value="google" <?php selected(get_option('aits_api_provider'), 'google'); ?>>Google Cloud AI</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row">OpenAI API Key</th>
                    <td><input type="password" name="aits_openai_key" value="<?php echo esc_attr( get_option( 'aits_openai_key' ) ); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row">Google Cloud AI API Key</th>
                    <td><input type="password" name="aits_google_key" value="<?php echo esc_attr( get_option( 'aits_google_key' ) ); ?>" class="regular-text" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
