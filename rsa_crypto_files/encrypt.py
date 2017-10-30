import sys

def encode_char(character):
	return '{:0>3}'.format(str(character))

plaintext = ''.join(list(map(encode_char, sys.argv[1].encode('ascii'))))

print(pow(int(plaintext), int(sys.argv[2]), int(sys.argv[3])))

