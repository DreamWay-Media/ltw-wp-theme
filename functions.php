<?php
// Theme setup
function skeleton_theme_setup() {
    // Add support for dynamic title tags
    add_theme_support('title-tag');
    
    // Add support for featured images
    add_theme_support('post-thumbnails');

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height' => 50,
        'width' => 200,
        'flex-height' => true,
        'flex-width' => true,
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'skeleton'),
        'footer' => __('Footer Menu', 'skeleton'),
    ));
}
add_action('after_setup_theme', 'skeleton_theme_setup');

// Register Custom Widget
function my_custom_widget() {
    register_widget('My_Custom_Widget');
}
add_action('widgets_init', 'my_custom_widget');

// Define the custom widget class
class My_Custom_Widget extends WP_Widget {
    
    // Constructor
    public function __construct() {
        parent::__construct(
            'my_custom_widget',  // Base ID
            'My Custom Widget',   // Widget Name
            array('description' => 'A custom widget example.') // Widget description
        );
    }

    // Output the widget content on the frontend
    public function widget($args, $instance) {
        echo $args['before_widget'];

        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        // Widget content
        echo '<p>' . esc_html($instance['content']) . '</p>';

        echo $args['after_widget'];
    }

    // Output the widget settings form in the backend (when user adds/edit widget)
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $content = !empty($instance['content']) ? $instance['content'] : '';

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('content'); ?>">Content:</label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>"><?php echo esc_textarea($content); ?></textarea>
        </p>
        <?php
    }

    // Save the widget settings when the user updates the widget
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['content'] = sanitize_textarea_field($new_instance['content']);
        
        return $instance;
    }
}

function my_custom_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Main Sidebar', 'your-text-domain' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Widgets in this area will be shown in the sidebar.', 'your-text-domain' ),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'my_custom_widgets_init' );



// Enqueue styles and scripts
function skeleton_enqueue_assets() {
    // tailwind CSS
    wp_enqueue_style('tailwindcss', get_template_directory_uri() . '/dist/main.css', array(), null);
    // theme's main stylesheet
    wp_enqueue_style('my-theme-style', get_stylesheet_uri(), array('tailwindcss'), null);
}
add_action('wp_enqueue_scripts', 'skeleton_enqueue_assets');
