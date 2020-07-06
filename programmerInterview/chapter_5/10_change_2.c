#include <iostream>
using namespace std;

void DtoB(int d) {
    if(d/2)
        DtoB(d/2);
    cout<<d%2;
}

int main(int argc, char const *argv[])
{
	DtoB(32);
	return 0;
}