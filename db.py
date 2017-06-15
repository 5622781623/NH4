import copy
import random
import functools
import pymysql

# Registration statistics
# ITS400: 38, CSS400: 61 => total = 99
# Required number of topics: 99/2 =  49

#database connect
conn = pymysql.connect(host='localhost', port=3306, user='admin_db', passwd='wLhiTJDTAd', db='admin_db')


# guys are student groups
cur = conn.cursor()
cur.execute("SELECT gName FROM `gro` WHERE 1")
guys = []
i = 0
for row in cur:
  guys.insert(i,row[0])
  i = i+1
cur.close()


#gals are topics
# SELECT `UserID`,`code` FROM `topic` WHERE 1
cur = conn.cursor()
cur.execute("SELECT `code` FROM `topic` WHERE 1")
gals = []
i = 0
for row in cur:
  gals.insert(i,row[0])
  i = i+1
cur.close()

# each group is allowed to declare several topics as its preferred topics (up to 12 topics, at most 2 topics from the same faculty member?)
#SELECT `gName`,`1t`,`2t`,`3t`,`4t`,`5t`,`6t`,`7t`,`8t`,`9t`,`10t`,`11t`,`12t` FROM `gro` WHERE 1

cur = conn.cursor()
cur.execute("SELECT `code` FROM `topic` WHERE 1")
guyprefers = []
i = 0
for row in cur:
  guyprefers.insert(i,row[1])
  guyprefers.insert(i,row[2])
  guyprefers.insert(i,row[3])  
  guyprefers.insert(i,row[4])
  guyprefers.insert(i,row[5])
  guyprefers.insert(i,row[6])
  guyprefers.insert(i,row[7])
  guyprefers.insert(i,row[8])
  guyprefers.insert(i,row[9])
  guyprefers.insert(i,row[10])
  guyprefers.insert(i,row[11])
  guyprefers.insert(i,row[12])
  i = i+1
cur.close()



# filling missing preferences for groups
for guy in guys:
    listedGals = guyprefers[guy]
    missingGals = list(set(gals).difference(set(listedGals)))
    random.shuffle(missingGals)
    guyprefers[guy] =   guyprefers[guy]  +  missingGals

# print("Filled group preferences")
# for guy in guys:
#     print(guy, "prefers", guyprefers[guy])



# attributes of each group
#SELECT `gName`,`GPA`,`duration` FROM `gro` WHERE 1

cur = conn.cursor()
cur.execute("SELECT `gName`,`GPA`,`duration` FROM `gro` WHERE 1")

dict = {}
guyrecords = []  
for row in cur:
       dict['groupID'] = row[0]
       dict['gpa'] = row[1]
       dict['duration'] = row[2]
       guyrecords.append(dict)
       dict = {}
cur.close()  


# sort groups according to duration of project, then GPA
def guyCom(gY,gX):
    if (gX['duration']==gY['duration']):
        if (gX['gpa']>gY['gpa']):
            return 1
        elif (gX['gpa']==gY['gpa']):
            return 0
        else:
            return -1
    elif (gX['duration']==2):
        return 1
    else:
        return -1

sortedguyrecords = sorted(guyrecords, key=functools.cmp_to_key(guyCom))

print("group priorities!")
i=1
for record in sortedguyrecords:
    print(i, ".", record['groupID'])
    i=i+1
    #print(record)


prioritiesOfGuys = [g['groupID'] for g in sortedguyrecords]

## prioritiesOfGuys = ['G27', 'G15', 'G5', 'G2', 'G14', 'G37', 'G1', 'G9', 'G46', 'G16', 'G49', 'G28', 'G13', 'G33', 'G3', 'G4', 'G23', 'G31', 'G34', 'G6', 'G32', 'G45', 'G44', 'G10', 'G38', 'G30', 'G39', 'G24', 'G17', 'G18', 'G41', 'G40', 'G29', 'G35', 'G48', 'G21', 'G20', 'G50', 'G47', 'G43', 'G22', 'G36', 'G8', 'G19', 'G25', 'G11', 'G12', 'G7', 'G42', 'G26']

##print(prioritiesOfGuys)


galprefers = {}
for gal in gals:
    galprefers[gal]=prioritiesOfGuys


## Faculty-specific preferences
#galprefers['CN1'] = ['G39','G27', 'G15', 'G5', 'G2', 'G14', 'G37', 'G1', 'G9', 'G46', 'G16', 'G49', 'G28', 'G13', 'G33', 'G3', 'G4', 'G23', 'G31', 'G34', 'G6', 'G32', 'G45', 'G44', 'G10', 'G38', 'G30', 'G24', 'G17', 'G18', 'G41', 'G40', 'G29', 'G35', 'G48', 'G21', 'G20', 'G50', 'G47', 'G43', 'G22', 'G36', 'G8', 'G19', 'G25', 'G11', 'G12', 'G7', 'G42', 'G26']

#galprefers['GS2'] = ['G15', 'G27', 'G5', 'G2', 'G14', 'G37', 'G1', 'G9', 'G46', 'G16', 'G49', 'G28', 'G13', 'G33', 'G3', 'G4', 'G23', 'G31', 'G34', 'G6', 'G32', 'G45', 'G44', 'G10', 'G38', 'G30', 'G39', 'G24', 'G17', 'G18', 'G41', 'G40', 'G29', 'G35', 'G48', 'G21', 'G20', 'G50', 'G47', 'G43', 'G22', 'G36', 'G8', 'G19', 'G25', 'G11', 'G12', 'G7', 'G42', 'G26']

#galprefers['TH6'] = ['G42', 'G27', 'G15', 'G5', 'G2', 'G14', 'G37', 'G1', 'G9', 'G46', 'G16', 'G49', 'G28', 'G13', 'G33', 'G3', 'G4', 'G23', 'G31', 'G34', 'G6', 'G32', 'G45', 'G44', 'G10', 'G38', 'G30', 'G39', 'G24', 'G17', 'G18', 'G41', 'G40', 'G29', 'G35', 'G48', 'G21', 'G20', 'G50', 'G47', 'G43', 'G22', 'G36', 'G8', 'G19', 'G25', 'G11', 'G12', 'G7', 'G26']



def check(engaged):
    inverseengaged = dict((v,k) for k,v in engaged.items())
    for she, he in engaged.items():
        shelikes = galprefers[she]
        shelikesbetter = shelikes[:shelikes.index(he)]
        helikes = guyprefers[he]
        helikesbetter = helikes[:helikes.index(she)]
        for guy in shelikesbetter:
            guysgirl = inverseengaged[guy]
            guylikes = guyprefers[guy]
            if guylikes.index(guysgirl) > guylikes.index(she):
                print("%s and %s like each other better than "
                      "their present partners: %s and %s, respectively"
                      % (she, guy, he, guysgirl))
                return False
        for gal in helikesbetter:
            girlsguy = engaged[gal]
            gallikes = galprefers[gal]
            if gallikes.index(girlsguy) > gallikes.index(he):
                print("%s and %s like each other better than "
                      "their present partners: %s and %s, respectively"
                      % (he, gal, she, girlsguy))
                return False
    return True

def matchmaker():
    guysfree = guys[:]
    engaged  = {}
    guyprefers2 = copy.deepcopy(guyprefers)
    galprefers2 = copy.deepcopy(galprefers)
    while guysfree:
        guy = guysfree.pop(0)
        guyslist = guyprefers2[guy]
        gal = guyslist.pop(0)
        fiance = engaged.get(gal)
        if not fiance:
            # She's free
            engaged[gal] = guy
            ##print("  %s and %s" % (guy, gal))
        else:
            # The bounder proposes to an engaged lass!
            galslist = galprefers2[gal]
            if galslist.index(fiance) > galslist.index(guy):
                # She prefers new guy
                engaged[gal] = guy
                ##print("  %s dumped %s for %s" % (gal, fiance, guy))
                if guyprefers2[fiance]:
                    # Ex has more girls to try
                    guysfree.append(fiance)
            else:
                # She is faithful to old fiance
                if guyslist:
                    # Look again
                    guysfree.append(guy)
    return engaged


##print('\nEngagements:')
engaged = matchmaker()

print('\nAssigments:')
print('  ' + ',\n  '.join('%s is assigned to %s' % couple
                          for couple in sorted(engaged.items())))

print("======Verify the assignments======")
print('Engagement stability check PASSED'
      if check(engaged) else 'Engagement stability check FAILED')


print("======Assignment statistics per faculties======")

faculties = [{'ini': 'BU','Topics': BU},{'ini': 'CN', 'Topics': CN},{'ini': 'EN','Topics': EN},{'ini': 'GS','Topics': GS},
             {'ini': 'KW','Topics': KW},{'ini': 'NH','Topics': NH},{'ini': 'PA','Topics': PA},{'ini': 'SM','Topics': SM},
             {'ini': 'SU','Topics': SU},{'ini': 'TH','Topics': TH},{'ini': 'TT','Topics': TT},{'ini': 'VS','Topics': VS}]

for faculty in faculties:
    faculty['Groups']=[ ]

for topic,group in engaged.items():
    for faculty in faculties:
        if topic in faculty['Topics']:
            for guyrecord in guyrecords:
                if guyrecord['groupID']==group:
                    faculty['Groups'] =  faculty['Groups'] + [guyrecord]


for faculty in faculties:
    groups = faculty['Groups']
    gpalist = [group['gpa'] for group in groups]
    faculty['AGPA'] = sum(gpalist)/len(gpalist)
    numOf2semprojects = 0
    for group in groups:
        if group['duration']==2:
            numOf2semprojects = numOf2semprojects + 1
    faculty['num of 2-sem projects'] = numOf2semprojects

print("Averaged GPA distr:")

print("\n".join([str(falculty['ini']) + ":" + str(falculty['AGPA']) for falculty in faculties]))

import statistics

print("Standard deviation:" + str(statistics.stdev([falculty['AGPA'] for falculty in faculties])))

print()

print("Numbers of 2-sem projects distr:")

#print("\n".join([str(falculty['ini']) + ":" + str(falculty['num of 2-sem projects'])for falculty in faculties]),end = " ")

print('\n\nSwapping two topics to introduce an error')
engaged[gals[0]], engaged[gals[1]] = engaged[gals[1]], engaged[gals[0]]
for gal in gals[:2]:
    print('  %s is now assigned to %s' % (gal, engaged[gal]))
print()
print('Engagement stability check PASSED'
      if check(engaged) else 'Engagement stability check FAILED')
