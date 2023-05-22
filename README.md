# sie-parser
Read SIE files using PHP. <br><br>
A memory efficient way to read an uploaded SIE file (Swedish Accounting File) and get information usable in a php application. The goal was that the memory used should not exceed
the current file as the current public offering (neam/php) which sadly failed on large files. This will parse large .se files without any issues using php standard library.
#
<b>Currently implemented features </b>
+ Open .se file
+ Will parse the following flags: <br>
#RES, #KONTO, #RAR, #UB, #IB, #FNAMN, #ORGNR
+ Character encoded to support transforming to json
# 
<b>How to use</b> <br>
```php
use SieParser\Parser; 
$parser = new Parser("PATH TO FILE");
$parser->parsedDocument->res
```
The above code snippet will parse your selected file and then you call the parsedDocument object which contains all the parsed data. In the example you get the "res" flag in an associative php array.
#
<b>To be implemented</b> <br>
+ SIE validation
+ Parse from PHP array to SE file
