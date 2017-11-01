<?php
if (! function_exists('response')) {

    /**
     * @param string $content
     * @param int $status
     * @param array $headers
     * @return mixed
     */
    function response($content = '', $status = 200, array $headers = [])
    {
        var_dump('response');
    }
}