<?php

// 
// Clock Widget
// 

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;
use WP_Widget;

class Clock_Widget extends WP_Widget
{
    use Singleton;

    public function __construct()
    {
        parent::__construct(
            'clock_widget',  // Base ID
            'Clock',  // Name
            [
                'description' => __('Clock Widget', 'aquila')
            ]
        );
    }

    public function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        echo $before_title;
        if (!empty($title)) {
            echo $before_title . $title . $after_title;
        }
        ?>
        <section class="card">
            <div class="clock card-body">
                <span id="time"></span>
                <span id="ampm"></span>
                <span id="time-emoji"></span>
            </div>
        </section>
        <?php
        echo $after_title;
    }

    /**
     * @suppress PHP0405
     */
    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Clock', 'aquila');
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">
                <?php _e('Title:'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = [];
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}