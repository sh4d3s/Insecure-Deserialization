<?php
class Serialkiller
{
    private $cache_file;
    private $log_file;
    private $content;
    private $user;

    public function __construct($user)
    {
        $this->user = $user;
        $this->cache_file = 'cache/'.$user.'.cache';
        $this->log_file = 'logs/'.$user.'.log';
        $this->createFile($this->cache_file);
        $this->content = "Starting log";
        
    }
    public function  __wakeup()
    {
        $this->createFile($this->cache_file);
        $this->createFile($this->log_file);
        $this->logEntry('\nResume Log..'.$this->content);

    }
    public function  __destruct()
    {
        if (file_exists($this->cache_file)) @unlink($this->cache_file);
    }
    public function logEntry(string $content)
    {
        file_put_contents($this->log_file, $content, FILE_APPEND);
    }
    protected function createFile($file)
    {
        if (!file_exists($file))
            touch($file);
    }
}

$killer = new Serialkiller('john');
$killer->logEntry('Test entry');
echo str_replace("\x00", "%00",serialize($killer));
echo "<br>";
echo base64_encode(serialize($killer));
echo "<br>";
if(isset($_GET['data']) && $_GET['data'] != NULL){
    echo $_GET['data'];
    echo "<br>";
    echo base64_encode($_GET['data']);
    unserialize($_GET['data']);
}
?>
