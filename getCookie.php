<?php
if (isset($_POST['cookies'])) {
    echo '<pre>';
    print_r($_POST['cookies']);
    echo '</pre>';
} else {
    echo 'No cookies received';
}
