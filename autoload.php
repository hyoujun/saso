<?php
function __autoload($classname) {
    $classname = ltrim($classname, '\\');
    $filename  = '';
    $namespace = '';
    if ($lastnspos = strripos($classname, '\\')) {
        $namespace = substr($classname, 0, $lastnspos);
        $classname = substr($classname, $lastnspos + 1);
        $firstnspos = stripos($namespace, '\\');
        $namespace = substr($namespace, $firstnspos + 1);
        $filename  = DOCUMENT_ROOT . PROGRAM_DIR . '/' . str_replace('\\', '/', $namespace) . '/';
    }
    $filename .= $classname . '.php';
    if(!file_exists($filename)){
        throw new \Exception('classNotFound');
    }
    require $filename;
}

