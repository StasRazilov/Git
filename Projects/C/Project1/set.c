#include  <stdio.h>
#include  <string.h>
#include  "set.h"
#include  "macro.h"
SET sets[group_amount];
int count_cmd = 0;


int check_set1(char str[])//����� �� ������ ������
{
	int i = 0, j = 0, flag = 1, set_index2 = 0;

	while (str[i] == ' ' || str[i] == '#') i++;//��� ��� ����� ������ �� ������� ��� ����� �� ������
	if (str[i] >= 'A'&&str[i] <= 'F')
	{
		while (flag&&j <= group_amount)
		{
			if (str[i] == sets[j].group)//������ �� ��� ������� ����� ��� ����� ����� ������� ������� �� ������ �����
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


int check_command(command cmd[], int size, char str[])//������� ������� �� ������ ������� ���� ������� �� ���� ������ �� ��� ����� �� ������ ������
{
	int i, size2, flag = 1, num_of_cmd;
	char str2[cmd_size] = { 0 };
	for (i = 0; str[i] != ' '; i++)//�� �� ��� �� ����� �����
	{
		if (str[i] != ' ')//�� ��� ����� ���� ���� ����� ���� ����� ��� �� ����� ���� ����� ��� ����� ������ ������ ����� ������ �� ������ ����� �����
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
	while (i <= M && flag)//����� ���� �� ��� �� ����� �� �� ������� ��� ���� �� �����
	{
		if (strcmp(str2, cmd[i].str) == 0)//����� �� ������ ������� ���� ��� ����� ����� ������� �� ��� �����
		{
			num_of_cmd = i;
			flag = 0;
		}
		i++;
	}
	if (flag == 1)//����� ��� ����� ����� ������ ����� ����� �����
	{
		printf("wrong command, please try again\n\n");
		return 0;
	}
	return num_of_cmd;
}


int read_set(char str[], int set_index)
{
	int i, flag = 1, num;
	int	index_ch = -1; // ch  ����� ��� ����� ������ �����.. ������ ��� �� �� ���� ����   
	int size_str = strlen(str);
	char ch[3];


	for (i = 0; i < max_num; i++)// ����� ���� �� ������ ����� ���� �� �� ������� ������� ������
	{
		sets[set_index].counter[i] = 0;
	}//      O_*    ��� ������������������������������������    

	for (i = 0; i < size_str && flag; i++)// ���� �� ��� ������
	{
		if (str[i] == '-'&&str[i + 1] == '1')//�� ����� ������ ��� �� ���� 
		{
			flag = 0;
		}

		if (str[i] != ',' && str[i] != ' ')//    (,) �� ���� ����� ��� ���� �����
		{                                                                  // ��� ����� ������� (�����)  30-39
			if (str[i] <= '9' && str[i] >= '0') // ��� ����� ������� (�����)  30-39
			{
				index_ch++;
				ch[index_ch] = str[i];
			}
		}
		else if (index_ch != -1)// ch  �� ��� ���� ������ ��� �� �� ����� �  
		{
			num = atoi(ch);//����� ������� ������� ���� ����� ������
			index_ch = -1;
			if (num >= 0 && num <= 127)//�� ����� ����� ����� ����� �� ��� ������� ��� �1
			{
				sets[set_index].counter[num] = 1;
			}
			else //�� ��� �� ����� ����� ����� ����� ������
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
		if (sets[set_index].counter[i] == 1)//�� ��������� ����� ������ ��� ��� �� ���� ���, ��� ������ ������� �����
		{
			printf("%d ", i);
			count++;// ���� ��� ������ ������ ��� ����
		}
		if (count == 16)//���� ����� ����� ���� ���� ������� 16 ������
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
		if (sets[set_index].counter[i] == 0)//�� ��������� ����� ������ ��� ��� �� ���� ���, ���� ������ �� �� ������� �� �����
		{
			printf("%d ", i);
			count++;// ���� ��� ������ ������ ��� ����
		}
		if (count == 16)//���� ����� ����� ���� ���� ������� 16 ������
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
	int location = 0;// ���� ����� ����� �� �� 3 ������ 
	int flag = 1;

	for (i = 0, j = 0; str[i] == ' ' || str[i] == '#'; i++);//��� ��� ����� ������ �� ������� ��� ����� �� ������

	while (flag)
	{
		if (str[i] >= 'A'&&str[i] <= 'F')//����� ���� �� ��� ���� ���� �1, �� ����� �� �� ������� �������� ��� ������ ��� ����
		{
			if (str[i] == sets[j].group)//������ �� ��� ������� ����� ��� ����� ����� ������� ������� �� ������ �����
			{
				group_count[location] = str[i];
				location++;
				if (location > 4)//������ 4 ������ ����� ��� �� ����
				{
					flag = 0;
				}
				i++;

				if (str[i] != ',')//�� ���� ����� �� ������ �� ����� 
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


void sub_set1(int set_index, char group_count[])//������� �� ���� � ���� ��� ������ �������� �� ���� � ���� ����� ��� �1
{
	int i = 0, flag = 1, count = 0;
	int index_gruop;
	while (flag && i < group_amount)//����� ���� ���� ������ ���� ������
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
			if (sets[set_index].counter[i] > sets[index_gruop].counter[i])//����� ���� ����� ������� ����� � ����� ������� ����� � ������� ����
			{
				printf("%d ", i);
				count++;// ���� ��� ������ ������ ��� ����
			}
			if (count == 16)//���� ����� ����� ���� ���� ������� 16 ������
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
	while (flag && i < group_amount)//����� ���� ���� ������ ���� ������
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
	while (flag && i < group_amount)//����� ���� ���� ������ ���� ������
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
		if (sets[set_index].counter[i] > sets[index_gruop].counter[i])//����� ���� ����� ������� ����� � ����� ������� ����� � ������� ����
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
	while (flag && i < group_amount)//����� ���� ���� ������ ���� ������
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
			if (sets[set_index].counter[i] > 0)//�� ��������� ����� ������ ��� ��� �� ���� ���, ��� ������ ������� �����
			{
				printf("%d ", i);
				count++;// ���� ��� ������ ������ ��� ����
			}
			if (sets[set_index].counter[i] < sets[index_gruop].counter[i])//����� ���� ����� ������� ����� � ����� ������� ����� � ������� ����
			{
				printf("%d ", i);
				count++;// ���� ��� ������ ������ ��� ����
			}
			if (count == 16)//���� ����� ����� ���� ���� ������� 16 ������
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
	while (flag && i < group_amount)//����� ���� ���� ������ ���� ������
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
	while (flag && i < group_amount)//����� ���� ���� ������ ���� ������
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
		if (sets[set_index].counter[i] > 0)//�� ��������� ����� ������ ��� ��� �� ���� ���, ��� ������ ������� �����
		{
			sets[index_gruop2].counter[i] = 1;
		}
		if (sets[set_index].counter[i] < sets[index_gruop].counter[i])//����� ���� ����� ������� ����� � ����� ������� ����� � ������� ����
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
	while (flag && i < group_amount)//����� ���� ���� ������ ���� ������
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
		/*���� �� ������ ������ ����� ��� ����� ����� �� ���� ������ �����*/
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
			if (sets[set_index].counter[i] == 1 && sets[index_gruop].counter[i] == 1)/*����� �� �� ����� ����� ������� ����� �1*/
			{
				printf("%d ", i);
				count++;// ���� ��� ������ ������ ��� ����
			}
			if (count == 16)//���� ����� ����� ���� ���� ������� 16 ������
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
	while (flag && i < group_amount)//����� ���� ���� ������ ���� ������
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
	while (flag && i < group_amount)//����� ���� ���� ������ ���� ������
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
		if (sets[set_index].counter[i] == 1 && sets[index_gruop].counter[i] == 1)//�� ��������� ����� ������ ��� ��� �� ���� ���, ��� ������ ������� �����
		{
			sets[index_gruop2].counter[i] = 1;
		}
	}
	printf("\n");
	return;

}