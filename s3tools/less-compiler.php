<?php
/**
 * Please remove the code below
 * This php block code just to compile all less style into css
 * @since 1.0
 */
    require "lessc.inc.php";
    $inputFile = "themes/style2/style.less";
    $outputFile = "themes/style2/style.css";

    $less = new lessc;

    // create a new cache object, and compile
    $cache = $less->cachedCompile($inputFile);

    file_put_contents($outputFile, $cache["compiled"]);

    // the next time we run, write only if it has updated
    $last_updated = $cache["updated"];
    $cache = $less->cachedCompile($cache);
    if ($cache["updated"] > $last_updated) {
        file_put_contents($outputFile, $cache["compiled"]);
    }
?>