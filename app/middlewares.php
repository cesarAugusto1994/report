<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 05/09/16
 * Time: 10:53
 */

$app->before(function (\Symfony\Component\HttpFoundation\Request $request) {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);

        if (empty($data)) {
            throw new \Exception(json_last_error_msg());
        }

        $request->request->replace(is_array($data) ? $data : []);
    }
});