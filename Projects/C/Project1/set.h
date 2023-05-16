#ifndef _SET
#define _SET
#include  <stdlib.h>
#include  "macro.h"
typedef struct//מבנה שמייצג קבוצה ומערך של המספרים שיש בקבוצה
{
	char group;
	int counter[max_num];
}SET;


typedef struct//מבנה שמייצג פקודה והמספר שלה
{
	char str[15];
	int cmd_num;

}command;


extern SET sets[group_amount];//משתנה חיצוני שמייצג את מערך הקבוצות


int check_command(command cmd[], int size, char str[]);//פונקציה שמוציאה את הפקודה ממחרוזת הקלט ומחזירה את מספר הפקודה על מנת שנזהה את הפקודה הרצויה
int check_set1(char str[]);// מחזיר את מיקומו של הקבוצה אם הקבוצה חוקית
int read_set(char str[], int set_index);// פונקציה למספרים שנקלטו מהפקודה ושמירתם בקבוצה הרצויה
int check_grops(char str[], char group_count[]);//בודק כמה קבוצות המשתמש ביקש ואיזה קבוצות ושם אותם במערך
void cmp_set2(int set_index, char group_count[]);/*שומר במערך השני את המספרים החסרים במערך הראשון*/
void cmp_set1(SET sets[], int set_index);/*מדפיסה את המספרים החסרים במערך אחד 0-127*/
void sub_set1(int set_index, char group_count[]);/*בודקת איזה איברים שיש במערך א חסרים במערך ב ומדפיסה אותם*/
void sub_set2(int set_index, char group_count[]);/*בודקת אילו ערכים יש במערך א וחסרים במערך ב ומעבירה אותם למערך ג*/
void print_set(SET sets[], int set_index);
void intersect_set1(int set_index, char group_count[]);/*פונקציה שמדפיסה את הערכים שנמצאים בשתי הקבוצות בלבד*/
void intersect_set2(int set_index, char group_count[]);/*פונקציה ששומרת את הערכים שמופיעים בשתי הקבוצות בקבוצה ג*/
void union_set1(int set_index, char group_count[]);/*פונקציה שמדפיסה את הערכים בשתי הקבוצות יחד*/
void union_set2(int set_index, char group_count[]);/*פונקיה ששומרת האת הערכים שמופיעים בשתי הקבוצות בקבוצה ג*/
#endif
