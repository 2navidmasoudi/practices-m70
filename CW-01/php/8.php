<?php

# https://quera.org/problemset/618/

$n = readline();

for ($i = 0; $i <= $n; $i++) {
    echo str_repeat(' ', $n - $i) . str_repeat('*', $i * 2 + 1) . "\n";
}

for ($i = $n - 1; $i >= 0; $i--) {
    echo str_repeat(' ', $n - $i) . str_repeat('*', $i * 2 + 1) . "\n";
}
