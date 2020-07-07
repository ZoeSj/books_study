#include<iostream>
using namespace std;

class A{
private:
	int value;

public:
	A(int n) {value =n ;}
	// A(A other) { value = other.value;}
	A(const A & other) { value = other.value;}

	void Print() {std::cout << value << std::endl; }
};

int main(int argc, const char *argv[])
{
	/* code */
	A a=10;
	A b=a;
	b.Print();
	return 0;
}