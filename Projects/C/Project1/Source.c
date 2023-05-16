#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include "macro.h"
#include "set.h"
void main()
{
	int i = 0, flag = 1, size, command_num, set_index;
	char group, str[N];
	char group_count[3];//ישמש לצורך זיהוי קבוצות ושימרתם
	command  cmd[M] = { {"read_set",0},
						{"print_set",1},
						{"union_set",2},
						{"intersect_set",3},
						{"sub_set",4},
						{"comp_set",5},
						{":halt",6}
	};//הזנת פקודה ומספרה לכל מקום במערך הפקודות

	sets[0].group = 'A';//בכל אינדקס במערך הקבוצות מוכנס שם הקבוצה המתאימה
	sets[1].group = 'B';
	sets[2].group = 'C';
	sets[3].group = 'D';
	sets[4].group = 'E';
	sets[5].group = 'F';

	while (flag == 1)//לולאה שתעבוד כל עוד הדגל שווה ל1, ברגע שהופעלה פקודה לסיום התכנית הדגל יתאפס
	{

		printf(">");
		gets(str);
		size = strlen(str) + 1;
		command_num = check_command(cmd, size, str);

		switch (command_num)
		{
		case 0:
			set_index = check_set1(str);
			read_set(str, set_index);
			break;

		case 1:
			set_index = check_set1(str); //מציאת הקבוצה המתאימה 
			print_set(sets, set_index);//הדפסת הערכים בקבוצה
			break;
		case 2:
			if (check_grops(str, group_count) == 1)
			{
				printf("Invalid command Can not send 1 group to a function\n");
				break;
			}
			else if (check_grops(str, group_count) == 2)
			{
				set_index = check_set1(str);
				union_set1(set_index, group_count);
				break;
			}
			else
			{
				set_index = check_set1(str);
				union_set2(set_index, group_count);
				break;
			}
		case 3:
			if (check_grops(str, group_count) == 1)
			{
				printf("Invalid command Can not send 1 group to a function\n");
				break;
			}
			else if (check_grops(str, group_count) == 2)
			{
				set_index = check_set1(str);
				intersect_set1(set_index, group_count);
				break;
			}
			else
			{
				set_index = check_set1(str);
				intersect_set2(set_index, group_count);
				break;
			}
		case 4:
			if (check_grops(str, group_count) == 1)
			{
				printf("Invalid command Can not send 1 group to a function\n");
				break;
			}
			else if (check_grops(str, group_count) == 2)
			{
				set_index = check_set1(str);
				sub_set1(set_index, group_count);
				break;
			}
			else
			{
				set_index = check_set1(str);
				sub_set2(set_index, group_count);
				break;
			}
		case 5:
			if (check_grops(str, group_count) == 1)
			{
				set_index = check_set1(str);
				cmp_set1(sets, set_index);
				break;
			}
			else if (check_grops(str, group_count) == 2)
			{
				set_index = check_set1(str);
				cmp_set1(sets, set_index);
				break;
			}
			else
			{
				printf("Invalid command Can not send 3 groups to a function\n");
				break;
			}
		case 6:
			printf("end of program\n\n\n\n");
			flag = 0;
			break;
		}
	}
}



