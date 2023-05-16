#ifndef _SET
#define _SET
#include  <stdlib.h>
#include  "macro.h"
typedef struct//���� ������ ����� ����� �� ������� ��� ������
{
	char group;
	int counter[max_num];
}SET;


typedef struct//���� ������ ����� ������ ���
{
	char str[15];
	int cmd_num;

}command;


extern SET sets[group_amount];//����� ������ ������ �� ���� �������


int check_command(command cmd[], int size, char str[]);//������� ������� �� ������ ������� ���� ������� �� ���� ������ �� ��� ����� �� ������ ������
int check_set1(char str[]);// ����� �� ������ �� ������ �� ������ �����
int read_set(char str[], int set_index);// ������� ������� ������ ������� ������� ������ ������
int check_grops(char str[], char group_count[]);//���� ��� ������ ������ ���� ����� ������ ��� ���� �����
void cmp_set2(int set_index, char group_count[]);/*���� ����� ���� �� ������� ������ ����� ������*/
void cmp_set1(SET sets[], int set_index);/*������ �� ������� ������ ����� ��� 0-127*/
void sub_set1(int set_index, char group_count[]);/*����� ���� ������ ��� ����� � ����� ����� � ������� ����*/
void sub_set2(int set_index, char group_count[]);/*����� ���� ����� �� ����� � ������ ����� � ������� ���� ����� �*/
void print_set(SET sets[], int set_index);
void intersect_set1(int set_index, char group_count[]);/*������� ������� �� ������ ������� ���� ������� ����*/
void intersect_set2(int set_index, char group_count[]);/*������� ������ �� ������ �������� ���� ������� ������ �*/
void union_set1(int set_index, char group_count[]);/*������� ������� �� ������ ���� ������� ���*/
void union_set2(int set_index, char group_count[]);/*������ ������ ��� ������ �������� ���� ������� ������ �*/
#endif
