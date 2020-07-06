#include <iostream>
using namespace std;
int DtoB(int d) {
    if(d/2)
      DtoB(d/2);
	cout<<d%2;
  	return d%2;
    
}
int func(int x){
	int count = 0;
	int y;
	while(x){
		count ++;
		x = x&(x-1);
		cout << x << endl;
		if(x>0){
			y = DtoB(x);
		}
		cout << count << endl;
	}
	return count;
}

int main()
{
	cout << func(32) << endl;
	return 0;
}