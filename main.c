#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <unistd.h>

int main() {
	for(int i = 0; i < 15; i++) {
	    system("clear");

		char name[99];

		sprintf(name, "anim/%d.txt", i + 1);

		FILE *fp = fopen(name, "r");	
		
		printf("\r");

		while(!feof(fp)) {
	 	 	putchar(fgetc(fp));
		}

		sleep(1);
	};

	system("clear");

	printf("THE END\n");
	
	return 0;
}
