<?php
if( !defined('ABSPATH') )
{
    exit;
}

class CMTooltipGlossaryBackend
{
    public static $calledClassName;
    protected static $instance = NULL;
    protected static $cssPath = NULL;
    protected static $jsPath = NULL;
    protected static $viewsPath = NULL;

    public static function instance()
    {
        $class = __CLASS__;
        if( !isset(self::$instance) && !( self::$instance instanceof $class ) )
        {
            self::$instance = new $class;
        }
        return self::$instance;
    }

    public function __construct()
    {
        if( empty(self::$calledClassName) )
        {
            self::$calledClassName = __CLASS__;
        }

        self::$cssPath = CMTT_PLUGIN_URL . 'backend/assets/css/';
        self::$jsPath = CMTT_PLUGIN_URL . 'backend/assets/js/';
        self::$viewsPath = CMTT_PLUGIN_DIR . 'backend/views/';

        add_action('admin_menu', array(self::$calledClassName, 'cmtt_admin_menu'));
        add_action('admin_enqueue_scripts', array(self::$calledClassName, 'cmtt_glossary_stylesheets'));

        add_action('restrict_manage_posts', array(self::$calledClassName, 'cmtt_restrict_manage_posts'));
        add_action('admin_notices', array(self::$calledClassName, 'cmtt_glossary_admin_notice_wp33'));
        add_action('admin_notices', array(self::$calledClassName, 'cmtt_glossary_admin_notice_mbstring'));

//        add_action('save_post', array(self::$calledClassName, 'cmtt_save_postdata'));
//        add_action('update_post', array(self::$calledClassName, 'cmtt_save_postdata'));
    }

    /**
     * Shows admin menu
     * @global string $submenu
     */
    public static function cmtt_admin_menu()
    {
        global $submenu;
        $current_user = wp_get_current_user();

        add_menu_page('Glossary', CMTT_NAME, 'edit_posts', CMTT_MENU_OPTION, 'edit.php?post_type=glossary', self::$cssPath . 'images/cm-glossary-tooltip-icon.png');

        add_submenu_page(CMTT_MENU_OPTION, 'Add New', 'Add New', 'edit_posts', 'post-new.php?post_type=glossary');
        add_submenu_page(CMTT_MENU_OPTION, 'TooltipGlossary Options', 'Settings', 'edit_posts', CMTT_SETTINGS_OPTION, array(self::$calledClassName, 'cmtt_admin_options'));
        add_submenu_page(CMTT_MENU_OPTION, 'About', 'About', 'edit_posts', CMTT_ABOUT_OPTION, array(self::$calledClassName, 'cmtt_admin_about'));
        add_submenu_page(CMTT_MENU_OPTION, 'Add-ons', 'Add-ons', 'edit_posts', CMTT_EXTENSIONS_OPTION, array(self::$calledClassName, 'cmtt_admin_extensions'));
        add_submenu_page(CMTT_MENU_OPTION, 'Pro Version', 'Pro Version', 'edit_posts', CMTT_PRO_OPTION, array(self::$calledClassName, 'cmtt_admin_pro'));

        if( user_can($current_user, 'edit_posts') )
        {
            $submenu[CMTT_MENU_OPTION][500] = array('User Guide', 'edit_posts', 'http://tooltip.cminds.com/cm-tooltip-user-guide/');
        }

        add_filter('views_edit-glossary', array(self::$calledClassName, 'cmtt_filter_admin_nav'), 10, 1);
    }

    /**
     * Updates and displays the options
     */
    public static function cmtt_admin_options()
    {
        $_POST = array_map('stripslashes_deep', $_POST);
        $post = $_POST;

        CMTooltipGlossaryShared::tryResetOldOptions();
        CMTooltipGlossaryShared::tryGenerateGlossaryIndexPage();

        wp_enqueue_script('jquery-ui-tabs');
        wp_enqueue_style('jquery-ui-tabs-css', self::$cssPath . 'jquery-ui-1.10.3.custom.css');

        if( isset($post["cmtt_glossarySave"]) || isset($post['cmtt_glossaryRelatedRefresh']) )
        {
            $enqueeFlushRules = false;
            /*
             * Update the page options
             */
            update_option('cmtt_glossaryID', $post["cmtt_glossaryID"]);
            CMTooltipGlossaryShared::tryGenerateGlossaryIndexPage();

            if( $post["cmtt_glossaryPermalink"] !== get_option('cmtt_glossaryPermalink') )
            {
                /*
                 * Update glossary post permalink
                 */
                $glossaryPost = array(
                    'ID'        => $post["cmtt_glossaryID"],
                    'post_name' => $post["cmtt_glossaryPermalink"]
                );
                wp_update_post($glossaryPost);
                $enqueeFlushRules = true;
            }

            update_option('cmtt_glossaryPermalink', $post["cmtt_glossaryPermalink"]);

            if( $enqueeFlushRules )
            {
                self::cmtt_flush_rewrite_rules();
            }

            unset($post['cmtt_glossaryID'], $post['cmtt_glossaryPermalink'], $post['cmtt_glossarySave']);

            function cmtt_get_the_option_names($k)
            {
                return strpos($k, 'cmtt_') === 0;
            }
            $options_names = array_filter(array_keys($post), 'cmtt_get_the_option_names');

            /*
             * Add the option_names which have to be updated added with other plugins
             */
            $options_names = apply_filters('cmtt_thirdparty_option_names', $options_names);

            foreach($options_names as $option_name)
            {
                if( $option_name == 'cmtt_index_letters' )
                {
                    $optionValue = explode(',', $post[$option_name]);
                }
                else
                {
                    $optionValue = trim($post[$option_name]);
                }
                update_option($option_name, $optionValue);
            }
        }

        self::cmtt_admin_settings();
    }

    /**
     * Function renders (default) or returns the setttings tabs
     *
     * @param type $return
     * @return string
     */
    public static function renderSettingsTabs($return = false)
    {
        $content = '';
        $settingsTabsArrayBase = array();

        $settingsTabsArray = apply_filters('cmtt-settings-tabs-array', $settingsTabsArrayBase);

        if( $settingsTabsArray )
        {
            foreach($settingsTabsArray as $tabKey => $tabLabel)
            {
                $filterName = 'cmmt-custom-settings-tab-content-' . $tabKey;

                $content .= '<div id="tabs-' . $tabKey . '">';
                $tabContent = apply_filters($filterName, '');
                $content .=$tabContent;
                $content .= '</div>';
            }
        }

        if( $return )
        {
            return $content;
        }
        echo $content;
    }

    /**
     * Function renders (default) or returns the setttings tabs
     *
     * @param type $return
     * @return string
     */
    public static function renderSettingsTabsControls($return = false)
    {
        $content = '';
        $settingsTabsArrayBase = array(
            '1'  => 'General Settings',
            '2'  => 'Glossary Index Page',
            '3'  => 'Glossary Term',
            '4'  => 'Tooltip',
            '99' => 'Server Information',
        );

        $settingsTabsArray = apply_filters('cmtt-settings-tabs-array', $settingsTabsArrayBase);

        ksort($settingsTabsArray);

        if( $settingsTabsArray )
        {
            $content .= '<ul>';
            foreach($settingsTabsArray as $tabKey => $tabLabel)
            {
                $content .= '<li><a href="#tabs-' . $tabKey . '">' . $tabLabel . '</a></li>';
            }
            $content .= '</ul>';
        }

        if( $return )
        {
            return $content;
        }
        echo $content;
    }

    /**
     * Shows about page
     */
    public static function cmtt_admin_settings()
    {
        ob_start();
        require_once self::$viewsPath . 'admin_settings.php';
        $content = ob_get_contents();
        ob_end_clean();
        require_once self::$viewsPath . 'admin_template.php';
    }

    /**
     * Shows about page
     */
    public static function cmtt_admin_about()
    {
        ob_start();
        require_once self::$viewsPath . 'admin_about.php';
        $content = ob_get_contents();
        ob_end_clean();
        require_once self::$viewsPath . 'admin_template.php';
    }

    /**
     * Shows extensions page
     */
    public static function cmtt_admin_extensions()
    {
        ob_start();
        require_once self::$viewsPath . 'admin_extensions.php';
        $content = ob_get_contents();
        ob_end_clean();
        require_once self::$viewsPath . 'admin_template.php';
    }

    /**
     * Shows pro page
     */
    public static function cmtt_admin_pro()
    {
        ob_start();
        require_once self::$viewsPath . 'admin_pro.php';
        $content = ob_get_contents();
        ob_end_clean();
        require_once self::$viewsPath . 'admin_template.php';
    }

    /**
     * Include admin stylesheets
     */
    public static function cmtt_glossary_stylesheets()
    {
        wp_enqueue_style('jqueryUIStylesheet', self::$cssPath . 'jquery-ui-1.10.3.custom.css');
        wp_enqueue_style('tooltip', self::$cssPath . 'tooltip.css');

        wp_enqueue_script('tooltip-admin-js', self::$jsPath . 'cm-tooltip.js', array('jquery', 'jquery-ui-core', 'jquery-ui-tooltip'));

        $int_version = (int) str_replace('.', '', get_bloginfo('version'));
        if( $int_version < 100 )
        {
            $int_version *= 10; // will be 340 or 341 or 350 etc
        }

        if( $int_version >= 350 )
        {
            wp_enqueue_script('jqueryUIWPTooltips', includes_url() . 'js/jquery/ui/jquery.ui.tooltip.min.js', array(), '1.0.0', false);
            wp_enqueue_script('jqueryUIWPTabs', includes_url() . 'js/jquery/ui/jquery.ui.tabs.min.js', array(), '1.0.0', false);
        }
    }

    /**
     * Filters admin navigation menus to show horizontal link bar
     * @global string $submenu
     * @global type $plugin_page
     * @param type $views
     * @return string
     */
    public static function cmtt_filter_admin_nav($views)
    {
        global $submenu, $plugin_page;
        $scheme = is_ssl() ? 'https://' : 'http://';
        $adminUrl = str_replace($scheme . $_SERVER['HTTP_HOST'], '', admin_url());
        $currentUri = str_replace($adminUrl, '', $_SERVER['REQUEST_URI']);
        $submenus = array();
        if( isset($submenu[CMTT_MENU_OPTION]) )
        {
            $thisMenu = $submenu[CMTT_MENU_OPTION];

            $firstMenuItem = $thisMenu[0];
            unset($thisMenu[0]);

            $secondMenuItem = array('Trash', 'edit_posts', 'edit.php?post_status=trash&post_type=glossary', 'Trash');

            array_unshift($thisMenu, $firstMenuItem, $secondMenuItem);

            foreach($thisMenu as $item)
            {
                $slug = $item[2];
                $isCurrent = ($slug == $plugin_page || strpos($item[2], '.php') === strpos($currentUri, '.php'));
                $isExternalPage = strpos($item[2], 'http') !== FALSE;
                $isNotSubPage = $isExternalPage || strpos($item[2], '.php') !== FALSE;
                $url = $isNotSubPage ? $slug : get_admin_url(null, 'admin.php?page=' . $slug);
                $target = $isExternalPage ? '_blank' : '';
                $submenus[$item[0]] = '<a href="' . $url . '" target="' . $target . '" class="' . ($isCurrent ? 'current' : '') . '">' . $item[0] . '</a>';
            }
        }
        return $submenus;
    }

    /**
     * I don't know what it does ??
     * @global type $typenow
     */
    public static function cmtt_restrict_manage_posts()
    {
        global $typenow;
        if( $typenow == 'glossary' )
        {
            $status = get_query_var('post_status');
            $selected = ( $status == 'trash' ) ? ' selected="selected"' : '';
            ?>
            <select name="post_status">
                <option value="published"><?php _e('Published'); ?></option>
                <option value="trash" <?php echo $selected; ?> ><?php _e('Trash'); ?></option>
            </select>
            <?php
        }
    }

    /**
     * Displays the horizontal navigation bar
     * @global string $submenu
     * @global type $plugin_page
     */
    public static function cmtt_showNav()
    {
        global $submenu, $plugin_page;
        $submenus = array();
        $scheme = is_ssl() ? 'https://' : 'http://';
        $adminUrl = str_replace($scheme . $_SERVER['HTTP_HOST'], '', admin_url());
        $currentUri = str_replace($adminUrl, '', $_SERVER['REQUEST_URI']);

        if( isset($submenu[CMTT_MENU_OPTION]) )
        {
            $thisMenu = $submenu[CMTT_MENU_OPTION];
            foreach($thisMenu as $item)
            {
                $slug = $item[2];
                $isCurrent = ($slug == $plugin_page || strpos($item[2], '.php') === strpos($currentUri, '.php'));
                $isExternalPage = strpos($item[2], 'http') !== FALSE;
                $isNotSubPage = $isExternalPage || strpos($item[2], '.php') !== FALSE;
                $url = $isNotSubPage ? $slug : get_admin_url(null, 'admin.php?page=' . $slug);
                $submenus[] = array(
                    'link'    => $url,
                    'title'   => $item[0],
                    'current' => $isCurrent,
                    'target'  => $isExternalPage ? '_blank' : ''
                );
            }
            require_once self::$viewsPath . 'admin_nav.php';
        }
    }

    /**
     * Flushes the rewrite rules after permalink change
     * @global type $wp_rewrite
     */
    public static function cmtt_flush_rewrite_rules()
    {
        global $wp_rewrite;
        // First, we "add" the custom post type via the above written function.

        CMTooltipGlossaryShared::cmtt_create_post_types();

        // Clear the permalinks
        flush_rewrite_rules();

        //Call flush_rules() as a method of the $wp_rewrite object
        $wp_rewrite->flush_rules();
    }

    /**
     * Adds a notice about wp version lower than required 3.3
     * @global type $wp_version
     */
    public static function cmtt_glossary_admin_notice_wp33()
    {
        global $wp_version;

        if( version_compare($wp_version, '3.3', '<') )
        {
            $message = __('CM Tooltip Glossary requires Wordpress version 3.3 or higher to work properly.');
            cminds_show_message($message, true);
        }
    }

    /**
     * Adds a notice about mbstring not being installed
     * @global type $wp_version
     */
    public static function cmtt_glossary_admin_notice_mbstring()
    {
        $mb_support = function_exists('mb_strtolower');

        if( !$mb_support )
        {
            $message = __('CM Tooltip Glossary since version 2.6.0 requires "mbstring" PHP extension to work! ');
            $message .= '<a href="http://www.php.net/manual/en/mbstring.installation.php" target="_blank">(' . __('Installation instructions.') . ')</a>';
            cminds_show_message($message, true);
        }
    }

}