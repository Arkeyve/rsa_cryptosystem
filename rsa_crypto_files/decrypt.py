import sys, array

plaintext = str(pow(int(sys.argv[1]), int(sys.argv[2]), int(sys.argv[3])))
text = []

while(plaintext):
	text.append(int(plaintext[-3:]))
	plaintext = plaintext[:-3]

text.reverse()
text = array.array('B', text).tostring().decode()
print(text)