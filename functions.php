<?php
function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}
?>