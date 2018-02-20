import os 

with open('imagelist.txt', 'a') as out:
  with open('missingicons.txt', 'r') as file:
    for line in file:
      if line.find("http://") <> -1:
        if line.rfind(".png") <> -1:
          loc = line[line.find("http://")+7:line.rfind(".png")+4]
          out.write(loc)
          out.write('\n')
        