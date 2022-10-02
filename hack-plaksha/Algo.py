import calendar
import matplotlib.pyplot as plt
def Test4(inc, expend):
    auditlist = {}
    count = 0
    nec = (50*inc)/100
    wants = ((30*inc)/100)
    savings = ((20*inc)/100)
    tim = int(expend/savings)
    if tim < 12:
        for month in range(1, tim+1):
            mycal = calendar.monthcalendar(2025, month)
            week1 = mycal[0]
            week2 = mycal[1]
            if week1[calendar.MONDAY] != 0:
                auditday = week1[calendar.SATURDAY]
                print(calendar.month_name[month], auditday)
                auditlist[str(month)] = str(auditday)
                count = count + 1
            else:
                auditday = week2[calendar.SATURDAY]
                print(calendar.month_name[month], auditday)
                auditlist[str(month)] = str(auditday)
                count = count + 1
    else:
        while(tim > 12):
            tim = tim - 12
            for month in range(1, 13):
                mycal = calendar.monthcalendar(2025, month)
                week1 = mycal[0]
                week2 = mycal[1]
                if week1[calendar.MONDAY] != 0:
                    auditday = week1[calendar.MONDAY]
                    print(calendar.month_name[month], auditday)
                    auditlist[str(month)] = str(auditday)
                    count = count + 1
                else:
                    auditday = week2[calendar.WEDNESDAY]
                    print(calendar.month_name[month], auditday)
                    auditlist[str(month)] = str(auditday)
                    count = count + 1
        else:
            for month in range(1, tim+1):
                mycal = calendar.monthcalendar(2025, month)
                week1 = mycal[0]
                week2 = mycal[1]
                if week1[calendar.MONDAY] != 0:
                    auditday = week1[calendar.SATURDAY]
                    print(calendar.month_name[month], auditday)
                    auditlist[str(month)] = str(auditday)
                    count = count + 1
                else:
                    auditday = week2[calendar.SUNDAY]
                    print(calendar.month_name[month], auditday)
                    auditlist[str(month)] = str(auditday)
                    count = count + 1
    #print(count)
    return auditlist          
      
#x = int(input("Enter income: "))
#y = int(input("Enter expenditure: "))




    
    
