<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// History Action Snippets
add_action('admin_post_aits_download_history', 'aits_handle_download_history');
function aits_handle_download_history() {
    if (!current_user_can('manage_options') || !isset($_GET['id']) || !isset($_GET['_wpnonce'])) {
        wp_die('Unauthorized');
    }
    if (!wp_verify_nonce($_GET['_wpnonce'], 'aits_history_action')) {
        wp_die('Invalid nonce');
    }

    global $wpdb;
    $id = intval($_GET['id']);
    $table_name = $wpdb->prefix . 'aits_history';
    $row = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $id));

    if (!$row) {
        wp_die('Translation not found.');
    }

    header('Content-Description: File Transfer');
    header('Content-Type: text/plain; charset=utf-8');
    header('Content-Disposition: attachment; filename="translation-' . $id . '-' . $row->target_lang . '.txt"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');

    echo $row->translated_text;
    exit;
}

add_action('admin_post_aits_retranslate_history', 'aits_handle_retranslate_history');
function aits_handle_retranslate_history() {
    if (!current_user_can('manage_options') || !isset($_GET['id']) || !isset($_GET['_wpnonce'])) {
        wp_die('Unauthorized');
    }
    if (!wp_verify_nonce($_GET['_wpnonce'], 'aits_history_action')) {
        wp_die('Invalid nonce');
    }

    global $wpdb;
    $id = intval($_GET['id']);
    $table_name = $wpdb->prefix . 'aits_history';
    $row = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $id));

    if (!$row) {
        wp_die('Translation not found.');
    }

    // Process Translation Mock
    $provider = get_option('aits_api_provider', 'openai');
    $source_text = $row->source_text;
    
    if ($provider === 'google') {
        $translated_text = "✨ [Google Neural Translate API] " . $source_text;
    } else {
        $translated_text = "🧠 [OpenAI GPT-4 Translation] " . $source_text;
    }

    // Insert new row for the re- initiated job
    $wpdb->insert($table_name, array(
        'user_id' => $row->user_id,
        'source_text' => $source_text,
        'translated_text' => "(Retranslated) " . $translated_text,
        'target_lang' => $row->target_lang,
        'provider' => $provider
    ));

    $redirect_url = add_query_arg(array('page' => 'aits-history', 'retranslated' => 1), admin_url('admin.php'));
    wp_redirect($redirect_url);
    exit;
}

function aits_add_history_submenu() {
    add_submenu_page(
        'aits-settings',
        'Translation History',
        'Translation History',
        'manage_options',
        'aits-history',
        'aits_history_page'
    );
}
add_action( 'admin_menu', 'aits_add_history_submenu' );

function aits_history_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'aits_history';
    $results = $wpdb->get_results( "SELECT * FROM $table_name ORDER BY created_at DESC LIMIT 50" );
    ?>
    <div class="wrap">
        <h1>Translation History</h1>
        <?php if (isset($_GET['retranslated']) && $_GET['retranslated'] == 1): ?>
        <div class="notice notice-success is-dismissible"><p>Translation job re-initiated successfully.</p></div>
        <?php endif; ?>
        <p>Review past translations and user activity.</p>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Source Text</th>
                    <th>Translated Text</th>
                    <th>Language</th>
                    <th>Provider</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($results): foreach($results as $row): 
                    $download_url = wp_nonce_url( admin_url('admin-post.php?action=aits_download_history&id=' . $row->id), 'aits_history_action' );
                    $retranslate_url = wp_nonce_url( admin_url('admin-post.php?action=aits_retranslate_history&id=' . $row->id), 'aits_history_action' );
                ?>
                <tr>
                    <td><?php echo esc_html($row->id); ?></td>
                    <td><?php echo esc_html($row->user_id); ?></td>
                    <td><?php echo esc_html(wp_trim_words($row->source_text ?? '...', 10, '...')); ?></td>
                    <td><?php echo esc_html(wp_trim_words($row->translated_text ?? '...', 10, '...')); ?></td>
                    <td><?php echo esc_html($row->target_lang); ?></td>
                    <td><?php echo esc_html($row->provider); ?></td>
                    <td><?php echo esc_html($row->created_at); ?></td>
                    <td>
                        <a href="<?php echo esc_url($retranslate_url); ?>" class="button button-primary">Re-translate</a>
                        <a href="<?php echo esc_url($download_url); ?>" class="button">Download</a>
                    </td>
                </tr>
                <?php endforeach; else: ?>
                <tr><td colspan="8">No translations found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php
}
