# sie-parser
Read SIE files using PHP. <br><br>
A memory efficient way to read an uploaded SIE file (Swedish Accounting File) and get information usable in a php application. The goal was that memory used should not exceed
the current file as the current public reposit (neam/php) sadly failed on larger files. This will parse large .se files without any issues using php standard file reader. 
<br>
<br>
<b>Requires </b> <br>
PHP 8.0+
<br>
<br>
<b>Benchmark</b>
<br>
File containing 29 819 vouchers is processed in 0.1 seconds with a 1.5 mb memory usage.
#
<b>Currently implemented features </b>
+ Open .se file
+ Will parse the following flags: <br>
#RES, #KONTO, #RAR, #UB, #IB, #FNAMN, #ORGNR, #VER, #TRANS
+ Character encoded to support transforming to json

<b>How to use</b> <br>
```php
use SieParser\Parser; 
$parser = new Parser("PATH TO FILE");
$parser->getRes();
```
The above code snippet will parse your selected file. In the example you get the "res" flag from the file as an array. This can be encoded to json for even smaller memory footprint.
#
<b>To be implemented</b> <br>
+ SIE validation
+ Parse from PHP array to SE file
