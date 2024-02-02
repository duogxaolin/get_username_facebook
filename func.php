<?php
function extractFacebookId($url) {
    $parsedUrl = parse_url($url);

    if (strpos($parsedUrl['host'], 'facebook.com') === false) {
        return null;
    }

    $path = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';

    if (strpos($path, '/profile.php') === 0) {
        $query = isset($parsedUrl['query']) ? $parsedUrl['query'] : '';
        parse_str($query, $queryParams);
        return isset($queryParams['id']) ? $queryParams['id'] : null;
    } elseif (strpos($path, '/') === 0) {
        $parts = explode('/', $path);
        return isset($parts[1]) ? $parts[1] : null;
    }

    return null;
}
$link1 = 'https://www.facebook.com/duogxaolin.dev';
$link2 = "https://www.facebook.com/call0764517777";
$id1 = extractFacebookId($link1);
$id2 = extractFacebookId($link2);

echo "Username từ link 1: " . $id1 . "\n";
echo "Username từ link 2: " . $id2 . "\n";
