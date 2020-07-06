# 字符串
PHP字符串是二进制安全的（也就是说，字符串可以包含null），而且可以根据需要扩展和收缩，大小只受PHP可用内存大小的限制。
双引号字符串无法识别转义的单引号，不过可以识别内插的变量和部分转义序列。
![image.png](https://cdn.nlark.com/yuque/0/2020/png/264652/1593671821807-8082f335-7ff5-4f18-95eb-9c38568ba63e.png#align=left&display=inline&height=321&margin=%5Bobject%20Object%5D&name=image.png&originHeight=642&originWidth=688&size=114623&status=done&style=none&width=344)
### 1、访问子串
![image.png](https://cdn.nlark.com/yuque/0/2020/png/264652/1593672116314-be20be51-9800-480d-9759-61bd2c1f4d81.png#align=left&display=inline&height=103&margin=%5Bobject%20Object%5D&name=image.png&originHeight=206&originWidth=1308&size=57080&status=done&style=none&width=654)
使用strpos() 、substr()、strlen()、substr_replace()

```php
function find_string($data)
{
    if (strpos($data['email'], '@') === false) {
        print 'There was no @ in the email address!';
    } else {
        print 'There was @ in the email address!';
    }
}
```
### 2、抽取子串
![image.png](https://cdn.nlark.com/yuque/0/2020/png/264652/1593677242562-c821909f-70c6-4481-97a6-ca576936471a.png#align=left&display=inline&height=120&margin=%5Bobject%20Object%5D&name=image.png&originHeight=240&originWidth=1390&size=100411&status=done&style=none&width=695)

```php
function extract_string()
{
    print substr('today is a nice day!', 0, 8);
    print substr('there was someone who want u!',0,10);
    print substr('there was someone who want u!',12);
    print substr('there was someone who want u!',20,10);
    print substr('there was someone who want u!',-6);
    print substr('there was someone who want u!',-12,10);
    print substr('there was someone who want u!',15,-2);
    print substr('there was someone who wat u!',-4,-3);
}
```
### 3、替换子串
![image.png](https://cdn.nlark.com/yuque/0/2020/png/264652/1593679071023-a3a8aead-7607-47df-af3c-accb7c657d38.png#align=left&display=inline&height=132&margin=%5Bobject%20Object%5D&name=image.png&originHeight=264&originWidth=1332&size=75086&status=done&style=none&width=666)

```php
function replace_string()
{
    print substr_replace('there was someone who want u!', 'love',-7,4);
}
```

### 4、逐字节处理字符串
![image.png](https://cdn.nlark.com/yuque/0/2020/png/264652/1593679910051-f470aaa7-d72e-4085-9503-33a989f6be5f.png#align=left&display=inline&height=71&margin=%5Bobject%20Object%5D&name=image.png&originHeight=142&originWidth=584&size=27819&status=done&style=none&width=292)

```php

function one_by_one_handle_string()
{
    $string = 'there was someone who want u!,but seems u do not like him';
    $count = 0;
    for ($i = 0, $j = strlen($string); $i < $j; $i++) {
        if (strstr('aeiouAEIOU', $string[$i])) {
            $count++;
        }
    }
    print $count;
}
```

![image.png](https://cdn.nlark.com/yuque/0/2020/png/264652/1593682043227-1fe55c5f-3590-4a9e-bea9-683e6f642785.png#align=left&display=inline&height=316&margin=%5Bobject%20Object%5D&name=image.png&originHeight=632&originWidth=1350&size=187196&status=done&style=none&width=675)

```php
/**
 * 通过处理字符串的子串，解决Look and Say 序列
 * J.H.Conway提出的一个整数系列
 */
function look_and_say($s)
{
    $r = '';
    $m = $s[0];
    $n = 1;
    for ($i = 1, $j = strlen($s); $i < $j; $i++) {
        if ($s[$i] == $m) {
            $n++;
        } else {
            $r .= $n . $m;
            $m = $s[$i];
            $n = 1;
        }
    }
    return $r . $n . $m;
}

for ($i = 1, $s = 1; $i < 10; $i++) {
    $s = look_and_say($s);
    print "$s\n";
}
```

### 5、按单词或字节反转字符串
![image.png](https://cdn.nlark.com/yuque/0/2020/png/264652/1593763093722-32f8eb83-3697-43b3-bdb9-86438a1421a6.png#align=left&display=inline&height=76&margin=%5Bobject%20Object%5D&name=image.png&originHeight=152&originWidth=632&size=28431&status=done&style=none&width=316)

```php
function reverse_string($string)
{
    $words = explode(' ', $string);
    $array_words = array_reverse($words);
    print implode(' ',$array_words);
}
r_ s
```
### 6、生成随机字符串
![image.png](https://cdn.nlark.com/yuque/0/2020/png/264652/1593764267707-75816079-feb4-47d6-96a5-e35b29728ef3.png#align=left&display=inline&height=94&margin=%5Bobject%20Object%5D&name=image.png&originHeight=188&originWidth=688&size=23555&status=done&style=none&width=344)

```php
function rand_string($length = 32, $char = 'alskdjf98797iii847qiasihdkaeuyrrqe74q09809')
{
    if (!is_int($length) || $length < 0) {
        return false;
    }
    $char_length = strlen($char) - 1;
    $string = '';
    for ($i = $length; $i > 0; $i--) {
        $string .= $char[mt_rand(0, $char_length)];
    }
    print $string;
    return $string;
}
rand_string(16,'.-');
```
### 7、扩展和压缩制表符
![image.png](https://cdn.nlark.com/yuque/0/2020/png/264652/1593764424702-24117c4e-1d47-48ca-ad44-a309edc11b9b.png#align=left&display=inline&height=99&margin=%5Bobject%20Object%5D&name=image.png&originHeight=198&originWidth=1306&size=95765&status=done&style=none&width=653)
### ![image.png](https://cdn.nlark.com/yuque/0/2020/png/264652/1594016079641-96f66097-b9bd-46fb-9fd2-3b5302423297.png#align=left&display=inline&height=333&margin=%5Bobject%20Object%5D&name=image.png&originHeight=666&originWidth=1300&size=344665&status=done&style=none&width=650)

```php
function table_expand($text)
{
    while (strstr($text, '\t')) {
        $text = preg_replace_callback('/^([^t\n]*)(\t+)/m', 'tab_expand_helper', $text);
    }
    return $text;
}

function tab_expand_helper($matches)
{
    $tab_stop = 8;
    return $matches[1] . str_repeat(' ', strlen($matches[2]) * $tab_stop - (strlen($matches[1]) % $tab_stop));
}

function table_unexpand($text)
{
    $tab_stop = 8;
    $lines = explode("\n", $text);
    foreach ($lines as $i => $line) {
        //将制表符扩展为空格
        $line = table_expand($line);
        $chunks = str_split($line, $tab_stop);
        $chunkCount = count($chunks);
        //扫描除最后一个字符块以外的所有其他字符块
        for ($j = 0; $j < $chunkCount - 1; $j++) {
            $chunks[$j] = preg_replace('/ {2,}$/', "\t", $chunks[$j]);
            //如果最后一个字符块相当于制表符的空格
            //将它转换为一个制表符，否则保持不变
            if ($chunks[$chunkCount - 1] == str_repeat(' ', $tab_stop)) {
                $chunks[$chunkCount - 1] = "\t";
            }
            //重新组合字符块
            $line[$i] = implode('', $chunks);
        }
        //重新组合文本行
        return implode('\n', $lines);
    }
}
$space = table_expand($string);
```
![image.png](https://cdn.nlark.com/yuque/0/2020/png/264652/1594017278244-e2dfe9ec-68d9-4a02-8702-1a4d75a0860f.png#align=left&display=inline&height=281&margin=%5Bobject%20Object%5D&name=image.png&originHeight=562&originWidth=1334&size=368696&status=done&style=none&width=667)
### 8、控制大小写
![image.png](https://cdn.nlark.com/yuque/0/2020/png/264652/1593682765288-edb8de75-b54e-46dc-a9ec-fd8eacce9ebd.png#align=left&display=inline&height=117&margin=%5Bobject%20Object%5D&name=image.png&originHeight=234&originWidth=1348&size=80224&status=done&style=none&width=674)

```php
function control_case()
{
    print ucfirst("there was someone who don't  love u!");
    print ucwords("there was someone who don't  love u!");
    print strtolower('there was someone who wat u!');
    print strtoupper("there was someone who don't  love u!");
}
```
### 9、字符串中的内插函数和表达式
![image.png](https://cdn.nlark.com/yuque/0/2020/png/264652/1594014008418-8568888b-49ba-43a4-b2ab-aa7b0c7591e2.png#align=left&display=inline&height=81&margin=%5Bobject%20Object%5D&name=image.png&originHeight=162&originWidth=924&size=41317&status=done&style=none&width=462)
有两种方法：

- 使用.连接符
- 使用双引号

![image.png](https://cdn.nlark.com/yuque/0/2020/png/264652/1594014094341-5d5d5fae-037d-4295-acc0-8f8bd234eed3.png#align=left&display=inline&height=394&margin=%5Bobject%20Object%5D&name=image.png&originHeight=788&originWidth=1388&size=343529&status=done&style=none&width=694)
使用heredocs完成内插，一定要注意包含适当的空格，使整个字符串可以正确的显示。
### 10、去除字符串首尾的空格
![image.png](https://cdn.nlark.com/yuque/0/2020/png/264652/1594014355544-b384daa6-08ba-4dab-b94e-624ab094992f.png#align=left&display=inline&height=99&margin=%5Bobject%20Object%5D&name=image.png&originHeight=198&originWidth=1300&size=62543&status=done&style=none&width=650)
使用以下函数：

- ltrim()  删除开头空白符
- rtrim() 删除末尾空白符
- trim() 删除开头末尾空白符

![image.png](https://cdn.nlark.com/yuque/0/2020/png/264652/1594014530810-79b55ea1-bdc2-435c-8782-bae295740df6.png#align=left&display=inline&height=67&margin=%5Bobject%20Object%5D&name=image.png&originHeight=134&originWidth=1330&size=49393&status=done&style=none&width=665)

![image.png](https://cdn.nlark.com/yuque/0/2020/png/264652/1594014599180-d7c0a335-4fdf-43a6-bd7c-148b4a0daca9.png#align=left&display=inline&height=104&margin=%5Bobject%20Object%5D&name=image.png&originHeight=208&originWidth=1356&size=132046&status=done&style=none&width=678)
### 11、生成逗号分隔数据
fputcsv()
![image.png](https://cdn.nlark.com/yuque/0/2020/png/264652/1594014626335-b30e9879-aa54-4897-9e7c-058f678ea93e.png#align=left&display=inline&height=98&margin=%5Bobject%20Object%5D&name=image.png&originHeight=196&originWidth=1326&size=65571&status=done&style=none&width=663)

```php
function comma_string()
{
    $sales = [
        ['Northeast', '2005-1-1', '2005-2-1', 12.4],
        ['Northeast', '2005-1-1', '2005-2-1', 121.4],
        ['Northeast', '2005-1-1', '2005-2-1', 122.4],
        ['Northeast', '2005-1-1', '2005-2-1', 123.4],
        ['All', '--', '--', 379.6],
    ];
    $filename = './sales.csv';
    $fh = fopen($filename, 'w') or die("can't open $filename");
    foreach ($sales as $sale) {
        if (fputcsv($fh, $sale) === false) {
            die("can't write csv line");
        }
    }
    fclose($fh) or die("can't close $filename");
}
```
![image.png](https://cdn.nlark.com/yuque/0/2020/png/264652/1594015523063-3dd2abb3-4a7e-4dbc-bd17-191d5a03ed7d.png#align=left&display=inline&height=66&margin=%5Bobject%20Object%5D&name=image.png&originHeight=132&originWidth=1314&size=56598&status=done&style=none&width=657)

```php
function comma_string()
{
    $sales = [
        ['Northeast', '2005-1-1', '2005-2-1', 12.4],
        ['Northeast', '2005-1-1', '2005-2-1', 121.4],
        ['Northeast', '2005-1-1', '2005-2-1', 122.4],
        ['Northeast', '2005-1-1', '2005-2-1', 123.4],
        ['All', '--', '--', 379.6],
    ];
    $fh = fopen('php://output','w');
    foreach ($sales as $sale) {
        if (fputcsv($fh, $sale) === false) {
            die("can't write csv line");
        }
    }
    fclose($fh);
}
```
![image.png](https://cdn.nlark.com/yuque/0/2020/png/264652/1594015532311-800a22ff-210b-4940-a6e3-962451310b70.png#align=left&display=inline&height=56&margin=%5Bobject%20Object%5D&name=image.png&originHeight=112&originWidth=1374&size=70995&status=done&style=none&width=687)
ob_start — 打开输出控制缓冲
![image.png](https://cdn.nlark.com/yuque/0/2020/png/264652/1594015917757-e5f3d6e7-f34f-497c-9f4f-ed361d1aaf31.png#align=left&display=inline&height=381&margin=%5Bobject%20Object%5D&name=image.png&originHeight=762&originWidth=2140&size=250509&status=done&style=none&width=1070)
![image.png](https://cdn.nlark.com/yuque/0/2020/png/264652/1594015935258-3d041b29-be6e-41fc-95b3-fb589378d8c8.png#align=left&display=inline&height=254&margin=%5Bobject%20Object%5D&name=image.png&originHeight=508&originWidth=760&size=44325&status=done&style=none&width=380)![image.png](https://cdn.nlark.com/yuque/0/2020/png/264652/1594015951565-a6174b3a-c488-4a3a-86cf-0786f536d437.png#align=left&display=inline&height=351&margin=%5Bobject%20Object%5D&name=image.png&originHeight=702&originWidth=2116&size=118011&status=done&style=none&width=1058)

```php
function comma_string_put()
{
    $sales = [
        ['Northeast', '2005-1-1', '2005-2-1', 12.4],
        ['Northeast', '2005-1-1', '2005-2-1', 121.4],
        ['Northeast', '2005-1-1', '2005-2-1', 122.4],
        ['Northeast', '2005-1-1', '2005-2-1', 123.4],
        ['All', '--', '--', 379.6],
    ];
    ob_start();
    $fh = fopen('php://output', 'w') or die("can't open php://output");
    foreach ($sales as $sale) {
        if (fputcsv($fh, $sale) === false) {
            die("can't write csv line");
        }
    }
    fclose($fh) or die("can't close php://output");
    $output = ob_get_contents();
    ob_end_clean();
}
```
### 12、解析逗号分隔数据
### 13、生成固定宽度字段数据记录
### 14、解析固定宽度字段数据记录
### 15、分解字符串
### 16、使文本在指定长度自动换行
### 17、字符串中存储二进制数据
### 18、程序：可下载的CSV文件


