<?php
function cleanInput($input)
{
    return htmlspecialchars(strip_tags(trim($input)));
}
function redirection($dest, $duree)
{
    echo '
    <script>
        setTimeout(()=>{
            document.location.href="' . $dest . '"; 
        }, ' . $duree . ');
    </script>';
}
