
import serial
import MySQLdb

# Open database connection
db = MySQLdb.connect("localhost","root","","beacon" )

# prepare a cursor object using cursor() method
cursor = db.cursor()

serial_port = 'COM6'
baud_rate = 9600 #In arduino, Serial.begin(baud_rate)
#write_to_file_path = "output.txt"


ser = serial.Serial(serial_port, baud_rate)
#output_file = open("C:/xampp/htdocs/MPCA PROJECT/values.txt", "w+")

while True:
	
	line = ser.readline()
	
	line = line.decode("utf-8") #ser.readline returns a binary, convert to string
	line=list(line)
	line=line[0:7]
	print(line)
	for i in range(0,7):
		sql="update parking set status="+line[i]+" where parking_id="+str(i+1)
		cursor.execute(sql)
	db.commit()
	

	
	
	#output_file.write(line)
#output_file.close()
	





'''
while(1):
	try:
		# Execute the SQL command
		cursor.execute(sql)
		# Fetch all the rows in a list of lists.
		results = cursor.fetchall()
		for row in results:
			print(row)
			#Now print fetched result

	except:
		print("Error: unable to fecth data")


# disconnect from server
'''
db.close()

