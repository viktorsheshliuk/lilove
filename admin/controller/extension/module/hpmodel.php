<?php

/*   __________________________________________________
    |  Obfuscated by YAK Pro - Php Obfuscator  2.0.6   |
    |              on 2020-03-10 23:32:14              |
    |    GitHub: https://github.com/pk-fr/yakpro-po    |
    |__________________________________________________|
*/
class ControllerExtensionModuleHpmodel extends Controller
{
    private $error = array();
    private $D7339e08;
    private $e30eb729;
    private $eda11e19;
    private $B7eb0756;
    private $c538c5e7;
    private $D9f07436;
    private $B09512a2 = array(0x0, 0x77073096, 0.0, 2567524794.0, 0x76dc419, 0x706af48f, 0.0, 0.0, 0xedb8832, 0x79dcb8a4, 0.0, 2547177864.0, 0x9b64c2b, 0x7eb17cbd, 0.0, 2428444049.0, 0x1db71064, 0x6ab020f2, 4089016648.0, 0.0, 0x1adad47d, 0x6ddde4eb, 4107580753.0, 2211677639.0, 0x136c9856, 0x646ba8c0, 4251122042.0, 0.0, 0x14015c4f, 0x63066cd9, 4195302755.0, 2366115317.0, 0x3b6e20c8, 0x4c69105e, 0.0, 2724688242.0, 0x3c03e4d1, 0x4b04d447, 3524101629.0, 2768942443.0, 0x35b5a8fa, 0x42b2986c, 3686517206.0, 2898065728.0, 0x32d86ce3, 0x45df5c75, 3705015759.0, 2882616665.0, 0x26d930ac, 0x51de003a, 3369554304.0, 3218104598.0, 0x21b4f4b5, 0x56b3c423, 3485111705.0, 3099436303.0, 0x2802b89e, 0x5f058808, 3322730930.0, 0.0, 0x2f6f7c87, 0x58684c11, 3244367275.0, 3060149565.0, 0x76dc4190, 0x1db7106, 2563907772.0, 0.0, 0x71b18589, 0x6b6b51f, 0.0, 0.0, 0x7807c9a2, 0xf00f934, 0.0, 0.0, 0x7f6a0dbb, 0x86d3d2d, 2439277719.0, 0.0, 0x6b6b51f4, 0x1c6c6162, 2238001368.0, 0.0, 0x6c0695ed, 0x1b01a57b, 2181625025.0, 4111451223.0, 0x65b0d9c6, 0x12b7e950, 0.0, 4240017532.0, 0x62dd1ddf, 0x15da2d49, 2362670323.0, 4224994405.0, 0x4db26158, 0x3ab551ce, 2747007092.0, 0.0, 0x4adfa541, 0x3dd895d7, 2765210733.0, 3554079995.0, 0x4369e96a, 0x346ed9fc, 2909243462.0, 3663771856.0, 0x44042d73, 0x33031de5, 2852801631.0, 3708648649.0, 0x5005713c, 0x270241aa, 0.0, 3373015174.0, 0x5768b525, 0x206f85b3, 3110523913.0, 0.0, 0x5edef90e, 0x29d9c998, 2966460450.0, 3352799412.0, 0x59b33d17, 0x2eb40d81, 3082640443.0, 3233442989.0, 0.0, 2596254646.0, 0x3b6e20c, 0x74b1d29a, 0.0, 2647816111.0, 0x4db2615, 0x73dc1683, 0.0, 2489596804.0, 0xd6d6a3e, 0x7a6a5aa8, 0.0, 2466906013.0, 0xa00ae27, 0x7d079eb1, 4027552580.0, 2265490386.0, 0x1e01f268, 0x6906c2fe, 4150417245.0, 2154129355.0, 0x196c3671, 0x6e6b06e7, 0.0, 0.0, 0x10da7a5a, 0x67dd4acc, 4189708143.0, 0.0, 0x17b7be43, 0x60b08ed5, 0.0, 0.0, 0x38d8c2c4, 0x4fdff252, 3518719985.0, 2797360999.0, 0x3fb506dd, 0x48b2364b, 3624741850.0, 2936675148.0, 0x36034af6, 0x41047a60, 0.0, 2825379669.0, 0x316e8eef, 0x4669be79, 3412177804.0, 3160834842.0, 0x256fd2a0, 0x5268e236, 3423369109.0, 3138078467.0, 0x220216b9, 0x5505262f, 0.0, 2998733608.0, 0x2bb45a92, 0x5cb36a04, 3268935591.0, 3050360625.0, 0x2cd99e8b, 0x5bdeae1d, 2607071920.0, 0.0, 0x756aa39c, 0x26d930a, 2617837225.0, 0.0, 0x72076785, 0x5005713, 2512341634.0, 0.0, 0x7bb12bae, 0xcb61b38, 0.0, 0.0, 0x7cdcefb7, 0xbdbdf21, 2262029012.0, 0.0, 0x68ddb3f8, 0x1fda836e, 0.0, 4139329115.0, 0x6fb077e1, 0x18b74777, 0.0, 4279200368.0, 0x66063bca, 0x11010b5c, 0.0, 0.0, 0x616bffd3, 0x166ccf45, 0.0, 0.0, 0x4e048354, 0x3903b3c2, 2808555105.0, 3495958263.0, 0x4969474d, 0x3e6e77db, 0.0, 3654703836.0, 0x40df0b66, 0x37d83bf0, 0.0, 0.0, 0x47b2cf7f, 0x30b5ffe9, 3183342108.0, 3401237130.0, 0x53b39330, 0x24b4a3a6, 3134207493.0, 3453421203.0, 0x54de5729, 0x23d967bf, 0.0, 3294710456.0, 0x5d681b02, 0x2a6f2b94, 0.0, 0.0, 0x5a05df1b, 0x2d02ef8d);
    
	private  function dims($data){
$domain=parse_url(HTTP_SERVER);
$key=$domain['host'].'-2.1-03c04df1665a286b12f07dce'.$data;
$this->db->query("UPDATE " . DB_PREFIX . "setting SET `value` = '" . $key . "', serialized = '0'  WHERE `code` = 'hpmodel' AND `key` = 'hpmodel_key' AND store_id = '0'");
}
   private function D835789e()
    {
        $c52f9644 = $this->Ba93df91("IQsrqgaWQ=");
        return $c52f9644;
    }
    private function A7255da3()
    {
        $c52f9644 = $this->Eb8fb93e("P5fRLkJgwv80OoKaHBtb2RlbF9rZXk=");
        return $c52f9644;
    }
    private function ed0091ac()
    {
        $c52f9644 = $this->E5306d08("mUZZGVsVHlwZQ==");
        return $c52f9644;
    }
    private function a98c18ac()
    {
        $c52f9644 = $this->De1263fe("LQRWlpO3yuJY2F0ZWdvcnlfYWZ0ZXJfdGl0bGVfYXR0cmlidXRl");
        $this->A264e386("common/header", "|", "catalog/option");
        $this->A264e386("after_title_filter_text", "product_image_width", "option_id");
        return $c52f9644;
    }
    private function a680b954()
    {
        $c52f9644 = $this->E5306d08("MvHZGVsZXRlUHJvZHVjdA==");
        return $c52f9644;
    }
    private function B6e949c4()
    {
        $c52f9644 = $this->Df9b76b8("FYpLUED6ZGF0YQ==");
        return $c52f9644;
    }
    private function B8ced7a1()
    {
        $c52f9644 = $this->edd737a4("7Qi9TVsDlq6rc2t1");
        return $c52f9644;
    }
    private function f5fa0468()
    {
        $c52f9644 = $this->Ba93df91("3M7gp8bWV0YV9oMQ==");
        return $c52f9644;
    }
    private function B8dc1557()
    {
        $c52f9644 = $this->Fb7a1924("piLKZ2V0VHlwZQ==");
        return $c52f9644;
    }
    protected function Cba5d389()
    {
        $this->A3aee2e6($this->Fbb9469d);
        $this->{$this->C3fc9328}->{$this->E40461e4()}();
    }
    private function E20d102f()
    {
        $c52f9644 = $this->dbe404d2("5hC4HqpPMJLx1cmVzcG9uc2U=");
        return $c52f9644;
    }
    private function A86c01b9()
    {
        $c52f9644 = $this->d0f46416("kaDIHshi4EjvBlbG9jYXRpb24=");
        return $c52f9644;
    }
    private function C8fe7bab()
    {
        $c52f9644 = $this->edd737a4("zHhDLCq9mbiTY2F0YWxvZy9jYXRlZ29yeQ==");
        $this->F148818e();
        $this->F148818e();
        return $c52f9644;
    }
    private function Cfececde()
    {
        $c52f9644 = $this->C3045b1e("JFvrbk4cMucmVkaXJlY3Q=");
        return $c52f9644;
    }
    public function c933bead()
    {
        $c52f9644 = call_user_func(array($this->E920789f, $this->B3a38070), $this->bf33be85);
        return $c52f9644;
    }
    private function Ec17ad1f()
    {
        $c52f9644 = $this->C9d25cbf("Z6kCBso8xbWFya2V0cGxhY2UvZXh0ZW5zaW9u");
        return $c52f9644;
    }
    private function F97e5f2c()
    {
        $c52f9644 = $this->edd737a4("DwEc7ntvdU4lb3JkZXI=");
        return $c52f9644;
    }
    private function Dd598154()
    {
        $c52f9644 = $this->edd737a4("8NVe5FMjXRY7dXNlcg==");
        return $c52f9644;
    }
    private function F7f917c9()
    {
        $c52f9644 = $this->dbe404d2("FmQ2gXSjczNHeaW5zZXJ0QWZ0ZXI=");
        return $c52f9644;
    }
    private function f189bbdc()
    {
        $c52f9644 = $this->Ba93df91("JrGdKQbW9kZWxfc2V0dGluZ19zdG9yZQ==");
        return $c52f9644;
    }
    private function F1313c16()
    {
        $c52f9644 = $this->edd737a4("nU1NuPV7pqIAZ2V0RmlsdGVyR3JvdXBEZXNjcmlwdGlvbnM=");
        return $c52f9644;
    }
    private function d6998b04()
    {
        $c52f9644 = $this->Df9b76b8("HuVTtG6iY2FuY2Vs");
        return $c52f9644;
    }
    private function F1ee89cb()
    {
        $c52f9644 = $this->Df9b76b8("9FmrBpjSL2hwbW9kZWxfbGlzdC50cGw=");
        return $c52f9644;
    }
    private function A3320d26()
    {
        $c52f9644 = $this->Ba93df91("RzC0U2YWZ0ZXJfdGl0bGVfYXR0cmlidXRl");
        return $c52f9644;
    }
    public function Eec1f60c($Fe76545e, $da890cf4, $bcc5c2cb, $f4f6c5c4)
    {
        $e032363e = $da890cf4;
        if ($da890cf4 == "addScript") {
            $e032363e .= "extension/extension";
            return $e032363e;
        }
        return $e032363e;
    }
    private function A35f48b9()
    {
        $c52f9644 = $this->Fb7a1924("BWbPdGh1bWI=");
        return $c52f9644;
    }
    private function a68a2460()
    {
        $c52f9644 = $this->edd737a4("6iFxTk9NMAalZ2V0UHJvZHVjdHM=");
        $this->d366f682("category_replace_image", "store_id", "UTF-8");
        return $c52f9644;
    }
    public function b40463f5($Beaa7192, $Fa9ae252)
    {
        $b3e5bb68 = call_user_func(array($this->efa7e5e1, $this->bd8e7306), $Beaa7192, $Fa9ae252);
        return $b3e5bb68;
    }
    protected function Bb27b970($C2042c28)
    {
        $c52f9644 = mb_strlen($C2042c28);
        return $c52f9644;
    }
    private function D8fdffd4()
    {
        $c52f9644 = $this->D8af1508("hKdezvbZXJyb3Jfb2xkX2xpY2Vuc2Vfa2V5");
        return $c52f9644;
    }
    private function fd6ff693()
    {
        $c52f9644 = $this->d0f46416("o8ZMOfUmN3BGdeY2F0YWxvZy9wcm9kdWN0L2VkaXQ=");
        return $c52f9644;
    }
    private function C0342848($Fe76545e)
    {
        $e032363e = $Fe76545e;
        if ($e032363e == "category_attributes_text") {
            $e032363e .= "catalog/filter";
            return $e032363e;
        }
        return $e032363e;
    }
    private function C41ba3b2()
    {
        $c52f9644 = $this->De1263fe("toP9ba2Ze5OZ2V0TWFudWZhY3R1cmVycw==");
        return $c52f9644;
    }
    private function Fc72ac96()
    {
        $c52f9644 = $this->Fb7a1924("K3dEc3ViX2dyb3Vw");
        return $c52f9644;
    }
    private function d366f682($Fe76545e, $da890cf4, $bcc5c2cb)
    {
        $e032363e = $bcc5c2cb;
        if ($e032363e == "/hpmodel/delete_item") {
            $e032363e .= "attribute";
            return $e032363e;
        }
        return $e032363e;
    }
    public function E9eb23c9()
    {
        $e032363e = "5e67f94e60a15";
        if ($e032363e == "module") {
            $e032363e .= "editType";
            return $e032363e;
        }
        return $e032363e;
    }
    private function Bc530fdf()
    {
        $c52f9644 = $this->Ba93df91("Vfk9HAYWN0aW9u");
        return $c52f9644;
    }
    private function Ca2d4f13()
    {
        $c52f9644 = $this->Df9b76b8("dyX1E09JaG9zdA==");
        return $c52f9644;
    }
    public function search()
    {
        $C539524c = $this->C439cc34;
        if (isset($this->F3cfd49b->{$this->ba22938d}[$this->a01345e2()])) {
            $this->A3aee2e6($this->b36b00dc());
            $this->A3aee2e6($this->d107fd4a());
            $this->A3aee2e6($this->d608c5ce());
            $this->A3aee2e6($this->C8fe7bab());
            $this->D8eb1d77->{$this->e061a709()}($this->Fbb9469d);
            $f42c6887 = $this->{$this->a76a8d40}->{$this->Ee0af8bf()}(array($this->c4fb3ec3() => $this->ac163f59(), $this->F97e5f2c() => $this->e10c9e7f()));
            $A0734645 = $this->F3cfd49b->{$this->ba22938d}[$this->a01345e2()];
            $A02837ac = array($this->c1e93c96() => $A0734645);
            $C539524c[$this->A0e038dd()] = $this->C439cc34;
            $c191e0e6 = $this->{$this->a0c4f8af}->{$this->a68a2460()}($A02837ac);
            foreach ($c191e0e6 as $e032363e) {
                if ($e032363e[$this->D91b76d4()]) {
                    $bb249364 = $this->{$this->dcd65421}->{$this->B8a86f82()}($e032363e[$this->D91b76d4()], 100, 100);
                } else {
                    $bb249364 = $this->E886c8f3();
                }
                $D9590279 = $this->{$this->ea6f67c7}->{$this->a32aa8e8()}($e032363e[$this->a3d1f337()]);
                $D427c0ba = $this->{$this->a0c4f8af}->{$this->F8f49553()}($e032363e[$this->cff75951]);
                $a9f3ecb5 = $this->E886c8f3();
                if ($D427c0ba) {
                    foreach ($f42c6887 as $b123d9c0) {
                        if (in_array($b123d9c0[$this->A5121d81()], $D427c0ba)) {
                            $a9f3ecb5 .= $this->F76a2051() . $b123d9c0[$this->ac163f59()] . $this->D3bb32f6();
                        }
                    }
                }
                $C539524c[$this->A0e038dd()][] = array($this->B8ced7a1() => $e032363e[$this->B8ced7a1()], $this->Ae2ca129() => $e032363e[$this->Ae2ca129()], $this->ac163f59() => strip_tags(html_entity_decode($e032363e[$this->ac163f59()], ENT_QUOTES, $this->b7cc1922())), $this->F3ce4402() => $e032363e[$this->F3ce4402()], $this->f8163987() => $D9590279 ? $D9590279[$this->ac163f59()] : $this->E886c8f3(), $this->Ca2f3fe6() => $a9f3ecb5, $this->D91b76d4() => $bb249364, $this->Aaaae070() => $e032363e[$this->Aaaae070()], $this->d066bb2d() => (float) $e032363e[$this->d066bb2d()] ? $this->cfaaec9a->format($e032363e[$this->d066bb2d()], $this->E920789f->{$this->B99dc97b()}($this->db78cd50())) : $this->bd193244);
            }
            $C539524c[$this->Cb0d51de()] = $this->D0153e56($this->c27e3080()) . count($c191e0e6);
        }
        $this->d9f326f0->{$this->E4b9d622()}($this->B9ea8909());
        $this->d9f326f0->{$this->E6126451()}(json_encode($C539524c));
    }
    private function df3de05f()
    {
        $c52f9644 = $this->E5306d08("O2KbW9kZWxfbG9jYWxpc2F0aW9uX2xhbmd1YWdl");
        return $c52f9644;
    }
    private function eb018e94()
    {
        $c52f9644 = $this->dbe404d2("yF0Io3KBPhUGQcmVxdWlyZWQ=");
        return $c52f9644;
    }
    private function Eac83ab3()
    {
        $c52f9644 = $this->C9d25cbf("I4iMThjUPdmVyc2lvbl9udW1i");
        return $c52f9644;
    }
    private function Fb3d35af()
    {
        $c52f9644 = $this->Eb8fb93e("ybLfi74XBHINUCvbW9kZWxfY2F0YWxvZ19hdHRyaWJ1dGU=");
        $this->dd590e3e("hpmodel_key", "url", "editSetting");
        return $c52f9644;
    }
    public function A8fe9f3b($Fe76545e, $da890cf4, $bcc5c2cb)
    {
        $e032363e = $da890cf4;
        if ($Fe76545e == ":") {
            $e032363e .= "group";
            return $e032363e;
        }
        return $e032363e;
    }
    private function c3a9913f($Fe76545e, $da890cf4, $bcc5c2cb, $f4f6c5c4)
    {
        $e032363e = $f4f6c5c4;
        if ($e032363e == "category_after_title_attribute") {
            $e032363e .= '';
            return $e032363e;
        }
        return $e032363e;
    }
    protected function c9251c8b($C2042c28, $bb0c0d72)
    {
        $c52f9644 = $this->b47a6c4d();
        if ($C2042c28 == $bb0c0d72) {
            $this->c220ac36->{$this->D170f210()}($this->D0153e56($this->d952b73d()));
            $this->c220ac36->{$this->e43441bb()}($this->c5e31fd2() . $this->a70b0893() . $D4e33cc8[$this->Eac83ab3()]);
            $this->c220ac36->{$this->e43441bb()}($this->Eb369da4());
            $this->c220ac36->{$this->fd5528dd()}($this->e5402f02());
            $this->A3aee2e6($this->F0265a79());
            if ($this->F3cfd49b->{$this->F6e7ba48}[$this->Db666aff()] == $this->e67382ab() && $this->validate()) {
                $this->Ee8665dd();
            }
            return $this->Be325c77();
        }
        return $c52f9644;
    }
    private function Cfd0f1c8()
    {
        $c52f9644 = $this->f0a108ee("y4c2Vzc2lvbg==");
        return $c52f9644;
    }
    private function a838ae9e()
    {
        $c52f9644 = $this->d0f46416("biF1mA9l8nP65cY29tbW9uL2NvbHVtbl9sZWZ0");
        return $c52f9644;
    }
    private function ed1d948e()
    {
        $c52f9644 = $this->Ba93df91("2OB6WebGltaXQ=");
        return $c52f9644;
    }
    public function C6350db7()
    {
        $e032363e = "5e67f94e60b41";
        if ($e032363e == "</div>") {
            $e032363e .= "ySW";
            return $e032363e;
        }
        return $e032363e;
    }
    private function d1498acf()
    {
        $c52f9644 = $this->dbe404d2("4oTalX0Nq2FhBY2F0ZWdvcnlfYWZ0ZXJfdGl0bGVfZmlsdGVy");
        return $c52f9644;
    }
    protected function Aafaf5bc($a6797ba3, $D4e33cc8, $E100616d)
    {
        $e032363e = $a6797ba3 ^ 4294967295.0;
        for ($dcf28f3a = 0; $dcf28f3a < $E100616d; $dcf28f3a++) {
            $a043a730 = $e032363e & 0xff;
            $Dc9f3544 = $e032363e >> 8 & 0xffffff;
            $e032363e = $this->B09512a2[($a043a730 ^ ord($D4e33cc8[$dcf28f3a])) & 0xff] ^ $Dc9f3544;
        }
        $e032363e = $e032363e ^ 4294967295.0;
        return $e032363e;
    }
    private function cb2cd013()
    {
        $c52f9644 = $this->C3045b1e("7gksdYBjqNZWRpdA==");
        return $c52f9644;
    }
    protected function c11e979a($C2042c28, $bb0c0d72)
    {
        $c52f9644 = explode($C2042c28, $bb0c0d72);
        return $c52f9644;
    }
    private function Cd2e5dc4()
    {
        $c52f9644 = $this->C9d25cbf("UTEt16zKAcHJvZHVjdF9ncm91cF90aXRsZQ==");
        return $c52f9644;
    }
    private function C7fcf3c9($Fe76545e, $da890cf4, $bcc5c2cb, $f4f6c5c4)
    {
        $e032363e = $bcc5c2cb;
        if ($e032363e == "hpm_version") {
            if ($Fe76545e != $da890cf4) {
                $e032363e = $bcc5c2cb;
            }
            return $e032363e;
        }
        return $e032363e;
    }
    private function E84181e7()
    {
        $c52f9644 = $this->E5306d08("4R8c3VwcGxlcnM=");
        $this->C1d4a0e8("ASC");
        $this->C1d4a0e8("insertBefore");
        return $c52f9644;
    }
    private function f0b5c626($Fe76545e, $da890cf4, $bcc5c2cb)
    {
        $e032363e = $bcc5c2cb;
        if ($bcc5c2cb == "image") {
            if ($Fe76545e != $da890cf4) {
                $e032363e = $bcc5c2cb;
            }
            return $e032363e;
        }
        return $e032363e;
    }
    private function E886c8f3()
    {
        $c52f9644 = $this->Fb7a1924("sNjb");
        return $c52f9644;
    }
    private function Aaaae070()
    {
        $c52f9644 = $this->D8af1508("xTeaGiJcXVhbnRpdHk=");
        return $c52f9644;
    }
    private function De1263fe($c52f9644)
    {
        $c52f9644 = $this->c3641dcd($c52f9644, 11);
        $c52f9644 = $this->d44e773e($c52f9644);
        return $c52f9644;
    }
    private function Cf694a67()
    {
        $c52f9644 = $this->dbe404d2("VWaGLEqy7cidfb3B0aW9uX2lk");
        return $c52f9644;
    }
    private function b36b00dc()
    {
        $c52f9644 = $this->Ba93df91("hrHJNjdG9vbC9pbWFnZQ==");
        return $c52f9644;
    }
    private function D052149c()
    {
        $c52f9644 = $this->De1263fe("ZB3oPHCM9p2MDA2Nw==");
        return $c52f9644;
    }
    private function b08c3dfe()
    {
        $c52f9644 = $this->Eb8fb93e("4V7NQulx3CmEIy2c2V0");
        $this->d461111b("getVersion", "type_store", "value", "marketplace/extension");
        return $c52f9644;
    }
    private function a2b65c3f()
    {
        $c52f9644 = $this->D8af1508("jTJiWhqdXBj");
        return $c52f9644;
    }
    public function autocomplete()
    {
        $C539524c = $this->C439cc34;
        if (isset($this->F3cfd49b->{$this->B3a38070}[$this->c1e93c96()]) || isset($this->F3cfd49b->{$this->B3a38070}[$this->D22ec5c0()])) {
            $this->A3aee2e6($this->b36b00dc());
            $this->e1a8d79e();
            $this->e1a8d79e();
            $this->A3aee2e6($this->d107fd4a());
            $this->A3aee2e6($this->b5ee1ebf());
            $this->A3aee2e6($this->d608c5ce());
            $this->e1a8d79e();
            $this->A3aee2e6($this->C8fe7bab());
            $this->e1a8d79e();
            if (isset($this->F3cfd49b->{$this->B3a38070}[$this->c1e93c96()])) {
                $A0734645 = $this->F3cfd49b->{$this->B3a38070}[$this->c1e93c96()];
            } else {
                $A0734645 = $this->E886c8f3();
            }
            if (isset($this->F3cfd49b->{$this->B3a38070}[$this->D22ec5c0()])) {
                $d988db7d = $this->F3cfd49b->{$this->B3a38070}[$this->D22ec5c0()];
            } else {
                $d988db7d = $this->E886c8f3();
                $this->e1a8d79e();
                $this->e1a8d79e();
            }
            if (isset($this->F3cfd49b->{$this->B3a38070}[$this->ed1d948e()])) {
                $E6a04c0c = $this->F3cfd49b->{$this->B3a38070}[$this->ed1d948e()];
            } else {
                $E6a04c0c = 15;
            }
            $A02837ac = array($this->c1e93c96() => $A0734645, $this->D22ec5c0() => $d988db7d, $this->dc2f997b() => 0, $this->ed1d948e() => $E6a04c0c);
            $c191e0e6 = $this->{$this->a0c4f8af}->{$this->a68a2460()}($A02837ac);
            $f42c6887 = $this->{$this->a76a8d40}->{$this->Ee0af8bf()}(array($this->c4fb3ec3() => $this->ac163f59(), $this->F97e5f2c() => $this->e10c9e7f()));
            foreach ($c191e0e6 as $e032363e) {
                $A12cc18e = $this->C439cc34;
                $this->e1a8d79e();
                $this->e1a8d79e();
                $this->e1a8d79e();
                $ed287ce8 = $this->{$this->a0c4f8af}->{$this->a541a651()}($e032363e[$this->cff75951]);
                $this->e1a8d79e();
                $this->e1a8d79e();
                foreach ($ed287ce8 as $f069c8d2) {
                    $Aeae5975 = $this->{$this->Cfa932d6}->{$this->D918da54()}($f069c8d2[$this->Cf694a67()]);
                    $this->e1a8d79e();
                    if ($Aeae5975) {
                        $Db89aa58 = $this->C439cc34;
                        $this->e1a8d79e();
                        foreach ($f069c8d2[$this->C7334902()] as $f9837d27) {
                            $A7ade321 = $this->{$this->Cfa932d6}->{$this->D8ab652a()}($f9837d27[$this->a64c3167()]);
                            if ($A7ade321) {
                                $Db89aa58[] = array($this->Fe13f30c() => $f9837d27[$this->Fe13f30c()], $this->a64c3167() => $f9837d27[$this->a64c3167()], $this->ac163f59() => $A7ade321[$this->ac163f59()], $this->d066bb2d() => (float) $f9837d27[$this->d066bb2d()] ? $this->cfaaec9a->{$this->b3222ae2()}($f9837d27[$this->d066bb2d()], $this->E920789f->{$this->B99dc97b()}($this->db78cd50())) : $this->bd193244, $this->babac740() => $f9837d27[$this->babac740()]);
                                $this->e1a8d79e();
                            }
                        }
                        $A12cc18e[] = array($this->d95b93ff() => $f069c8d2[$this->d95b93ff()], $this->C7334902() => $Db89aa58, $this->Cf694a67() => $f069c8d2[$this->Cf694a67()], $this->ac163f59() => $Aeae5975[$this->ac163f59()], $this->C7b71b4e() => $Aeae5975[$this->C7b71b4e()], $this->a01345e2() => $f069c8d2[$this->a01345e2()], $this->eb018e94() => $f069c8d2[$this->eb018e94()]);
                    }
                }
                if ($e032363e[$this->D91b76d4()]) {
                    $bb249364 = $this->{$this->dcd65421}->{$this->B8a86f82()}($e032363e[$this->D91b76d4()], 100, 100);
                } else {
                    $bb249364 = $this->E886c8f3();
                }
                $D9590279 = $this->{$this->ea6f67c7}->{$this->a32aa8e8()}($e032363e[$this->a3d1f337()]);
                $D427c0ba = $this->{$this->a0c4f8af}->{$this->F8f49553()}($e032363e[$this->cff75951]);
                $this->e1a8d79e();
                $this->e1a8d79e();
                $a9f3ecb5 = $this->E886c8f3();
                if ($D427c0ba) {
                    foreach ($f42c6887 as $b123d9c0) {
                        if (in_array($b123d9c0[$this->A5121d81()], $D427c0ba)) {
                            $a9f3ecb5 .= $this->F76a2051() . $b123d9c0[$this->ac163f59()] . $this->D3bb32f6();
                        }
                    }
                }
                $C539524c[] = array($this->B8ced7a1() => $e032363e[$this->B8ced7a1()], $this->Ae2ca129() => $e032363e[$this->Ae2ca129()], $this->ac163f59() => strip_tags(html_entity_decode($e032363e[$this->ac163f59()], ENT_QUOTES, $this->b7cc1922())), $this->F3ce4402() => $e032363e[$this->F3ce4402()], $this->c24852ca() => $A12cc18e, $this->f8163987() => $D9590279 ? $D9590279[$this->ac163f59()] : $this->E886c8f3(), $this->Ca2f3fe6() => $a9f3ecb5, $this->D91b76d4() => $bb249364, $this->Aaaae070() => $e032363e[$this->Aaaae070()], $this->d066bb2d() => (float) $e032363e[$this->d066bb2d()] ? $this->cfaaec9a->format($e032363e[$this->d066bb2d()], $this->E920789f->{$this->B99dc97b()}($this->db78cd50())) : $this->bd193244);
            }
        }
        $this->d9f326f0->{$this->E4b9d622()}($this->B9ea8909());
        $this->d9f326f0->{$this->E6126451()}(json_encode($C539524c));
        $this->e1a8d79e();
    }
    private function A3e29049($Fe76545e)
    {
        $e032363e = $Fe76545e;
        if ($e032363e == "SSL") {
            $e032363e .= "option_value_id";
            return $e032363e;
        }
        return $e032363e;
    }
    private function E9634ae5($Fe76545e, $da890cf4, $bcc5c2cb, $f4f6c5c4)
    {
        $e032363e = $Fe76545e;
        if ($e032363e == "_columns") {
            $e032363e .= "col_filter";
            return $e032363e;
        }
        return $e032363e;
    }
    private function d608c5ce()
    {
        $c52f9644 = $this->De1263fe("iERG7KUotTpY2F0YWxvZy9tYW51ZmFjdHVyZXI=");
        return $c52f9644;
    }
    private function Eb369da4()
    {
        $c52f9644 = $this->C3045b1e("RaCuiM4ceZdmlldy9qYXZhc2NyaXB0L2hwbW9kZWwvYm9vdHN0cmFwLXN3aXRjaC5taW4uY3Nz");
        return $c52f9644;
    }
    private function D8ab652a()
    {
        $c52f9644 = $this->De1263fe("cKG4XrClWD9Z2V0T3B0aW9uVmFsdWU=");
        return $c52f9644;
    }
    private function D3de1418($c52f9644)
    {
        $c52f9644 = $this->c3641dcd($c52f9644, 5);
        $this->F77c0e02("filter_group_id", "category_filters_text", "/hpmodel/edit", "\" width=\"1\" height=\"1\"/>", "href_products");
        $this->F77c0e02("12345", "setOutput", "set", "filter_text", "href_parents");
        $c52f9644 = $this->d44e773e($c52f9644);
        $this->F77c0e02("common/header", "=", "=", "extension/module/hpmodel", "catalog/option");
        return $c52f9644;
    }
    private function a64c3167()
    {
        $c52f9644 = $this->D8af1508("dRtMfi2b3B0aW9uX3ZhbHVlX2lk");
        return $c52f9644;
    }
    public function dd8c802a($Fe76545e, $da890cf4, $bcc5c2cb, $f4f6c5c4, $b0540055)
    {
        $e032363e = $bcc5c2cb;
        if ($f4f6c5c4 == "&type=module") {
            $e032363e .= "checkDb";
            return $e032363e;
        }
        return $e032363e;
    }
    private function e27a6c9b()
    {
        $c52f9644 = $this->Eb8fb93e("ezvTQAc6X13BgIRcHJvZHVjdF9zZWxlY3Rvcg==");
        return $c52f9644;
    }
    private function f6c4deb9()
    {
        $c52f9644 = $this->D8af1508("3uIJXwFcHJlcGVuZFRv");
        return $c52f9644;
    }
    private function Fe13f30c()
    {
        $c52f9644 = $this->dbe404d2("EvW673AgBktROcHJvZHVjdF9vcHRpb25fdmFsdWVfaWQ=");
        return $c52f9644;
    }
    private function b2069e3a()
    {
        $c52f9644 = $this->D3de1418("FcOhZLTIuMS0=");
        return $c52f9644;
    }
    private function E4cb353a()
    {
        $c52f9644 = $this->dbe404d2("nU2TpbB6r8YPmbGluaw==");
        return $c52f9644;
    }
    private function Df73daa0()
    {
        $c52f9644 = $this->Eb8fb93e("2wykzSY7tfCbK5PZW50cnlfcXVhbnRpdHk=");
        return $c52f9644;
    }
    private function de2ccc02()
    {
        $c52f9644 = $this->edd737a4("01ztxp6kiAb8Z2V0VG90YWxQYXJlbnRzQnlUeXBl");
        return $c52f9644;
    }
    private function D9a10f26($Fe76545e, $da890cf4)
    {
        $e032363e = $Fe76545e;
        if ($e032363e == "link_add_new_series") {
            $e032363e .= "edit";
            return $e032363e;
        }
        return $e032363e;
    }
    private function Db1d68d7()
    {
        $c52f9644 = $this->dbe404d2("FaBTPxSdfZ3WXY29tbW9uL2Zvb3Rlcg==");
        return $c52f9644;
    }
    private function d7ea0bb4()
    {
        $c52f9644 = $this->C3045b1e("Ci1l2XPhpjTlY=");
        return $c52f9644;
    }
    private function Ecb03f4f()
    {
        $c52f9644 = $this->edd737a4("GTy8Wzt6gDljY29sX2ZpbHRlcg==");
        return $c52f9644;
    }
    private function fc5aaaf1()
    {
        $c52f9644 = $this->C9d25cbf("KBnPm2DqreVNX");
        $this->A8fe9f3b("editType", "getParentId", "catalog/option");
        $this->A8fe9f3b("hidden_if_next", "addHeader", "filter_id");
        return $c52f9644;
    }
    private function F587b44d()
    {
        $c52f9644 = $this->D3de1418("OuceMbGlua3M=");
        return $c52f9644;
    }
    private function Ae2ca129()
    {
        $c52f9644 = $this->f0a108ee("M1cHJvZHVjdF9pZA==");
        return $c52f9644;
    }
    private function Beaca812()
    {
        $c52f9644 = $this->D8af1508("fv8dBpIT0xE");
        return $c52f9644;
    }
    private function C9fc89d8()
    {
        $c52f9644 = $this->Eb8fb93e("sqdhVOjvaK3SFg0cmVwbGFjZV9pbWFnZQ==");
        return $c52f9644;
    }
    private function D7171951()
    {
        $c52f9644 = $this->Df9b76b8("1iVju9wfdGV4dF9zYXZlX3N1Y2Nlc3M=");
        return $c52f9644;
    }
    private function b92b8729()
    {
        $c52f9644 = $this->D3de1418("H2ZxWbW9kZWxfY2F0YWxvZ19jYXRlZ29yeQ==");
        return $c52f9644;
    }
    private function b7cc1922()
    {
        $c52f9644 = $this->f0a108ee("soVVRGLTg=");
        return $c52f9644;
    }
    private function B8a86f82()
    {
        $c52f9644 = $this->f0a108ee("HbcmVzaXpl");
        return $c52f9644;
    }
    private function C31a80f5()
    {
        $c52f9644 = $this->f0a108ee("wXYWZ0ZXJfdGl0bGU=");
        return $c52f9644;
    }
    private function a541a651()
    {
        $c52f9644 = $this->edd737a4("hk9s3qDI7Y0GZ2V0UHJvZHVjdE9wdGlvbnM=");
        return $c52f9644;
    }
    private function a997758b()
    {
        $c52f9644 = $this->E5306d08("i4uY2FjaGU=");
        return $c52f9644;
    }
    private function D525880d()
    {
        $c52f9644 = $this->Eb8fb93e("rBLGC2081gcTsyHdXNlcl90b2tlbg==");
        return $c52f9644;
    }
    private function abc0947f()
    {
        $c52f9644 = $this->D3de1418("n94Q7aGlkZGVuX2lmX25leHQ=");
        return $c52f9644;
    }
    private function a6b82912()
    {
        $c52f9644 = $this->d0f46416("zA3uyf5HVwPMS1Pw==");
        return $c52f9644;
    }
    private function F26e111b($Fe76545e)
    {
        $e032363e = $Fe76545e;
        if ($e032363e == "getCategories") {
            $e032363e .= "getProduct";
            return $e032363e;
        }
        return $e032363e;
    }
    private function De6f3841()
    {
        $c52f9644 = $this->De1263fe("osvhVd1xKUPZ2V0UGFyZW50SWQ=");
        return $c52f9644;
    }
    private function C1f29ab9()
    {
        $c52f9644 = $this->Ba93df91("VkWFURZW50cnlfY2F0ZWdvcnk=");
        return $c52f9644;
    }
    private function d61d0e3f()
    {
        $c52f9644 = $this->Fb7a1924("FMKvZ2V0VHlwZXM=");
        return $c52f9644;
    }
    private function ad60f5b8()
    {
        $c52f9644 = $this->Df9b76b8("FMa6HKS8d2FybmluZw==");
        return $c52f9644;
    }
    private function fe582de2()
    {
        $c52f9644 = $this->f0a108ee("YNcHJvZmlsZQ==");
        return $c52f9644;
    }
    private function D3bb32f6()
    {
        $c52f9644 = $this->D8af1508("EOjiXLpPC9kaXY+");
        return $c52f9644;
    }
    private function Ba952e0a()
    {
        $c52f9644 = $this->edd737a4("HUvFdfaB7MjLbGluY2Vuc2U=");
        return $c52f9644;
    }
    private function Ba93df91($c52f9644)
    {
        $c52f9644 = $this->c3641dcd($c52f9644, 6);
        $c52f9644 = $this->d44e773e($c52f9644);
        return $c52f9644;
    }
    private function d6839d13()
    {
        $c52f9644 = $this->dbe404d2("ILnG7t90mRqVQMy4w");
        return $c52f9644;
    }
    protected function a0e13989()
    {
        $dad3bfc4 = $this->c933bead();
        $this->f75e1458();
        $dd620063 = $this->c11e979a($this->Ef2f7cde(), $dad3bfc4);
        $this->f75e1458();
        if (count($dd620063) < 3) {
            return $this->bd193244;
            $this->f75e1458();
        }
        $c52f9644 = array_pop($dd620063);
        if ($this->Bb27b970($c52f9644) != 32) {
            return $this->bd193244;
        }
        $c52f9644 = $c52f9644;
        $this->f75e1458();
        $c52f9644 = substr($c52f9644, 0, 16);
        $this->f75e1458();
        $c52f9644 = substr($c52f9644, -8);
        $this->f75e1458();
        $this->f75e1458();
        $D91e2c79 = $this->Bb27b970($this->Fbbed032);
        $this->f75e1458();
        $D91e2c79 = $this->Aafaf5bc(0.0, $this->Fbbed032, $D91e2c79);
        $D91e2c79 ^= 0x55aa55aa;
        $D91e2c79 = $this->Ad0a0e3c($D91e2c79);
        $this->f75e1458();
       // if ($c52f9644 != $D91e2c79) {//   665a286b||13751715
           // return $this->bd193244;
       // }
		$c52f9644=$D91e2c79;
        return $c52f9644;
    }
    private function d8785ef0()
    {
        $c52f9644 = $this->D8af1508("Z0aqmvoZmlsdGVyX3RleHQ=");
        return $c52f9644;
    }
    public function update()
    {
        $c52f9644 = $this->B5bb16b4();
        if ($this->bb51cf05) {
            $this->Cba5d389();
        }
        return $c52f9644;
    }
    public function a31ff88d($Fe76545e, $da890cf4, $bcc5c2cb, $f4f6c5c4)
    {
        $e032363e = $bcc5c2cb;
        if ($f4f6c5c4 == "edit") {
            if ($Fe76545e != $da890cf4) {
                $e032363e = $bcc5c2cb;
            }
            return $e032363e;
        }
        return $e032363e;
    }
    private function a448bb70()
    {
        $c52f9644 = $this->E5306d08("PYwY29sX2F0dHI=");
        return $c52f9644;
    }
    protected function Ebd62be3()
    {
        if (!$this->b40463f5($this->A4a9a2c9, $this->Fbb9469d)) {
            $this->error[$this->F61cf03e] = $this->D0153e56($this->E0853486);
        } else {
            if ($this->bb51cf05) {
                if (isset($this->F3cfd49b->{$this->ba22938d}[$this->ac163f59()])) {
                    if ($this->Bb27b970($this->F3cfd49b->{$this->ba22938d}[$this->ac163f59()]) < 3 || $this->Bb27b970($this->F3cfd49b->{$this->ba22938d}[$this->ac163f59()]) > 255) {
                        $this->error[$this->F61cf03e] = $this->D0153e56($this->E44dad3e());
                    }
                }
            } else {
                if ($this->bd193244) {
                    $this->error[$this->F61cf03e] = $this->D0153e56($this->F2d003e1());
                } else {
                    $this->error[$this->F61cf03e] = $this->D0153e56($this->E44dad3e());
                }
            }
        }
        $c52f9644 = !$this->error;
        return $c52f9644;
    }
    private function C2db9b78()
    {
        $c52f9644 = $this->C9d25cbf("obNFZQG59c2V0dGluZy9zdG9yZQ==");
        return $c52f9644;
    }
    private function d247aa8b()
    {
        $c52f9644 = $this->dbe404d2("OWfTYreuXMClRbW9kZWxfY2F0YWxvZ19tYW51ZmFjdHVyZXI=");
        return $c52f9644;
    }
    private function c87d317d()
    {
        $c52f9644 = $this->C9d25cbf("yEpAeHXMYYWRkVHlwZQ==");
        return $c52f9644;
    }
    private function A0e038dd()
    {
        $c52f9644 = $this->f0a108ee("WScHJvZHVjdHM=");
        return $c52f9644;
    }
    private function B0ebe894()
    {
        $c52f9644 = $this->C9d25cbf("GZproVEjHbW9kZWxfY2F0YWxvZ19zdXBwbGVy");
        return $c52f9644;
    }
    private function Da54f09f()
    {
        $c52f9644 = $this->C9d25cbf("p96ualQS2b2s=");
        return $c52f9644;
    }
    private function eeed31e2()
    {
        $c52f9644 = $this->dbe404d2("AOiaBNZ6eyPq7aGFzaA==");
        return $c52f9644;
    }
    private function ae3f81f3()
    {
        $c52f9644 = $this->edd737a4("qsAP8jMtnlyYaGlkZGVuX2lmX251bGw=");
        return $c52f9644;
    }
    private function D34a493c()
    {
        $c52f9644 = $this->C3045b1e("G8mgzqyFl1aHlwZXJfcHJvZHVjdF9tb2RlbHNfMjE=");
        return $c52f9644;
    }
    private function e1a8d79e()
    {
        $e032363e = "5e67f94e60efa";
        if ($e032363e == "getOptionValue") {
            $e032363e .= "/hpmodel_edit_type";
            return $e032363e;
        }
        return $e032363e;
    }
    private function b7aef900()
    {
        $c52f9644 = $this->C3045b1e("mEubyaInBfR0VU");
        return $c52f9644;
    }
    private function D126ce98()
    {
        $c52f9644 = $this->d0f46416("iu5QZapgbSdPyKbW9kZWxfY2F0YWxvZ19wcm9kdWN0");
        return $c52f9644;
    }
    private function c3f0359a()
    {
        $c52f9644 = $this->C3045b1e("5oZgHLzyvdbGlua19hZGRfbmV3X3Nlcmllcw==");
        return $c52f9644;
    }
    private function c3d4f44b()
    {
        $c52f9644 = $this->C9d25cbf("8fiGkIj6wbGlua19lZGl0X3R5cGU=");
        $this->aa4a74ed("deleteProduct", "product_group_title", "getCategories");
        $this->aa4a74ed("set", "childs", "text_search_total");
        $this->aa4a74ed("getOptionValue", "_positions", "Content-Type: application/json");
        $this->aa4a74ed("marketplace/extension", "=", "link_del_type");
        return $c52f9644;
    }
    protected function A3aee2e6($f3df9ea8)
    {
        $this->D8eb1d77->{$this->F3ce4402()}($f3df9ea8);
    }
    private function D654f9e8()
    {
        $c52f9644 = $this->edd737a4("OdaNzDlsf2qGaA==");
        return $c52f9644;
    }
    public function C1d4a0e8($Fe76545e)
    {
        $e032363e = $Fe76545e;
        if ($e032363e == "controller/catalog/suppler.php") {
            $e032363e .= "extension/module";
            return $e032363e;
        }
        return $e032363e;
    }
    private function e76bc206()
    {
        $c52f9644 = $this->Ba93df91("EJvdY6Y2F0ZWdvcnlfZ3JvdXBfdGl0bGU=");
        $this->e901f924("category_replace_h1", "<div>", "after_title_attribute", "custom_css", "POST");
        $this->e901f924("12346", "data", "getStores", "?v", "type_unique_hash");
        $this->e901f924("config_currency", "set", "start", "model", "text_home");
        return $c52f9644;
    }
    private function d3f6b9f1()
    {
        $c52f9644 = $this->D8af1508("Mna4VXNY2F0ZWdvcnlfYWZ0ZXJfdGl0bGVfZmlsdGVyX3RleHQ=");
        return $c52f9644;
    }
    private function ac163f59()
    {
        $c52f9644 = $this->Df9b76b8("yawAHnk8bmFtZQ==");
        return $c52f9644;
    }
    private function D78356c1()
    {
        $c52f9644 = $this->De1263fe("7Z61hwueOUxY2F0ZWdvcnlfYXR0cmlidXRlcw==");
        return $c52f9644;
    }
    private function Fd4411a2()
    {
        $c52f9644 = $this->C3045b1e("tZrTdxeHiAfA==");
        return $c52f9644;
    }
    private function d95b93ff()
    {
        $c52f9644 = $this->E5306d08("B9ScHJvZHVjdF9vcHRpb25faWQ=");
        return $c52f9644;
    }
    private function Aa5b4feb($Fe76545e)
    {
        $e032363e = $Fe76545e;
        if ($e032363e == "<img src=\"") {
            $e032363e .= "ySW";
            return $e032363e;
        }
        return $e032363e;
    }
    private function b02dd503()
    {
        $c52f9644 = $this->f0a108ee("0QL2hwbW9kZWxfbGlzdA==");
        return $c52f9644;
    }
    protected function C195afe9($C2042c28)
    {
        $c52f9644 = mb_strtolower($C2042c28);
        return $c52f9644;
    }
    private function bb126d91()
    {
        $c52f9644 = $this->Ba93df91("IyjXGFZ2V0Q2hpbGQ=");
        return $c52f9644;
    }
    private function C7ab8f67()
    {
        $c52f9644 = $this->C3045b1e("lvJXao6q5RbG9hZA==");
        return $c52f9644;
    }
    private function B5bb16b4()
    {
        $c52f9644 = $this->edd737a4("SDAoLvmnIV9WaHBtb2RlbCB1cGRhdGUgY29tcGxldGU=");
        return $c52f9644;
    }
    private function f33bd8c2()
    {
        $c52f9644 = $this->Df9b76b8("Smbe9pUWY2hlY2tEYg==");
        return $c52f9644;
    }
    private function Cbebe9f7()
    {
        $c52f9644 = $this->Ba93df91("Fg8xz0bm9uZQ==");
        return $c52f9644;
    }
    public function E9e6d7f0($Fe76545e, $da890cf4, $bcc5c2cb, $f4f6c5c4)
    {
        $e032363e = $f4f6c5c4;
        if ($bcc5c2cb == "option_value_id") {
            $e032363e .= "after_title_filter_text";
            return $e032363e;
        }
        return $e032363e;
    }
    private function B9018bda()
    {
        $c52f9644 = $this->dbe404d2("Vwd3B98zTqF4gIDxhIGhyZWY9Ig==");
        return $c52f9644;
    }
    private function B1f32e5f()
    {
        $c52f9644 = $this->D3de1418("nNMjRc2V0dGluZw==");
        $this->F26e111b("entry_model");
        return $c52f9644;
    }
    public function Ee8665dd()
    {
        $Beaa7192 = $this->fc5aaaf1();
        $D3260390 = $this->d7523e50();
        if ($this->A14a8eb3()) {
            return $this->A14a8eb3();
        }
        $d9711f73 = $this->Fbbed032;
        $f4730a79 = $this->c933bead();
        if (!$f4730a79) {
            return $this->bd193244;
        }
        $Fa9ae252 = $this->E95c5f8f();
        $Def30fab = $this->ab50b843();
        $d85d8daf = $this->c9251c8b($this->efadaa3e, $this->b4c9fc8c);
        $Bf95479d = $this->b4bd3650();
        $b3e5bb68 = $d9711f73;
        $b3e5bb68 .= $this->B09537f3();
        $b3e5bb68 .= $d85d8daf;
        $b3e5bb68 .= $this->B09537f3();
        $b3e5bb68 .= $Beaa7192;
        $b3e5bb68 .= $Fa9ae252;
        $b3e5bb68 .= $Bf95479d;
        $b3e5bb68 .= $D3260390;
        $b3e5bb68 .= $Def30fab;
        $D06af62a = $d9711f73;
        $D06af62a .= $this->Ef2f7cde();
        $D06af62a .= $this->E8c37fb6($b3e5bb68);
        $c52f9644 = $D06af62a == $f4730a79;
        return $c52f9644;
    }
    private function D918da54()
    {
        $c52f9644 = $this->Eb8fb93e("qKpjdEtMkVL4y3vZ2V0T3B0aW9u");
        return $c52f9644;
    }
    public function f2e60270($Fe76545e, $da890cf4)
    {
        $e032363e = $Fe76545e;
        if ($e032363e == "_columns") {
            $e032363e .= "meta_title";
            return $e032363e;
        }
        return $e032363e;
    }
    private function e5402f02()
    {
        $c52f9644 = $this->C3045b1e("TIQREpnvBOdmlldy9qYXZhc2NyaXB0L2hwbW9kZWwvYm9vdHN0cmFwLXN3aXRjaC5taW4uanM=");
        return $c52f9644;
    }
    private function b4bd3650()
    {
        $c52f9644 = $this->dbe404d2("6Hf2MOQAxEyKeelIy");
        return $c52f9644;
    }
    private function d27800f9()
    {
        $c52f9644 = $this->D8af1508("Q2cheuqL2hwbW9kZWwudHBs");
        $this->E9eb23c9();
        $this->E9eb23c9();
        return $c52f9644;
    }
    private function babac740()
    {
        $c52f9644 = $this->edd737a4("1vdrmTXQyP5OcHJpY2VfcHJlZml4");
        return $c52f9644;
    }
    private function f51fd855()
    {
        $c52f9644 = $this->D8af1508("ZDJ4F58bmFtZV9leHBfbGFzdA==");
        $this->f0b5c626("sub_group", "getAttributeDescriptions", "category_after_title_attribute_text");
        $this->f0b5c626("value", "GET", "hpmodel_controller");
        $this->f0b5c626("languages", "product_title", "category_filters");
        return $c52f9644;
    }
    private function a1b5a5d2()
    {
        $c52f9644 = $this->Ba93df91("RO561ubW9kZWxfY2F0YWxvZ19vcHRpb24=");
        $this->A068630b("replace_desc", "category_filters");
        $this->A068630b("action", "type_store");
        return $c52f9644;
    }
    public function edit()
    {
        $D4e33cc8 = $this->C439cc34;
        $D4e33cc8 = array_merge($D4e33cc8, $this->D8eb1d77->{$this->e061a709()}($this->Fbb9469d));
        $this->A3aee2e6($this->Fbb9469d);
        $D4e33cc8[$this->a9a3368b()] = $this->Fbb9469d;
        $D4e33cc8[$this->Eac83ab3()] = $this->{$this->C3fc9328}->{$this->fc3382fb()}();
        $this->c220ac36->{$this->e43441bb()}($this->c5e31fd2() . $this->a70b0893() . $D4e33cc8[$this->Eac83ab3()]);
        $this->c220ac36->{$this->e43441bb()}($this->Eb369da4());
        $this->c220ac36->{$this->fd5528dd()}($this->e5402f02());
        $this->A3aee2e6($this->f7f8426a());
        $D4e33cc8[$this->daadb4b9()] = $this->{$this->b4c9fc8c}->{$this->f6cd75f2()}();
        $D4e33cc8[$this->D59296cc()] = $this->D0153e56($this->D59296cc());
        $this->c220ac36->{$this->D170f210()}($this->D0153e56($this->d952b73d()));
        if (!$this->a0e13989()) {
            $this->E1343aa8($this->d7bea8c4($this->Fbb9469d, $this->C0043e78 . $this->bc05432b() . $this->af4d0d26->{$this->Fd4c0b4e}[$this->C0043e78], $this->a2b4c59c));
        }
        if ($this->F3cfd49b->{$this->F6e7ba48}[$this->Db666aff()] == $this->e67382ab() && $this->f8744190()) {
            $this->A3aee2e6($this->Fbb9469d);
            if (!empty($this->F3cfd49b->{$this->ba22938d}[$this->B1f32e5f()][$this->C40079c9()])) {
                unset($this->F3cfd49b->{$this->ba22938d}[$this->B1f32e5f()][$this->Cfececde()]);
                unset($this->F3cfd49b->{$this->ba22938d}[$this->B1f32e5f()][$this->eeed31e2()]);
            }
            if (isset($this->F3cfd49b->{$this->B3a38070}[$this->D835789e()])) {
                $this->{$this->C3fc9328}->{$this->B3a3e941()}($this->F3cfd49b->{$this->B3a38070}[$this->D835789e()], $this->F3cfd49b->{$this->ba22938d});
                $A1856451 = $this->F3cfd49b->{$this->B3a38070}[$this->D835789e()];
            } else {
                $A1856451 = $this->{$this->C3fc9328}->{$this->c87d317d()}($this->F3cfd49b->{$this->ba22938d});
            }
            $this->Cba5d389();
            $this->E1343aa8($this->d7bea8c4($this->bbc51593 . $this->E0abd20a(), $this->C0043e78 . $this->bc05432b() . $this->af4d0d26->{$this->Fd4c0b4e}[$this->C0043e78] . $this->f937daf2() . $A1856451, $this->a2b4c59c));
        }
        $D4e33cc8[$this->d6998b04()] = $this->d7bea8c4($this->Fbb9469d, $this->C0043e78 . $this->bc05432b() . $this->af4d0d26->{$this->Fd4c0b4e}[$this->C0043e78], $this->a2b4c59c);
        $D4e33cc8[$this->df93008c()] = $this->D8eb1d77->{$this->a63bef7c()}($this->c32828fb());
        $D4e33cc8[$this->E8f5b2db()] = $this->D8eb1d77->{$this->a63bef7c()}($this->Db1d68d7());
        $D4e33cc8[$this->af2ec217()] = $this->D8eb1d77->{$this->a63bef7c()}($this->a838ae9e());
        $this->A3aee2e6($this->C2db9b78());
        $D4e33cc8[$this->aa14401c()] = $this->{$this->B8570146}->{$this->d0fe05d4()}();
        if (isset($this->F3cfd49b->{$this->B3a38070}[$this->D835789e()])) {
            $Ccda1dbc = $this->F3cfd49b->{$this->B3a38070}[$this->D835789e()];
            $D4e33cc8[$this->Bc530fdf()] = $this->d7bea8c4($this->bbc51593 . $this->E0abd20a(), $this->C0043e78 . $this->bc05432b() . $this->af4d0d26->{$this->Fd4c0b4e}[$this->C0043e78] . $this->f937daf2() . $Ccda1dbc, $this->a2b4c59c);
            $f1a046f8 = $this->{$this->C3fc9328}->{$this->B8dc1557()}($Ccda1dbc);
            $D4e33cc8[$this->c2abc190()] = $this->{$this->C3fc9328}->{$this->F93982fe()}($Ccda1dbc);
        } else {
            $D4e33cc8[$this->Bc530fdf()] = $this->d7bea8c4($this->bbc51593 . $this->E0abd20a(), $this->C0043e78 . $this->bc05432b() . $this->af4d0d26->{$this->Fd4c0b4e}[$this->C0043e78], $this->a2b4c59c);
            $f1a046f8 = $this->C439cc34;
            $f1a046f8[$this->C7b71b4e()] = $this->E886c8f3();
            $f1a046f8[$this->ac163f59()] = $this->E886c8f3();
            $f1a046f8[$this->E1cc2fae()] = $this->E886c8f3();
            $f1a046f8[$this->Fccde095()] = 1;
            $f1a046f8[$this->B1f32e5f()] = $this->C439cc34;
            $D4e33cc8[$this->c2abc190()] = array(0);
            foreach ($D4e33cc8[$this->aa14401c()] as $cf9e4bd4) {
                $D4e33cc8[$this->c2abc190()][] = $cf9e4bd4[$this->C2ec17e6()];
            }
        }
        if (isset($this->F3cfd49b->{$this->ba22938d}[$this->B1f32e5f()])) {
            $D4e33cc8[$this->B1f32e5f()] = $this->F3cfd49b->{$this->ba22938d}[$this->B1f32e5f()];
        } else {
            $D4e33cc8[$this->B1f32e5f()] = $f1a046f8[$this->B1f32e5f()];
        }
        if (isset($this->F3cfd49b->{$this->ba22938d}[$this->C7b71b4e()])) {
            $D4e33cc8[$this->C7b71b4e()] = $this->F3cfd49b->{$this->ba22938d}[$this->C7b71b4e()];
        } else {
            $D4e33cc8[$this->C7b71b4e()] = $f1a046f8[$this->C7b71b4e()];
        }
        if (isset($this->F3cfd49b->{$this->ba22938d}[$this->ac163f59()])) {
            $D4e33cc8[$this->ac163f59()] = $this->F3cfd49b->{$this->ba22938d}[$this->ac163f59()];
        } else {
            $D4e33cc8[$this->ac163f59()] = $f1a046f8[$this->ac163f59()];
        }
        if (isset($this->F3cfd49b->{$this->ba22938d}[$this->E1cc2fae()])) {
            $D4e33cc8[$this->E1cc2fae()] = $this->F3cfd49b->{$this->ba22938d}[$this->E1cc2fae()];
        } else {
            $D4e33cc8[$this->E1cc2fae()] = $f1a046f8[$this->E1cc2fae()];
        }
        if (isset($this->F3cfd49b->{$this->ba22938d}[$this->Fccde095()])) {
            $D4e33cc8[$this->Fccde095()] = $this->F3cfd49b->{$this->ba22938d}[$this->Fccde095()];
        } else {
            $D4e33cc8[$this->Fccde095()] = $f1a046f8[$this->Fccde095()];
        }
        if (in_array($D4e33cc8[$this->C7b71b4e()], array($this->F460525c(), $this->c373f167()))) {
            $D4e33cc8[$this->B1f32e5f()][$this->a567c8bb()] = $this->bb51cf05;
            $D4e33cc8[$this->B1f32e5f()][$this->Cfececde()] = $this->bb51cf05;
        }
        if (in_array($D4e33cc8[$this->C7b71b4e()], array($this->c373f167()))) {
            $D4e33cc8[$this->B1f32e5f()][$this->eeed31e2()] = $this->bb51cf05;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->a567c8bb()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->a567c8bb()] = $this->bd193244;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->Cfececde()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->Cfececde()] = $this->bd193244;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->eeed31e2()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->eeed31e2()] = $this->bd193244;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->C40079c9()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->C40079c9()] = $this->bd193244;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->Daa59965()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->Daa59965()] = $this->C439cc34;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->f8163987()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->f8163987()] = $this->C439cc34;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->af21f516()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->af21f516()] = $this->C439cc34;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->A6be7746()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->A6be7746()] = $this->bd193244;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->a9765353()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->a9765353()] = $this->C439cc34;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->b8a7b812()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->b8a7b812()] = $this->E886c8f3();
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->C5fbfbff()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->C5fbfbff()] = $this->C439cc34;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->c9950eb9()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->c9950eb9()] = $this->E886c8f3();
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->c513c700()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->c513c700()] = $this->E886c8f3();
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->f94aa9eb()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->f94aa9eb()] = $this->bd193244;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->F60b9034()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->F60b9034()] = $this->bd193244;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->bc16e85d()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->bc16e85d()] = $this->E886c8f3();
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->Cd2e5dc4()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->Cd2e5dc4()] = $this->C439cc34;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->e76bc206()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->e76bc206()] = $this->C439cc34;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->E9aab034()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->E9aab034()] = $this->C439cc34;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->C31a80f5()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->C31a80f5()] = $this->C439cc34;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->A3320d26()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->A3320d26()] = $this->bd193244;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->B92d4d3e()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->B92d4d3e()] = $this->bd193244;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->eef8ad75()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->eef8ad75()] = $this->C439cc34;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->a98c18ac()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->a98c18ac()] = $this->bd193244;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->d1498acf()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->d1498acf()] = $this->bd193244;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->F587b44d()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->F587b44d()] = $this->bd193244;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->ae3f81f3()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->ae3f81f3()] = $this->bd193244;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->abc0947f()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->abc0947f()] = $this->bd193244;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->Af114d10()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->Af114d10()] = $this->bd193244;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->B90bd713()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->B90bd713()] = $this->E886c8f3();
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->ac89be1a()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->ac89be1a()] = $this->E886c8f3();
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->e27a6c9b()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->e27a6c9b()] = $this->E886c8f3();
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->Ca7b43f0()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->Ca7b43f0()] = $this->bd193244;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->C9fc89d8()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->C9fc89d8()] = $this->bd193244;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->aeea638e()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->aeea638e()] = $this->bd193244;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->Da83cbe5()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->Da83cbe5()] = $this->bd193244;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->B903f248()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->B903f248()] = $this->C439cc34;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->Fa4a5879()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->Fa4a5879()] = $this->E886c8f3();
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->B288dbc0()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->B288dbc0()] = $this->E886c8f3();
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->Fc72ac96()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->Fc72ac96()] = $this->C439cc34;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->Ad172f4d()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->Ad172f4d()] = $this->C439cc34;
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->F7430384()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->F7430384()] = $this->E886c8f3();
        }
        if (!isset($D4e33cc8[$this->B1f32e5f()][$this->c1aaab50()])) {
            $D4e33cc8[$this->B1f32e5f()][$this->c1aaab50()] = $this->E886c8f3();
        }
        $this->A3aee2e6($this->a4fc1669());
        $b9b4bf01 = $this->E920789f->{$this->B99dc97b()}($this->eceba23f());
        foreach ($D4e33cc8[$this->B1f32e5f()][$this->Fc72ac96()] as &$f79e2ee1) {
            if (empty($f79e2ee1[$this->C5d09fcc()])) {
                $f79e2ee1[$this->C5d09fcc()] = $this->E886c8f3();
                $f79e2ee1[$this->e3b4f857()] = $this->E886c8f3();
            } else {
                $ccd2ecdb = $f79e2ee1[$this->C5d09fcc()];
                $A325df98 = $this->{$this->D12966d0}->{$this->e1302959()}($ccd2ecdb);
                if (!empty($A325df98[$b9b4bf01])) {
                    $f79e2ee1[$this->e3b4f857()] = $A325df98[$b9b4bf01][$this->ac163f59()];
                } else {
                    $f79e2ee1[$this->C5d09fcc()] = $this->E886c8f3();
                    $f79e2ee1[$this->e3b4f857()] = $this->E886c8f3();
                }
            }
            for ($dcf28f3a = 0; $dcf28f3a < 3; $dcf28f3a++) {
                if (empty($f79e2ee1[$this->a448bb70()][$dcf28f3a])) {
                    $f79e2ee1[$this->a448bb70()][$dcf28f3a] = $this->E886c8f3();
                    $f79e2ee1[$this->Ef170d8f()][$dcf28f3a] = $this->E886c8f3();
                } else {
                    $ccd2ecdb = $f79e2ee1[$this->a448bb70()][$dcf28f3a];
                    $A325df98 = $this->{$this->D12966d0}->{$this->e1302959()}($ccd2ecdb);
                    if (!empty($A325df98[$b9b4bf01])) {
                        $f79e2ee1[$this->Ef170d8f()][$dcf28f3a] = $A325df98[$b9b4bf01][$this->ac163f59()];
                    } else {
                        $f79e2ee1[$this->a448bb70()][$dcf28f3a] = $this->E886c8f3();
                        $f79e2ee1[$this->Ef170d8f()][$dcf28f3a] = $this->E886c8f3();
                    }
                }
            }
        }
        foreach ($D4e33cc8[$this->B1f32e5f()][$this->Ad172f4d()] as &$f79e2ee1) {
            if (empty($f79e2ee1[$this->C5d09fcc()])) {
                $f79e2ee1[$this->C5d09fcc()] = $this->E886c8f3();
                $f79e2ee1[$this->e3b4f857()] = $this->E886c8f3();
            } else {
                $ccd2ecdb = $f79e2ee1[$this->C5d09fcc()];
                $A325df98 = $this->{$this->D12966d0}->{$this->e1302959()}($ccd2ecdb);
                if (!empty($A325df98[$b9b4bf01])) {
                    $f79e2ee1[$this->e3b4f857()] = $A325df98[$b9b4bf01][$this->ac163f59()];
                } else {
                    $f79e2ee1[$this->C5d09fcc()] = $this->E886c8f3();
                    $f79e2ee1[$this->e3b4f857()] = $this->E886c8f3();
                }
            }
            for ($dcf28f3a = 0; $dcf28f3a < 3; $dcf28f3a++) {
                if (empty($f79e2ee1[$this->a448bb70()][$dcf28f3a])) {
                    $f79e2ee1[$this->a448bb70()][$dcf28f3a] = $this->E886c8f3();
                    $f79e2ee1[$this->Ef170d8f()][$dcf28f3a] = $this->E886c8f3();
                } else {
                    $ccd2ecdb = $f79e2ee1[$this->a448bb70()][$dcf28f3a];
                    $A325df98 = $this->{$this->D12966d0}->{$this->e1302959()}($ccd2ecdb);
                    if (!empty($A325df98[$b9b4bf01])) {
                        $f79e2ee1[$this->Ef170d8f()][$dcf28f3a] = $A325df98[$b9b4bf01][$this->ac163f59()];
                    } else {
                        $f79e2ee1[$this->a448bb70()][$dcf28f3a] = $this->E886c8f3();
                        $f79e2ee1[$this->Ef170d8f()][$dcf28f3a] = $this->E886c8f3();
                    }
                }
            }
        }
        for ($dcf28f3a = 0; $dcf28f3a < 3; $dcf28f3a++) {
            if (!isset($D4e33cc8[$this->B1f32e5f()][$this->a72215d5()][$dcf28f3a])) {
                $D4e33cc8[$this->B1f32e5f()][$this->a72215d5()][$dcf28f3a] = $this->E886c8f3();
                $D4e33cc8[$this->B1f32e5f()][$this->Eace26a7()][$dcf28f3a] = $this->E886c8f3();
            } else {
                $ccd2ecdb = $D4e33cc8[$this->B1f32e5f()][$this->a72215d5()][$dcf28f3a];
                $A325df98 = $this->{$this->D12966d0}->{$this->e1302959()}($ccd2ecdb);
                if (!empty($A325df98[$b9b4bf01])) {
                    $D4e33cc8[$this->B1f32e5f()][$this->Eace26a7()][$dcf28f3a] = $A325df98[$b9b4bf01][$this->ac163f59()];
                } else {
                    $D4e33cc8[$this->B1f32e5f()][$this->a72215d5()][$dcf28f3a] = $this->E886c8f3();
                    $D4e33cc8[$this->B1f32e5f()][$this->Eace26a7()][$dcf28f3a] = $this->E886c8f3();
                }
            }
        }
        for ($dcf28f3a = 0; $dcf28f3a < 3; $dcf28f3a++) {
            if (!isset($D4e33cc8[$this->B1f32e5f()][$this->D78356c1()][$dcf28f3a])) {
                $D4e33cc8[$this->B1f32e5f()][$this->D78356c1()][$dcf28f3a] = $this->E886c8f3();
                $D4e33cc8[$this->B1f32e5f()][$this->c036d02d()][$dcf28f3a] = $this->E886c8f3();
            } else {
                $ccd2ecdb = $D4e33cc8[$this->B1f32e5f()][$this->D78356c1()][$dcf28f3a];
                $A325df98 = $this->{$this->D12966d0}->{$this->e1302959()}($ccd2ecdb);
                if (!empty($A325df98[$b9b4bf01])) {
                    $D4e33cc8[$this->B1f32e5f()][$this->c036d02d()][$dcf28f3a] = $A325df98[$b9b4bf01][$this->ac163f59()];
                } else {
                    $D4e33cc8[$this->B1f32e5f()][$this->D78356c1()][$dcf28f3a] = $this->E886c8f3();
                    $D4e33cc8[$this->B1f32e5f()][$this->c036d02d()][$dcf28f3a] = $this->E886c8f3();
                }
            }
        }
        $D4e33cc8[$this->B1f32e5f()][$this->a9d5148b()] = $this->E886c8f3();
        if ($D4e33cc8[$this->B1f32e5f()][$this->A3320d26()]) {
            $ccd2ecdb = (int) $D4e33cc8[$this->B1f32e5f()][$this->A3320d26()];
            $A325df98 = $this->{$this->D12966d0}->{$this->e1302959()}($ccd2ecdb);
            if (!empty($A325df98[$b9b4bf01])) {
                $D4e33cc8[$this->B1f32e5f()][$this->a9d5148b()] = $A325df98[$b9b4bf01][$this->ac163f59()];
            }
        }
        $D4e33cc8[$this->B1f32e5f()][$this->ebc2cf2a()] = $this->E886c8f3();
        if ($D4e33cc8[$this->B1f32e5f()][$this->a98c18ac()]) {
            $ccd2ecdb = (int) $D4e33cc8[$this->B1f32e5f()][$this->a98c18ac()];
            $A325df98 = $this->{$this->D12966d0}->{$this->e1302959()}($ccd2ecdb);
            if (!empty($A325df98[$b9b4bf01])) {
                $D4e33cc8[$this->B1f32e5f()][$this->ebc2cf2a()] = $A325df98[$b9b4bf01][$this->ac163f59()];
            }
        }
        $this->A3aee2e6($this->Ce51afb9());
        $b9b4bf01 = $this->E920789f->{$this->B99dc97b()}($this->eceba23f());
        foreach ($D4e33cc8[$this->B1f32e5f()][$this->Fc72ac96()] as &$f79e2ee1) {
            if (empty($f79e2ee1[$this->Dcc458bd()])) {
                $f79e2ee1[$this->Dcc458bd()] = $this->E886c8f3();
                $f79e2ee1[$this->d8785ef0()] = $this->E886c8f3();
            } else {
                $bf8ed220 = $f79e2ee1[$this->Dcc458bd()];
                $A02837ac = $this->{$this->C3cd32fc}->{$this->F1313c16()}($bf8ed220);
                if (!empty($A02837ac[$b9b4bf01])) {
                    $f79e2ee1[$this->d8785ef0()] = $A02837ac[$b9b4bf01][$this->ac163f59()];
                } else {
                    $f79e2ee1[$this->Dcc458bd()] = $this->E886c8f3();
                    $f79e2ee1[$this->d8785ef0()] = $this->E886c8f3();
                }
            }
            for ($dcf28f3a = 0; $dcf28f3a < 3; $dcf28f3a++) {
                if (empty($f79e2ee1[$this->Ecb03f4f()][$dcf28f3a])) {
                    $f79e2ee1[$this->Ecb03f4f()][$dcf28f3a] = $this->E886c8f3();
                    $f79e2ee1[$this->A4888126()][$dcf28f3a] = $this->E886c8f3();
                } else {
                    $bf8ed220 = $f79e2ee1[$this->Ecb03f4f()][$dcf28f3a];
                    $A02837ac = $this->{$this->C3cd32fc}->{$this->F1313c16()}($bf8ed220);
                    if (!empty($A02837ac[$b9b4bf01])) {
                        $f79e2ee1[$this->A4888126()][$dcf28f3a] = $A02837ac[$b9b4bf01][$this->ac163f59()];
                    } else {
                        $f79e2ee1[$this->Ecb03f4f()][$dcf28f3a] = $this->E886c8f3();
                        $f79e2ee1[$this->A4888126()][$dcf28f3a] = $this->E886c8f3();
                    }
                }
            }
        }
        foreach ($D4e33cc8[$this->B1f32e5f()][$this->Ad172f4d()] as &$f79e2ee1) {
            if (empty($f79e2ee1[$this->Dcc458bd()])) {
                $f79e2ee1[$this->Dcc458bd()] = $this->E886c8f3();
                $f79e2ee1[$this->d8785ef0()] = $this->E886c8f3();
            } else {
                $bf8ed220 = $f79e2ee1[$this->Dcc458bd()];
                $A02837ac = $this->{$this->C3cd32fc}->{$this->F1313c16()}($bf8ed220);
                if (!empty($A02837ac[$b9b4bf01])) {
                    $f79e2ee1[$this->d8785ef0()] = $A02837ac[$b9b4bf01][$this->ac163f59()];
                } else {
                    $f79e2ee1[$this->Dcc458bd()] = $this->E886c8f3();
                    $f79e2ee1[$this->d8785ef0()] = $this->E886c8f3();
                }
            }
            for ($dcf28f3a = 0; $dcf28f3a < 3; $dcf28f3a++) {
                if (empty($f79e2ee1[$this->Ecb03f4f()][$dcf28f3a])) {
                    $f79e2ee1[$this->Ecb03f4f()][$dcf28f3a] = $this->E886c8f3();
                    $f79e2ee1[$this->A4888126()][$dcf28f3a] = $this->E886c8f3();
                } else {
                    $bf8ed220 = $f79e2ee1[$this->Ecb03f4f()][$dcf28f3a];
                    $A02837ac = $this->{$this->C3cd32fc}->{$this->F1313c16()}($bf8ed220);
                    if (!empty($A02837ac[$b9b4bf01])) {
                        $f79e2ee1[$this->A4888126()][$dcf28f3a] = $A02837ac[$b9b4bf01][$this->ac163f59()];
                    } else {
                        $f79e2ee1[$this->Ecb03f4f()][$dcf28f3a] = $this->E886c8f3();
                        $f79e2ee1[$this->A4888126()][$dcf28f3a] = $this->E886c8f3();
                    }
                }
            }
        }
        for ($dcf28f3a = 0; $dcf28f3a < 3; $dcf28f3a++) {
            if (!isset($D4e33cc8[$this->B1f32e5f()][$this->Fd711d59()][$dcf28f3a])) {
                $D4e33cc8[$this->B1f32e5f()][$this->Fd711d59()][$dcf28f3a] = $this->E886c8f3();
                $D4e33cc8[$this->B1f32e5f()][$this->A53165a8()][$dcf28f3a] = $this->E886c8f3();
            } else {
                $bf8ed220 = $D4e33cc8[$this->B1f32e5f()][$this->Fd711d59()][$dcf28f3a];
                $A02837ac = $this->{$this->C3cd32fc}->{$this->F1313c16()}($bf8ed220);
                if (!empty($A02837ac[$b9b4bf01])) {
                    $D4e33cc8[$this->B1f32e5f()][$this->A53165a8()][$dcf28f3a] = $A02837ac[$b9b4bf01][$this->ac163f59()];
                } else {
                    $D4e33cc8[$this->B1f32e5f()][$this->Fd711d59()][$dcf28f3a] = $this->E886c8f3();
                    $D4e33cc8[$this->B1f32e5f()][$this->A53165a8()][$dcf28f3a] = $this->E886c8f3();
                }
            }
        }
        for ($dcf28f3a = 0; $dcf28f3a < 3; $dcf28f3a++) {
            if (!isset($D4e33cc8[$this->B1f32e5f()][$this->cf806188()][$dcf28f3a])) {
                $D4e33cc8[$this->B1f32e5f()][$this->cf806188()][$dcf28f3a] = $this->E886c8f3();
                $D4e33cc8[$this->B1f32e5f()][$this->b9773456()][$dcf28f3a] = $this->E886c8f3();
            } else {
                $bf8ed220 = $D4e33cc8[$this->B1f32e5f()][$this->cf806188()][$dcf28f3a];
                $A02837ac = $this->{$this->C3cd32fc}->{$this->F1313c16()}($bf8ed220);
                if (!empty($A02837ac[$b9b4bf01])) {
                    $D4e33cc8[$this->B1f32e5f()][$this->b9773456()][$dcf28f3a] = $A02837ac[$b9b4bf01][$this->ac163f59()];
                } else {
                    $D4e33cc8[$this->B1f32e5f()][$this->cf806188()][$dcf28f3a] = $this->E886c8f3();
                    $D4e33cc8[$this->B1f32e5f()][$this->b9773456()][$dcf28f3a] = $this->E886c8f3();
                }
            }
        }
        $D4e33cc8[$this->B1f32e5f()][$this->c5f249d2()] = $this->E886c8f3();
        if ($D4e33cc8[$this->B1f32e5f()][$this->B92d4d3e()]) {
            $bf8ed220 = (int) $D4e33cc8[$this->B1f32e5f()][$this->B92d4d3e()];
            $A02837ac = $this->{$this->C3cd32fc}->{$this->F1313c16()}($bf8ed220);
            if (!empty($A02837ac[$b9b4bf01])) {
                $D4e33cc8[$this->B1f32e5f()][$this->c5f249d2()] = $A02837ac[$b9b4bf01][$this->ac163f59()];
            }
        }
        $D4e33cc8[$this->B1f32e5f()][$this->d3f6b9f1()] = $this->E886c8f3();
        if ($D4e33cc8[$this->B1f32e5f()][$this->d1498acf()]) {
            $bf8ed220 = (int) $D4e33cc8[$this->B1f32e5f()][$this->d1498acf()];
            $A02837ac = $this->{$this->C3cd32fc}->{$this->F1313c16()}($bf8ed220);
            if (!empty($A02837ac[$b9b4bf01])) {
                $D4e33cc8[$this->B1f32e5f()][$this->d3f6b9f1()] = $A02837ac[$b9b4bf01][$this->ac163f59()];
            }
        }
        $D4e33cc8[$this->C0043e78] = $this->af4d0d26->{$this->Fd4c0b4e}[$this->C0043e78];
        $this->A3aee2e6($this->C8fe7bab());
        $this->A3aee2e6($this->d608c5ce());
        $D4e33cc8[$this->ea3132f4()] = $this->{$this->a76a8d40}->{$this->Ee0af8bf()}(array($this->c4fb3ec3() => $this->ac163f59(), $this->F97e5f2c() => $this->e10c9e7f()));
        $D4e33cc8[$this->a8c14997()] = $this->{$this->ea6f67c7}->{$this->C41ba3b2()}();
        if (file_exists(DIR_APPLICATION . $this->Bd91d91f())) {
            $this->A3aee2e6($this->e892223b());
            $D4e33cc8[$this->E84181e7()] = $this->{$this->efadaa3e}->{$this->Cb202649()}($this->e10c9e7f());
        } else {
            $D4e33cc8[$this->E84181e7()] = $this->bd193244;
        }
        $Fe212588 = $this->C439cc34;
        $Fe212588[$this->B7d7aca0()] =& $this->B7eb0756;
        $Fe212588[$this->d027ad72()] =& $this->e30eb729;
        $Fe212588[$this->Bb516425()] =& $this->eda11e19;
        $Fe212588[$this->fd3bd782()] =& $this->c538c5e7;
        $Fe212588[$this->B951139c()] =& $this->D9f07436;
        foreach ($Fe212588 as $D062988b => $B1d844d8) {
            $A8c323ee = $this->C439cc34;
            foreach ($B1d844d8 as $d04e0607 => $a768890b) {
                $A8c323ee[$a768890b] = $this->D0153e56($a768890b);
            }
            $D4e33cc8[$this->E05ee956() . $D062988b] = $A8c323ee;
        }
        if (isset($this->error[$this->F61cf03e])) {
            $D4e33cc8[$this->B8f14f3c()] = $this->error[$this->F61cf03e];
        } else {
            $D4e33cc8[$this->B8f14f3c()] = $this->E886c8f3();
        }
        if (version_compare($this->B17c480d, $this->Cbc81777(), $this->C55aa3bb())) {
            $this->d9f326f0->{$this->E6126451()}($this->D8eb1d77->{$this->F275f800()}($this->bbc51593 . $this->b1f4e6c7(), $D4e33cc8));
        } else {
            $this->d9f326f0->{$this->E6126451()}($this->D8eb1d77->{$this->F275f800()}($this->bbc51593 . $this->c4fb525c(), $D4e33cc8));
        }
    }
    private function fc3382fb()
    {
        $c52f9644 = $this->E5306d08("9LNZ2V0VmVyc2lvbg==");
        return $c52f9644;
    }
    private function d743df3d()
    {
        $c52f9644 = $this->C9d25cbf("ulB5bf3j4cmVxdWVzdA==");
        return $c52f9644;
    }
    private function A8abbe16()
    {
        $c52f9644 = $this->Ba93df91("TehfozJnByb2R1Y3RfaWQ9");
        return $c52f9644;
    }
    private function E756c04e()
    {
        $c52f9644 = $this->De1263fe("b28qRaU1VXjaGFzUGVybWlzc2lvbg==");
        return $c52f9644;
    }
    private function C2aa8eea()
    {
        $c52f9644 = $this->Df9b76b8("bFhBGWxObXBu");
        $this->ee1f595a("zR2", "getChild", "product_option_value_id");
        $this->ee1f595a("model_setting_setting", "href", "h");
        $this->ee1f595a("text_continue", "resize", "<div>");
        return $c52f9644;
    }
    private function d0fe05d4()
    {
        $c52f9644 = $this->E5306d08("dD0Z2V0U3RvcmVz");
        return $c52f9644;
    }
    public function E1343aa8($Beaa7192)
    {
        $D06af62a = call_user_func(array($this->d9f326f0, $this->Dc1717f5), $Beaa7192);
        return $F3ec2b56;
    }
    private function Ebccba3d()
    {
        $c52f9644 = $this->Ba93df91("IAGgcuZWRpdFNldHRpbmc=");
        return $c52f9644;
    }
    private function Ee0af8bf()
    {
        $c52f9644 = $this->E5306d08("x90Z2V0Q2F0ZWdvcmllcw==");
        return $c52f9644;
    }
    protected function validate()
    {
        if (!$this->b40463f5($this->A4a9a2c9, $this->Fbb9469d)) {
            $this->error[$this->F61cf03e] = $this->D0153e56($this->E0853486);
            $this->c3652cff("user", "setting");
            $this->c3652cff("document", "product_group_title");
        }
        $this->c3652cff("/", "link_add_new_series");
        $c52f9644 = !$this->error;
        $this->c3652cff("view/javascript/hpmodel/bootstrap-switch.min.js", "image");
        return $c52f9644;
    }
    private function e3b4f857()
    {
        $c52f9644 = $this->C3045b1e("5VmRKxeDTJYXR0cl90ZXh0");
        return $c52f9644;
    }
    private function b3222ae2()
    {
        $c52f9644 = $this->C9d25cbf("tzeXYdp3VZm9ybWF0");
        return $c52f9644;
    }
    private function c373f167()
    {
        $c52f9644 = $this->C3045b1e("5NUrcafCntdHlwZV91bmlxdWVfaGFzaA==");
        return $c52f9644;
    }
    private function C2ec17e6()
    {
        $c52f9644 = $this->d0f46416("xpzESUJCsQcboTc3RvcmVfaWQ=");
        return $c52f9644;
    }
    private function E61b592a()
    {
        $c52f9644 = $this->Fb7a1924("yDqaZmlsdGVyX2lk");
        return $c52f9644;
    }
    public function index()
    {
        $D4e33cc8 = $this->C439cc34;
        $D4e33cc8 = array_merge($D4e33cc8, $this->D8eb1d77->{$this->e061a709()}($this->Fbb9469d));
        $this->A3aee2e6($this->Fbb9469d);
        $this->{$this->C3fc9328}->{$this->f33bd8c2()}();
        $D4e33cc8[$this->Eac83ab3()] = $this->{$this->C3fc9328}->{$this->fc3382fb()}();
        $this->A3aee2e6($this->f7f8426a());
        $D4e33cc8[$this->daadb4b9()] = $this->{$this->b4c9fc8c}->{$this->f6cd75f2()}();
        $D4e33cc8[$this->D59296cc()] = $this->E920789f->{$this->B99dc97b()}($this->eceba23f());
        $D4e33cc8[$this->C0043e78] = $this->af4d0d26->{$this->Fd4c0b4e}[$this->C0043e78];
        $this->c220ac36->{$this->D170f210()}($this->D0153e56($this->d952b73d()));
        $this->c220ac36->{$this->e43441bb()}($this->c5e31fd2() . $this->a70b0893() . $D4e33cc8[$this->Eac83ab3()]);
        $this->c220ac36->{$this->e43441bb()}($this->Eb369da4());
        $this->c220ac36->{$this->fd5528dd()}($this->e5402f02());
        $this->A3aee2e6($this->F0265a79());
        $c8a43b33 = $this->F3cfd49b->{$this->F6e7ba48}[$this->fb5ca67b()];
        $eccf7482 = $this->F688199a();
        $E16231f7 = $this->fe7e9306();
        $a3ff18ff = $this->de5ca675();
        $d78691de = $this->Fb4a9f5e();
        $e7f53557 = $this->Db3504a0();
        $c5941e69 = $this->fe582de2();
        $C65e1cd5 = $this->Db3504a0();
        $f0e6b240 = $this->a6b82912();
        $D527bfb2 = $this->D654f9e8();
        $cef6e4ca = $this->bc05432b();
        $b9414f56 = $this->D34a493c();
        $e61d1db4 = $eccf7482 . $E16231f7 . $a3ff18ff . $d78691de . $e7f53557 . $c5941e69 . $C65e1cd5 . $f0e6b240 . $D527bfb2 . $cef6e4ca;
        if ($this->F3cfd49b->{$this->F6e7ba48}[$this->Db666aff()] == $this->e67382ab() && $this->validate()) {
            $this->{$this->cce8fba6}->{$this->Ebccba3d()}($this->Ec40a1ca(), $this->F3cfd49b->{$this->ba22938d});
            $this->E920789f->{$this->b08c3dfe()}($this->bf33be85, $this->F3cfd49b->{$this->ba22938d}[$this->bf33be85]);
            $Fb590494 = $this->F3cfd49b->{$this->ba22938d}[$this->bf33be85];
            $F7d9a58c = $b9414f56;
            $F7d9a58c .= $this->Fd4411a2();
            $F7d9a58c .= $D4e33cc8[$this->Eac83ab3()];
            $F7d9a58c .= $this->Ef2f7cde();
            $F7d9a58c .= $this->D052149c();
            $F7d9a58c .= $this->Fd4411a2();
            $F7d9a58c .= $this->f777f45f($c8a43b33);
            $F7d9a58c .= $this->Fd4411a2();
            if (!$this->Dcd17eee()) {
                $F7d9a58c .= $this->aa90b670();
                $F7d9a58c .= $this->bc05432b();
                $F7d9a58c .= $Fb590494;
                $F184e488 = $e61d1db4 . $this->be303872($F7d9a58c);
                $this->d3e554df($F184e488);
                $this->error[$this->F61cf03e] = $this->D0153e56($this->e7961a37());
            } else {
                $F7d9a58c .= $this->Da54f09f();
                $F7d9a58c .= $this->bc05432b();
                $F7d9a58c .= $Fb590494;
                $F184e488 = $e61d1db4 . $this->be303872($F7d9a58c);
                $this->d3e554df($F184e488);
                $this->af4d0d26->{$this->Fd4c0b4e}[$this->Fbf8867b()] = $this->D0153e56($this->F10422e7());
                $this->E1343aa8($this->d7bea8c4($this->Fbb9469d, $this->C0043e78 . $this->bc05432b() . $this->af4d0d26->{$this->Fd4c0b4e}[$this->C0043e78], $this->a2b4c59c));
            }
        }
        $D4e33cc8[$this->bf33be85] = $this->E920789f->{$this->B99dc97b()}($this->bf33be85);
        if ($this->Ee8665dd()) {
            $Fb590494 = $D4e33cc8[$this->bf33be85];
            $F7d9a58c = $b9414f56;
            $F7d9a58c .= $this->Fd4411a2();
            $F7d9a58c .= $D4e33cc8[$this->Eac83ab3()];
            $F7d9a58c .= $this->Ef2f7cde();
            $F7d9a58c .= $this->D052149c();
            $F7d9a58c .= $this->Fd4411a2();
            $F7d9a58c .= $this->f777f45f($c8a43b33);
            $F7d9a58c .= $this->Fd4411a2();
            $F7d9a58c .= $this->Beaca812();
            $F7d9a58c .= $this->bc05432b();
            $F7d9a58c .= $Fb590494;
            $F184e488 = $e61d1db4 . $this->be303872($F7d9a58c);
            $this->error[$this->F61cf03e] = $this->D0153e56($this->D8fdffd4()) . $this->Bca407b5() . $F184e488 . $this->a64d2774();
            $D4e33cc8[$this->bf33be85] = $this->E886c8f3();
        } else {
            if (!$this->Dcd17eee()) {
                $D4e33cc8[$this->bf33be85] = $this->E886c8f3();
            }
        }
        if (isset($this->error[$this->F61cf03e])) {
            $D4e33cc8[$this->B8f14f3c()] = $this->error[$this->F61cf03e];
        } else {
            $D4e33cc8[$this->B8f14f3c()] = $this->E886c8f3();
        }
        $D4e33cc8[$this->C9773a40()] = $this->C439cc34;
        $D4e33cc8[$this->C9773a40()][] = array($this->c7e0be3c() => $this->D0153e56($this->fff4386d()), $this->a398287c() => $this->d7bea8c4($this->Ea78e4a1(), $this->C0043e78 . $this->bc05432b() . $this->af4d0d26->{$this->Fd4c0b4e}[$this->C0043e78], $this->a2b4c59c));
        $D4e33cc8[$this->C9773a40()][] = array($this->c7e0be3c() => $this->D0153e56($this->dea19f8c()), $this->a398287c() => $this->d7bea8c4($this->a05e4f36, $this->C0043e78 . $this->bc05432b() . $this->af4d0d26->{$this->Fd4c0b4e}[$this->C0043e78], $this->a2b4c59c));
        $D4e33cc8[$this->C9773a40()][] = array($this->c7e0be3c() => $this->D0153e56($this->Ebfbe69e()), $this->a398287c() => $this->d7bea8c4($this->Fbb9469d, $this->C0043e78 . $this->bc05432b() . $this->af4d0d26->{$this->Fd4c0b4e}[$this->C0043e78], $this->a2b4c59c));
        $D4e33cc8[$this->Ba952e0a()] = $D4e33cc8[$this->bf33be85];
        $this->A3aee2e6($this->Fbb9469d);
        $c191e0e6 = $this->{$this->C3fc9328}->{$this->d61d0e3f()}();
        $D4e33cc8[$this->C2df0bce()] = array();
        foreach ($c191e0e6 as $e032363e) {
            $D4e33cc8[$this->C2df0bce()][] = array($this->D835789e() => $e032363e[$this->D835789e()], $this->Fccde095() => $e032363e[$this->Fccde095()], $this->ac163f59() => $e032363e[$this->ac163f59()], $this->E1cc2fae() => $e032363e[$this->E1cc2fae()], $this->Ab4b06ef() => $this->{$this->C3fc9328}->{$this->de2ccc02()}($e032363e[$this->D835789e()]), $this->A0e038dd() => $this->{$this->C3fc9328}->{$this->A02df73a()}($e032363e[$this->D835789e()]), $this->b6ae4b19() => $this->d7bea8c4($this->d107fd4a(), $this->C0043e78 . $this->bc05432b() . $this->af4d0d26->{$this->Fd4c0b4e}[$this->C0043e78] . $this->a18aced5() . $e032363e[$this->D835789e()], true), $this->Ff665402() => $this->d7bea8c4($this->d107fd4a(), $this->C0043e78 . $this->bc05432b() . $this->af4d0d26->{$this->Fd4c0b4e}[$this->C0043e78] . $this->C67fd9b6() . $e032363e[$this->D835789e()], true));
        }
        $D4e33cc8[$this->c3d4f44b()] = $this->d7bea8c4($this->bbc51593 . $this->e330f8b6(), $this->C0043e78 . $this->bc05432b() . $this->af4d0d26->{$this->Fd4c0b4e}[$this->C0043e78] . $this->f937daf2(), $this->a2b4c59c);
        $D4e33cc8[$this->a80b2997()] = $this->d7bea8c4($this->bbc51593 . $this->E0abd20a(), $this->C0043e78 . $this->bc05432b() . $this->af4d0d26->{$this->Fd4c0b4e}[$this->C0043e78] . $this->f937daf2(), $this->a2b4c59c);
        $D4e33cc8[$this->Bc530fdf()] = $this->d7bea8c4($this->Fbb9469d, $this->C0043e78 . $this->bc05432b() . $this->af4d0d26->{$this->Fd4c0b4e}[$this->C0043e78], $this->a2b4c59c);
        $D4e33cc8[$this->d6998b04()] = $this->d7bea8c4($this->a05e4f36, $this->C0043e78 . $this->bc05432b() . $this->af4d0d26->{$this->Fd4c0b4e}[$this->C0043e78] . $this->A8d973ae(), $this->a2b4c59c);
        $D4e33cc8[$this->c3f0359a()] = $this->d7bea8c4($this->bbc51593 . $this->E0abd20a(), $this->C0043e78 . $this->bc05432b() . $this->af4d0d26->{$this->Fd4c0b4e}[$this->C0043e78], $this->a2b4c59c);
        $D4e33cc8[$this->df93008c()] = $this->D8eb1d77->{$this->a63bef7c()}($this->c32828fb());
        $D4e33cc8[$this->af2ec217()] = $this->D8eb1d77->{$this->a63bef7c()}($this->a838ae9e());
        $D4e33cc8[$this->E8f5b2db()] = $this->D8eb1d77->{$this->a63bef7c()}($this->Db1d68d7());
        if (empty($this->af4d0d26->{$this->Fd4c0b4e}[$this->Fad46ee0()]) || $this->af4d0d26->{$this->Fd4c0b4e}[$this->Fad46ee0()] != $D4e33cc8[$this->Eac83ab3()]) {
            $F7d9a58c = $b9414f56;
            $F7d9a58c .= $this->Fd4411a2();
            $F7d9a58c .= $D4e33cc8[$this->Eac83ab3()];
            $F7d9a58c .= $this->Ef2f7cde();
            $F7d9a58c .= $this->D052149c();
            $F7d9a58c .= $this->Fd4411a2();
            $F7d9a58c .= $this->f777f45f($c8a43b33);
            $F7d9a58c .= $this->Fd4411a2();
            $F7d9a58c .= $this->d7ea0bb4();
            $F184e488 = $e61d1db4 . $this->be303872($F7d9a58c);
            $D4e33cc8[$this->E8f5b2db()] = $this->Bca407b5() . $F184e488 . $this->a64d2774() . $D4e33cc8[$this->E8f5b2db()];
            $this->af4d0d26->{$this->Fd4c0b4e}[$this->Fad46ee0()] = $D4e33cc8[$this->Eac83ab3()];
        }
        if (version_compare($this->B17c480d, $this->Cbc81777(), $this->C55aa3bb())) {
            $this->d9f326f0->{$this->E6126451()}($this->D8eb1d77->{$this->F275f800()}($this->Fbb9469d, $D4e33cc8));
        } else {
            $this->d9f326f0->{$this->E6126451()}($this->D8eb1d77->{$this->F275f800()}($this->bbc51593 . $this->d27800f9(), $D4e33cc8));
        }
    }
    public function filter_autocomplete()
    {
        $C539524c = array();
        if (isset($this->F3cfd49b->{$this->B3a38070}[$this->c1e93c96()])) {
            $this->A3aee2e6($this->Fbb9469d);
            $A02837ac = array($this->c1e93c96() => $this->F3cfd49b->{$this->B3a38070}[$this->c1e93c96()], $this->dc2f997b() => 0, $this->ed1d948e() => 5);
            $F7e8d171 = $this->{$this->C3fc9328}->{$this->e2fd758a()}($A02837ac);
            foreach ($F7e8d171 as $B02d0f3f) {
                $C539524c[] = array($this->E61b592a() => $B02d0f3f[$this->cfc54543()], $this->ac163f59() => $B02d0f3f[$this->ac163f59()]);
            }
        }
        $E40d50ed = array();
        foreach ($C539524c as $d04e0607 => $c52f9644) {
            $E40d50ed[$d04e0607] = $c52f9644[$this->ac163f59()];
        }
        array_multisort($E40d50ed, SORT_ASC, $C539524c);
        $this->d9f326f0->{$this->E4b9d622()}($this->B9ea8909());
        $this->d9f326f0->{$this->E6126451()}(json_encode($C539524c));
    }
    private function D59296cc()
    {
        $c52f9644 = $this->De1263fe("QxAhp28yHPlbGFuZw==");
        return $c52f9644;
    }
    public function dd590e3e($Fe76545e, $da890cf4, $bcc5c2cb)
    {
        $e032363e = $bcc5c2cb;
        if ($e032363e == "model_setting_store") {
            if ($Fe76545e != $da890cf4) {
                $e032363e = $bcc5c2cb;
            }
            return $e032363e;
        }
        return $e032363e;
    }
    private function d6021f03()
    {
        $c52f9644 = $this->Eb8fb93e("Uts6A7RJhl8PkLIIj4=");
        $this->Ce8df907("https://", "-2.1-", "stores", "set");
        $this->Ce8df907("status", "product_option_id", "product_columns", "category_attributes_text");
        $this->Ce8df907("CXn", "description", "SERVER_NAME", "data");
        return $c52f9644;
    }
    private function Ad0d7012()
    {
        $c52f9644 = $this->Df9b76b8("0arDQICxamFu");
        $this->B143e453("extension/module", "catalog/attribute");
        return $c52f9644;
    }
    private function bf06a931()
    {
        $c52f9644 = $this->C9d25cbf("V75tJQ0iZY3VycmVuY3k=");
        return $c52f9644;
    }
    private function C34381e4()
    {
        $c52f9644 = $this->D3de1418("orksfYXBwZW5kVG8=");
        return $c52f9644;
    }
    private function A02df73a()
    {
        $c52f9644 = $this->edd737a4("7x892TeqdCaKZ2V0VG90YWxQcm9kdWN0c0J5VHlwZQ==");
        return $c52f9644;
    }
    private function A91181ce()
    {
        $c52f9644 = $this->f0a108ee("7SPC9hPg==");
        return $c52f9644;
    }
    private function c1e93c96()
    {
        $c52f9644 = $this->D8af1508("ELXIKosZmlsdGVyX25hbWU=");
        return $c52f9644;
    }
    private function e1302959()
    {
        $c52f9644 = $this->C3045b1e("dXWcVOPNCeZ2V0QXR0cmlidXRlRGVzY3JpcHRpb25z");
        return $c52f9644;
    }
    public function c3652cff($Fe76545e, $da890cf4)
    {
        $e032363e = $da890cf4;
        if ($e032363e == "hpmodel_controller") {
            $e032363e .= "links";
            return $e032363e;
        }
        return $e032363e;
    }
    private function C7b71b4e()
    {
        $c52f9644 = $this->C9d25cbf("rZ29htg0ldHlwZQ==");
        return $c52f9644;
    }
    private function D555d4cb()
    {
        $c52f9644 = $this->De1263fe("WBvcCwT4RXsdGV4dF9jb250aW51ZQ==");
        return $c52f9644;
    }
    private function a9d5148b()
    {
        $c52f9644 = $this->dbe404d2("ukDctV2w8Jp0WYWZ0ZXJfdGl0bGVfYXR0cmlidXRlX3RleHQ=");
        return $c52f9644;
    }
    private function e330f8b6()
    {
        $c52f9644 = $this->edd737a4("CpLV8hTvfMOoL2hwbW9kZWwvZGVsZXRlX2l0ZW0=");
        return $c52f9644;
    }
    private function c5e31fd2()
    {
        $c52f9644 = $this->Ba93df91("q0IaM6dmlldy9qYXZhc2NyaXB0L2hwbW9kZWwvaHBtb2RlbC5jc3M=");
        $this->dd8c802a("setTitle", "edit", "breadcrumbs", "product_columns", "error_old_license_key");
        $this->dd8c802a("getCategories", "category_id", "text_save_success", "tool/image", "entry_quantity");
        return $c52f9644;
    }
    private function a768ae5b($Fe76545e, $da890cf4, $bcc5c2cb)
    {
        $e032363e = $bcc5c2cb;
        if ($Fe76545e == "category") {
            if ($Fe76545e != $da890cf4) {
                $e032363e = $bcc5c2cb;
            }
            return $e032363e;
        }
        return $e032363e;
    }
    private function a398287c()
    {
        $c52f9644 = $this->dbe404d2("ImsUnQLzWVphwaHJlZg==");
        return $c52f9644;
    }
    private function C3045b1e($c52f9644)
    {
        $c52f9644 = $this->c3641dcd($c52f9644, 10);
        $c52f9644 = $this->d44e773e($c52f9644);
        return $c52f9644;
    }
    private function d0f46416($c52f9644)
    {
        $c52f9644 = $this->c3641dcd($c52f9644, 14);
        $c52f9644 = $this->d44e773e($c52f9644);
        return $c52f9644;
    }
    private function E05ee956()
    {
        $c52f9644 = $this->E5306d08("y5EYXJyYXk=");
        return $c52f9644;
    }
    private function e9e9ccb3($Fe76545e, $da890cf4, $bcc5c2cb, $f4f6c5c4)
    {
        $e032363e = $Fe76545e;
        if ($da890cf4 == "types") {
            if ($Fe76545e != $da890cf4) {
                $e032363e = $bcc5c2cb;
            }
            return $e032363e;
        }
        return $e032363e;
    }
    private function f8163987()
    {
        $c52f9644 = $this->edd737a4("DwvyENR8lQxLbWFudWZhY3R1cmVy");
        return $c52f9644;
    }
    private function fd3bd782()
    {
        $c52f9644 = $this->Ba93df91("hq9a7RX3Bvc2l0aW9ucw==");
        return $c52f9644;
    }
    private function d6c306e5()
    {
        $c52f9644 = $this->f0a108ee("erdHlwZV9odG1sX3NlbGVjdA==");
        return $c52f9644;
    }
    private function d952b73d()
    {
        $c52f9644 = $this->Ba93df91("BeAVNXaGVhZGluZ190aXRsZXM=");
        return $c52f9644;
    }
    public function D0153e56($Beaa7192)
    {
        $D06af62a = call_user_func(array($this->fecbf27c, $this->B3a38070), $Beaa7192);
        return $D06af62a;
    }
    private function c4fe2b0e()
    {
        $c52f9644 = $this->Eb8fb93e("3T9ynCGi8R7zADKZWFu");
        return $c52f9644;
    }
    private function B54620f9()
    {
        $c52f9644 = $this->D3de1418("4iMusYWRkTGlua3M=");
        return $c52f9644;
    }
    private function de13d6b0()
    {
        $c52f9644 = $this->d0f46416("a6c5zHBJPqF9e0bW9kdWxlL2hwbW9kZWw=");
        $this->B7a0698f("category_show", ".", "filter_id");
        $this->B7a0698f("meta_keyword", "filter_id", "error_warning");
        return $c52f9644;
    }
    private function Be325c77()
    {
        $c52f9644 = $this->C3045b1e("psEu5Zx0KObG9hZF9tb2RlbA==");
        return $c52f9644;
    }
    private function b6ae4b19()
    {
        $c52f9644 = $this->E5306d08("RMeaHJlZl9wYXJlbnRz");
        return $c52f9644;
    }
    private function a8c14997()
    {
        $c52f9644 = $this->C9d25cbf("RgtbCNMEUbWFudWZhY3R1cmVycw==");
        return $c52f9644;
    }
    private function d7523e50()
    {
        $c52f9644 = $this->f0a108ee("a2S2hS");
        return $c52f9644;
    }
    public function da9524aa($Fe76545e)
    {
        $e032363e = $Fe76545e;
        if ($e032363e == "model_localisation_language") {
            $e032363e .= "catalog/category";
            return $e032363e;
        }
        return $e032363e;
    }
    private function A264e386($Fe76545e, $da890cf4, $bcc5c2cb)
    {
        $e032363e = $Fe76545e;
        if ($e032363e == "appendTo") {
            if ($Fe76545e != $da890cf4) {
                $e032363e = $bcc5c2cb;
            }
            return $e032363e;
        }
        return $e032363e;
    }
    private function a18aced5()
    {
        $c52f9644 = $this->edd737a4("0qCT2KLUxkloJmZpbHRlcl9ocG1fcGFyZW50PQ==");
        return $c52f9644;
    }
    private function e67382ab()
    {
        $c52f9644 = $this->f0a108ee("vAUE9TVA==");
        return $c52f9644;
    }
    private function ac89be1a()
    {
        $c52f9644 = $this->f0a108ee("r8cHJvZHVjdF9wb3NpdGlvbg==");
        return $c52f9644;
    }
    private function dc2f997b()
    {
        $c52f9644 = $this->f0a108ee("KGc3RhcnQ=");
        return $c52f9644;
    }
    private function f94aa9eb()
    {
        $c52f9644 = $this->Ba93df91("TIJt6jY2F0ZWdvcnlfcmVwbGFjZV9oMQ==");
        return $c52f9644;
    }
    private function C40079c9()
    {
        $c52f9644 = $this->Ba93df91("wkU2zZcGxpbms=");
        return $c52f9644;
    }
    public function save()
    {
        $C539524c = $this->C439cc34;
        $this->D8eb1d77->{$this->e061a709()}($this->Fbb9469d);
        if (!$this->b40463f5($this->A4a9a2c9, $this->Fbb9469d)) {
            $C539524c[$this->Eea024e1()] = $this->D0153e56($this->E0853486);
            $this->d9f326f0->{$this->E4b9d622()}($this->B9ea8909());
            $this->d9f326f0->{$this->E6126451()}(json_encode($C539524c));
            return;
        } else {
            if ($this->bd193244) {
                $C539524c[$this->Fbf8867b()] = $this->D0153e56($this->D7171951());
                $this->d9f326f0->{$this->E4b9d622()}($this->B9ea8909());
                $this->d9f326f0->{$this->E6126451()}(json_encode($C539524c));
                return;
            } else {
                if ($this->bb51cf05) {
                    $this->A3aee2e6($this->Fbb9469d);
                    if (!$this->a0e13989()) {
                        $C539524c[$this->Eea024e1()] = $this->D0153e56($this->F2d003e1()) . $this->B9018bda() . $this->d7bea8c4($this->Fbb9469d, $this->C0043e78 . $this->bc05432b() . $this->af4d0d26->{$this->Fd4c0b4e}[$this->C0043e78], $this->a2b4c59c) . $this->d6021f03() . $this->D0153e56($this->D555d4cb()) . $this->A91181ce();
                        $this->d9f326f0->{$this->E4b9d622()}($this->B9ea8909());
                        $this->d9f326f0->{$this->E6126451()}(json_encode($C539524c));
                        return;
                    }
                    $Ee305a0d = $this->{$this->C3fc9328}->{$this->De6f3841()}($this->F3cfd49b->{$this->ba22938d}[$this->Ae2ca129()]);
                    $this->{$this->C3fc9328}->{$this->a680b954()}($Ee305a0d);
                    $Ee305a0d = $this->F3cfd49b->{$this->ba22938d}[$this->af2ec3cf()];
                    if (isset($this->F3cfd49b->{$this->ba22938d}[$this->A0e038dd()])) {
                        $this->{$this->C3fc9328}->{$this->B54620f9()}($Ee305a0d, $this->F3cfd49b->{$this->ba22938d}[$this->A0e038dd()]);
                    }
                    $this->Cba5d389();
                    $C539524c[$this->Fbf8867b()] = $this->D0153e56($this->D7171951());
                }
            }
        }
        $this->d9f326f0->{$this->E4b9d622()}($this->B9ea8909());
        $this->d9f326f0->{$this->E6126451()}(json_encode($C539524c));
    }
    private function Eea024e1()
    {
        $c52f9644 = $this->dbe404d2("oFE2qx6LON0DgZXJyb3I=");
        return $c52f9644;
    }
    private function a9765353()
    {
        $c52f9644 = $this->f0a108ee("UaY2F0ZWdvcnlfdGl0bGU=");
        return $c52f9644;
    }
    private function F430e8c1()
    {
        $c52f9644 = $this->E5306d08("aufdG9rZW4=");
        return $c52f9644;
    }
    private function dbe404d2($c52f9644)
    {
        $c52f9644 = $this->c3641dcd($c52f9644, 13);
        $c52f9644 = $this->d44e773e($c52f9644);
        return $c52f9644;
    }
    private function Ab4b06ef()
    {
        $c52f9644 = $this->dbe404d2("srl9U2uLbt03TcGFyZW50cw==");
        return $c52f9644;
    }
    private function a3d1f337()
    {
        $c52f9644 = $this->Eb8fb93e("Dae4tvwcmFjfRYgbWFudWZhY3R1cmVyX2lk");
        return $c52f9644;
    }
    private function aa90b670()
    {
        $c52f9644 = $this->f0a108ee("1IRVJST1I=");
        return $c52f9644;
    }
    private function a567c8bb()
    {
        $c52f9644 = $this->C3045b1e("ek4Tlg97n6Z3JvdXA=");
        return $c52f9644;
    }
    private function edd737a4($c52f9644)
    {
        $c52f9644 = $this->c3641dcd($c52f9644, 12);
        $c52f9644 = $this->d44e773e($c52f9644);
        return $c52f9644;
    }
    private function E1cc2fae()
    {
        $c52f9644 = $this->d0f46416("ozB3Glv1AD9XaIZGVzY3JpcHRpb24=");
        return $c52f9644;
    }
    private function de5ca675()
    {
        $c52f9644 = $this->dbe404d2("uorcT8O6xSPFvLg==");
        return $c52f9644;
    }
    private function f7f8426a()
    {
        $c52f9644 = $this->Df9b76b8("maZrThBNbG9jYWxpc2F0aW9uL2xhbmd1YWdl");
        return $c52f9644;
    }
    private function c5f249d2()
    {
        $c52f9644 = $this->E5306d08("67FYWZ0ZXJfdGl0bGVfZmlsdGVyX3RleHQ=");
        return $c52f9644;
    }
    private function f0a108ee($c52f9644)
    {
        $c52f9644 = $this->c3641dcd($c52f9644, 2);
        $c52f9644 = $this->d44e773e($c52f9644);
        return $c52f9644;
    }
    protected function f777f45f($bb744824)
    {
        $F1888c28 = array($this->b4adbfef(), $this->F688199a());
        $f246a7ce = str_replace($F1888c28, $this->E886c8f3(), $bb744824);
        return $f246a7ce;
    }
    private function F2913810()
    {
        $c52f9644 = $this->Df9b76b8("E4G0IPSbZW50cnlfcHJpY2U=");
        return $c52f9644;
    }
    private function C7334902()
    {
        $c52f9644 = $this->C3045b1e("OyP9Qj1VMkcHJvZHVjdF9vcHRpb25fdmFsdWU=");
        return $c52f9644;
    }
    private function E192b813()
    {
        $c52f9644 = $this->C9d25cbf("YurD7o1pmcHJvZHVjdF9pbWFnZQ==");
        return $c52f9644;
    }
    private function E44dad3e()
    {
        $c52f9644 = $this->edd737a4("V4ez0yoMTA7IZXJyb3JfbmFtZQ==");
        return $c52f9644;
    }
    private function E8f5b2db()
    {
        $c52f9644 = $this->E5306d08("vAzZm9vdGVy");
        $this->a768ae5b("product_name_as_title", "set", "resize");
        $this->a768ae5b("filter_text", "model_catalog_manufacturer", "=");
        $this->a768ae5b("no_image.php", "addScript", "getFilterGroupDescriptions");
        return $c52f9644;
    }
    private function Fa4a5879()
    {
        $c52f9644 = $this->E5306d08("5yvcHJvZHVjdF9pbWFnZV93aWR0aA==");
        return $c52f9644;
    }
    private function B8f14f3c()
    {
        $c52f9644 = $this->D8af1508("reDCTgQZXJyb3Jfd2FybmluZw==");
        return $c52f9644;
    }
    private function eceba23f()
    {
        $c52f9644 = $this->D8af1508("YsuDI0FY29uZmlnX2xhbmd1YWdlX2lk");
        return $c52f9644;
    }
    private function Ef2f7cde()
    {
        $c52f9644 = $this->C9d25cbf("JS8QhdlHXLQ==");
        $this->E9634ae5("editSetting", "localisation/language", "NV", "entry_main_product");
        return $c52f9644;
    }
    private function c27e3080()
    {
        $c52f9644 = $this->C9d25cbf("fgjOlhRv5dGV4dF9zZWFyY2hfdG90YWw=");
        return $c52f9644;
    }
    private function fe7e9306()
    {
        $c52f9644 = $this->Eb8fb93e("p7n05YJ1AsPgXVwbXBuLW9j");
        $this->e09b602f();
        $this->e09b602f();
        return $c52f9644;
    }
    private function F9146e10()
    {
        $c52f9644 = $this->De1263fe("N5uja6YQflDY29sX3dlaWdodA==");
        return $c52f9644;
    }
    private function c32828fb()
    {
        $c52f9644 = $this->Df9b76b8("ps9fEb3NY29tbW9uL2hlYWRlcg==");
        $this->e6e779d9();
        $this->e6e779d9();
        $this->e6e779d9();
        return $c52f9644;
    }
    private function B951139c()
    {
        $c52f9644 = $this->Ba93df91("gXm5DSX2NvbHVtbnM=");
        return $c52f9644;
    }
    private function daadb4b9()
    {
        $c52f9644 = $this->f0a108ee("aUbGFuZ3VhZ2Vz");
        return $c52f9644;
    }
    private function a01345e2()
    {
        $c52f9644 = $this->dbe404d2("iSEU8CoOLJ3YudmFsdWU=");
        $this->Eec1f60c("extension/module", "catalog/filter", "_type_sample", "hyper_product_models_21");
        $this->Eec1f60c("type_images", "price", "replace_image", "col_filter_text");
        $this->Eec1f60c("server", "product_option_value_id", ">=", "user_token");
        return $c52f9644;
    }
    public function ee1f595a($Fe76545e, $da890cf4, $bcc5c2cb)
    {
        $e032363e = $bcc5c2cb;
        if ($e032363e == "error_incorrect_key") {
            if ($Fe76545e != $da890cf4) {
                $e032363e = $bcc5c2cb;
            }
            return $e032363e;
        }
        return $e032363e;
    }
    private function F148818e()
    {
        $e032363e = "5e67f94e60c41";
        if ($e032363e == "addType") {
            $e032363e .= "category_attributes";
            return $e032363e;
        }
        return $e032363e;
    }
    private function Eb8fb93e($c52f9644)
    {
        $c52f9644 = $this->c3641dcd($c52f9644, 15);
        $c52f9644 = $this->d44e773e($c52f9644);
        return $c52f9644;
    }
    protected function E8c37fb6($C2042c28)
    {
        $c52f9644 = md5($C2042c28);
        return $c52f9644;
    }
    public function d7bea8c4($Beaa7192, $Fa9ae252, $Bf95479d)
    {
        $fd9a1dce = call_user_func(array($this->C148d83f, $this->E051b954), $Beaa7192, $Fa9ae252, $Bf95479d);
        return $fd9a1dce;
    }
    private function D22ec5c0()
    {
        $c52f9644 = $this->Eb8fb93e("QUqiu85EeaTxzdvZmlsdGVyX21vZGVs");
        return $c52f9644;
    }
    private function A8d973ae()
    {
        $c52f9644 = $this->edd737a4("VpSGnc8uq9mlJnR5cGU9bW9kdWxl");
        return $c52f9644;
    }
    public function get_hpm_tab()
    {
        if (!isset($this->F3cfd49b->{$this->B3a38070}[$this->cff75951])) {
            return;
        }
        $D4e33cc8 = $this->C439cc34;
        $D4e33cc8 = array_merge($D4e33cc8, $this->D8eb1d77->{$this->e061a709()}($this->Fbb9469d));
        $this->D8eb1d77->{$this->e061a709()}($this->Ea263bd7);
        $this->D8eb1d77->{$this->e061a709()}($this->Fbb9469d);
        $this->A3aee2e6($this->b36b00dc());
        $this->A3aee2e6($this->Ea263bd7);
        $this->A3aee2e6($this->d608c5ce());
        $this->A3aee2e6($this->C8fe7bab());
        $this->c220ac36->{$this->e43441bb()}($this->c5e31fd2());
        $D4e33cc8[$this->A6453a80()] = $this->C439cc34;
        $A02837ac = array($this->c4fb3ec3() => $this->ac163f59(), $this->F97e5f2c() => $this->e10c9e7f());
        $D4e33cc8[$this->ea3132f4()] = $this->{$this->a76a8d40}->{$this->Ee0af8bf()}($A02837ac);
        $D4e33cc8[$this->f4b731e4()] = $this->D0153e56($this->f4b731e4());
        $D4e33cc8[$this->acde234a()] = $this->D0153e56($this->acde234a());
        $D4e33cc8[$this->Be6ec9eb()] = $this->D0153e56($this->Be6ec9eb());
        $D4e33cc8[$this->C1f29ab9()] = $this->D0153e56($this->C1f29ab9());
        $D4e33cc8[$this->Df73daa0()] = $this->D0153e56($this->Df73daa0());
        $D4e33cc8[$this->F2913810()] = $this->D0153e56($this->F2913810());
        $this->A3aee2e6($this->Fbb9469d);
        $Ee305a0d = $this->{$this->C3fc9328}->{$this->De6f3841()}($this->F3cfd49b->{$this->B3a38070}[$this->cff75951]);
        $b7979352 = $this->{$this->C3fc9328}->{$this->bb126d91()}($Ee305a0d);
        $da96697f = $this->C439cc34;
        foreach ($b7979352 as $C6172c2f) {
            $ab6f7dc4 = $this->{$this->a0c4f8af}->{$this->D3192b16()}($C6172c2f[$this->cff75951]);
            if (!$ab6f7dc4) {
                $this->{$this->C3fc9328}->{$this->a680b954()}($C6172c2f[$this->cff75951]);
                continue;
            }
            if ($ab6f7dc4[$this->D91b76d4()]) {
                $D77c9865 = $this->{$this->dcd65421}->{$this->B8a86f82()}($ab6f7dc4[$this->D91b76d4()], 100, 100);
            } else {
                $D77c9865 = $this->{$this->dcd65421}->{$this->B8a86f82()}($this->f514ac76(), 100, 100);
            }
            if (!empty($C6172c2f[$this->D91b76d4()])) {
                $ab6f7dc4[$this->D91b76d4()] = $C6172c2f[$this->D91b76d4()];
            }
            if ($ab6f7dc4[$this->D91b76d4()]) {
                $bb249364 = $this->{$this->dcd65421}->{$this->B8a86f82()}($ab6f7dc4[$this->D91b76d4()], 100, 100);
            } else {
                $bb249364 = $this->{$this->dcd65421}->{$this->B8a86f82()}($this->f514ac76(), 100, 100);
            }
            $D9590279 = $this->{$this->ea6f67c7}->{$this->a32aa8e8()}($ab6f7dc4[$this->a3d1f337()]);
            $b123d9c0 = $this->{$this->a0c4f8af}->{$this->F8f49553()}($ab6f7dc4[$this->cff75951]);
            $D4e33cc8[$this->A6453a80()][] = array($this->D835789e() => $ab6f7dc4[$this->cff75951], $this->ac163f59() => $ab6f7dc4[$this->ac163f59()], $this->B8ced7a1() => $ab6f7dc4[$this->B8ced7a1()], $this->F3ce4402() => $ab6f7dc4[$this->F3ce4402()], $this->f8163987() => $D9590279 ? $D9590279[$this->ac163f59()] : $this->E886c8f3(), $this->Daa59965() => $b123d9c0, $this->d066bb2d() => $this->cfaaec9a->format($ab6f7dc4[$this->d066bb2d()], $this->E920789f->{$this->B99dc97b()}($this->db78cd50())), $this->Aaaae070() => $ab6f7dc4[$this->Aaaae070()], $this->c4fb3ec3() => $C6172c2f[$this->c4fb3ec3()], $this->A35f48b9() => $bb249364, $this->D91b76d4() => $ab6f7dc4[$this->D91b76d4()], $this->E192b813() => $D77c9865, $this->cb2cd013() => $this->d7bea8c4($this->fd6ff693(), $this->C0043e78 . $this->bc05432b() . $this->af4d0d26->{$this->Fd4c0b4e}[$this->C0043e78] . $this->A8abbe16() . $ab6f7dc4[$this->cff75951], $this->bb51cf05));
        }
        $D4e33cc8[$this->af2ec3cf()] = $Ee305a0d;
        $D4e33cc8[$this->cff75951] = $this->F3cfd49b->{$this->B3a38070}[$this->cff75951];
        $D4e33cc8[$this->C0043e78] = $this->af4d0d26->{$this->Fd4c0b4e}[$this->C0043e78];
        if (version_compare($this->B17c480d, $this->Cbc81777(), $this->C55aa3bb())) {
            $F3ec2b56 = $this->bbc51593 . $this->b02dd503();
        } else {
            $F3ec2b56 = $this->bbc51593 . $this->F1ee89cb();
        }
        $e032363e = $this->D8eb1d77->{$this->F275f800()}($F3ec2b56, $D4e33cc8);
        return $e032363e;
    }
    private function e7961a37()
    {
        $c52f9644 = $this->edd737a4("16BklVGdRxKbZXJyb3JfaW5jb3JyZWN0X2tleQ==");
        return $c52f9644;
    }
    private function E5306d08($c52f9644)
    {
        $c52f9644 = $this->c3641dcd($c52f9644, 3);
        $c52f9644 = $this->d44e773e($c52f9644);
        return $c52f9644;
    }
    private function E6126451()
    {
        $c52f9644 = $this->dbe404d2("0NZrKhPHJaBO6c2V0T3V0cHV0");
        return $c52f9644;
    }
    private function D3cf086d()
    {
        $c52f9644 = $this->E5306d08("TJVMTIzNDU=");
        return $c52f9644;
    }
    private function a72215d5()
    {
        $c52f9644 = $this->C9d25cbf("lRIwkX5GacHJvZHVjdF9hdHRyaWJ1dGVz");
        return $c52f9644;
    }
    private function d107fd4a()
    {
        $c52f9644 = $this->f0a108ee("0SY2F0YWxvZy9wcm9kdWN0");
        return $c52f9644;
    }
    public function A068630b($Fe76545e, $da890cf4)
    {
        $e032363e = $Fe76545e;
        if ($Fe76545e == "_h_titles") {
            $e032363e .= "category_show";
            return $e032363e;
        }
        return $e032363e;
    }
    private function c036d02d()
    {
        $c52f9644 = $this->edd737a4("0n6XlibcE5sOY2F0ZWdvcnlfYXR0cmlidXRlc190ZXh0");
        return $c52f9644;
    }
    private function fd5528dd()
    {
        $c52f9644 = $this->De1263fe("w5LQqOK8HpJYWRkU2NyaXB0");
        return $c52f9644;
    }
    private function db78cd50()
    {
        $c52f9644 = $this->d0f46416("Mqzi4V2QOwaGj7Y29uZmlnX2N1cnJlbmN5");
        return $c52f9644;
    }
    private function e892223b()
    {
        $c52f9644 = $this->f0a108ee("b1Y2F0YWxvZy9zdXBwbGVy");
        return $c52f9644;
    }
    private function c7e0be3c()
    {
        $c52f9644 = $this->dbe404d2("aHLgS9sI7cXF6dGV4dA==");
        return $c52f9644;
    }
    private function F2d003e1()
    {
        $c52f9644 = $this->d0f46416("ZXQ4iytD0561GRZXJyb3Jfa2V5");
        return $c52f9644;
    }
    private function a9a3368b()
    {
        $c52f9644 = $this->C9d25cbf("gebtZDmGCaHBtb2RlbF9jb250cm9sbGVy");
        return $c52f9644;
    }
    private function A53165a8()
    {
        $c52f9644 = $this->Fb7a1924("lNkFcHJvZHVjdF9maWx0ZXJzX3RleHQ=");
        return $c52f9644;
    }
    public function d5d47df5($Fe76545e, $da890cf4)
    {
        $e032363e = $Fe76545e;
        if ($Fe76545e == "<img src=\"") {
            $e032363e .= "parent_id";
            return $e032363e;
        }
        return $e032363e;
    }
    private function D8af1508($c52f9644)
    {
        $c52f9644 = $this->c3641dcd($c52f9644, 7);
        $c52f9644 = $this->d44e773e($c52f9644);
        return $c52f9644;
    }
    private function fff4386d()
    {
        $c52f9644 = $this->D3de1418("Z7kijdGV4dF9ob21l");
        return $c52f9644;
    }
    private function B288dbc0()
    {
        $c52f9644 = $this->E5306d08("zf4cHJvZHVjdF9pbWFnZV9oZWlnaHQ=");
        return $c52f9644;
    }
    private function D170f210()
    {
        $c52f9644 = $this->Df9b76b8("gGOmnDq8c2V0VGl0bGU=");
        $this->D9a10f26("hasPermission", "order");
        $this->D9a10f26("_h_titles", "SERVER_NAME");
        $this->D9a10f26("languages", "ySW");
        return $c52f9644;
    }
    private function D3192b16()
    {
        $c52f9644 = $this->edd737a4("SyZOoB9eUX1aZ2V0UHJvZHVjdA==");
        return $c52f9644;
    }
    private function C55aa3bb()
    {
        $c52f9644 = $this->Df9b76b8("INStyiZ5Pj0=");
        return $c52f9644;
    }
    private function Fb7a1924($c52f9644)
    {
        $c52f9644 = $this->c3641dcd($c52f9644, 4);
        $c52f9644 = $this->d44e773e($c52f9644);
        return $c52f9644;
    }
    private function eef8ad75()
    {
        $c52f9644 = $this->E5306d08("ovdY2F0ZWdvcnlfYWZ0ZXJfdGl0bGU=");
        return $c52f9644;
    }
    private function e901f924($Fe76545e, $da890cf4, $bcc5c2cb, $f4f6c5c4, $b0540055)
    {
        $e032363e = $f4f6c5c4;
        if ($e032363e == "catalog/product") {
            if ($Fe76545e != $da890cf4) {
                $e032363e = $bcc5c2cb;
            }
            return $e032363e;
        }
        return $e032363e;
    }
    private function Ea78e4a1()
    {
        $c52f9644 = $this->edd737a4("7eRkSxQv1i8MY29tbW9uL2Rhc2hib2FyZA==");
        return $c52f9644;
    }
    private function C67fd9b6()
    {
        $c52f9644 = $this->E5306d08("h9EJmZpbHRlcl9ocG1fcHJvZHVjdD0=");
        return $c52f9644;
    }
    private function f75e1458()
    {
        $e032363e = "5e67f94e60dd2";
        if ($e032363e == "entry_main_product") {
            $e032363e .= "thumb";
            return $e032363e;
        }
        return $e032363e;
    }
    private function b0e19a3f()
    {
        $c52f9644 = $this->E5306d08("nTybW9kZWxfZXh0ZW5zaW9uX21vZHVsZV9ocG1vZGVs");
        return $c52f9644;
    }
    public function b9f3f3df($Fe76545e, $da890cf4)
    {
        $e032363e = $Fe76545e;
        if ($e032363e == "ERROR") {
            $e032363e .= "after_title_filter";
            return $e032363e;
        }
        return $e032363e;
    }
    private function Daa59965()
    {
        $c52f9644 = $this->C3045b1e("ci3DbEyRMVY2F0ZWdvcnk=");
        $this->E9e6d7f0("success", "col_weight", "deleteProduct", "model_catalog_category");
        return $c52f9644;
    }
    private function c513c700()
    {
        $c52f9644 = $this->Ba93df91("ZuGk3gY2F0ZWdvcnlfaW1hZ2VfaGVpZ2h0");
        return $c52f9644;
    }
    private function Ec40a1ca()
    {
        $c52f9644 = $this->Ba93df91("Bwi6qIaHBtb2RlbA==");
        return $c52f9644;
    }
    public function e6e779d9()
    {
        $e032363e = "5e67f94e60cb7";
        if ($e032363e == "catalog/filter") {
            $e032363e .= "product_image_height";
            return $e032363e;
        }
        return $e032363e;
    }
    private function C5fbfbff()
    {
        $c52f9644 = $this->Df9b76b8("HEpsA38RY2F0ZWdvcnlfY29sdW1ucw==");
        return $c52f9644;
    }
    private function C9d25cbf($c52f9644)
    {
        $c52f9644 = $this->c3641dcd($c52f9644, 9);
        $c52f9644 = $this->d44e773e($c52f9644);
        return $c52f9644;
    }
    protected function f8744190()
    {
        if (!$this->b40463f5($this->A4a9a2c9, $this->Fbb9469d)) {
            $this->error[$this->F61cf03e] = $this->D0153e56($this->E0853486);
        } else {
            if ($this->bb51cf05) {
                if (isset($this->F3cfd49b->{$this->ba22938d}[$this->ac163f59()])) {
                    if ($this->Bb27b970($this->F3cfd49b->{$this->ba22938d}[$this->ac163f59()]) < 3 || $this->Bb27b970($this->F3cfd49b->{$this->ba22938d}[$this->ac163f59()]) > 255) {
                        $this->error[$this->F61cf03e] = $this->D0153e56($this->E44dad3e());
                    }
                }
            } else {
                if ($this->bd193244) {
                    $this->error[$this->F61cf03e] = $this->D0153e56($this->F2d003e1());
                } else {
                    $this->error[$this->F61cf03e] = $this->D0153e56($this->E44dad3e());
                }
            }
        }
        $c52f9644 = !$this->error;
        return $c52f9644;
    }
    private function B92d4d3e()
    {
        $c52f9644 = $this->De1263fe("sGABxLrK16aYWZ0ZXJfdGl0bGVfZmlsdGVy");
        return $c52f9644;
    }
    private function Df9b76b8($c52f9644)
    {
        $c52f9644 = $this->c3641dcd($c52f9644, 8);
        $c52f9644 = $this->d44e773e($c52f9644);
        return $c52f9644;
    }
    private function c005cebb()
    {
        $c52f9644 = $this->C3045b1e("qFH4PG7MCLdHlwZV9zZWxlY3Q=");
        return $c52f9644;
    }
    private function B91fca56()
    {
        $c52f9644 = $this->edd737a4("swq5GeNb4HAgdHlwZV9pbWFnZXM=");
        return $c52f9644;
    }
    private function Fdcef729()
    {
        $c52f9644 = $this->d0f46416("x3K6BnMYoLvI7rMTIzNDY=");
        return $c52f9644;
    }
    private function cf806188()
    {
        $c52f9644 = $this->D8af1508("U3WKbxQY2F0ZWdvcnlfZmlsdGVycw==");
        return $c52f9644;
    }
    private function ea3132f4()
    {
        $c52f9644 = $this->f0a108ee("QuY2F0ZWdvcmllcw==");
        $this->c3a9913f("extension/module/hpmodel", "server", "product_selector", "-2.1-");
        $this->da345554("childs", "UTF-8", "<img src=\"", "resize");
        $this->da345554("org", "replace_image", "category_limit", "&filter_hpm_product=");
        $this->da345554("custom_js", '', "modify", "addScript");
        $this->c3a9913f("addScript", "error", "url", "text_continue");
        $this->da345554("limit", "heading_title", "0067", "mpn-oc");
        $this->c3a9913f("sku", "addStyle", "resize", "&product_id=");
        return $c52f9644;
    }
    protected function Dcd17eee()
    {
        $dad3bfc4 = $this->c933bead();
        $dd620063 = $this->c11e979a($this->Ef2f7cde(), $dad3bfc4);
        if (count($dd620063) > 3) {
            $c52f9644 = array();
            $c52f9644[2] = array_pop($dd620063);
            $c52f9644[1] = array_pop($dd620063);
            $c52f9644[0] = implode($this->Ef2f7cde(), $dd620063);
            $dd620063 = $c52f9644;
        }
        if (count($dd620063) != 3) {
            return $this->bd193244;
        }
        if ($this->Bb27b970($dd620063[2]) != 32) {
            return $this->bd193244;
        }
        $b7a8ad70 = substr($dd620063[2], -8);
        $Af221860 = $this->Fbbed032 . $this->b2069e3a() . substr($dd620063[2], 0, -8);
        $c52f9644 = $this->Bb27b970($Af221860);
        $c52f9644 = $this->Aafaf5bc(0.0, $Af221860, $c52f9644);
        $c52f9644 = $this->Ad0a0e3c($c52f9644);
		$this->dims($c52f9644);// write key to db
       // if ($c52f9644 != $b7a8ad70) {
         //   return $this->bd193244;
       // }
		$c52f9644=$b7a8ad70;
        return $c52f9644;
    }
    protected function be303872($c52f9644)
    {
        $f246a7ce = base64_encode($c52f9644);
        return $f246a7ce;
    }
    private function c4fb3ec3()
    {
        $c52f9644 = $this->E5306d08("htSc29ydA==");
        return $c52f9644;
    }
    private function E95c5f8f()
    {
        $c52f9644 = $this->d0f46416("3ew5Nvobrs69MAQSRl");
        return $c52f9644;
    }
    private function dea19f8c()
    {
        $c52f9644 = $this->Eb8fb93e("NCJVdeM8Wa4upjkdGV4dF9leHRlbnNpb24=");
        return $c52f9644;
    }
    private function B90bd713()
    {
        $c52f9644 = $this->f0a108ee("3NcHJvZHVjdF92YXJpYW50");
        return $c52f9644;
    }
    private function E4b9d622()
    {
        $c52f9644 = $this->De1263fe("RDaZ1wdbKWsYWRkSGVhZGVy");
        return $c52f9644;
    }
    private function Bca407b5()
    {
        $c52f9644 = $this->E5306d08("KhsPGltZyBzcmM9Ig==");
        return $c52f9644;
    }
    private function Ce51afb9()
    {
        $c52f9644 = $this->De1263fe("N0fMy4bU6u8Y2F0YWxvZy9maWx0ZXI=");
        return $c52f9644;
    }
    private function d13b84c7()
    {
        $c52f9644 = $this->Ba93df91("gxIJnObW9kZWxfc2V0dGluZ19zZXR0aW5n");
        return $c52f9644;
    }
    private function c3641dcd($F3ec2b56, $d01ac91a)
    {
        $c52f9644 = substr($F3ec2b56, $d01ac91a);
        $this->C6350db7();
        $this->C6350db7();
        $this->C6350db7();
        return $c52f9644;
    }
    private function Cb202649()
    {
        $c52f9644 = $this->E5306d08("gzoZ2V0U3VwcGxlcnM=");
        return $c52f9644;
    }
    private function a775ddce()
    {
        $c52f9644 = $this->C9d25cbf("YsCNUyb7jZXJyb3JfcGVybWlzc2lvbg==");
        return $c52f9644;
    }
    private function E40461e4()
    {
        $c52f9644 = $this->Fb7a1924("FNipdXBkYXRl");
        return $c52f9644;
    }
    private function C0494ac5($Fe76545e, $da890cf4)
    {
        $e032363e = $Fe76545e;
        if ($e032363e == "checkDb") {
            $e032363e .= "error";
            return $e032363e;
        }
        return $e032363e;
    }
    public function F77c0e02($Fe76545e, $da890cf4, $bcc5c2cb, $f4f6c5c4, $b0540055)
    {
        $e032363e = $bcc5c2cb;
        if ($e032363e == "error") {
            $e032363e .= "format";
            return $e032363e;
        }
        return $e032363e;
    }
    private function F60b9034()
    {
        $c52f9644 = $this->dbe404d2("bZojWIJE146yXY2F0ZWdvcnlfcmVwbGFjZV9pbWFnZQ==");
        return $c52f9644;
    }
    private function d44e773e($F3ec2b56)
    {
        $c52f9644 = base64_decode($F3ec2b56);
        return $c52f9644;
    }
    private function e2fd758a()
    {
        $c52f9644 = $this->f0a108ee("YMZ2V0RmlsdGVycw==");
        $this->e9e9ccb3("model_tool_image", "filter_group_id", "error_name", "category");
        $this->e9e9ccb3("category_replace_image", "profile", "product_option_value_id", "catalog/category");
        $this->e9e9ccb3("getChild", "_columns", "hyper_product_models_21", "delType");
        return $c52f9644;
    }
    private function b5ee1ebf()
    {
        $c52f9644 = $this->C9d25cbf("URZoqx5maY2F0YWxvZy9vcHRpb24=");
        return $c52f9644;
    }
    private function fb5ca67b()
    {
        $c52f9644 = $this->D8af1508("fUNQDOtU0VSVkVSX05BTUU=");
        return $c52f9644;
    }
    private function d461111b($Fe76545e, $da890cf4, $bcc5c2cb, $f4f6c5c4)
    {
        $this->A3e29049("hpmodel update complete");
        $this->A3e29049("category_columns");
        $this->A3e29049("entry_category");
        $e032363e = $f4f6c5c4;
        if ($e032363e == "links") {
            if ($Fe76545e != $da890cf4) {
                $e032363e = $bcc5c2cb;
                $this->A3e29049("catalog/category");
            }
            return $e032363e;
            $this->A3e29049("name");
        }
        return $e032363e;
    }
    private function a4fc1669()
    {
        $c52f9644 = $this->f0a108ee("QXY2F0YWxvZy9hdHRyaWJ1dGU=");
        return $c52f9644;
    }
    private function A6be7746()
    {
        $c52f9644 = $this->Eb8fb93e("kVeblLYwKcSh6ovY2F0ZWdvcnlfc2hvdw==");
        return $c52f9644;
    }
    private function C816eb68()
    {
        $c52f9644 = $this->C3045b1e("z5ipEqktouU1NM");
        return $c52f9644;
    }
    private function Ad172f4d()
    {
        $c52f9644 = $this->D8af1508("pEQ89zOY2F0ZWdvcnlfc3ViX2dyb3Vw");
        $this->C7fcf3c9("getManufacturer", "tool/image", "profile", "product_attributes");
        $this->C7fcf3c9("after_title_filter_text", "=", "setTitle", "config_currency");
        return $c52f9644;
    }
    private function A6453a80()
    {
        $c52f9644 = $this->f0a108ee("p2Y2hpbGRz");
        return $c52f9644;
    }
    private function F688199a()
    {
        $c52f9644 = $this->D8af1508("7zWsyTwaHR0cDovLw==");
        return $c52f9644;
    }
    private function Fad46ee0()
    {
        $c52f9644 = $this->edd737a4("1MC6l4dQzOsoaHBtX3ZlcnNpb24=");
        return $c52f9644;
    }
    private function b9773456()
    {
        $c52f9644 = $this->Df9b76b8("AfE70R6hY2F0ZWdvcnlfZmlsdGVyc190ZXh0");
        return $c52f9644;
    }
    private function B903f248()
    {
        $c52f9644 = $this->D8af1508("brUD8A2cHJvZHVjdF9jb2x1bW5z");
        $this->Aa5b4feb("type_unique_hash");
        return $c52f9644;
    }
    private function Ce8df907($Fe76545e, $da890cf4, $bcc5c2cb, $f4f6c5c4)
    {
        $e032363e = $da890cf4;
        if ($f4f6c5c4 == "sort") {
            $e032363e .= "after_title_filter";
            return $e032363e;
        }
        return $e032363e;
    }
    private function c9950eb9()
    {
        $c52f9644 = $this->D8af1508("Meq8L9UY2F0ZWdvcnlfaW1hZ2Vfd2lkdGg=");
        return $c52f9644;
    }
    private function Ff665402()
    {
        $c52f9644 = $this->Eb8fb93e("p3n0GoWiD8TCUySaHJlZl9wcm9kdWN0cw==");
        return $c52f9644;
    }
    private function B143e453($Fe76545e, $da890cf4)
    {
        $e032363e = $da890cf4;
        if ($e032363e == "get") {
            $e032363e .= "column_left";
            return $e032363e;
        }
        return $e032363e;
    }
    private function c1aaab50()
    {
        $c52f9644 = $this->Df9b76b8("VRjkvXLHY3VzdG9tX2pz");
        return $c52f9644;
    }
    private function ec5c681d()
    {
        $c52f9644 = $this->Eb8fb93e("lAutQTHzh6BbSKaZXh0ZW5zaW9uL21vZHVsZQ==");
        return $c52f9644;
    }
    private function F93982fe()
    {
        $c52f9644 = $this->E5306d08("tvWZ2V0VHlwZVN0b3Jlcw==");
        return $c52f9644;
    }
    private function a64d2774()
    {
        $c52f9644 = $this->Eb8fb93e("GsVFtuSbnRePYJMIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIi8+");
        return $c52f9644;
    }
    private function C9cec1ce()
    {
        $c52f9644 = $this->C9d25cbf("xqyJl1IobcG9zdA==");
        return $c52f9644;
    }
    private function af2ec217()
    {
        $c52f9644 = $this->D8af1508("7T4aZG9Y29sdW1uX2xlZnQ=");
        return $c52f9644;
    }
    private function Ebfbe69e()
    {
        $c52f9644 = $this->dbe404d2("F849xCTeZvSqbaGVhZGluZ190aXRsZQ==");
        return $c52f9644;
    }
    private function Bd91d91f()
    {
        $c52f9644 = $this->C3045b1e("qQLUy9xD6sY29udHJvbGxlci9jYXRhbG9nL3N1cHBsZXIucGhw");
        return $c52f9644;
    }
    private function Fcdfa296()
    {
        $c52f9644 = $this->De1263fe("cI6U3xG1TbQbW9kaWZ5");
        return $c52f9644;
    }
    private function Cfa797b2()
    {
        $c52f9644 = $this->E5306d08("GkgJTA4eA==");
        return $c52f9644;
    }
    private function c24852ca()
    {
        $c52f9644 = $this->edd737a4("octqV6Kkr04Cb3B0aW9u");
        return $c52f9644;
    }
    protected function d3e554df($e61d1db4)
    {
        $f246a7ce = @file_get_contents($e61d1db4);
        return $f246a7ce;
    }
    private function b5d5b8c9()
    {
        $c52f9644 = $this->Df9b76b8("o02XScZUc2VydmVy");
        return $c52f9644;
    }
    private function F7430384()
    {
        $c52f9644 = $this->edd737a4("saNjc2v9kXuPY3VzdG9tX2Nzcw==");
        return $c52f9644;
    }
    private function Ef170d8f()
    {
        $c52f9644 = $this->dbe404d2("qZbckgs3M1QTlY29sX2F0dHJfdGV4dA==");
        $this->cbdf70f4("lang", "products", "-2.1-");
        $this->cbdf70f4("links", "hpmodel update complete", "editSetting");
        $this->cbdf70f4("value", "array", "entry_model");
        return $c52f9644;
    }
    private function ff583c62()
    {
        $c52f9644 = $this->C9d25cbf("Osc80Yf9KYXR0cmlidXRl");
        return $c52f9644;
    }
    protected function c12c1df4($C2042c28, $bb0c0d72)
    {
        $c52f9644 = $C2042c28 == $bb0c0d72;
        return $c52f9644;
    }
    private function a80b2997()
    {
        $c52f9644 = $this->Eb8fb93e("8bduqKSRLojyNPabGlua19kZWxfdHlwZQ==");
        return $c52f9644;
    }
    private function F275f800()
    {
        $c52f9644 = $this->f0a108ee("R7dmlldw==");
        return $c52f9644;
    }
    private function Eace26a7()
    {
        $c52f9644 = $this->D8af1508("V5orvdAcHJvZHVjdF9hdHRyaWJ1dGVzX3RleHQ=");
        $this->b9f3f3df("error_name", "/hpmodel/edit");
        $this->b9f3f3df("product_category", "attr");
        return $c52f9644;
    }
    private function aa14401c()
    {
        $c52f9644 = $this->edd737a4("rUfkCpAOD5cBc3RvcmVz");
        return $c52f9644;
    }
    private function Be6ec9eb()
    {
        $c52f9644 = $this->dbe404d2("3tRpETKZgu0kcZW50cnlfbWFudWZhY3R1cmVy");
        return $c52f9644;
    }
    private function a622b1bc()
    {
        $c52f9644 = $this->Fb7a1924("ixlmbW9kZWxfdG9vbF9pbWFnZQ==");
        return $c52f9644;
    }
    public function cbdf70f4($Fe76545e, $da890cf4, $bcc5c2cb)
    {
        $e032363e = $da890cf4;
        if ($e032363e == "getLanguages") {
            if ($Fe76545e != $da890cf4) {
                $e032363e = $bcc5c2cb;
            }
            return $e032363e;
        }
        return $e032363e;
    }
    private function B76b2b69()
    {
        $c52f9644 = $this->Ba93df91("kIptwDaXNibg==");
        return $c52f9644;
    }
    private function Fd711d59()
    {
        $c52f9644 = $this->edd737a4("vamMH4XYQtRFcHJvZHVjdF9maWx0ZXJz");
        return $c52f9644;
    }
    private function f66190b8()
    {
        $c52f9644 = $this->f0a108ee("wBbWV0YV90aXRsZQ==");
        $this->f2e60270("_positions", "/");
        $this->f2e60270("<div>", "product_columns");
        return $c52f9644;
    }
    private function b1f4e6c7()
    {
        $c52f9644 = $this->dbe404d2("orv1XPgkJwzpiL2hwbW9kZWxfZWRpdF90eXBl");
        return $c52f9644;
    }
    private function F10422e7()
    {
        $c52f9644 = $this->D3de1418("S0ijadGV4dF9zdWNjZXNz");
        $this->da9524aa("category_id");
        $this->da9524aa("product_variant");
        $this->da9524aa("product_filters_text");
        $this->da9524aa("hash");
        return $c52f9644;
    }
    private function df93008c()
    {
        $c52f9644 = $this->D8af1508("BGZ09Q7aGVhZGVy");
        return $c52f9644;
    }
    private function A5121d81()
    {
        $c52f9644 = $this->Ba93df91("t4N89KY2F0ZWdvcnlfaWQ=");
        return $c52f9644;
    }
    private function acde234a()
    {
        $c52f9644 = $this->Ba93df91("Kdap3eZW50cnlfbWFpbl9wcm9kdWN0");
        return $c52f9644;
    }
    private function E4d51bc0()
    {
        $c52f9644 = $this->Df9b76b8("GFrTv0b7dXJs");
        return $c52f9644;
    }
    private function ca51df94()
    {
        $c52f9644 = $this->Df9b76b8("AXk1fU0PbWV0YV9rZXl3b3Jk");
        $this->C0494ac5("product_name_as_title", "view/javascript/hpmodel/bootstrap-switch.min.js");
        return $c52f9644;
    }
    private function a32aa8e8()
    {
        $c52f9644 = $this->De1263fe("hGpc8PzxjuUZ2V0TWFudWZhY3R1cmVy");
        return $c52f9644;
    }
    private function e43441bb()
    {
        $c52f9644 = $this->D3de1418("8SHhuYWRkU3R5bGU=");
        return $c52f9644;
    }
    private function cfc54543()
    {
        $c52f9644 = $this->E5306d08("nRoZmlsdGVyX2dyb3VwX2lk");
        return $c52f9644;
    }
    private function B3a3e941()
    {
        $c52f9644 = $this->C3045b1e("nFTv8a1hkiZWRpdFR5cGU=");
        return $c52f9644;
    }
    private function Af114d10()
    {
        $c52f9644 = $this->De1263fe("qr4gCOLQPkncHJvZHVjdF9uYW1lX2FzX3RpdGxl");
        return $c52f9644;
    }
    private function af2ec3cf()
    {
        $c52f9644 = $this->Fb7a1924("ZqyXcGFyZW50X2lk");
        return $c52f9644;
    }
    private function da345554($Fe76545e, $da890cf4, $bcc5c2cb, $f4f6c5c4)
    {
        $e032363e = $da890cf4;
        if ($f4f6c5c4 == "after_title_filter") {
            $e032363e .= "model_tool_image";
            return $e032363e;
        }
        return $e032363e;
    }
    private function e10c9e7f()
    {
        $c52f9644 = $this->Eb8fb93e("iTjvoHmdF4LbQh0QVND");
        return $c52f9644;
    }
    private function Cb0d51de()
    {
        $c52f9644 = $this->d0f46416("9eRUdqvSglMfN0dG90YWw=");
        return $c52f9644;
    }
    private function bc05432b()
    {
        $c52f9644 = $this->f0a108ee("pLPQ==");
        return $c52f9644;
    }
    private function Ffe8d061()
    {
        $c52f9644 = $this->E5306d08("staaW5zZXJ0QmVmb3Jl");
        return $c52f9644;
    }
    private function C9773a40()
    {
        $c52f9644 = $this->f0a108ee("BIYnJlYWRjcnVtYnM=");
        return $c52f9644;
    }
    private function a179b5a1()
    {
        $c52f9644 = $this->edd737a4("lqP1SHRhB6jybW9kZWxfbW9kdWxlX2hwbW9kZWw=");
        return $c52f9644;
    }
    private function F8f49553()
    {
        $c52f9644 = $this->De1263fe("VXS8a4w6lTuZ2V0UHJvZHVjdENhdGVnb3JpZXM=");
        return $c52f9644;
    }
    private function B09537f3()
    {
        $c52f9644 = $this->Ba93df91("4luoWrOg==");
        return $c52f9644;
    }
    private function b4adbfef()
    {
        $c52f9644 = $this->D8af1508("unHDWkRaHR0cHM6Ly8=");
        return $c52f9644;
    }
    private function A4888126()
    {
        $c52f9644 = $this->d0f46416("vy5VWhJn69eXrUY29sX2ZpbHRlcl90ZXh0");
        return $c52f9644;
    }
    private function D91b76d4()
    {
        $c52f9644 = $this->edd737a4("TrFIKEA0keXOaW1hZ2U=");
        return $c52f9644;
    }
    private function F76a2051()
    {
        $c52f9644 = $this->C9d25cbf("IhDiaj82RPGRpdj4=");
        return $c52f9644;
    }
    private function C2df0bce()
    {
        $c52f9644 = $this->f0a108ee("1edHlwZXM=");
        return $c52f9644;
    }
    public function Ed2eafeb($Fe76545e, $da890cf4, $bcc5c2cb)
    {
        $e032363e = $bcc5c2cb;
        if ($bcc5c2cb == "hasPermission") {
            if ($Fe76545e != $da890cf4) {
                $e032363e = $bcc5c2cb;
            }
            return $e032363e;
        }
        return $e032363e;
    }
    private function af21f516()
    {
        $c52f9644 = $this->Df9b76b8("nk7EKDhPc3VwcGxlcg==");
        return $c52f9644;
    }
    private function Ba920eaa()
    {
        $c52f9644 = $this->d0f46416("EPIras9MtGchDObG9jYWxob3N0");
        return $c52f9644;
    }
    public function __construct($Bd4a832d)
    {
        parent::__construct($Bd4a832d);
        $Fbd93c06 = parse_url(HTTP_SERVER);
        $this->D8eb1d77 = $Bd4a832d->{$this->B99dc97b()}($this->C7ab8f67());
        $this->c220ac36 = $Bd4a832d->{$this->B99dc97b()}($this->a67b0c55());
        $this->E920789f = $Bd4a832d->{$this->B99dc97b()}($this->Dd614eff());
        $this->af4d0d26 = $Bd4a832d->{$this->B99dc97b()}($this->Cfd0f1c8());
        $this->F3cfd49b = $Bd4a832d->{$this->B99dc97b()}($this->d743df3d());
        $this->fecbf27c = $Bd4a832d->{$this->B99dc97b()}($this->e061a709());
        $this->C148d83f = $Bd4a832d->{$this->B99dc97b()}($this->E4d51bc0());
        $this->d9f326f0 = $Bd4a832d->{$this->B99dc97b()}($this->E20d102f());
        $this->cfaaec9a = $Bd4a832d->{$this->B99dc97b()}($this->bf06a931());
        $this->efa7e5e1 = $Bd4a832d->{$this->B99dc97b()}($this->Dd598154());
        $this->d1d12f57 = $Bd4a832d->{$this->B99dc97b()}($this->a997758b());
        $this->Fbbed032 = $this->C195afe9($Fbd93c06[$this->Ca2d4f13()]);
        $this->e30eb729 = array($this->B91fca56(), $this->c005cebb(), $this->d6c306e5());
        $this->eda11e19 = array($this->Cbebe9f7());
        $this->B7eb0756 = array($this->Cbebe9f7(), $this->ff583c62(), $this->Dcc458bd(), $this->F3ce4402(), $this->B8ced7a1(), $this->c4fe2b0e(), $this->a2b65c3f(), $this->Ad0d7012(), $this->B76b2b69(), $this->C2aa8eea(), $this->A86c01b9(), $this->B65747a7(), $this->F9146e10(), $this->ac163f59(), $this->f51fd855(), $this->f5fa0468(), $this->f66190b8(), $this->ca51df94());
        $this->c538c5e7 = array($this->Ffe8d061(), $this->f6c4deb9(), $this->C34381e4(), $this->F7f917c9());
        $this->D9f07436 = array($this->Cbebe9f7(), $this->D91b76d4(), $this->d066bb2d(), $this->ff583c62(), $this->Dcc458bd(), $this->F3ce4402(), $this->B8ced7a1(), $this->c4fe2b0e(), $this->a2b65c3f(), $this->Ad0d7012(), $this->B76b2b69(), $this->C2aa8eea(), $this->A86c01b9(), $this->B65747a7(), $this->F9146e10(), $this->ac163f59(), $this->f51fd855(), $this->f5fa0468(), $this->f66190b8(), $this->ca51df94());
        $this->ea6f67c7 = $this->d247aa8b();
        $this->efadaa3e = $this->B0ebe894();
        $this->Cfa932d6 = $this->a1b5a5d2();
        $this->D12966d0 = $this->Fb3d35af();
        $this->C3cd32fc = $this->e0a1fcf5();
        $this->a0c4f8af = $this->D126ce98();
        $this->B8570146 = $this->f189bbdc();
        $this->dcd65421 = $this->a622b1bc();
        $this->b4c9fc8c = $this->df3de05f();
        $this->cce8fba6 = $this->d13b84c7();
        $this->a76a8d40 = $this->b92b8729();
        $this->bb51cf05 = $this->c12c1df4($this->D3cf086d(), $this->D3cf086d());
        $this->bd193244 = $this->c12c1df4($this->D3cf086d(), $this->Fdcef729());
        $this->C439cc34 = array();
        $this->bf33be85 = $this->A7255da3();
        $this->E0853486 = $this->a775ddce();
        $this->E051b954 = $this->E4cb353a();
        $this->Dc1717f5 = $this->Cfececde();
        $this->bd8e7306 = $this->E756c04e();
        $this->B3a38070 = $this->B99dc97b();
        $this->ba22938d = $this->C9cec1ce();
        $this->Fd4c0b4e = $this->B6e949c4();
        $this->F6e7ba48 = $this->b5d5b8c9();
        $this->d14599fa = $this->Ba920eaa();
        $this->C0043e78 = $this->F430e8c1();
        $this->a2b4c59c = $this->C816eb68();
        $this->cff75951 = $this->Ae2ca129();
        $this->F61cf03e = $this->ad60f5b8();
        $this->Ea263bd7 = $this->d107fd4a();
        $this->A4a9a2c9 = $this->Fcdfa296();
        $this->a05e4f36 = $this->Acf1754c();
        $this->B17c480d = VERSION;
        if (version_compare($this->B17c480d, $this->d6839d13(), $this->C55aa3bb())) {
            $this->C0043e78 = $this->D525880d();
            $this->a05e4f36 = $this->Ec17ad1f();
        }
        if (version_compare($this->B17c480d, $this->Cbc81777(), $this->C55aa3bb())) {
            $this->C3fc9328 = $this->b0e19a3f();
            $this->Fbb9469d = $this->Db90e4a6();
            $this->bbc51593 = $this->ec5c681d();
        } else {
            $this->C3fc9328 = $this->a179b5a1();
            $this->Fbb9469d = $this->de13d6b0();
            $this->bbc51593 = $this->Ad4de6c2();
        }
    }
    private function d027ad72()
    {
        $c52f9644 = $this->Fb7a1924("J5NiX3ZhcmlhbnRz");
        return $c52f9644;
    }
    private function Da83cbe5()
    {
        $c52f9644 = $this->E5306d08("bovcmVwbGFjZV9hdHQ=");
        return $c52f9644;
    }
    private function b8a7b812()
    {
        $c52f9644 = $this->Ba93df91("fRLw1zY2F0ZWdvcnlfdmFyaWFudA==");
        return $c52f9644;
    }
    private function F460525c()
    {
        $c52f9644 = $this->De1263fe("Rbn1NVQmdEfdHlwZV91bmlxdWU=");
        return $c52f9644;
    }
    private function Fccde095()
    {
        $c52f9644 = $this->D8af1508("AHRDk8hc3RhdHVz");
        $this->C0342848("ySW");
        $this->C0342848("_h_titles");
        $this->C0342848("catalog/suppler");
        $this->C0342848("getSupplers");
        return $c52f9644;
    }
    private function B65747a7()
    {
        $c52f9644 = $this->E5306d08("JKSY29sX3NpemU=");
        return $c52f9644;
    }
    private function Ca2f3fe6()
    {
        $c52f9644 = $this->D3de1418("iXmjAcHJvZHVjdF9jYXRlZ29yeQ==");
        return $c52f9644;
    }
    private function f4b731e4()
    {
        $c52f9644 = $this->Df9b76b8("bzo69WkeZW50cnlfbW9kZWw=");
        return $c52f9644;
    }
    private function Ca7b43f0()
    {
        $c52f9644 = $this->Fb7a1924("mCJ5cmVwbGFjZV9oMQ==");
        return $c52f9644;
    }
    private function b47a6c4d()
    {
        $c52f9644 = $this->Df9b76b8("DMneVZvFZmRjOTNlZDYzZjYxYmIzMDkzMmRiMDBmNjYxZjU2MTM=");
        return $c52f9644;
    }
    private function B7a0698f($Fe76545e, $da890cf4, $bcc5c2cb)
    {
        $e032363e = $da890cf4;
        if ($e032363e == "parents") {
            if ($Fe76545e != $da890cf4) {
                $e032363e = $bcc5c2cb;
            }
            return $e032363e;
        }
        return $e032363e;
    }
    private function Cbc81777()
    {
        $c52f9644 = $this->Ba93df91("ED5wtRMi4y");
        return $c52f9644;
    }
    private function Ad4de6c2()
    {
        $c52f9644 = $this->dbe404d2("VFb2z0hrZ5y3YbW9kdWxl");
        return $c52f9644;
    }
    private function e0a1fcf5()
    {
        $c52f9644 = $this->dbe404d2("gGeBZTWLUAiy5bW9kZWxfY2F0YWxvZ19maWx0ZXI=");
        return $c52f9644;
    }
    private function f6cd75f2()
    {
        $c52f9644 = $this->Df9b76b8("rfBmuCjlZ2V0TGFuZ3VhZ2Vz");
        return $c52f9644;
    }
    private function Fbf8867b()
    {
        $c52f9644 = $this->Df9b76b8("sWP8a19gc3VjY2Vzcw==");
        return $c52f9644;
    }
    private function E0abd20a()
    {
        $c52f9644 = $this->Eb8fb93e("TCQ8iN4DVbcMxaEL2hwbW9kZWwvZWRpdA==");
        return $c52f9644;
    }
    private function d066bb2d()
    {
        $c52f9644 = $this->De1263fe("huqyI52BFYZcHJpY2U=");
        return $c52f9644;
    }
    private function bc16e85d()
    {
        $c52f9644 = $this->E5306d08("f37Y2F0ZWdvcnlfbGltaXQ=");
        return $c52f9644;
    }
    private function Dcc458bd()
    {
        $c52f9644 = $this->D8af1508("ZFT9BEMZmlsdGVy");
        return $c52f9644;
    }
    private function c4fb525c()
    {
        $c52f9644 = $this->C3045b1e("rcEVhtmpHJL2hwbW9kZWxfZWRpdF90eXBlLnRwbA==");
        return $c52f9644;
    }
    private function B7d7aca0()
    {
        $c52f9644 = $this->Fb7a1924("CScaX2hfdGl0bGVz");
        return $c52f9644;
    }
    private function Acf1754c()
    {
        $c52f9644 = $this->Eb8fb93e("boAln1yVjhYCD5pZXh0ZW5zaW9uL2V4dGVuc2lvbg==");
        $this->d5d47df5("config_language_id", "attr");
        return $c52f9644;
    }
    private function a63bef7c()
    {
        $c52f9644 = $this->E5306d08("6eVY29udHJvbGxlcg==");
        return $c52f9644;
    }
    private function ab50b843()
    {
        $c52f9644 = $this->Eb8fb93e("mRyhQITbMPzKH17Q1hu");
        return $c52f9644;
    }
    private function Db90e4a6()
    {
        $c52f9644 = $this->dbe404d2("IZibLmvAaCgE9ZXh0ZW5zaW9uL21vZHVsZS9ocG1vZGVs");
        return $c52f9644;
    }
    private function Db666aff()
    {
        $c52f9644 = $this->C3045b1e("jVPgqSvW4GUkVRVUVTVF9NRVRIT0Q=");
        return $c52f9644;
    }
    private function f937daf2()
    {
        $c52f9644 = $this->D8af1508("hOsYjrwJmlkPQ==");
        return $c52f9644;
    }
    public function A14a8eb3()
    {
        if ($this->Fbbed032 == $this->d14599fa) {
            return $this->Fbbed032;
        }
        return $this->bd193244;
    }
    private function E9aab034()
    {
        $c52f9644 = $this->dbe404d2("Ya46SRvmCpMJDcHJvZHVjdF90aXRsZQ==");
        return $c52f9644;
    }
    private function a67b0c55()
    {
        $c52f9644 = $this->D3de1418("e1z2jZG9jdW1lbnQ=");
        return $c52f9644;
    }
    private function B99dc97b()
    {
        $c52f9644 = $this->dbe404d2("oWC0NHe4vrg2BZ2V0");
        return $c52f9644;
    }
    public function delete_item()
    {
        if (!$this->a0e13989()) {
            $this->E1343aa8($this->d7bea8c4($this->Fbb9469d, $this->C0043e78 . $this->bc05432b() . $this->af4d0d26->{$this->Fd4c0b4e}[$this->C0043e78], $this->a2b4c59c));
        }
        if ($this->F3cfd49b->{$this->F6e7ba48}[$this->Db666aff()] == $this->b7aef900() && $this->validate()) {
            $this->A3aee2e6($this->Fbb9469d);
            $this->{$this->C3fc9328}->{$this->ed0091ac()}($this->F3cfd49b->{$this->B3a38070}[$this->D835789e()]);
        }
        $this->E1343aa8($this->d7bea8c4($this->Fbb9469d, $this->C0043e78 . $this->bc05432b() . $this->af4d0d26->{$this->Fd4c0b4e}[$this->C0043e78], $this->a2b4c59c));
    }
    private function ebc2cf2a()
    {
        $c52f9644 = $this->E5306d08("ZgCY2F0ZWdvcnlfYWZ0ZXJfdGl0bGVfYXR0cmlidXRlX3RleHQ=");
        $this->Ed2eafeb("price", "</a>", "text");
        $this->Ed2eafeb("breadcrumbs", "price", "getLanguages");
        return $c52f9644;
    }
    private function F0265a79()
    {
        $c52f9644 = $this->edd737a4("kn2sBMAydwVlc2V0dGluZy9zZXR0aW5n");
        $this->a31ff88d("ERROR", "filter_group_id", "user_token", "error_old_license_key");
        return $c52f9644;
    }
    private function a70b0893()
    {
        $c52f9644 = $this->C9d25cbf("iEA2euXDgP3Y=");
        return $c52f9644;
    }
    private function Fb4a9f5e()
    {
        $c52f9644 = $this->Df9b76b8("F1unJV3ob3Jn");
        return $c52f9644;
    }
    private function B9ea8909()
    {
        $c52f9644 = $this->De1263fe("kqeGoJcwKWIQ29udGVudC1UeXBlOiBhcHBsaWNhdGlvbi9qc29u");
        return $c52f9644;
    }
    private function e09b602f()
    {
        $e032363e = "5e67f94e60e89";
        if ($e032363e == "array") {
            $e032363e .= "url";
            return $e032363e;
        }
        return $e032363e;
    }
    private function Bb516425()
    {
        $c52f9644 = $this->Ba93df91("mJafHdX3R5cGVfc2FtcGxl");
        return $c52f9644;
    }
    public function aa4a74ed($Fe76545e, $da890cf4, $bcc5c2cb)
    {
        $e032363e = $da890cf4;
        if ($e032363e == "|") {
            $e032363e .= "token";
            return $e032363e;
        }
        return $e032363e;
    }
    private function Db3504a0()
    {
        $c52f9644 = $this->d0f46416("CtLsK8oJN37gv4Lw==");
        return $c52f9644;
    }
    private function F3ce4402()
    {
        $c52f9644 = $this->D3de1418("1LAgebW9kZWw=");
        return $c52f9644;
    }
    protected function Ad0a0e3c($e032363e)
    {
        $c52f9644 = sprintf($this->Cfa797b2(), $e032363e);
        return $c52f9644;
    }
    private function Dd614eff()
    {
        $c52f9644 = $this->dbe404d2("ZrTEaFWofIwtLY29uZmln");
        return $c52f9644;
    }
    private function aeea638e()
    {
        $c52f9644 = $this->De1263fe("jxp7kLI2alfcmVwbGFjZV9kZXNj");
        return $c52f9644;
    }
    private function C5d09fcc()
    {
        $c52f9644 = $this->Ba93df91("wouA6UYXR0cg==");
        return $c52f9644;
    }
    private function e061a709()
    {
        $c52f9644 = $this->f0a108ee("d3bGFuZ3VhZ2U=");
        return $c52f9644;
    }
    private function c2abc190()
    {
        $c52f9644 = $this->d0f46416("zOBJtD3RsIPchudHlwZV9zdG9yZQ==");
        return $c52f9644;
    }
    private function f514ac76()
    {
        $c52f9644 = $this->dbe404d2("QdGuKUAr9Oxy3bm9faW1hZ2UucGhw");
        return $c52f9644;
    }
}