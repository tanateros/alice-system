<?php

namespace Module\Comment\Validate;

/**
 * Class Validate
 * @package Module\Comment\Validate
 */
class Validate
{
    /**
     * @param $post
     * @return mixed
     */
    static function filterAddCommentPost()
    {
        $args = array(
            'name' => FILTER_SANITIZE_SPECIAL_CHARS,
            'email' => FILTER_VALIDATE_EMAIL,
            'text' => array(
                'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
                'options' => array('min_range' => 1, 'max_range' => 5000)
            ),
        );
        return filter_input_array(INPUT_POST, $args);
    }
}