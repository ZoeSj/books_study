# use_module.py
class SingleTon(object):

    def __init__(self, val):
        self.val = val

single = SingleTon(2)

# test_module.py
from use_module import single

a = single
b = single
print a.val, b.val
print a is b
a.val = 233
print a.val, b.val