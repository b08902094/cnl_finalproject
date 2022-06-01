import os

import matplotlib.pyplot as plt


# 操作函数
def getAllitems(host, oid):
    sn1 = os.popen('snmpwalk -v 1 -c public ' + host + ' ' + oid).read().split('\n')[:-1]
    print(sn1)
    return sn1

# 获取本机设备
def getDevices(host):
    device_mib = getAllitems(host, 'sysDescr')#oid
    device_list = []
    for item in device_mib:
         device_list.append(item.split(':')[3].strip())
    return device_list


# 获取数据
def getDate(host, oid):
    date_mib = getAllitems(host, oid)
    print(date_mib)
    date = []
    for item in date_mib:
        byte = float(item.split(':')[3].strip())
        date.append(str(round(byte / 1024, 2)) + ' KB')
    return date



#主函数
if __name__ == '__main__':
    s = 10
    inse = []
    outse = []
    plt.ion()

    while(s>0):
        hosts = ['']#换成自己的IP地址
        for host in hosts:
            device_list = getDevices(host)
            print(device_list)
            inside = getDate(host, 'snmpInPkts')#oid
            print(device_list[0])
            outside = getDate(host, ' snmpOutPkts')#oid

            print('==========' + host + '==========')
            for i in range(len(inside)):
                print('%s : 入: %-15s   出: %s ' % (device_list[i], inside[i], outside[i]))
                inse.append(inside[i])
                outse.append(outside[i])
        s=s-1

        plt.clf()
        plt.rcParams['font.sans-serif'] = 'SimHei'
        plt.rcParams['axes.unicode_minus'] = False
        plt.plot(inse, lw=1.5, label='入')
        plt.plot(outse, lw=1.5, label='出')
        plt.legend(loc=0)
        plt.axis('tight')
        plt.xlabel('index')
        plt.ylabel('value')
        plt.title('簡易流量监控')
        plt.pause(5)