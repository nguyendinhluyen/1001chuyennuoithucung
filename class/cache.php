<?php

class cache {

    var $file;
    var $path = 'cache/';
    var $ext = '.cache';
    var $r = 0;

    function start($path = 'cache/', $file) {

        $this->path = $path;

        $this->file = $file;

        if (is_dir($this->path) === false) {

            mkdir($this->path, 0777);

            ob_start();

            $this->r = 1;
        } else if (file_exists($this->path . $this->file . $this->ext)) {

            readfile($this->path . $this->file . $this->ext);

            exit();
        } else {

            ob_start();

            $this->r = 1;
        }
    }

    function end() {

        if ($this->r == 0)
            return;

        $contents = ob_get_contents();

        ob_end_clean();

        $fp = fopen($this->path . $this->file . $this->ext, 'w');

        fputs($fp, $contents);

        fclose($fp);

        echo $contents;
    }

    function flush($path) {

        if (function_exists('exec')) {
            if (strpos(strtoupper(PHP_OS), 'WIN') !== false) {

                $cmd = 'del /s ' . str_replace('/', '\\', $path) . '*.cache';
            } else {

                $cmd = 'rm -rf ' . $ADODB_CACHE_DIR . '/*.cache';
            }

            exec($cmd);
        } else {

            unlink($path . '8d6ab84ca2af9fccd4e4048694176ebf.cache');
        }
    }

}

?>