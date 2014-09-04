<?php
function the_breadcrumb() 
{
    if (!is_front_page()) 
    {
        echo '<a href="';
        echo get_option('home');
        echo '">HOME';
        echo "</a> » ";
        if (is_category() || is_single()) 
        {
            the_category(' ');
            if (is_single()) 
            {
                echo "  > ";
                the_title();
            }
        } 
        elseif (is_page()) 
        {
            echo the_title();
        }
    }
    else 
    {
        echo 'HOME';
    }
}