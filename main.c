#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>

int main() {
	while(1 == 1) {
		for(int i = 1; i <= 20; i++) {
			char name[255];

			sprintf(name, "anim/%d.txt", i);

			FILE *fp = fopen(name, "r");	
		
			printf("\r");

			while(!feof(fp)) {
	 	 		putchar(fgetc(fp));
			}

			usleep(100000);

			system("clear");
		};
	}

	return 0;
}
