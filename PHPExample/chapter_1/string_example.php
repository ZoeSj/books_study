<?php
/**
 * @author     shengjia
 * Date: 2020/7/2
 * Time: 15:48
 */

/**
 * 访问子串在字符串出现的位置也是strpos()
 * 查看一个字符串是否包含某个子串
 * 注意这个示例要用=== （恒等于）
 * @param $data
 */
function find_string($data)
{
    if (strpos($data['email'], '@') === false) {
        print 'There was no @ in the email address!';
    } else {
        print 'There was @ in the email address!';
    }
}

/**
 * 抽取子串
 * substr 是按照给定的长度抽取长度，可以用来获取用户名啥的
 * 这个函数的调用，主要是后面的start和length 区分正负值
 * @param $string
 */
function extract_string($string)
{
    print substr($string, 0, 8);
    print substr($string, 0, 10);
    print substr($string, 12);
    print substr($string, 20, 10);
    print substr($string, -6);
    print substr($string, -12, 10);
    print substr($string, 15, -2);
    print substr($string, -4, -3);
}

/**
 * 替代子串主要和上面的抽取子串相结合使用
 */
function replace_string()
{
    print substr_replace('there was someone who want u!', 'love', -7, 4);
}

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

//for ($i = 1, $s = 1; $i < 10; $i++) {
//    $s = look_and_say($s);
//    print "$s\n";
//}

function control_case($string)
{
    print ucfirst($string);
    print ucwords($string);
    print strtolower($string);
    print strtoupper($string);
}

function reverse_string($string)
{
    $words = explode(' ', $string);
    $array_words = array_reverse($words);
    print implode(' ', $array_words);
}

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

function comma_string_out()
{
    $sales = [
        ['Northeast', '2005-1-1', '2005-2-1', 12.4],
        ['Northeast', '2005-1-1', '2005-2-1', 121.4],
        ['Northeast', '2005-1-1', '2005-2-1', 122.4],
        ['Northeast', '2005-1-1', '2005-2-1', 123.4],
        ['All', '--', '--', 379.6],
    ];
    $fh = fopen('php://output', 'w');
    foreach ($sales as $sale) {
        if (fputcsv($fh, $sale) === false) {
            die("can't write csv line");
        }
    }
    fclose($fh);
}

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

function analysis_comma_string($filename)
{
    $fh = fopen($filename, 'r') or die("can't open $filename");
    print "<table>\n";
    while ($csv_line = fgetcsv($fh)) {
        print "<tr>";
        for ($i = 0; $i < count($csv_line); $i++) {
            print '<td>' . htmlentities($csv_line[$i]) . '</td>';
        }
        print "</tr>\n";
    }
    print "</table>\n";
    fclose($fh) or die("can't close $filename");
}

function pack_len()
{
    $sales = [
        ['Northeast', '2005-1-1', 121.4],
        ['Northeast', '2005-2-1', 122.4],
        ['Northeast', '2005-3-1', 123.4],
    ];
    foreach ($sales as $sale) {
        print pack('A25A15A6', $sale[0], $sale[1], $sale[2] . "\n");
    }
}

//$string = "there was someone who don't  love u!";
//$string = "sales.csv";
//rand_string(16, '.-');
pack_len();
//$space = table_expand($string);
