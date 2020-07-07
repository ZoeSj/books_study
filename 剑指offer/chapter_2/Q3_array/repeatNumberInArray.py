# @File    : repeatNumberInArray.py
# @Date    : 2020-07-07
# @Author  : shengjia

def repeat(lists):
    lists.sort()
    new_num = lists[0]
    for i in range(1, len(lists)):
        if new_num == lists[i]:
            print(new_num)
            # return new_num
        new_num = lists[i]


lists = [4, 2, 3, 1, 0, 2, 5, 3];
repeat(lists)
