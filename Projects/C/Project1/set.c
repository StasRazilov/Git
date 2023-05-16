#include  <stdio.h>
#include  <string.h>
#include  "set.h"
#include  "macro.h"
SET sets[group_amount];
int count_cmd = 0;


int check_set1(char str[])//מוצאת את הקבוצה הרצויה
{
	int i = 0, j = 0, flag = 1, set_index2 = 0;

	while (str[i] == ' ' || str[i] == '#') i++;//כאן אנו רוצים להוציא את האינדקס שבו מופיע שם הקבוצה
	if (str[i] >= 'A'&&str[i] <= 'F')
	{
		while (flag&&j <= group_amount)
		{
			if (str[i] == sets[j].group)//משווים את התו שהמשתמש הכניס כשם קבוצה למערך הקבוצות ובודקים אם הקבוצה קיימת
			{
				flag = 0;
				set_index2 = j;
				j++;
			}
			else
			{
				j++;
			}
			if (str[i] == ' ')
			{
				printf("eror syntex, plese try again");
				return 0;
			}
		}
	}
	else
	{
		printf("wrong group name\n");
	}
	return set_index2;
}


int check_command(command cmd[], int size, char str[])//פונקציה שמוציאה את הפקודה ממחרוזת הקלט ומחזירה את מספר הפקודה על מנת שנזהה את הפקודה הרצויה
{
	int i, size2, flag = 1, num_of_cmd;
	char str2[cmd_size] = { 0 };
	for (i = 0; str[i] != ' '; i++)//רץ כל עוד לא הגענו לרווח
	{
		if (str[i] != ' ')//אם התו במערך הקלט שונה מרווח והוא מייצג אות אז נעביר אותו למערך אחר ונשים סולמית במקומו במידה והתנאי לא מתקיים תודפס הודעה
		{
			if (str[i] >= 'a'&&str[i] <= 'z' || str[i] == '_' || str[i] == ':')
			{
				str2[i] = str[i];
				str[i] = '#';
				count_cmd++;
			}
			else
			{
				printf("wrong parameter\n");
			}
		}
	}
	i = 0;
	size2 = strlen(str2);
	while (i <= M && flag)//לולאה שרצה כל עוד לא עברנו על כל הפקודות וגם הדגל לא יתאפס
	{
		if (strcmp(str2, cmd[i].str) == 0)//משווה את הפקודה ממחרוזת הקלט לכל פקודה במאגר הפקודות עד שיש התאמה
		{
			num_of_cmd = i;
			flag = 0;
		}
		i++;
	}
	if (flag == 1)//במידה ולא נמצאה פקודה מתאימה תודפס הודעה בהתאם
	{
		printf("wrong command, please try again\n\n");
		return 0;
	}
	return num_of_cmd;
}


int read_set(char str[], int set_index)
{
	int i, flag = 1, num;
	int	index_ch = -1; // ch  מינוס אחד בשביל הבדיקה בהמשך.. בעזרתו נדע אם יש מספר בתוך   
	int size_str = strlen(str);
	char ch[3];


	for (i = 0; i < max_num; i++)// איפוס מערך של הקבוצה למקרה שכבר יש לו ניתונים מפקודות קודמות
	{
		sets[set_index].counter[i] = 0;
	}//      O_*    אני תותחחחחחחחחחחחחחחחחחחחחחחחחחחחחחחחחח    

	for (i = 0; i < size_str && flag; i++)// ירוץ עד סוף הפקודה
	{
		if (str[i] == '-'&&str[i + 1] == '1')//אם הגענו למינוס אחד אז יכנס 
		{
			flag = 0;
		}

		if (str[i] != ',' && str[i] != ' ')//    (,) אם שונה מרווח וגם שונה מפסיק
		{                                                                  // וגם בטווח המספרים (באסקי)  30-39
			if (str[i] <= '9' && str[i] >= '0') // וגם בטווח המספרים (באסקי)  30-39
			{
				index_ch++;
				ch[index_ch] = str[i];
			}
		}
		else if (index_ch != -1)// ch  אם הוא שונה ממינוס אחד אז יש מסםפר ב  
		{
			num = atoi(ch);//הפיכת המחרוזת שמייצגת מספר למספר דצימלי
			index_ch = -1;
			if (num >= 0 && num <= 127)//אם המספר בתחום המותר נשווה את התא באינדקס שלו ל1
			{
				sets[set_index].counter[num] = 1;
			}
			else //אם הוא לא התחום המותר תודפס הודעה מתאימה
			{
				printf("%d out of range\n", num);
			}
		}
	}
	printf("\n");
	return 0;
}


void print_set(SET sets[], int set_index)
{
	int count = 0, i;
	printf("##############################\n");
	printf("##########Group %c###########\n", sets[set_index].group);
	printf("#############################\n");
	for (i = 0; i < max_num; i++)
	{
		if (sets[set_index].counter[i] == 1)//כל האינדקסים במערך המונים שיש בהם את הערך אחד, אלה מספרים שהמשתמש הקליד
		{
			printf("%d ", i);
			count++;// בודק כמה מספרים הודפסו בכל שורה
		}
		if (count == 16)//תנאי שמבצע ירידת שורה ברגע שהודפסו 16 מספרים
		{
			printf("\n");
			count = 0;
		}
	}
	printf("\n");
	return;
}


void cmp_set1(SET sets[], int set_index)
{
	int count = 0, i;
	printf("##############################\n");
	printf("##########Group %c###########\n", sets[set_index].group);
	printf("#############################\n");
	for (i = 0; i < max_num; i++)
	{
		if (sets[set_index].counter[i] == 0)//כל האינדקסים במערך המונים שיש בהם את הערך אפס, צריך להדפיס את מה שהמשתמש לא הקליד
		{
			printf("%d ", i);
			count++;// בודק כמה מספרים הודפסו בכל שורה
		}
		if (count == 16)//תנאי שמבצע ירידת שורה ברגע שהודפסו 16 מספרים
		{
			printf("\n");
			count = 0;
		}
	}
	printf("\n");
	return;

}


void cmp_set2(int set_index, char group_count[])
{
	int i = 0, flag = 1;
	int index_gruop;
	while (flag)
	{
		if (sets[i].group == group_count[1])
		{
			index_gruop = sets[i].group;
			flag = 0;
		}
		i++;
	}
	flag = 1;
	i = 0;
	while (flag&&i < max_num)
	{
		if (sets[set_index].counter[i] > 0)
		{
			sets[index_gruop].counter[i]++;
			i++;
		}

	}
	printf("\n");
	return;
}


int check_grops(char str[], char group_count[])
{
	int i, j;
	int location = 0;// ישמש אותנו למונה של עד 3 קבוצות 
	int flag = 1;

	for (i = 0, j = 0; str[i] == ' ' || str[i] == '#'; i++);//כאן אנו רוצים להוציא את האינדקס שבו מופיע שם הקבוצה

	while (flag)
	{
		if (str[i] >= 'A'&&str[i] <= 'F')//לולאה שרצה כל עוד הדגל שווה ל1, לא עברנו על כל הקבוצות האפשריות ושם הקבוצה הוא חוקי
		{
			if (str[i] == sets[j].group)//משווים את התו שהמשתמש הכניס כשם קבוצה למערך הקבוצות ובודקים אם הקבוצה קיימת
			{
				group_count[location] = str[i];
				location++;
				if (location > 4)//הכנסנו 4 קבוצות למערך לכן לא חוקי
				{
					flag = 0;
				}
				i++;

				if (str[i] != ',')//אם שונה מפסיק אז הפקודה לא חוקית 
				{
					flag = 0;
				}
				j = 0;
			}

		}
		i++;
	}

	group_count[location] = '\0';
	if (flag)
	{
		printf("No such set\n");
		return 0;
	}
	printf("\n");
	return strlen(group_count);
}


void sub_set1(int set_index, char group_count[])//האינדקס של מערך א יושב בסט אינדקס טהאינדקס של מערך ב יושב בגרופ בתא ה1
{
	int i = 0, flag = 1, count = 0;
	int index_gruop;
	while (flag && i < group_amount)//בדיקה איזה מערך המשתמש ביקש בפקודה
	{
		if (sets[i].group == group_count[1])
		{
			index_gruop = sets[i].group;
			flag = 0;
		}
		else
		{
			i++;
		}
	}
	if (flag)
	{
		printf("eror syntex, plese try again");
	}
	else
	{
		printf("##############################\n");
		printf("##########Group %c###########\n", sets[set_index].group);
		printf("#############################\n");
		for (i = 0; i < max_num; i++)
		{
			if (sets[set_index].counter[i] > sets[index_gruop].counter[i])//בדיקה איזה ערכים מופיעים במערך א ואינם מופיעים במערך ב ומדפיסה אותם
			{
				printf("%d ", i);
				count++;// בודק כמה מספרים הודפסו בכל שורה
			}
			if (count == 16)//תנאי שמבצע ירידת שורה ברגע שהודפסו 16 מספרים
			{
				printf("\n");
				count = 0;
			}
		}

	}
	printf("\n");
	return;
}


void sub_set2(int set_index, char group_count[])
{
	int i = 0, flag = 1, count = 0;
	int index_gruop, index_gruop2;
	while (flag && i < group_amount)//בדיקה איזה מערך המשתמש ביקש בפקודה
	{
		if (sets[i].group == group_count[1])
		{
			index_gruop = sets[i].group;
			flag = 0;
		}
		else
		{
			i++;
		}
	}
	if (flag)
	{
		printf("eror syntex, plese try again");
	}
	i = 0;
	flag = 1;
	while (flag && i < group_amount)//בדיקה איזה מערך המשתמש ביקש בפקודה
	{
		if (sets[i].group == group_count[2])
		{
			index_gruop2 = sets[i].group;
			flag = 0;
		}
		else
		{
			i++;
		}
	}
	if (flag)
	{
		printf("eror syntex, plese try again");
	}
	for (i = 0; i < max_num; i++)
	{
		if (sets[set_index].counter[i] > sets[index_gruop].counter[i])//בדיקה איזה ערכים מופיעים במערך א ואינם מופיעים במערך ב ומדפיסה אותם
		{
			sets[index_gruop2].counter[i] = 1;

		}
	}
	printf("\n");
	return;
}


void union_set1(int set_index, char group_count[])
{
	int i = 0, flag = 1, count = 0;
	int index_gruop;
	while (flag && i < group_amount)//בדיקה איזה מערך המשתמש ביקש בפקודה
	{
		if (sets[i].group == group_count[1])
		{
			index_gruop = i;
			flag = 0;
		}
		else
		{
			i++;
		}
	}
	if (flag)
	{
		printf("eror syntex, plese try again");
	}
	else
	{
		printf("##############################\n");
		printf("##########Group %c###########\n", sets[set_index].group);
		printf("#############################\n");
		for (i = 0; i < max_num; i++)
		{
			if (sets[set_index].counter[i] > 0)//כל האינדקסים במערך המונים שיש בהם את הערך אחד, אלה מספרים שהמשתמש הקליד
			{
				printf("%d ", i);
				count++;// בודק כמה מספרים הודפסו בכל שורה
			}
			if (sets[set_index].counter[i] < sets[index_gruop].counter[i])//בדיקה איזה ערכים מופיעים במערך א ואינם מופיעים במערך ב ומדפיסה אותם
			{
				printf("%d ", i);
				count++;// בודק כמה מספרים הודפסו בכל שורה
			}
			if (count == 16)//תנאי שמבצע ירידת שורה ברגע שהודפסו 16 מספרים
			{
				printf("\n");
				count = 0;
			}
		}
	}
	printf("\n");
	return;
}


void union_set2(int set_index, char group_count[])
{

	int i = 0, flag = 1, count = 0;
	int index_gruop, index_gruop2;
	while (flag && i < group_amount)//בדיקה איזה מערך המשתמש ביקש בפקודה
	{
		if (sets[i].group == group_count[1])
		{
			index_gruop = sets[i].group;
			flag = 0;
		}
		else
		{
			i++;
		}
	}
	if (flag)
	{
		printf("eror syntex, plese try again");
	}
	i = 0;
	flag = 1;
	while (flag && i < group_amount)//בדיקה איזה מערך המשתמש ביקש בפקודה
	{
		if (sets[i].group == group_count[2])
		{
			index_gruop2 = sets[i].group;
			flag = 0;
		}
		else
		{
			i++;
		}
	}
	if (flag)
	{
		printf("eror syntex, plese try again");
	}
	for (i = 0; i < max_num; i++)
	{
		if (sets[set_index].counter[i] > 0)//כל האינדקסים במערך המונים שיש בהם את הערך אחד, אלה מספרים שהמשתמש הקליד
		{
			sets[index_gruop2].counter[i] = 1;
		}
		if (sets[set_index].counter[i] < sets[index_gruop].counter[i])//בדיקה איזה ערכים מופיעים במערך א ואינם מופיעים במערך ב ומדפיסה אותם
		{
			sets[index_gruop2].counter[i] = 1;
		}
	}
	printf("\n");
	return;
}
void intersect_set1(int set_index, char group_count[])
{
	int i = 0, flag = 1, count = 0;
	int index_gruop;
	while (flag && i < group_amount)//בדיקה איזה מערך המשתמש ביקש בפקודה
	{
		if (sets[i].group == group_count[1])
		{
			index_gruop = sets[i].group;
			flag = 0;
		}
		else
		{
			i++;
		}
		/*שומר את הקבוצה במשתנה שנבחר כדי שנוכל לזהות עם איזה קבוצות לעבוד*/
	}

	if (flag)
	{
		printf("eror syntex, plese try again");
	}
	else
	{
		printf("##############################\n");
		printf("##########Group %c###########\n", sets[set_index].group);
		printf("#############################\n");
		for (i = 0; i < max_num; i++)
		{
			if (sets[set_index].counter[i] == 1 && sets[index_gruop].counter[i] == 1)/*ידפיס רק את התאים שבשתי המערכים שווים ל1*/
			{
				printf("%d ", i);
				count++;// בודק כמה מספרים הודפסו בכל שורה
			}
			if (count == 16)//תנאי שמבצע ירידת שורה ברגע שהודפסו 16 מספרים
			{
				printf("\n");
				count = 0;
			}
		}

	}
	printf("\n");
	return;
}


void intersect_set2(int set_index, char group_count[])
{
	int i = 0, flag = 1, count = 0;
	int index_gruop, index_gruop2;
	while (flag && i < group_amount)//בדיקה איזה מערך המשתמש ביקש בפקודה
	{
		if (sets[i].group == group_count[1])
		{
			index_gruop = sets[i].group;
			flag = 0;
		}
		else
		{
			i++;
		}
	}
	if (flag)
	{
		printf("eror syntex, plese try again");
	}
	i = 0;
	flag = 1;
	while (flag && i < group_amount)//בדיקה איזה מערך המשתמש ביקש בפקודה
	{
		if (sets[i].group == group_count[2])
		{
			index_gruop2 = sets[i].group;
			flag = 0;
		}
		else
		{
			i++;
		}
	}
	if (flag)
	{
		printf("eror syntex, plese try again");
	}
	for (i = 0; i < max_num; i++)
	{
		if (sets[set_index].counter[i] == 1 && sets[index_gruop].counter[i] == 1)//כל האינדקסים במערך המונים שיש בהם את הערך אחד, אלה מספרים שהמשתמש הקליד
		{
			sets[index_gruop2].counter[i] = 1;
		}
	}
	printf("\n");
	return;

}