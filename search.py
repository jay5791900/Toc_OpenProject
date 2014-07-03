# -*- coding: utf-8 -*-
import json
import urllib2
import sys

n = 2048

def count(location,road,year):
	count = 0
	sum = 0
	for i in j:
		if i[u'鄉鎮市區'] == location:
			if road in i[u'土地區段位置或建物區門牌']:
				if year in str(i[u'交易年月']):
					#print i[u'土地區段位置或建物區門牌'] 
					#print i[u'總價元']
					#print i[u'交易年月']
					sum = sum + i[u'總價元']
					count = count + 1
	sum = sum / count	
	print sum		    

def t(location):
	count = 0
	sum = 0
	for i in j:
		if location in i[u'土地區段位置或建物區門牌']:
			#print i[u'土地區段位置或建物區門牌']
			
			if type(i[u'單價每平方公尺']) == int:
				price = i[u'單價每平方公尺']
				#print price
				count = count + 1
				sum = sum + price
	
	sum = sum / count
	sum = sum * 3.3
	print sum

if __name__ == '__main__':
	inpu = sys.argv
	url = 'http://www.datagarage.io/api/5365dee31bc6e9d9463a0057'
	data = urllib2.urlopen(url) #get url
	j = json.load(data)
	lo = inpu[1]
	#print lo
	#unicode_location = inpu[2].decode("utf8") #get location
	#unicode_roads = inpu[3].decode("utf8") #get road
	#unicode_year = inpu[4] #get year
	#count(unicode_location,unicode_roads,unicode_year)
	unicode_location = lo.decode("utf8") #get location
	t(unicode_location)
	











	
	
