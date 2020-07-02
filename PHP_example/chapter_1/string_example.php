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
 */
function extract_string()
{
    print substr('today is a nice day!', 0, 8);
    print substr('there was someone who want u!', 0, 10);
    print substr('there was someone who want u!', 12);
    print substr('there was someone who want u!', 20, 10);
    print substr('there was someone who want u!', -6);
    print substr('there was someone who want u!', -12, 10);
    print substr('there was someone who want u!', 15, -2);
    print substr('there was someone who wat u!', -4, -3);
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

for ($i = 1, $s = 1; $i < 10; $i++) {
    $s = look_and_say($s);
    print "$s\n";
}
